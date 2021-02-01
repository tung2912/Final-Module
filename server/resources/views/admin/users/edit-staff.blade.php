@extends('admin.layout.master')
@section('page-title','Edit Staff Profile')
@section('content')

    <!-- Main content -->
    <section class="content">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informations</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">User Name</label>
                                <input required value="{{$user->name}}" type="text" name="name" id="inputName" placeholder="Input User name" class="form-control">
                                @error('name')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputImage">Image</label>
                                <input type="file" accept=".png, .jpg, .jpeg" name="image" id="inputImage"
                                       class="form-control @error('image') is-invalid @enderror">
                                <img style="width: 100px" src="{{$user->getNameImage()}}" alt="">
                                @error('image')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-success">
                                <a href="#" class="btn btn-secondary">Back</a>
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
