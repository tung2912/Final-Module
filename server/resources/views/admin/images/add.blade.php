@extends('admin.layout.master')
@section('page-title','Add Image')
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
                                <label for="inputRole">Estate</label>
                                <select name="estate_id" class="form-control custom-select">
                                    @foreach($estates as $key => $estate)
                                        <option
                                            value="{{$estate->id}}">{{$estate->address}}</option>
                                    @endforeach
                                </select>
                                @error('estate_id')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputImage">Image</label>
                                <input type="file" accept=".png, .jpg, .jpeg" name="image" id="inputImage"
                                       class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add" class="btn btn-success">
                                <a href="{{route('images.index')}}" class="btn btn-secondary">Back</a>
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
