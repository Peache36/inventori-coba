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
                    <form action="{{ route("user.update", $data_user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="nama_user">Nama user</label>
                            <input type="text" name="nama_user" class="form-control rounded-0 @error('nama_user') is-invalid @enderror" id="nama_user" placeholder="Masukkan nama user..." value="{{ $data_user->name }}" required>
                            @error('nama_user')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control rounded-0 @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email..." value="{{ $data_user->email }}" required>
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="division">Divisi</label>
                            <input type="text" name="division" class="form-control rounded-0 @error('division') is-invalid @enderror" id="division" placeholder="Masukkan nama divisi ..." value="{{ $data_user->division }}" required>
                            @error('division')
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

  

