<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ContentController extends Controller
{
    //

    public function __construct()
    {

    }


    public function content()
    {


        return view('contents.home');
    }
}
