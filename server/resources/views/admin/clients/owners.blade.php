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
{{--                                        <td>--}}
{{--                                            <!-- Button trigger modal -->--}}
{{--                                            <button type="button" value="{{ $client->id }}" class="btn btn-primary detail" data-toggle="modal" data-target="#exampleModalCenter">--}}
{{--                                                <i class="fas fa-home"></i> Detail--}}
{{--                                            </button>--}}

{{--                                            <div style="display: none" class="descriptionHTML{{$client->id}}">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-5">--}}
{{--                                                        <p><span><i class="fas fa-th-large"></i></span> {{ $client->subscribe->estate->floor_space }} sqft</p>--}}
{{--                                                        <p><span><i class="fas fa-dollar-sign"></i></span> {{ $client->subscribe->estate->price }}</p>--}}
{{--                                                        <p><span><i class="fas fa-map-pin"></i></span> {{$client->subscribe->estate->address }}, {{ $client->subscribe->estate->city->name }}</p>--}}

{{--                                                    </div>--}}

{{--                                                    <div class="col-5">--}}
{{--                                                        <p><span><i class="fas fa-bed"></i></span> {{$client->subscribe->estate->bedroom_nums }} Beds</p>--}}
{{--                                                        <p><span><i class="fas fa-bath"></i></span> {{ $client->subscribe->estate->bathroom_nums }} Baths</p>--}}
{{--                                                        <p><span><i class="fas fa-car"></i></span> {{$client->subscribe->estate->garage_nums }} Garage</p>--}}

{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}


{{--                                        </td>--}}
                                        <td>
                                            <div>

                                                <a class="text-danger"
                                                   onclick="return confirm('Are you sure you want to delete')"
                                                   href="">
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
{{--<!-- Modal -->--}}
{{--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-home"></i> Detail</h5>--}}
{{--                <button type="button" style="outline: none; border: none; color: black;font-weight: bolder" data-bs-dismiss="modal" aria-label="Close">X</button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                ...--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--@section('js')--}}
{{--    <script>--}}
{{--        $('body').on('click','.detail',function (){--}}
{{--            let id = $(this).val();--}}
{{--            let html = $('.descriptionHTML'+id).html();--}}
{{--            $('.modal-body').html(html)--}}
{{--            $('#exampleModal').modal('show')--}}
{{--        })--}}
{{--    </script>--}}

{{--@endsection--}}
