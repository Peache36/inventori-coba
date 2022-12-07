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
                    <form action="{{ route('barang.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="kode_barang">Kode barang</label>
                            <input type="text" name="kode_barang" class="form-control rounded-0 @error('kode_barang') is-invalid @enderror" id="kode_barang" placeholder="Masukkan nama barang..." value="{{ old('kode_barang') }}" required>
                            @error('kode_barang')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_barang">Nama barang</label>
                            <input type="text" name="nama_barang" class="form-control rounded-0 @error('nama_barang') is-invalid @enderror" id="nama_barang" placeholder="Masukkan nama barang..." value="{{ old('nama_barang') }}" required>
                            @error('nama_barang')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="satuan">Satuan</label>
                            <input type="text" name="satuan" class="form-control rounded-0 @error('satuan') is-invalid @enderror" id="satuan" placeholder="Masukkan nama barang..." value="{{ old('satuan') }}" required>
                            @error('satuan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <button class="btn btn-primary float-right mt-2"><i class="fas fa-save mr-2"></i> Save</button>
                            </div>
                        </div>
                    </form>
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

  

