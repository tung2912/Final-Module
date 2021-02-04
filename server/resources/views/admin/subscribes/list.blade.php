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
                                    <th>Estate Information</th>
                                    <th>User manage</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($subscribes as $key => $subscribe)
                                        <td>{{++$key}}</td>
                                        <td>{{$subscribe->getSubScriber()->name}}</td>
                                        <td>
                                            <button style="background-color: #529DDD;color: white" value="{{$subscribe->estate->id}}" class="btn details">Show Info <i class="nav-icon fas fa-eye"></i></button>
                                            <div style="display: none" class="detailHTML{{$subscribe->estate->id}}">
                                                <h5>Owner: {{$subscribe->estate->owner->name}}</h5>
                                                <p><span class="es-icon"><i class="fas fa-map-pin"></i></span> {{$subscribe->estate->address}}, {{$subscribe->estate->city->name}}</p>
                                                <p><span class="es-icon"><i class="fas fa-dollar-sign"></i></span>{{$subscribe->estate->price}}</p>
                                                <p><span class="es-icon"><i class="fas fa-th-large"></i></span> {{$subscribe->estate->floor_space}} sqft</p>
                                                <p><span class="es-icon"><i class="fas fa-bed"></i></span>{{$subscribe->estate->bedroom_nums}} Beds</p>
                                                <p><span class="es-icon"><i class="fas fa-bath"></i></span>{{$subscribe->estate->bathroom_nums}} Baths</p>
                                                <p><span class="es-icon"><i class="fas fa-car"></i></span>{{$subscribe->estate->garage_nums}} Garage</p>

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
                                                   href="{{route('subscribes.detail', $subscribe->id)}}" class="mr-3">
                                                    <i style="font-size: 1.2rem" class="nav-icon fas fa-eye">Details</i>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div style="letter-spacing: 5px; font-size: 1rem" class="mt-1 badge {{$subscribe->estate->getBadge()}}">
                    {{$subscribe->estate->getStatus()}}
                </div>
                <button type="button" style="border: none; font-weight: bold" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
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
            $('#exampleModal').modal('show')
        })
    </script>
@endsection
