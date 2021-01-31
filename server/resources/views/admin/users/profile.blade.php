@extends('admin.layout.master')
@section('title','User Profile')
@section('content')
    <section class="content align-items-center">
        <div class="container-fluid">
            <a href="{{route('users.staffEdit',$user->id)}}" class="btn btn-primary mb-3" style="margin-left: 25%; color: white">Edit Profile</a>
            <div class="row align-items-center">
                <div class="col-md-6" style="margin-left: 25%">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img style="width: 50%" class="profile-user-img img-fluid img-circle"
                                                                          src="{{\Illuminate\Support\Facades\Auth::user()->getNameImage()}}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            {{--                            <p class="text-muted text-center">Lớp ...</p>--}}

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Vai trò</b> <a class="float-right">{{$user->role->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{$user->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Điện thoại</b> <a class="float-right">{{$user->phone?$user->phone:""}}</a>
                                </li>
                            </ul>

                            {{--                            <a href="" class="btn btn-primary btn-block"><b>Theo dõi</b></a>--}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>

                <!-- /.col -->
                <div class="col-md-8">
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
