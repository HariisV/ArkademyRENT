@extends('default')
@section('Judul') Cari Produk -  @endsection
@section('style')
<link href="{{Asset('assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

@endsection
@section('konten')

<div class="card">
    <div class="card-body">
      
           
                @if (Auth()->user()->level == "admin")
                    <a href="{{Route('tambahProduk')}}" class="btn btn-success mb-3">
                        <i class="anticon anticon-plus-circle m-r-5"></i>
                        <span>Add Product</span>
                    </a>
                @endif
        <div class="table-responsive">
            <table class="table table-hover e-commerce-table">
                <thead>
                    <tr>
                        
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                            <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($produk as $item)
                        <tr>
                            <td>
                                {{{$loop->iteration}}}
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid rounded" src="{{Asset('storage/Produk/' . $item->image)}}"
                                        style="max-width: 60px" alt="">
                                    <h6 class="m-b-0 m-l-10">{{{$item->nama_produk}}}</h6>
                                </div>
                            </td>
                            <td>Rp {{{number_format($item->harga,0,'.','.')}}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if ($item->jumlah > 0)
                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                    <div> {{$item->jumlah}} Qty </div>
                                    @else
                                     <div class="badge badge-danger badge-dot m-r-10"></div>
                                    <div>Habis</div>
                                    @endif
                                </div>
                            </td>
                            <td class="text-right">
                                  <a href="{{Route('showProduk', $item->id)}}">
                                        <button class="btn btn-icon btn-success" type="submit">
                                            <i class="anticon anticon-search"></i>
                                        </button>
                                  </a>
                                @if (Auth()->user()->level == "admin")
                                    <a href="{{Route('editProduk', $item->id)}}">
                                            <button class="btn btn-icon btn-primary" type="submit">
                                                <i class="anticon anticon-edit"></i>
                                            </button>
                                    </a>
                                     <a href="{{Route('hapusProduk', $item->id)}}">
                                            <button class="btn btn-icon btn-danger" type="submit">
                                                <i class="anticon anticon-delete"></i>
                                            </button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{Asset('assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{Asset('assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{Asset('assets/js/pages/e-commerce-order-list.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

</script>
@endsection
