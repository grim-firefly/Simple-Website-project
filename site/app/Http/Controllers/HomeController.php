<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorModel;
use App\Models\ServicesModel;

class HomeController extends Controller
{
    function HomeIndex()
    {

        $UserIp = $_SERVER['REMOTE_ADDR'];
        $TimeDate = date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address' => $UserIp, 'visit_time' => $TimeDate]);
        $Services=json_decode(ServicesModel::all());
        return view('Home',compact('Services'));
    }
}
