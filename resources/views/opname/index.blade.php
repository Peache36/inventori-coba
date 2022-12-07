@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ $title }}</h1>
        </div><!-- /.col -->
        <div class="col-3 align-self-center">
            <a href="{{ route("opname.create") }}" class="btn btn-secondary float-right"><i class="fa fa-plus mr-2"></i> Tambah List </a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        @include("layouts.message")
        <div class="row">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th width="15px">No.</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Catatan</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_barang as $data_barang )
                                    <tr>
                                        <td class="text text-center">{{ $loop->iteration }}</td>
                                        <td class="text justify-content-center">{{ $data_barang->created_at ? \Carbon\Carbon::parse($data_barang->created_at)->format('D, d M Y H:i:s') : '-' }}</td>
                                        <td class="text justify-content-center">{{ $data_barang->barangs->nama_barang }}</td>
                                        <td class="text justify-content-center">{{ $data_barang->stock }}</td>
                                        <td class="text justify-content-center">{{ $data_barang->catatan }}</td>
                                        <td class="text-center">
                                            <div class="btn btn-toolbar justify-content-center">
                                                <form action="{{ route('opname.destroy', $data_barang->id) }}" method="post" onsubmit=" return confirm('Are you sure want to delete this item?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm mr-2 btn-danger"><i class=" fa fa-trash" ></i> Delete</button>
                                                </form>
                                                <a href="{{ route('opname.edit', $data_barang->id) }}" method=post class="btn btn-sm mr-2 btn-warning text-white"><i class="fa fa-edit mr-2"></i>Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>      
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  @endsection

  @section('js')
  <script>
    $(function () {
      $("#table").DataTable({}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
  @endsection

  

