@extends('admin.layout.master')
@section('page-title','Subscribes List')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-6"></div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped data-table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Subscriber</th>
                                    <th>Estate Address</th>
                                    <th>User manage</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($subscribes as $key => $subscribe)
                                        <td>{{++$key}}</td>
                                        <td>{{$subscribe->getSubScriber()}}</td>
                                        <td>
                                            <button value="{{$subscribe->estate->id}}" class="btn btn-success details">Show Information</button>
                                            <div style="display: none" class="detailHTML{{$subscribe->estate->id}}">
                                                <h3>Owner: {{$subscribe->estate->owner->name}}</h3>
                                                <h3>City: {{$subscribe->estate->city->name}}</h3>
                                                <h3>Address: {{$subscribe->estate->address}}</h3>
                                                <h3>Price: {{$subscribe->estate->price}}</h3>
                                                <h3>Floor space: {{$subscribe->estate->floor_space}}</h3>
                                                <h3>Bed rooms: {{$subscribe->estate->bedroom_nums}}</h3>
                                                <h3>Bath rooms: {{$subscribe->estate->bathroom_nums}}</h3>
                                                <h3>Garage: {{$subscribe->estate->garage_nums}}</h3>

                                                <h2>Description</h2>
                                                <div class="mt-1 border-top-1">
                                                    {!!$subscribe->estate->description!!}
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$subscribe->estate->city->user->name}}</td>
                                        <td>

                                            <span  class="badge {{$subscribe->getBadge()}}" style="padding: 7px; letter-spacing: 1.5px">{{$subscribe->getStatus()}}</span>

                                        </td>
                                        <td>
                                            <div>
                                                <a data-placement="top"
                                                   href="#" class="mr-3">
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
                                    <th>Client name</th>
                                    <th>Estate Address</th>
                                    <th>User manage</th>
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script>
        $('body').on('click','.details',function (){
            let id = $(this).val();
            let html = $('.detailHTML'+id).html();
            $('.modal-body').html(html)
            $('#staticBackdrop').modal('show')
        })
    </script>
@endsection
