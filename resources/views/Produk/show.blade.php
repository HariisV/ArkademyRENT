@extends('default')
@section('Judul') {{$produk->nama_produk}} -  @endsection
@section('style')

@endsection
@section('konten')

  <div class="page-header no-gutters has-tab">
                        <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                            <div class="media align-items-center m-b-15">
                                <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                                    <img src="{{Asset('storage/Produk/' . $produk->image)}}" alt="">
                                </div>
                                <div class="m-l-15">
                                    <h4 class="m-b-0">{{$produk->nama_produk}}</h4>
                                    @if ($produk->jumlah > 0)
                                        <span class="badge badge-pill badge-cyan">In Stock</span>
                                    @else
                                         <span class="badge badge-danger badge-danger">Sold Out</span>
                                    @endif
                                </div>
                            </div>
                            <div class="m-b-15">
                                @if ($produk->jumlah > 0 && $produk->dihapus == 0)
                                    <a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#search-drawer">
                                        <i class="anticon anticon-shopping-cart"></i>
                                        <span>Beli Sekarang</span>
                                    </a>
                                @else
                                 <a  class="btn btn-danger btn-tone m-r-5">
                                        <i class="anticon anticon-shopping-cart"></i>
                                        <span>Tidak Tersedia</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <ul class="nav nav-tabs" >
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#product-overview">Overview</a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="container-fluid">
                        <div class="tab-content m-t-15">
                            <div class="tab-pane fade show active" id="product-overview" >
                                <div class="row justify-content-md-center">
                                    
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="media align-items-center">
                                                    <i class="font-size-40 text-primary anticon anticon-shopping-cart"></i>
                                                    <div class="m-l-15">
                                                        <p class="m-b-0 text-muted">Sales</p>
                                                        <h3 class="m-b-0 ls-1">{{$sales}}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="media align-items-center">
                                                    <i class="font-size-40 text-primary anticon anticon-stock"></i>
                                                    <div class="m-l-15">
                                                        <p class="m-b-0 text-muted">Available Stock</p>
                                                        <h3 class="m-b-0 ls-1">{{$produk->jumlah}} </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Basic Info</h4>
                                        <div class="table-responsive">
                                            <table class="product-info-table m-t-20">
                                                <tbody>
                                                    <tr>
                                                        <td>Name:</td>
                                                        <td><strong>{{$produk->nama_produk}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Harga:</td>
                                                        <td class="text-dark font-weight-semibold">Rp {{{number_format($produk->harga,0,'.','.')}}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Stock:</td>
                                                        <td>{{$produk->jumlah}} Qty</td>
                                                    </tr>
                                                 
                                                    <tr>
                                                        <td>Status:</td>
                                                        <td>
                                                            @if ($produk->jumlah > 0)
                                                                 <span class="badge badge-pill badge-cyan">In Stock</span>
                                                            @else
                                                                <span class="badge badge-danger badge-danger">Sold Out</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table> 
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Product Description</h4>
                                    </div>
                                    <div class="card-body">
                                       <p>
                                           {{$produk->keterangan}}
                                       </p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                           <div class="modal modal-right fade search" id="search-drawer">
                                <div class="modal-dialog">
                                
                                            <div class="modal-content">
                                                <form action="{{Route('orderProduk', $produk->id)}}" method="POST">
                                                    @csrf
                                        
                                                <div class="modal-header justify-content-between align-items-center">
                                                    <h5 class="modal-title">Beli {{$produk->nama_produk}} </h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <i class="anticon anticon-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body scrollable">

                                                    <label>Jumlah</label>
                                                    <input type="number" class="form-control"  min="1" max="{{$produk->jumlah}}"  id="numberBox" name="jumlah"  required placeholder="Jumlah Barang" max="5">
                                                    <label class="mt-3">Nama Penerima</label>
                                                    <input type="text" class="form-control" name="nama_penerima" id="nama" required placeholder="Nama Pengguna">
                                                    
                                                    
                                                    <label class=" mt-3">Alamat Penerima</label>
                                                    <textarea required name="alamat_penerima" class="form-control" cols="30" rows="4" placeholder="Alamat Penerima"></textarea>
                                                    
                                                    <label class=" mt-3">Payment</label>
                                                    <fieldset class="form-group col-12">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <select name="payment" class="form-control">
                                                                    <option value="COD">Cash On Delivery</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>                                    
                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success m-r-5 buttons">
                                                        <i class="anticon anticon-check-circle buttonsize"></i> Beli 
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                </div>
                            </div>
@endsection
@section('script')
    
<script>
    $(function () {
   $( "#numberBox" ).change(function() {
      var max = parseInt($(this).attr('max'));
      var min = parseInt($(this).attr('min'));
      if ($(this).val() > max)
      {
          $(this).val(max);
      }
      else if ($(this).val() < min)
      {
          $(this).val(min);
      }       
    }); 
});
</script>
@endsection