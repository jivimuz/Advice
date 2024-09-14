<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\MigrateAdviceJob;
use Illuminate\Support\Facades\DB;

class MigrateAdviceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:advice {batchSize=1000} {offset=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate old advice data to new structure in batches';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the batch size and offset from input arguments
        $batchSize = (int) $this->argument('batchSize');
        $offset = (int) $this->argument('offset');

        // Get the total number of records in the old database
        $totalRecords = DB::connection('old_mysql')->table('advice')->count();

        // Dispatch jobs starting from the given offset
        for ($currentOffset = $offset; $currentOffset < $totalRecords; $currentOffset += $batchSize) {
            MigrateAdviceJob::dispatch($batchSize, $currentOffset);

            // Output progress to the console
            $this->info('Dispatched batch: ' . $currentOffset . ' to ' . ($currentOffset + $batchSize));
        }

        $this->info('Migration process initiated successfully.');
    }
}
