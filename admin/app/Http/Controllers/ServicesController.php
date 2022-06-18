<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicesModel;
class ServicesController extends Controller
{
    function HomeIndex()
    {
        return view('Services');
    }

    function GetServicesData(){
        $Services=json_encode(ServicesModel::all());
        return $Services;
    }
}
