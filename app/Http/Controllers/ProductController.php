<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;
class ProductController extends Controller
{
    public function create()
    {
        return view('Produk.create');
    }

    public function store(Request $request)
    {
        $namaFile = rand(999999,9999999999) . "." . $request['gambar']->getClientOriginalExtension();
        $request['gambar']->storeAS(
            'public/Produk', $namaFile
        );
        $request['image'] = $namaFile;
        Produk::create($request->all());

        return redirect()->Route('shop');
    }
    public function show($id)
    {
       $produk = Produk::where('id', $id)->first();
       $sales = Transaksi::where('produk_id', $id)->get()->count();
       return view('Produk.show',compact('produk','sales'));
    }
    public function destroy($id)
    {
        Produk::where('id', $id)->update([
            'dihapus' => 1
        ]);
        return redirect()->back();
    }
    public function edit($id)
    {
        $produk = Produk::where('id',$id)->first();
        return view('Produk.edit',compact('produk'));
    }
    public function update(Request $request, $id)
    {
        if ($request['gambar'] != null) {
            $namaFile = rand(999999,9999999999) . "." . $request['gambar']->getClientOriginalExtension();
            $request['gambar']->storeAS(
                'public/Produk', $namaFile
            );
            $request['image'] = $namaFile;
        }
        Produk::where('id', $id)->update($request->except('_token','gambar'));

        return redirect()->Route('shop');
    }
}
