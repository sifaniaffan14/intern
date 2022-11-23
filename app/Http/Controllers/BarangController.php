<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Driver;
use App\Models\User;
use DB;
use Picqer;
use PDF;

//use Auth;

class BarangController extends Controller
{
    public function list()
    {
        $barang = Barang::all();
        $driver = Driver::where('status','=', '1')->get();
        $user = User::where('role','=','supervisor')->get();
        return View('layouts.peminjaman.peminjamanForm', ['listBarang' => $barang, 'listdriver' => $driver, 'listsupervisor' => $user]);
    }

    public function listBarang()
    {
        $barang = Barang::all();
        return View('layouts.barang.barangManagement', ['listBarang' => $barang]);
    }

    public function addBarang(Request $request)
    {
        $barang = new Barang;
        $barang->kodeKendaraan = $request->kodeKendaraan;
        $barang->jenisKendaraan = $request->jenisKendaraan;
        $barang->merkKendaraan = $request->merkKendaraan;
        $barang->jumlah = $request->jumlah;
        $barang->kondisi = $request->kondisi;
        if ($barang->save()) {
            return redirect('barangmanagement')->with('status', 'Successfully Input Data');
        } else {
            return redirect()->back()->with('status', 'fail to Input Data');
        }
    }

    public function putData(Request $request, $barang)
    {

        $barang = Barang::find($barang);
        $barang->kodeKendaraan = $request->kodeKendaraan;
        $barang->jenisKendaraan = $request->jenisKendaraan;
        $barang->merkKendaraan = $request->merkKendaraan;
        $barang->jumlah = $request->jumlah;
        $barang->kondisi = $request->kondisi;
        $barang->save();
        // $barang->update($request->all());

        return redirect('barangmanagement')->with('status', 'Successfully Input Data');
    }


    public function editData(Request $request)
    {
        $barang = Barang::find($request->id);
        return View('layouts.barang.barangEditForm', compact('barang'));
    }

    public function deleteData(Request $request)
    {
        $barang = Barang::find($request->id);
        $barang->delete();
        if ($barang->delete()) {
            return  redirect('/barangmanagement')->with('status', 'Successfully Delete User');
        } else {
            return  redirect('/barangmanagement')->with('status', 'Fail to Delete User');
        }
    }

    public function listBanyaknya($id)
    {
        // $barang = Barang::where("id",$id);
        // return response()->json($barang);
        echo json_encode(DB::table('barangs')->where('id', $id)->get());
    }

    public function GetBarangBarcodes()
    {
        $barangBarcode = Barang::select('barcode', 'product_code')->get();

        return view('layouts.barang.barcodeBarang', compact('barangBarcode'));
    }

    public function barcodePrint()
    {
        $barangBarcode = Barang::select('barcode')->get();
        view()->share('printBarcode', $barangBarcode);
        $pdf = PDF::loadview('layouts.barang.barcodeBarang')->setPaper('a4', 'landscape');
        return $pdf->download('barcode.pdf');
    }
}
