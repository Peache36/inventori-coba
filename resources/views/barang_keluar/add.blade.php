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
                    <div class="row">
                        <div class="col-3">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <small class="m-0">Name/Code</small>
                                    <p class="mb-2">{{}}/{{ }}</p>
                                    
                                    <small class="m-0">Leader</small>
                                    <p class="mb-2"><a href='#' data-toggle="modal" data-target="#modal-default-{{  }}">{{  }}</a></p>

                                    <small class="m-0">Member</small>
                                    @foreach($team->team_users as $member)
                                        <p class="mb-2"><a href='#' data-toggle="modal" data-target="#modal-default-{{  }}">{{ }}. {{  }}</a></p>
                                    @endforeach
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <small class="m-0">Leader's Institution</small>
                                    <p class="mb-2">{{ }}</p>
                                    
                                    <small class="m-0">Leader's Class/Major</small>
                                    <p class="mb-2">{{  }}</p>
                                </div>
                            </div>
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
  
  <script>
    let i = 1
    $('#add-data_barang').on('click', function(e){
        e.preventDefault()
        ++i
        let row = `
        <tr>
            <td width="90%">
                <div class="col-6 d-inline-block">
                <div class="form-group mb-2">
                    <label for="kode_barang-${i}">Nama barang</label>
                    <select class="form-control" name="kode_barang[]" id="kode_barang-${i}">               
                        <option selected>Pilih nama barang</option>
                        @foreach ($data_barang as $barang )
                            <option value={{ $barang->id }}>{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                    @error('kode_barang[]')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                </div>
                <div class="col-auto d-inline-block">
                <div class="form-group mb-3">
                    <label for="qty-${i}">Qty</label>
                    <input type="text" name="qty[]" class="form-control rounded-0 @error('qty[]') is-invalid @enderror" id="qty-${i}" placeholder="Masukkan qty ..." value="{{ old('qty[]') }}" required>
                    @error('qty[]')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                </div>
                <div class="form-group mb-3">
                    <label for="no_do-${i}">No DO </label>
                    <input type="text" name="no_do[]" class="form-control rounded-0 @error('no_do[]') is-invalid @enderror" id="no_do-${i}" placeholder="Nomor DO ..." value="{{ old('no_do[]') }}" required>
                    @error('no_do[]')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </td>
            <td width="10%" class="text-center mb-0">
                <label for="" class="mb-0"><br>    
                <button type="button" class="btn btn-block btn-danger float-right remove-input-field"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        `
        $('#barang_keluar').append(row)

    })
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
  </script>
  @endsection

  

