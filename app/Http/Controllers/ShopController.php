<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;
class ShopController extends Controller
{

    public function index()
    {
        $produk = Produk::where('dihapus', 0)->get();
        return view('shop',compact('produk'));
    }

  
    public function order(Request $request, $id)
    {
        $produk = Produk::where('id', $id)->first();
        if ($produk->total < 0) {
            return redirect()->back();
        }
        $request['produk_id'] = $id;
        $request['user_id'] = Auth()->user()->id;
        $produk->decrement('jumlah', $request['jumlah']);
        $request['total'] = $produk->harga * $request['jumlah'];
        $request['status'] = 'konfirmasi';
        Transaksi::create($request->all());
        return redirect()->route('historyProduk');
    }

    public function history(Request $request)
    {
        $Transaksi = Transaksi::where('user_id', Auth()->user()->id)->get();
        return view('history',compact('Transaksi'));
    }

   


    public function Transaksi()
    {
        $Transaksi = Transaksi::GET();
        return view('Admin.Transaksi',compact('Transaksi'));
    }
    public function hapusTransaksi($id)
    {
        Transaksi::where('id', $id)->delete();
        return redirect()->back();
    }
    public function gantiStatus($id)
    {
        $Transaksi = Transaksi::where('id', $id)->first();
        if ($Transaksi->status == "konfirmasi") {
            $Transaksi->update([
                'status' => 'proses',
            ]);
        }elseif($Transaksi->status == "proses")
        {
            $Transaksi->update([
                'status' => 'selesai',
            ]);
        }elseif($Transaksi->status == "selesai")
        {
            $Transaksi->update([
                'status' => 'batal',
            ]);
        }elseif($Transaksi->status == "batal")
        {
            $Transaksi->update([
                'status' => 'konfirmasi',
            ]);
        }

        return redirect()->back();
    }

    
}
