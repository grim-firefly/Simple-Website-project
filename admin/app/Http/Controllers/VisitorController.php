<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorModel;
class VisitorController extends Controller
{
    function HomeIndex()
    {
        $VisitorData=json_decode(VisitorModel::orderBy('id','DESC')->get());
       return view('Visitor',compact('VisitorData'));
    }
}
