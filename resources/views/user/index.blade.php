@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h1 class="m-0">{{ $title }}</h1>
        </div><!-- /.col -->
        <div class="col-3 align-self-center">
            <a href="{{ route("user.create") }}" class="btn btn-secondary float-right"><i class="fa fa-plus mr-2"></i> Tambah User </a>
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
                                    <th>Nama user</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data_user as $data_user )
                                @if ($data_user->id == 1)
                                    @continue
                                @endif
                                    <tr>
                                        <td class="text text-center">{{ $loop->iteration - 1}}</td>
                                        <td class="text justify-content-center">{{ $data_user->name }}</td>
                                        <td class="text justify-content-center">{{ $data_user->email }}</td>
                                        <td class="text-center">
                                            @if ($data_user->id == 2)
                                            <div class="btn btn-toolbar justify-content-center">
                                                <form action="{{ route('user.destroy', $data_user->id) }}" method="post" onsubmit=" return confirm('Are you sure want to delete this item?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm mr-2 btn-danger" disabled><i class=" fa fa-trash" ></i> Delete</button>
                                                </form>
                                                <a  href="#" method=post class="btn btn-sm mr-2 btn-warning text-white"><i class="fa fa-edit mr-2"></i>Edit</a>
                                            </div>
                                            @else   
                                            <div class="btn btn-toolbar justify-content-center">
                                                <form action="{{ route('user.destroy', $data_user->id) }}" method="post" onsubmit=" return confirm('Are you sure want to delete this item?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm mr-2 btn-danger"><i class=" fa fa-trash" ></i> Delete</button>
                                                </form>
                                                <a href="{{ route('user.edit', $data_user->id) }}" method=post class="btn btn-sm mr-2 btn-warning text-white"><i class="fa fa-edit mr-2"></i>Edit</a>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty

                                @endforelse 
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
      $("#table").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
  @endsection

  

