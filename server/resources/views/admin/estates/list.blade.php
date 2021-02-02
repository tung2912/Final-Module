@extends('admin.layout.master')
@section('page-title','Estate List')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-6"></div>
{{--                                <div class="col-12 col-md-6" style="text-align: right">--}}
{{--                                    <a href="#" class="btn btn-success">+ Add Estate</a>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped data-table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>City</th>
                                    <th>Price</th>
                                    <th>Owner Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($estates as $key => $estate)
                                        <td>{{++$key}}</td>
                                        <td>{{$estate->city->name}}</td>
                                        <td>$ {{$estate->price}}</td>
                                        <td>{{$estate->owner->name}}</td>
                                        <td>

                                        <span  class="badge {{$estate->getBadge()}}" style="padding: 7px; letter-spacing: 1.5px">{{$estate->getStatus()}}</span>

                                        </td>
                                        <td>
                                            <div>
                                                <a data-placement="top"
                                                   href="{{ route('estates.detail', $estate->id) }}" class="mr-3">
                                                    <i class="nav-icon fas fa-edit"></i>Detail
                                                </a>

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
                                    <th>City</th>
                                    <th>Price</th>
                                    <th>Owner Name</th>
                                    <th>Status</th>
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
        <!-- /.container-fluid -->
    </section>
@endsection
