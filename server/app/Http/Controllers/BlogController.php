<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function details($id)
{
    $blog = Blog::findOrFail($id);
    return view('admin.blogs.details', compact('blog'));
}

    public function index()
    {
        $blogs = Blog::all();

        return view('admin.blogs.list', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.add');
    }

    public function store(BlogRequest $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->contents;
        $this->uploadImage1($blog, $request);
        $this->uploadImage2($blog, $request);
        $blog->save();

        return redirect()->route('blogs.index')->with('success','Add Successfully');

    }

    public function edit($id) {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit',compact('blog'));
    }

    public function update(BlogRequest $request, $id) {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->content = $request->contents;
        $this->uploadImage1($blog, $request);
        $this->uploadImage2($blog, $request);
        $blog->save();

        return redirect()->route('blogs.index')->with('Update','Add Successfully');;
    }

    public function delete($id) {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index')->with('warning','Delete Successfully');;
    }

    function uploadImage1($obj, $request)
    {
        if ($request->hasfile('image1')) {
            $pathImage = $request->file('image1')->store('public/images');
            $obj->image1 = $pathImage;
        }
    }

    function uploadImage2($obj, $request)
    {
        if ($request->hasfile('image2')) {
            $pathImage = $request->file('image2')->store('public/images');
            $obj->image2 = $pathImage;
        }
    }

}
