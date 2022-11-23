<?php

namespace App\Http\Controllers;
use App\Models\Driver;


use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function list(){
        $driver=Driver::where('is_active','=','1')->get();
        return View('layouts.Driver.driverManagement',['list'=>$driver]);
    }

    public function add(){
        Driver::create([
            'namaDriver' => request()->namaDriver,
            'Rating' => request()->Rating,
            'status' => 1,
            'is_active' => 1,
        ]);
        return response()->json(['success' => true]);
    }   

    public function form(){
        $driver=Driver::find(request()->id_driver);
        return view('layouts.Driver.driverForm',['driver'=>$driver]);
    }

    public function formEdit(){
        $driver=Driver::find(request()->id_driver);
        return view('layouts.Driver.driverForm',['driver'=>$driver]);
    }

    public function inputfield(){
        $input=Driver::find(request()->id_driver);
        return response()->json(['driver'=>$input]);
    }

    public function update(){
        $updateDriver=Driver::find(request()->id);
        $updateDriver->namaDriver = request()->namaDriver;
        $updateDriver->Rating = request()->Rating;
        $updateDriver->update();
        
        return response()->json(['success' => true, 'updateDriver'=>$updateDriver]);
    }

    public function delete(){
        $deleteDriver=Driver::find(request()->id);
        $data['is_active']='0';
        $deleteDriver->update($data);
        return response()->json(['success' => true]);
    }
}
