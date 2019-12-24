<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\level;

class AdminController extends Controller
{
    //
    public function admin() {
        $level =  new Level();
        $levels =  $level::getLevels();
        return view('admin/index',compact("levels"));
    }
}
