@extends('admin.layout.master')

{{--@section('page-title', 'Estate Detail')--}}

@section('content')

    <div class="container-fluid">
        <a href="{{ route('subscribes.index') }}" class="btn btn-success mb-2"><i class="far fa-hand-point-left">
            </i> Back</a>


        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 estate-owner">
                <h5 class="mt-2">Subscriber</h5>
                <hr>
                <p><span><i class="far fa-user"></i></span> {{$subscribe->getSubScriber()->name}}</p>
                <p><span><i class="far fa-envelope"></i></span> {{$subscribe->getSubScriber()->email}}</p>
                <p><span><i class="fas fa-home"></i></span> {{$subscribe->getSubScriber()->address}}</p>
                <p><span><i class="fas fa-phone"></i></span> {{$subscribe->getSubScriber()->phone}}</p>

            </div>

            <div class="col-lg-7 col-md-12 col-sm-12 estate-detail">
                <h5 class="mt-2">Estate Detail</h5>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <p><span><i class="fas fa-th-large"></i></span> {{ $subscribe->estate->floor_space }} sqft</p>
                        <p><span><i class="fas fa-dollar-sign"></i></span> {{ $subscribe->estate->price }}</p>
                        <p><span><i class="fas fa-map-pin"></i></span> {{ $subscribe->estate->address }}, {{ $subscribe->estate->city->name }}</p>

                    </div>

                    <div class="col-5">
                        <p><span><i class="fas fa-bed"></i></span> {{ $subscribe->estate->bedroom_nums }} Beds</p>
                        <p><span><i class="fas fa-bath"></i></span> {{  $subscribe->estate->bathroom_nums }} Baths</p>
                        <p><span><i class="fas fa-car"></i></span> {{  $subscribe->estate->garage_nums }} Garage</p>

                    </div>

                </div>

                <div class="row ml-1">
                    <p><span><i class="far fa-edit"></i></span>{{  $subscribe->estate->description }}</p>
                </div>

            {{-- show image by model bootstrap--}}

            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-image"></i> Show Images
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{--                                <img src="" alt="">--}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

    <form class="form-inline mt-3" action="{{ route('subscribes.changeStatus', $subscribe->id) }}" method="post">
        @csrf
        <div class="form-group mx-sm-3 mb-2">
            <select class="form-control" id="exampleFormControlSelect1" name="status">
                <option value="1">WAITING</option>
                <option value="2">IN PROCESSING</option>
                <option value="3">DONE</option>
                <option value="4">SUCCESS</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Change Status</button>

    </form>

@endsection
