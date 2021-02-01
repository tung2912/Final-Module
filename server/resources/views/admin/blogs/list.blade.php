@extends('admin.layout.master')
@section('page-title','Blogs List')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-6"></div>
                                <div class="col-12 col-md-6" style="text-align: right">
                                    <a href="{{route('blogs.create')}}" class="btn btn-success">+ Add Blog</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped data-table">
                                <thead>
                                <tr>
                                    <th>Numeric order</th>
                                    <th>Tittle</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($blogs as $key => $blog)
                                        <td>{{++$key}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td><img src="{{$blog->getNameImage1()}}" alt="Image" style="width: 100px"></td>
                                        <td>
                                            <div>
                                                <button value="{{$blog->id}}" class="btn btn-success details">Details</button>
                                                <div style="display: none" class="detailHTML{{$blog->id}}">
                                                    <h2>Title: {{$blog->title}}</h2>
                                                    <div class="container row text-center">
                                                        <div class="col-6"><img style="width: 100px" src="{{$blog->getNameImage1()}}" alt=""></div>
                                                        <div class="col-6"><img style="width: 100px" src="{{$blog->getNameImage2()}}" alt=""></div>
                                                    </div>
                                                    <h2>Content</h2>
                                                    <div class="mt-1 border-top-1">
                                                        {!!$blog->content!!}
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <a class="text-primary mr-1"
                                                   href="{{route('blogs.edit',$blog->id)}}">
                                                    <i class="nav-icon far fa-edit"></i>Edit
                                                </a>
                                                <a class="text-danger"
                                                   onclick="return confirm('Are you sure you want to delete')"
                                                   href="{{route('blogs.delete',$blog->id)}}">
                                                    <i class="nav-icon far fa-trash-alt"></i>Delete
                                                </a>
                                            </div>
                                        </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Numeric order</th>
                                    <th>Tittle</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
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
@endsection
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
            $('#staticBackdrop').modal('show')
        })
    </script>
@endsection
