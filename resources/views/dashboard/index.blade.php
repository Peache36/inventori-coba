@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ $title }}</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $data_user->count() }}</h3>
              <p>List User</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-contact "></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $list_barang->count() }}</h3>

              <p>List Barang</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $data_masuk->count() }}</h3>

              <p>Barang Masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $data_keluar->count() }}</h3>

              <p>Barang Keluar</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-minus"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{-- TABEL PEMBANDING --}}
        <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <table id="table" class="table table-bordered table-hover">
                      <thead>
                          <tr class="text-center">
                              <th width="15px">No.</th>
                              <th class="text-center">Nama Barang</th>
                              <th class="text-center">Jumlah Barang Keluar</th>
                              <th class="text-center">Jumlah Barang Opname</th>
                              <th class="text-center">Selisih</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0?>
                        @foreach ($list_barang as $list_barangs )
                        <tr>
                          <?php $a= $total_keluar[$i]->sum ?? 0?>
                          <?php $b= $total_opname[$i]->sum ?? 0?>
                          <?php $c = $b - $a?>
                          <td class="text text-center">{{ $loop->iteration }}</td>
                          <td class="text justify-content-center">{{ $list_barangs->nama_barang }}</td>
                          <td class="text justify-content-center">{{ $total_keluar[$i]->sum ?? 0 }}</td>
                          <td class="text justify-content-center">{{ $total_opname[$i]->sum ?? 0}}</td>
                          @if ($c < 0)
                            <td class="text justify-content-center text-danger">{{ $c }}</td>
                          @else
                            <td class="text justify-content-center text-success">{{ $c }}</td>
                          @endif
                        </tr>
                        <?php $i++?>
                        <?php $c = 0?>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
                  
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

@endsection