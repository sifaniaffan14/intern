<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrintModel;
use App\Models\Peminjaman;
use PDF;
use Auth;
use DB;

class PrintController extends Controller
{
    public function download(){
        $list = PrintModel::all();

        view()->share('list',$list);
        $pdf = PDF::loadview('pdfTemplate.pdfTemplate')->setPaper('a4', 'landscape');
        return $pdf->download('Ijin Peminjaman.pdf');
    }


    public function printList(){
        $list = PrintModel::all();
        return view('layouts.peminjaman.tablePrint',['getData'=>$list]); 
    }

    public function showpdf(){
        $list = PrintModel::all();
        return view('pdfTemplate.pdfTemplate',['list'=>$list]); 
    }

    public function template(){
        $list = PrintModel::all();
        return view('pdfTemplate.peminjamanPDF',['getData'=>$list]); 
    }


    public function insertCheckBox(Request $req){
        if(!empty($req->input('peminjaman_id'))){
            $arr = [];
            foreach ($req->input('peminjaman_id') as $key => $value) {
                array_push($arr, ['peminjaman_id'=>$value]);
            }
            DB::table('print_models')->insert($arr);
        }
        else{

        }
        return $this->printList();
    }

    public function deleteData(Request $req){
        $printModel = PrintModel::find($req->id);
        $result = $printModel -> delete();

        if($result){
            return  $this->printList()-> with('status', 'Successfully Delete Data');
        }
        else{
            return $this->printList()-> with('status', 'fail to Input Data');
        }
    }

    public function deleteAll(){
        $peminjaman = Peminjaman::where("peminjam",Auth::user()->name)->get();

        foreach($peminjaman as $items){
            $printModel = PrintModel::where("peminjaman_id",$items->id);
            $result = $printModel -> delete();
        }       

        return $this->printList();
    }


}
