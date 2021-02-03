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
                    <div class="col-7">
                        <p><span><i class="fas fa-th-large"></i></span> {{ $subscribe->estate->floor_space }} sqft</p>
                        <p><span><i class="fas fa-dollar-sign"></i></span> {{ $subscribe->estate->price }}</p>
                        <p><span><i class="fas fa-map-pin"></i></span> {{ $subscribe->estate->address }}, {{ $subscribe->estate->city->name }}</p>

                    </div>

                    <div class="col-3">
                        <p><span><i class="fas fa-bed"></i></span> {{ $subscribe->estate->bedroom_nums }} Beds</p>
                        <p><span><i class="fas fa-bath"></i></span> {{  $subscribe->estate->bathroom_nums }} Baths</p>
                        <p><span><i class="fas fa-car"></i></span> {{  $subscribe->estate->garage_nums }} Garage</p>

                    </div>

                </div>

                <div class="row ml-1">
                    <p><span><i class="far fa-edit"></i></span>{{  $subscribe->estate->description }}</p>
                </div>
                <div style="font-size: 1.1rem; letter-spacing: 1px" class="mt-1 badge {{$subscribe->estate->getBadge()}}">
                    {{$subscribe->estate->getStatus()}}
                </div>

            {{-- show image by model bootstrap--}}

            <!-- Button trigger modal -->
                <div class="mt-2">
                    <button value="{{$subscribe->estate->id}}" type="button" class="btn btn-primary mb-2 details" >
                        <i class="fas fa-image"></i> Show Images
                    </button>
                    <div style="display: none" class="detailHTML{{$subscribe->estate->id}}">
                        <div class="row">
                            @forelse($subscribe->estate->images as $image)
                                <div class="col">
                                    <img style="width: 100px" src="{{$image->getNameImage()}}" alt="">
                                </div>
                            @empty
                                <tr>
                                    <td colspan="3">No data</td>
                                </tr>
                            @endforelse
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Images List</h5>
                <button style="font-weight: bold; border: none" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
