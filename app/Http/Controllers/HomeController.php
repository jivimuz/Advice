<?php

namespace App\Http\Controllers;

use App\Models\AdviceTranslation;
use App\Models\SystemModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getAdviceList(Request $request)
    {
        $lists = AdviceTranslation::where('lang_id', Session::has('lang_id') ? Session::get('lang_id') : 1)
            ->whereLike('name', "%$request->id%")
            ->orderBy('id', 'desc')->get();
        return view('component/advice_list', compact('lists'));
    }

    public function showAdviceDetail(Request $request)
    {
        $lists = AdviceTranslation::where('lang_id', Session::has('lang_id') ? Session::get('lang_id') : 1)->where('id', $request->id)->first();
        return response()->json(["message" => 'success', 'data' => $lists], 200);
    }
}
