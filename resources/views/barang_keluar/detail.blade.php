@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h1 class="m-0">{{ $title }}</h1>
        </div><!-- /.col -->
        
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    @include('layouts.message')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                        <div class="col-6 d-inline-block">
                          <small class="m-0">Nomor DO </small>
                          <p class="mb-2">{{ $data_barang->no_do }}</p>  
                          <small class="m-0">Name Barang </small>
                          <p class="mb-2">{{ $data_barang->barangs->nama_barang }}</p>  
                          <small class="m-0">Jumlah Barang </small>
                          <p class="mb-2">{{ $data_barang->qty }}</p>  
                          <small class="m-0">Disetujui oleh </small>
                          <p class="mb-2">{{ $data_barang->disetujui_oleh }}</p>  
                          <small class="m-0">Dibuat Tanggal </small>
                          <p class="mb-2">{{ $data_barang->created_at ? \Carbon\Carbon::parse($data_barang->created_at)->format('D, d M Y H:i:s') : '-'}}</p>  
                          <small class="m-0">Diupdate tanggal </small>
                          <p class="mb-2">{{ $data_barang->updated_at ? \Carbon\Carbon::parse($data_barang->updated_at)->format('D, d M Y H:i:s') : '-' }}</p>  
                        </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  @endsection

  @section('js')
  <script>
      $('#table').DataTable();
  </script>
  @endsection

  

