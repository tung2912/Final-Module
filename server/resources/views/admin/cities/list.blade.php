@extends('admin.layout.master')

@section('page-title', 'Cities List')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-6"></div>
                                <div class="col-12 col-md-6" style="text-align: right">
                                    <a href="{{ route('cities.create') }}" class="btn btn-success">+ Add City</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped data-table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>City name</th>
                                    <th>Employee</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($cities as $key => $city)
                                        <td>{{++$key}}</td>
                                        <td>{{$city->name}}</td>
                                        <td>{{ $city->user->name }}</td>
                                        <td>
                                            <div>
                                                <a data-placement="top"
                                                   href="{{route('cities.edit',$city->id)}}" class="mr-3">
                                                    <i class="nav-icon fas fa-edit"></i>Edit
                                                </a>
                                                <a class="text-danger"
                                                   onclick="return confirm('Are you sure you want to delete')"
                                                   href="{{ route('cities.delete', $city->id) }}">
                                                    <i class="nav-icon far fa-trash-alt"></i>Delete</a>
                                            </div>
                                        </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Không có dữ liệu</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>City name</th>
                                    <th>Employee</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>


@endsection
