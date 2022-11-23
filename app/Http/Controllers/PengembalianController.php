<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Barang;

class PengembalianController extends Controller
{
    public function belumKembali(){
        $peminjam = Peminjaman::where("statusPengembalian","dipinjam")->get();
        return view('layouts.pengembalian.listBelumKembali',['getData'=>$peminjam]); 
    }

    public function sudahKembali(){
        $peminjam = Peminjaman::where("statusPengembalian","dikembalikan")->get();
        return view('layouts.pengembalian.listSudahKembali',['getData'=>$peminjam]); 
    }

    public function detail(Request $req){
        $peminjaman = Peminjaman::find($req->id);
        return View('layouts.pengembalian.details', compact('peminjaman'));
    }

    public function detail2(Request $req){
        $peminjaman = Peminjaman::find($req->id);
        return View('layouts.pengembalian.details2', compact('peminjaman'));
    }
    

    public function belumDiKembalikan(Request $req, $id){
        $peminjaman = Peminjaman::find($req->id);
        // $peminjaman->jenisBarang = $req->jenisBarang;
        // $peminjaman->merk = $req->merk;
        $peminjaman->barang_id = $req->barang_id;
        $peminjaman->banyaknya = $req->banyaknya;
        $peminjaman->mulai = $req->mulai;
        $peminjaman->sampai = $req->sampai;
        $peminjaman->izinMembawa = $req->izinMembawa;
        $peminjaman->peminjam = $req->peminjam;
        $peminjaman->status = $req->status;
        $peminjaman->statusPengembalian = "dipinjam";
        $result = $peminjaman->save();

        $barang = Barang::find($peminjaman->barang_id);
        $barang->jumlah = $barang->jumlah - $peminjaman->banyaknya;
        $barang->save();

        if($result){
            return $this->belumKembali();
        }
        else{
            return View('layouts.pengembalian.details', compact('peminjaman'))->with(['failed' => 'Gagal Mengupdate']);
        }
    }
    public function diKembalikan(Request $req, $id){
        $peminjaman = Peminjaman::find($req->id);
        // $peminjaman->jenisBarang = $req->jenisBarang;
        // $peminjaman->merk = $req->merk;
        $peminjaman->barang_id = $req->barang_id;
        $peminjaman->banyaknya = $req->banyaknya;
        $peminjaman->mulai = $req->mulai;
        $peminjaman->sampai = $req->sampai;
        $peminjaman->izinMembawa = $req->izinMembawa;
        $peminjaman->peminjam = $req->peminjam;
        $peminjaman->status = $req->status;
        $peminjaman->statusPengembalian = "dikembalikan";
        $result = $peminjaman->save();

        $barang = Barang::find($peminjaman->barang_id);
        $barang->jumlah = $barang->jumlah + $peminjaman->banyaknya;
        $barang->save();

        if($result){
            return $this->sudahKembali();
        }
        else{
            return View('layouts.pengembalian.details', compact('peminjaman'))->with(['failed' => 'Gagal Mengupdate']);
        }
    }
}
