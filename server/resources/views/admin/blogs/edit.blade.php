@extends('admin.layout.master')
@section('page-title','Edit Blogs')
@section('content')

    <!-- Main content -->
    <section class="content">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informations</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Blog Title</label>
                                <input required value="{{$blog->title}}" type="text" name="title" id="inputTitle"
                                       placeholder="Input Title" class="form-control">
                                @error('title')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-6"><label for="inputImage">Image1</label>
                                    <input value="{{$blog->image1}}" type="file" accept=".png, .jpg, .jpeg"
                                           name="image1" id="inputImage1"
                                           class="form-control @error('image1') is-invalid @enderror">
                                    <img style="width: 100px;margin-top: 10px;margin-left: 30%" src="{{$blog->getNameImage1()}}" alt="">
                                    @error('image1')
                                    <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="inputImage">Image2</label>
                                    <input value="{{$blog->image2}}" type="file" accept=".png, .jpg, .jpeg" name="image2"
                                           id="inputImage2"
                                           class="form-control @error('image2') is-invalid @enderror">
                                    <img style="width: 100px;margin-top: 10px;margin-left: 30%" src="{{$blog->getNameImage2()}}" alt="">
                                    @error('image2')
                                    <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating">
                                <label for="floatingTextarea">Content</label>
                                <textarea class="form-control" name="content" placeholder="Input content"
                                          id="ckeditor1">{!!$blog->content!!}</textarea>

                                @error('content')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text-center mt-5">
                                <input type="submit" value="Update" class="btn btn-success">
                                <a href="{{route('blogs.index')}}" class="btn btn-secondary">Back</a>
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
@section('js')
    <script>
        CKEDITOR.replace('ckeditor1')
    </script>
@endsection
