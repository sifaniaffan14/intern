<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function getData(){
        $user = User::all();
        return view('layouts.userManagement.userManagement',['getData'=>$user]); 
    }

    public function postData(Request $req){
    $req -> validate([
        'name' => 'required',
        'username' => 'required',
        'departemen' => 'required',
        'divisi' => 'required',
        'role' => 'required',
        'password' => 'required',
    ]);


        $user = new User;
        $user -> name = $req->name;
        $user -> username = $req->username;
        $user -> departemen = $req->departemen;
        $user -> divisi = $req->divisi;
        $user -> password = bcrypt($req->password);
        $user -> role = $req->role;
        if($user -> save()){
            return  redirect('/usermanagement')-> with('status', 'Successfully Input Data');
        }
        else{
            return  redirect()->back()-> with('status', 'fail to Input Data');
        }
    }

    public function putData(Request $req, $id){
        $user = User::find($req->id);
        $user -> name = $req->name;
        $user -> username = $req->username;
        $user -> departemen = $req->departemen;
        $user -> divisi = $req->divisi;
        if($user -> password != $req->password){
            $user -> password = bcrypt($req->password);
        }
        else{
            $user -> password = $req->password;
        }
        
        $user -> role = $req->role;
        $user -> save();
        
        if($user -> save()){
            return  redirect('/usermanagement')-> with('status', 'Successfully Edit Data');
        }
        else{
            return  redirect('/usermanagement/add')-> with('status', 'fail to Input Data');
        }
    }


    public function editData(Request $req){
        $user = User::find($req->id);
        return View('layouts.userManagement.userEditForm', compact('user'));
    }

    public function deleteData(Request $req){
        $user = User::find($req->id);
        $user -> delete();
        if($user -> delete()){
            return  redirect('/usermanagement')-> with('status', 'Successfully Delete User');
        }
        else{
            return  redirect('/usermanagement')-> with('status', 'Fail to Delete User');
        }
    }


}
