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
                    <form action="{{ route("barang-keluar.store") }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="customer">Customer</label>
                            <input type="text" name="customer" class="form-control rounded-0 @error('customer') is-invalid @enderror" id="customer" placeholder="Masukkan nama customer ..." value="{{ old('customer') }}" required>
                            @error('customer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-6 d-inline-block">
                            <div class="form-group mb-3">
                                <label for="kode_barang">Nama barang</label>
                                <select class="form-control" name="kode_barang" id="kode_barang">
                                    <option selected>Pilih nama barang</option>
                                    @foreach ($data_barang as $data_barang )
                                    <option value={{ $data_barang->id }}>{{ $data_barang->nama_barang }}</option>
                                    @endforeach
                                  </select>
                                @error('kode_barang')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto d-inline-block">
                            <div class="form-group mb-3">
                                <label for="qty">Qty</label>
                                <input type="text" name="qty" class="form-control rounded-0 @error('qty') is-invalid @enderror" id="qty" placeholder="Masukkan qty ..." value="{{ old('qty') }}" required>
                                @error('qty')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_do">No DO</label>
                            <input type="text" name="no_do" class="form-control rounded-0 @error('no_do') is-invalid @enderror" id="no_do" placeholder="Nomor Do ..." value="{{ old('no_do') }}" required>
                            @error('no_do')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="setujui">Disetujui oleh</label>
                            <input type="text" name="setujui" class="form-control rounded-0 @error('setujui') is-invalid @enderror" id="setujui" placeholder="Disetujui oleh ..." value="{{ old('setujui') }}" required>
                            @error('setujui')
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

  

