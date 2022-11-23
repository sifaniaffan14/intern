<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\Driver;
use Auth;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class PeminjamanController extends Controller
{
    public function listPending()
    {
        if(Auth::user()->role=="manager"){
        $peminjam = Peminjaman::where("status_verif", "2")->orderBy('status_verif', 'DESC')->orderBy('updated_at', 'ASC')->get();
        }
        else{
            $peminjam = Peminjaman::where("status_verif", "0")->where("user_id", Auth::user()->id)->orderBy('status_verif', 'DESC')->orderBy('updated_at', 'ASC')->get();
        }
        return view('layouts.infoPengajuan.listPending', ['getData' => $peminjam]);
    }

    public function listRiwayat()
    {
        $peminjam = Peminjaman::where("status_verif", '!=', "pending")->orderBy('updated_at', 'DESC')->get();
        return view('layouts.infoPengajuan.listRiwayat', ['getData' => $peminjam]);
    }

    public function filterPeminjam()
    {
        $peminjam = Peminjaman::where("peminjam", Auth::user()->name)->get();
        return view('layouts.peminjaman.peminjamanView', ['getData' => $peminjam]);
    }

    public function print()
    {
        $peminjam = Peminjaman::where("peminjam", Auth::user()->name)->where("status", '=', "accepted")->get();
        return view('layouts.peminjaman.peminjamanAcc', ['getData' => $peminjam]);
    }


    public function create(Request $req)
    {


        $peminjaman = new Peminjaman;
        // $peminjaman->jenisBarang = $req->jenisBarang;
        // $peminjaman->merk = $req->merk;
        $peminjaman->barang_id = $req->barang_id;
        $peminjaman->driver_id = $req->driver_id;
        $peminjaman->user_id = $req->user_id;
        $peminjaman->banyaknya = $req->banyaknya;
        $peminjaman->mulai = $req->mulai;
        $peminjaman->peminjam = Auth::user()->name;
        $peminjaman->status_verif = "0";

        $barang = Barang::find($peminjaman->barang_id);
        //$driver = Driver::find($peminjaman->driver_id);
        $barang->jumlah = $barang->jumlah - $peminjaman->banyaknya;
        $barang->save();

        $driver = Driver::find($peminjaman->driver_id);
        $driver->status = 0;
        $driver->save();

        if ($peminjaman->save()) {
            return redirect('/peminjaman')->with(['success' => 'Berhasil Mengupload Pengajuan']);
        } else {
            return redirect('/peminjaman')->with(['warning' => 'Gagal Mengupload pengajuan']);
        }
    }

    public function update(Request $req, $peminjaman)
    {
        $peminjaman = Peminjaman::find($peminjaman);
        $peminjaman->barang_id = $req->barang_id;
        //$peminjaman->driver_id = $req->driver_id;
        $peminjaman->banyaknya = $req->banyaknya;
        $peminjaman->mulai = $req->mulai;
        $peminjaman->peminjam = $req->peminjam;
        $peminjaman->status_verif = $req->status_verif;

        if ($peminjaman->status_verif == 1) {

            $barang = Barang::find($peminjaman->barang_id);
            $barang->jumlah = $barang->jumlah + $peminjaman->banyaknya;
            $barang->save();

            $driver = Driver::find($peminjaman->driver_id);
            $driver->status = 1;
            $driver->save();
        }


        if ($peminjaman->save()) {
            return  redirect('/listPending')->with('status', 'Successfully Update Data');
        } else {
            return View('layouts.infoPengajuan.detailPeminjaman', compact('peminjaman'))->with(['success' => 'Berhasil Memberikan Izin']);
        }
    }

    public function detailData(Request $req)
    {
        $peminjaman = Peminjaman::find($req->id);
        return View('layouts.infoPengajuan.detailPeminjaman', compact('peminjaman'));
    }


    public function delete($id)
    {
        $peminjaman = Peminjaman::find($id);
        $result = $peminjaman->delete();
        if ($result) {
            return redirect('/listRiwayat');
        } else {
            return ["Result" => "Data Has Not Been Deleted"];
        }
    }

    public function laporan()
    {
        $laporan = Peminjaman::where('status', '=', 'accepted')->get();
        return View('layouts.laporan.laporan', ['laporan' => $laporan]);
    }
    public function export_excel()
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }
}
