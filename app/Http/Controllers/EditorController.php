<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('editor', ['except' => 'test']);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    	return view('admin.editor');

    }

    /**
     * Show the test page for both admin and editor.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {

        return view('admin.test');

    }


}
