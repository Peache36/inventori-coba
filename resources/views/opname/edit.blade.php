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
                    <form action="{{ route("opname.update", $data_barang->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-6 d-inline-block">
                            <div class="form-group mb-3">
                                <label for="barang_id">Nama barang</label>
                                <select class="form-control" name="barang_id" id="barang_id">
                                    <option selected>Pilih nama barang</option>
                                    @foreach ($data_masuk as $data_masuk )
                                            <option value={{ $data_masuk->id }} >{{ $data_masuk->nama_barang }}</option>
                                    @endforeach
                                  </select>
                                @error('barang_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto d-inline-block">
                            <div class="form-group mb-3">
                                <label for="stock">Stock</label>
                                <input type="text" name="stock" class="form-control rounded-0 @error('stock') is-invalid @enderror" id="stock" placeholder="Masukkan stock ..." value="{{ $data_barang->stock }}" required>
                                @error('stock')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="catatan">Catatan </label>
                            <input type="text" name="catatan" class="form-control rounded-0 @error('catatan') is-invalid @enderror" id="catatan" placeholder="Dicatatan oleh ..." value="{{ $data_barang->catatan }}" required>
                            @error('catatan')
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

  

