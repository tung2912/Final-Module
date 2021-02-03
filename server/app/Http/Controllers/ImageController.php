<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Estate;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index() {
        $images = Image::all();

        return view('admin.images.list',compact('images'));
    }

    public function create() {
        $estates = Estate::all();
        return view('admin.images.add',compact('estates'));
    }

    public function store(ImageRequest $request) {
        $image = new Image();

        $image->estate_id = $request->estate_id;
        $this->uploadImage($image, $request);
        $image->save();

        return redirect()->route('images.index');

    }


    function uploadImage($obj, $request)
    {
        if ($request->hasfile('image')) {
            $pathImage = $request->file('image')->store('public/images');
            $obj->url = $pathImage;
        }
    }


}
