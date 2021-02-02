@extends('admin.layout.master')
@section('page-title','Add Blog')
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
                                <label for="inputName">Title</label>
                                <input type="text" name="title" id="inputTitle" placeholder="Input title"
                                       class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingTextarea">Content</label>
                                <textarea  class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Input Content"
                                           id="ckeditor1"></textarea>

                                @error('description')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputImage">Image1</label>
                                <input type="file" accept=".png, .jpg, .jpeg" name="image1" id="inputImage1"
                                       class="form-control @error('image1') is-invalid @enderror">
                                @error('image1')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputImage">Image2</label>
                                <input type="file" accept=".png, .jpg, .jpeg" name="image2" id="inputImage2"
                                       class="form-control @error('image2') is-invalid @enderror">
                                @error('image1')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add" class="btn btn-success">
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
@section('js')
    <script>
        CKEDITOR.replace('ckeditor1')
    </script>
@endsection
