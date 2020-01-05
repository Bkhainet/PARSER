<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use \Validator;
use \Session;

class ParseGoogleController extends Controller
{
    public function show()
    {
        $tables= DB::table('parse_googles')->paginate(100);
        return view('index', ['parse_googles'=> $tables]);
    }
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'key_word'=>'required|max:255',
            'key_domaine'=>'required|max:255'
        ]);

        if($validator->fails())
        {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $word = $request->input('key_word');
        $dom = $request->input('key_domaine');

        App\ParseGoogle::getPage($word, $dom);

        DB::table('parse_googles')->paginate(100);
        $search = DB::select('SELECT * FROM `parse_googles` WHERE `domaine_name` = \'' . $dom. '\'');

        Session::flash('flash_message', $search );

        return view('index', ['parse_googles'=>$search]);
    }
    public function get()
    {
        $tables= DB::table('parse_googles')->paginate(100);
        return view('history', ['parse_googles'=> $tables]);
    }
}
