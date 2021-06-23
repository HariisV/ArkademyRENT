@extends('default')
@section('Judul') {{$produk->nama_produk}} -  @endsection
@section('style')

@endsection
@section('konten')
 <form action="{{Route('updateProduk', $produk->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
                        <div class="page-header no-gutters has-tab">
                            <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                                <div class="media align-items-center m-b-15">
                                    <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                                        <img src="{{Asset('storage/Produk/' . $produk->image)}}" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <h4 class="m-b-0">{{$produk->nama_produk}}</h4>
                                    </div>
                                </div>
                                <div class="m-b-15">
                                    <button class="btn btn-primary">
                                        <i class="anticon anticon-save"></i>
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                           
                        </div>
                      <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-edit-basic">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="productName">Nama Produk</label>
                        <input required type="text" name="nama_produk" class="form-control" value="{{$produk->nama_produk}}" id="productName"
                            placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="productPrice">Harga</label>
                        <input required type="text" class="form-control" value="{{$produk->harga}}" name="harga" id="productPrice" placeholder="Price">
                    </div>

            <div class="form-group">
                        <label class="font-weight-semibold" for="stok">Jumlah</label>
                        <input required type="text" class="form-control" value="{{$produk->jumlah}}" name="jumlah" id="stok" placeholder="Stok">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="stok">Deskripsi</label>
                        <textarea required name="keterangan" cols="30" rows="5" placeholder="Deskripsi Produk"
                            class="form-control">{{$produk->keterangan}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="productPrice">Gambar</label>
                        <input  type="file" class="form-control" name="gambar" accept="Image/*">
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