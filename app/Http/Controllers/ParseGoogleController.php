<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;

class ParseGoogleController extends Controller
{
    public function show()
    {
        $tables= DB::table('parse_googles')->paginate(100);
        return view('index', ['parse_googles' => $tables]);
    }
    public function post(Request $request)
    {
        $word = $request->input('key_word');
        $dom = $request->input('key_domaine');
        $getPage = App\ParseGoogle::getPage($word, $dom);
        $tables= DB::table('parse_googles')->paginate(100);
        return view('index', ['parse_googles' => $tables]);
    }
    // public function serch(Request $request)
    // {
    //     $word = $request->input('key_domaine');
    //     $tables= DB::table('parse_googles')->orderBy('domaine_name', 'asc')->paginate(100);
    //     return view('index', ['parse_googles' => $tables]);
    // }
}
