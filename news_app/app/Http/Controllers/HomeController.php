<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index (){
        return View("pages.home.index");
    }

    function plot (){
        return View("pages.home.plot");
    }

    function morris (){
        return View("pages.home.morris");
    }
}
