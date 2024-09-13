<?php

namespace App\Http\Controllers;

use App\Models\Advice;
use App\Models\AdviceTranslation;
use App\Models\Lang;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdviceController extends Controller
{
    public function index()
    {
        return view('advice/index');
    }

    public function getMainList()
    {
        $data = AdviceTranslation::where('lang_id', Session::has('lang_id') ? Session::get('lang_id') : 1)->orderBy('id', 'desc')->get();
        return response()->json(["message" => 'success', 'data' => $data], 200);
    }

    public function addModal()
    {
        $langs = Lang::whereNot('id', Session::has('lang_id') ? Session::get('lang_id') : 1)->get();
        $cur_lang = Lang::where('id', Session::has('lang_id') ? Session::get('lang_id') : 1)->first();
        return view('advice.add', compact('langs', 'cur_lang'));
    }

    public function saveData(Request $request)
    {
        $langs = Lang::select('id')->get();
        try {
            DB::beginTransaction();
            $newID = Advice::createNew();
            $inserted = 0;
            foreach ($langs as $i) {
                if ($request->input('adv_name_' . $i->id) ||  $request->input('breaf_info_' . $i->id) || $request->input('act_tip_' . $i->id) ||  $request->input('tip_example_' . $i->id)) {
                    $inserted++;
                    AdviceTranslation::insert([
                        'advice_id' => $newID,
                        'lang_id' => $i->id,
                        'name' => $request->input('adv_name_' . $i->id),
                        'information' => $request->input('breaf_info_' . $i->id),
                        'actual_tip' => $request->input('act_tip_' . $i->id),
                        'tip_example' => $request->input('tip_example_' . $i->id),
                    ]);
                }
            }
            if ($inserted <= 0) {
                throw new Exception("No Data Inserted");
            }
            DB::commit();
            return response()->json(["message" => 'success', 'data' => ['inserted' => $inserted]], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(["message" => 'error', 'error' => $e->getMessage()], 401);
        }
    }

    public function editModal(Request $request)
    {
        $advid = $request->id;
        $langs = Lang::select([
            'langs.*',
            'a.name as aname',
            'a.information as ainfo',
            'a.actual_tip as atip',
            'a.tip_example as aexample'
        ])
            ->leftJoin('advice_translations as a', function ($join) use ($advid) {
                $join->on('langs.id', '=', 'a.lang_id')
                    ->where(function ($query) use ($advid) {
                        $query->where('a.advice_id', $advid)
                            ->orWhereNull('a.advice_id');
                    });
            })
            ->whereNot('langs.id', Session::has('lang_id') ? Session::get('lang_id') : 1)
            ->get();

        $cur_lang = Lang::select(['langs.*', 'a.name as aname', 'a.information as ainfo', 'a.actual_tip as atip', 'a.tip_example as aexample'])
            ->leftJoin('advice_translations as a', 'langs.id', 'a.lang_id')
            ->where('langs.id', Session::has('lang_id') ? Session::get('lang_id') : 1)
            ->whereIn('a.advice_id', [null, $advid])->first();
        return view('advice.edit', compact('langs', 'cur_lang', 'advid'));
    }

    public function updateData(Request $request)
    {
        $langs = Lang::select('id')->get();
        try {
            DB::beginTransaction();
            $inserted = 0;
            foreach ($langs as $i) {
                if ($request->input('adv_name_' . $i->id) ||  $request->input('breaf_info_' . $i->id) || $request->input('act_tip_' . $i->id) ||  $request->input('tip_example_' . $i->id)) {
                    $inserted++;
                    $cek = AdviceTranslation::where('advice_id', $request->id)->where('lang_id', $i->id)->first();
                    if ($cek) {
                        AdviceTranslation::where('advice_id', $request->id)->where('lang_id', $i->id)->update([
                            'name' => $request->input('adv_name_' . $i->id),
                            'information' => $request->input('breaf_info_' . $i->id),
                            'actual_tip' => $request->input('act_tip_' . $i->id),
                            'tip_example' => $request->input('tip_example_' . $i->id),
                        ]);
                    } else {
                        AdviceTranslation::insert([
                            'advice_id' => $request->id,
                            'lang_id' => $i->id,
                            'name' => $request->input('adv_name_' . $i->id),
                            'information' => $request->input('breaf_info_' . $i->id),
                            'actual_tip' => $request->input('act_tip_' . $i->id),
                            'tip_example' => $request->input('tip_example_' . $i->id),
                        ]);
                    }
                }
            }
            if ($inserted <= 0) {
                throw new Exception("No Data Inserted");
            }
            DB::commit();
            return response()->json(["message" => 'success', 'data' => ['inserted' => $inserted]], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(["message" => 'error', 'error' => $e->getMessage()], 401);
        }
    }

    public function deleteData(Request $request)
    {
        try {
            DB::beginTransaction();
            $cekDetail = AdviceTranslation::where('advice_id', $request->id)->first();
            if ($cekDetail) {
                AdviceTranslation::where('advice_id', $request->id)->delete();
            }
            $cekHeader = Advice::where('id', $request->id)->first();
            if ($cekHeader) {
                Advice::where('id', $request->id)->delete();
            }
            DB::commit();
            return response()->json(["message" => 'success', 'data' => null], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(["message" => 'error', 'error' => $e->getMessage()], 401);
        }
    }
}
