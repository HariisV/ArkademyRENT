@extends('default')
@section('Judul') Semua Orderan -  @endsection
@section('style')
<link href="{{Asset('assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

@endsection
@section('konten')

<div class="card">
    <div class="card-body">
      
           
               
        <div class="table-responsive">
            <table class="table table-hover e-commerce-table">
                <thead>
                    <tr>
                        
                        <th>User ID</th>
                        <th>Nama Produk</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($Transaksi as $item)
                   {{-- @dd($item->Product) --}}
                        <tr>
                            
                             <td>
                              {{$item->user_id}} |  {{$item->User->name}}
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid rounded" src="{{Asset('storage/Produk/' . $item->Produk->image)}}"
                                        style="max-width: 60px" alt="">
                                    <h6 class="m-b-0 m-l-10">{{{$item->Produk->nama_produk}}} <strong>x {{$item->jumlah}}</strong></h6>
                                </div>
                            </td>
                           
                            <td>
                                @php
                                     $dateTime = new DateTime($item->created_at); 
                                     $timestamp = $dateTime->format('U'); 

                                    echo gmdate("d M Y",$timestamp);

                                @endphp 
                            </td>
                            <td>Rp {{{number_format($item->total,0,'.','.')}}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if ($item->status == "konfirmasi")
                                        <div class='badge badge-warning badge-dot m-r-10'></div><div> Menunggu <br> Konfirmasi </div>
                                    @elseif($item->status == "proses")
                                        <div class='badge badge-primary badge-dot m-r-10'></div><div> Proses </div>
                                     @elseif($item->status == "batal")
                                        <div class='badge badge-danger badge-dot m-r-10'></div><div> Batal </div>    
                                    @elseif($item->status == "selesai")
                                        <div class='badge badge-success badge-dot m-r-10'></div><div> Selesai </div>
                                    @endif
                                </div>
                            </td>
                            <td class="text-right">
                                  <a href="{{Route('showProduk', $item->produk_id)}}">
                                        <button class="btn btn-icon btn-success" type="submit">
                                            <i class="anticon anticon-search"></i>
                                        </button>
                                  </a>
                                  <a href="{{Route('gantiStatus', $item->id)}}">
                                    <button class="btn btn-icon btn-primary" type="submit">
                                        <i class="anticon anticon-interation"></i>
                                    </button>
                                  </a>
                                 <a href="{{Route('hapusTransaksi', $item->id)}}">
                                    <button class="btn btn-icon btn-danger" type="submit">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </a>
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
