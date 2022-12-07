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
                    <form action="{{ route("barang-masuk.store") }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="vendor">Vendor</label>
                            <input type="text" name="vendor" class="form-control rounded-0 @error('vendor') is-invalid @enderror" id="vendor" placeholder="Masukkan nama vendor ..." value="{{ old('vendor') }}" required>
                            @error('vendor')
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
                                <label for="jumlah">Qty</label>
                                <input type="text" name="jumlah" class="form-control rounded-0 @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Masukkan jumlah ..." value="{{ old('jumlah') }}" required>
                                @error('jumlah')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
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

  

