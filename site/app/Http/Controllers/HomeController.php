<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorModel;
use App\Models\ServicesModel;
use App\Models\CourseModel;

class HomeController extends Controller
{
    function HomeIndex()
    {

        $UserIp = $_SERVER['REMOTE_ADDR'];
        $TimeDate = date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address' => $UserIp, 'visit_time' => $TimeDate]);
        $Services=json_decode(ServicesModel::all());
        $Courses=json_decode( CourseModel::orderby('id','desc')->limit(6)->get());
        return view('Home',compact('Services','Courses'));
    }
}
