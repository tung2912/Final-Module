@extends('admin.layout.master')

{{--@section('page-title', 'Owner Detail')--}}

@section('content')
    <div class="container-fluid">
        <a href="{{ route('clients.owners') }}" class="btn btn-success mb-2"><i
            class="far fa-hand-point-left"></i> Back</a>

        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 estate-owner">
                <h5 class="mt-2">Subscribed Estates 's </h5>
                <hr>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped data-table">

                                            <tr>
                                                <th>No.</th>
                                                <th>Subscribed</th>
                                                <th>Time</th>

                                            </tr>

                                            <tbody>
                                            <tr>
                                           @forelse($subscribedByOwners as $key => $subscribedByOwner)
                                                    <td>{{ ++ $key }}</td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" value="{{ $subscribedByOwner->id }}" class="btn btn-primary detail1" data-toggle="modal" data-target="#exampleModalCenter">
                                                            <i class="fas fa-home"></i> Detail
                                                        </button>

                                                        <div style="display: none" class="descriptionHTML1{{$subscribedByOwner->id}}">
                                                            <div class="row">
                                                                <div class="col-6 p-3">
                                                                    <p><span><i class="fas fa-th-large"></i></span> {{ $subscribedByOwner->estate->floor_space }} sqft</p>
                                                                    <p><span><i class="fas fa-dollar-sign"></i></span> {{ $subscribedByOwner->estate->price }}</p>
                                                                    <p><span><i class="fas fa-map-pin"></i></span> {{$subscribedByOwner->estate->address }}, {{ $subscribedByOwner->estate->city->name }}</p>

                                                                </div>

                                                                <div class="col-6 p-3">
                                                                    <p><span><i class="fas fa-bed"></i></span> {{$subscribedByOwner->estate->bedroom_nums }} Beds</p>
                                                                    <p><span><i class="fas fa-bath"></i></span> {{ $subscribedByOwner->estate->bathroom_nums }} Baths</p>
                                                                    <p><span><i class="fas fa-car"></i></span> {{$subscribedByOwner->estate->garage_nums }} Garage</p>

                                                                </div>
                                                            </div>

                                                            <div class="row p-3">
                                                                <span class="badge badge-dark" style="padding: 4px; letter-spacing: 2px">STATUS: {{ $subscribedByOwner->getStatus()}}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $subscribedByOwner->created_at }}</td>


                                            </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">Data: 0</td>
                                                </tr>
                                            @endforelse
                                            </tbody>

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

            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 estate-detail">
                <h5 class="mt-2">Owner's Estates</h5>
                <hr>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped data-table">

                                            <tr>
                                                <th>No.</th>
                                                <th>Estates</th>
                                                <th>Time</th>

                                            </tr>

                                            <tbody>
                                            <tr>
                                                @forelse($estatesOfOwners as $key => $estatesOfOwner)
                                                    <td>{{ ++ $key }}</td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" value="{{ $estatesOfOwner->id }}" class="btn btn-primary detail2" data-toggle="modal" data-target="#exampleModalCenter">
                                                            <i class="fas fa-home"></i> Detail
                                                        </button>

                                                        <div style="display: none" class="descriptionHTML2{{$estatesOfOwner->id}}">
                                                            <div class="row">
                                                                <div class="col-5 p-3" >
                                                                    <p><span><i class="fas fa-th-large"></i></span> {{ $estatesOfOwner->floor_space }} sqft</p>
                                                                    <p><span><i class="fas fa-dollar-sign"></i></span> {{ $estatesOfOwner->price }}</p>
                                                                    <p><span><i class="fas fa-map-pin"></i></span> {{$estatesOfOwner->address }}, {{ $estatesOfOwner->city->name }}</p>

                                                                </div>

                                                                <div class="col-5 p-3">
                                                                    <p><span><i class="fas fa-bed"></i></span> {{$estatesOfOwner->bedroom_nums }} Beds</p>
                                                                    <p><span><i class="fas fa-bath"></i></span> {{ $estatesOfOwner->bathroom_nums }} Baths</p>
                                                                    <p><span><i class="fas fa-car"></i></span> {{$estatesOfOwner->garage_nums }} Garage</p>

                                                                </div>
                                                            </div>

                                                            <div class="row p-3">
                                                                <span class="badge badge-dark" style="padding: 4px; letter-spacing: 2px">STATUS: {{ $estatesOfOwner->getStatus()}}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $estatesOfOwner->created_at }}</td>


                                            </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">Data: 0</td>
                                                </tr>
                                            @endforelse
                                            </tbody>

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



            </div>
        </div>


    </div>
@endsection

<!-- Modal of subscribed Estates -->
<div class="modal fade"  id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-home"></i> Detail</h5>
                <button type="button" style="outline: none; border: none; color: black;font-weight: bolder" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body1">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal owner 's estates-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-home"></i> Detail</h5>
                <button type="button" style="outline: none; border: none; color: black;font-weight: bolder" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body2">
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
        $('body').on('click','.detail1',function (){
            let id = $(this).val();
            let html = $('.descriptionHTML1'+id).html();
            $('.modal-body1').html(html)
            $('#exampleModal1').modal('show')
        })

        </script>

    <script>
        $('body').on('click','.detail2',function (){
            let id = $(this).val();
            let html = $('.descriptionHTML2'+id).html();
            $('.modal-body2').html(html)
            $('#exampleModal2').modal('show')
        })
    </script>

@endsection
