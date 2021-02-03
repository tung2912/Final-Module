@extends('admin.layout.master')
@section('page-title','Owners List')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">


                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped data-table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Subscriber</th>
                                    <th>Email address</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($owners as $key => $owner)
                                        <td>{{++$key}}</td>
                                        <td>{{$owner->name}}</td>
                                        <td>{{$owner->email}}</td>
                                        <td>{{$owner->address}}</td>
                                        <td>{{$owner->phone}}</td>

                                        <td>
                                            <div>

                                                <a class="text-info"
                                                   href="{{ route('clients.ownerDetail', $owner->id) }}">
                                                    <i class="nav-icon fas fa-eye"></i>Detail</a>
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
                                    <th>Subscriber</th>
                                    <th>Email address</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
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
