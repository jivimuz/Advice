<?php

namespace App\Jobs;

use App\Models\Advice;
use App\Models\AdviceTranslation;
use App\Models\Lang;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MigrateAdviceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $batchSize;
    protected $offset;
    public $tries = 5;        // Retry up to 5 times
    public $timeout = 900;    // 15 minutes timeout (900 seconds)

    /**
     * Create a new job instance.
     */
    public function __construct($batchSize, $offset)
    {
        $this->batchSize = $batchSize;
        $this->offset = $offset;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        DB::beginTransaction();

        try {
            // Fetch advice records from the old database
            $advices = DB::connection('old_mysql')
                ->table('advice')
                ->orderBy('id', 'asc')
                ->skip($this->offset)
                ->take($this->batchSize)
                ->get();

            foreach ($advices as $advice) {
                // Check if record already exists
                $check = AdviceTranslation::where([
                    'name'         => $advice->name,
                    'information'  => $advice->information,
                    'actual_tip'   => $advice->actual_tip,
                    'tip_example'  => $advice->tip_example,
                ])->first();

                if (!$check) {
                    // Create new advice record
                    $newAdvice = new Advice();
                    $newAdvice->save();

                    if (!$newAdvice) {
                        throw new Exception("Failed to create new advice record.");
                    }

                    // Get language IDs
                    $lang_en = Lang::select('id')->where("code", 'en')->first();
                    $lang_id = Lang::select('id')->where("code", 'id')->first();

                    if (!$lang_en || !$lang_id) {
                        throw new Exception("Failed to retrieve language records.");
                    }

                    // Insert English translation
                    $englishTranslation = AdviceTranslation::create([
                        'advice_id'    => $newAdvice->id,  // Use the id property from the object
                        'lang_id'      => $lang_en->id,
                        'name'         => $advice->name,
                        'information'  => $advice->information,
                        'actual_tip'   => $advice->actual_tip,
                        'tip_example'  => $advice->tip_example,
                        'created_at'   => $advice->date_created,
                        'updated_at'   => $advice->date_updated,
                    ]);

                    // Insert Indonesian translation
                    $indonesianTranslation = AdviceTranslation::create([
                        'advice_id'    => $newAdvice->id,  // Use the id property from the object
                        'lang_id'      => $lang_id->id,
                        'name'         => $advice->name_id,
                        'information'  => $advice->information_id,
                        'actual_tip'   => $advice->actual_tip_id,
                        'tip_example'  => $advice->tip_example_id,
                        'created_at'   => $advice->date_created,
                        'updated_at'   => $advice->date_updated,
                    ]);

                    if (!$englishTranslation || !$indonesianTranslation) {
                        throw new Exception("Error inserting translations.");
                    }
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $line = $e->getLine();
            $file = $e->getFile();

            Log::error("Migration failed at offset {$this->offset}, file: {$file}, line: {$line}, error: " . $e->getMessage());
            echo "Migration failed at offset {$this->offset}, file: {$file}, line: {$line}, error: " . $e->getMessage() . PHP_EOL;
        }
    }
}
