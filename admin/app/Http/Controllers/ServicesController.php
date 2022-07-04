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

    function GetServicesData()
    {
        $Services = json_encode(ServicesModel::all());
        return $Services;
    }
    function DeleteServicesData(Request $request)
    {
        $id = $request->id;
        $delete = ServicesModel::where('id', $id)->delete();
        if ($delete) {
            return json_encode(['status' => 'success']);
        }
        return json_encode(['status' => 'failed']);
    }
    function SingleServiceData(Request $request)
    {
        $id = $request->id;
        // $Services=json_encode(['id'=>$id]);
        $Services = json_encode(ServicesModel::where('id', $id)->first());
        return $Services;
    }
    function AddServiceData(Request $request){
        $name=$request->name;
        $des=$request->des;
        $add=ServicesModel::insert(['service_name' => $name, 'service_des' => $des,'service_img'=>'images/code.svg']);
        if ($add) {
            return  json_encode(['success' => 'True' ]);
        }
        return json_encode(['success' => 'False']);
    }

    function UpdateSingleServiceData(Request $request)
    {
      

        $id = $request->id;
        $name = $request->name;
        $des = $request->des;
        $update = ServicesModel::where('id', $id)->update(['service_name' => $name, 'service_des' => $des]);
        if ($update) {
            return json_encode(['success' => 'True']);
        }
        return json_encode(['success' => 'False']);
    }
}
