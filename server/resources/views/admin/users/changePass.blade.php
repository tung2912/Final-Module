@extends('admin.layout.master')
@section('page-title','Change Password')
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-8 ">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Information</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Old Password</label>
                                <input type="password" name="current_password" id="current_password" placeholder="Input Old password"
                                       class="form-control @error('current_password') is-invalid @enderror">
                                @error('current_password')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="newPass">New Password</label>
                                <input type="password" name="password" id="password" placeholder="Input new password"
                                       class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="passwordConfirm">Confirm Password</label>
                                <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirm password"
                                       class="form-control @error('passwordConfirm') is-invalid @enderror">
                                @error('passwordConfirm')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-success">
                                <a href="{{route('users.profile',\Illuminate\Support\Facades\Auth::user()->id)}}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </section>
@endsection
