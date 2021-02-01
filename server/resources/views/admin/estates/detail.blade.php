@extends('admin.layout.master')

{{--@section('page-title', 'Estate Detail')--}}

@section('content')

    <div class="container-fluid">
        <a href="{{ route('estates.index') }}" class="btn btn-success mb-2"><i--}}
     class="far fa-hand-point-left"></i> Back</a>


        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 estate-owner">
                <h5>CLient</h5>
                <hr>
                <p><span><i class="far fa-user"></i></span> {{$estate->client->name}}</p>
                <p><span><i class="far fa-envelope"></i></span> {{$estate->client->email}}</p>
                <p><span><i class="fas fa-home"></i></span> {{$estate->client->address}}</p>
                <p><span><i class="fas fa-phone"></i></span> {{$estate->client->phone}}</p>

            </div>

            <div class="col-lg-7 col-md-12 col-sm-12 estate-detail">
                <h5>Estate Detail</h5>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <p><span><i class="fas fa-th-large"></i></span> {{ $estate->floor_space }} sqft</p>
                        <p><span><i class="fas fa-dollar-sign"></i></span> {{ $estate->price }}</p>
                        <p><span><i class="fas fa-map-pin"></i></span> {{ $estate->address }}, {{ $estate->city->name }}</p>

                    </div>

                    <div class="col-5">
                        <p><span><i class="fas fa-bed"></i></span> {{ $estate->bedroom_nums }} Beds</p>
                        <p><span><i class="fas fa-bath"></i></span> {{ $estate->bathroom_nums }} Baths</p>
                        <p><span><i class="fas fa-car"></i></span> {{ $estate->garage_nums }} Garage</p>

                    </div>

                </div>

                <div class="row ml-1">
                    <p><span><i class="far fa-edit"></i></span>{{ $estate->description }}</p>
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

    <form class="form-inline mt-3" action="{{ route('estates.changeStatus', $estate->id) }}" method="post">
        @csrf
        <div class="form-group mx-sm-3 mb-2">
            <select class="form-control" id="exampleFormControlSelect1" name="status">
                <option value="2">APPROVED</option>
                <option value="3">CANCEL</option>
                <option value="4">DONE</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Change Status</button>

    </form>

@endsection
