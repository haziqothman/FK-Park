<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
    }
    public function user()
    {
        return view("admin.usermanage");
    }
    public function summon()
    {
        return view("admin.summonmanage");
    }
    public function parking()
    {
        return view("admin.parkingmanage");
    }
}