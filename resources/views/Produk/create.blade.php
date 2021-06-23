@extends('default')
@section('Judul') Tambah Produk - @endsection
@section('style')
<link href="{{Asset('assets/vendors/select2/select2.css')}}" rel="stylesheet">
@endsection
@section('konten')
<form action="{{Route('tambahProdukProses')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-edit-basic">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="productName">Nama Produk</label>
                        <input required type="text" name="nama_produk" class="form-control" id="productName"
                            placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="productPrice">Harga</label>
                        <input required type="text" class="form-control" name="harga" id="productPrice" placeholder="Price">
                    </div>

            <div class="form-group">
                        <label class="font-weight-semibold" for="stok">Jumlah</label>
                        <input required type="text" class="form-control" name="jumlah" id="stok" placeholder="Stok">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="stok">Deskripsi</label>
                        <textarea required name="keterangan" cols="30" rows="5" placeholder="Deskripsi Produk"
                            class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="productPrice">Gambar</label>
                        <input required type="file" class="form-control" name="gambar" accept="Image/*">
                    </div>

                    <div class="float-right">
                        <button class="btn btn-primary">
                            <i class="anticon anticon-save"></i>
                            <span>Tambah</span>
                        </button>
                    </div>


                </div>
            </div>
        </div>


    </div>
</form>
@endsection
