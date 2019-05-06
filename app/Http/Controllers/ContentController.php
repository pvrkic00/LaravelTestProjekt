<?php

namespace App\Http\Controllers;


class ContentController extends Controller
{
    //

    public function __construct()
    {

    }


    public function index()
    {


        return view('contents.home');
    }

}
