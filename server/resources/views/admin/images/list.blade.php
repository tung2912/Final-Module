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
                            <div class="col-12 col-md-6" style="text-align: right">
                                <a href="{{route('images.create')}}" class="btn btn-success">+ Add Image</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped data-table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Estate Information</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($images as $key => $image)
                                        <td>{{++$key}}</td>
                                        <td>
                                            <button value="{{$image->estate->id}}" class="btn btn-success details">Show Information</button>
                                            <div style="display: none" class="detailHTML{{$image->estate->id}}">
                                                <h3>Owner: {{$image->estate->owner->name}}</h3>
                                                <p><span class="es-icon"><i class="fas fa-map-pin"></i></span> {{$image->estate->address}}, {{$image->estate->city->name}}</p>
                                                <p><span class="es-icon"><i class="fas fa-dollar-sign"></i></span>{{$image->estate->price}}</p>
                                                <p><span class="es-icon"><i class="fas fa-th-large"></i></span> {{$image->estate->floor_space}} sqft</p>
                                                <p><span class="es-icon"><i class="fas fa-bed"></i></span>{{$image->estate->bedroom_nums}} Beds</p>
                                                <p><span class="es-icon"><i class="fas fa-bath"></i></span>{{$image->estate->bathroom_nums}} Baths</p>
                                                <p><span class="es-icon"><i class="fas fa-car"></i></span>{{$image->estate->garage_nums}} Garage</p>

                                                <h2>Description</h2>
                                                <div class="mt-1 border-top-1">
                                                    {!!$image->estate->description!!}
                                                </div>
                                            </div>
                                        </td>
                                        <td><img width="100px" src="{{$image->getNameImage()}}" alt=""></td>
{{--                                        <td>--}}

{{--                                            <span  class="badge {{$subscribe->getBadge()}}" style="padding: 7px; letter-spacing: 1.5px">{{$subscribe->getStatus()}}</span>--}}

{{--                                        </td>--}}
                                        <td>
                                            <div>
                                                <a data-placement="top"
                                                   href="#" class="mr-3">
                                                    <i class="nav-icon fas fa-eye"></i>
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
                                    <th>Estate Information</th>
                                    <th>Image</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Estate information</h5>
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
