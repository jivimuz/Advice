<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function setLang(Request $request)
    {
        $curId = (int)$request->cur_lang;

        $data = Lang::select('id')->where('id', $curId)->first();
        if ($data) {
            Session::put('lang_id', $curId);
            return response()->json(["message" => 'success', 'data' =>  $curId], 200);
        }
        Session::put('lang_id', 1);
        return response()->json(["message" => 'error', 'error' =>  'This Language is not registered'], 401);
    }

    public function setLangByCode($parameter)
    {
        $data = Lang::select('id')->where('code', $parameter)->first();
        if ($data) {
            Session::put('lang_id', $data->id);
            return redirect()->route('home');
        }
        Session::put('lang_id', 1);
        return response()->json(["message" => 'error', 'error' =>  'This Language is not registered'], 401);
    }

    public function getLangList()
    {
        $data = Lang::get();
        return response()->json(["message" => 'success', 'data' => $data], 200);
    }

    public function generateTranslate(Request $request)
    {
        $client = new Client();
        if (!getenv('TRANSLATION_URL')) {
            return response()->json(["message" => 'error', 'error' => 'No Translation URL Registered'], 401);
        }
        if (!getenv('TRANSLATION_API')) {
            return response()->json(["message" => 'error', 'error' => 'No Apikey Registered'], 401);
        }

        try {
            $response = $client->post(getenv('TRANSLATION_URL') . '/translate', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'X-API-KEY' => getenv('TRANSLATION_API'),
                ],
                'json' => [
                    'text' => $request->val,
                    'source' => $request->fr,
                    'target' => $request->to
                ],
            ]);

            $responseBody = (string) $response->getBody();
            return response()->json(["message" => 'success', 'data' => $responseBody], 200);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return response()->json(["message" => 'error', 'error' => $e->getMessage()], 400);
        }
    }

    public function addModal()
    {
        $cur_id = Session::has('lang_id') ? Session::get('lang_id') : 1;
        $langs = Lang::get();
        return view('advice.languages', compact('langs', 'cur_id'));
    }

    public function getLangRequest()
    {
        $client = new Client();
        if (!getenv('TRANSLATION_URL')) {
            return response()->json(["message" => 'error', 'error' => 'No Translation URL Registered'], 401);
        }
        if (!getenv('TRANSLATION_API')) {
            return response()->json(["message" => 'error', 'error' => 'No Apikey Registered'], 401);
        }

        try {
            $response = $client->get(getenv('TRANSLATION_URL') . '/supported-languages', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'X-API-KEY' => getenv('TRANSLATION_API'),
                ],
            ]);

            $responseBody = (string) $response->getBody();
            return response()->json(["message" => 'success', 'data' => $responseBody], 200);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return response()->json(["message" => 'error', 'error' => $e->getMessage()], 400);
        }
    }

    public function saveLang(Request $request)
    {
        try {
            DB::beginTransaction();
            $cek = Lang::where('code', $request->code)->first();
            if ($cek) {
                throw new Exception($request->name . " already registered!");
            }
            Lang::insert([
                "code" => $request->code,
                "name" => $request->name,
            ]);

            DB::commit();
            return response()->json(["message" => 'success', 'data' => null], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(["message" => 'error', 'error' => $e->getMessage()], 401);
        }
    }
}
