<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct()
        {

        }


        public function index()
        {


            return view('contents.addSite');
        }
}
