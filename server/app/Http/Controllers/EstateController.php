<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\Estate;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    public function index() {
        $estates = Estate::all();

        $client = Client::all();

        $city = City::all();

        return view('admin.estates.list', compact('estates', 'city', 'client'));

    }

    function uploadImage($obj, $request) {
        if($request->hasfile('image')) {
            $pathImage = $request->file('image')->store('public/images');
            $obj->image = $pathImage;
        }
    }

    public function getEstateById($id) {
        $estate = Estate::findOrFail($id);

        $client = Client::all();

        $city = City::all();

        return view('admin.estates.detail', compact('estate', 'city', 'client'));
    }


    public function changeEstateStatus(Request  $request, $id) {
        $estate = Estate::findOrFail($id);

        $estate->status = $request->input('status');
        $estate->save();


        return redirect()->route('estates.index');
    }

    public function showEstateStatusById($id) {

        $estates = Estate::where('status', $id)->get();

        return view('admin.estates.list', compact('estates'));

    }
}
