@extends('default')
@section('Judul') Daftar User - @endsection
@section('style')
<link href="{{Asset('assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

@endsection
@section('konten')
@if (Auth()->user()->level != "admin")
    @php
            header('Location: /');
            exit;
    @endphp
@endif
<div class="card">
    <div class="card-body">

                        @if (Auth()->user()->level == "admin")
                              <a href="javascript:void(0);" class="btn btn-success mb-3" data-toggle="modal" data-target="#search-drawer">
                                <i class="anticon anticon-plus-circle"></i>
                                <span>Tambah</span>
                            </a>
                        @endif
       
        <div class="table-responsive">
            <table class="table table-hover e-commerce-table">
                <thead>
                    <tr>

                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                  @foreach ($user as $item)
                        <tr>
                        <td>
                            {{{$loop->iteration}}}
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                
                                <h6 class="m-b-0 m-l-10">{{{$item->name}}}</h6>
                            </div>
                        </td>
                         <td>
                            <div class="d-flex align-items-center">
                                
                                <h6 class="m-b-0 m-l-10">{{{$item->email}}}</h6>
                            </div>
                        </td>
                         <td>
                            <div class="d-flex align-items-center">
                                
                                <h6 class="m-b-0 m-l-10">{{{$item->level}}}</h6>
                            </div>
                        </td>
                       
                        <td class="text-right">
                            
                            <form action="{{Route('deleteUser', $item->id)}}" method="POST">
                                @csrf
                                <button class="btn btn-icon btn-danger" type="submit">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@if (Auth()->user()->level == "admin")
<div class="modal modal-right fade search" id="search-drawer">
    <div class="modal-dialog">

        <div class="modal-content">
            <form action="{{Route('userCreate')}}" method="POST">
                @csrf

                <div class="modal-header justify-content-between align-items-center">
                    <h5 class="modal-title">Tambah User Baru</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body scrollable">


                    <label class="mt-3">Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" id="nama" required placeholder="Nama Pengguna">

                    <label class="mt-3">Email</label>
                    <input type="text" class="form-control" name="email" id="email" required
                        placeholder="Email Pengguna">



                    <label class="mt-3">Password</label>
                    <input type="password" class="form-control" name="password" id="nama" required
                        placeholder="*******">
                    <label class=" mt-3">Level</label>
                    <fieldset class="form-group col-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <select name="level" class="form-control">
                                    <option value="user">Pengguna</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success m-r-5 buttons">
                        <i class="anticon anticon-check-circle buttonsize"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>    
@endif
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
