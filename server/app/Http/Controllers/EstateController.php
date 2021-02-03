<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\Estate;
use App\Models\Income;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    public function index()
    {
        $estates = Estate::all();


        return view('admin.estates.list', compact('estates'));

    }


    public function getEstateById($id)
    {
        $estate = Estate::findOrFail($id);


        return view('admin.estates.detail', compact('estate'));
    }


    public function changeEstateStatus(Request $request, $id)
    {
        $estate = Estate::findOrFail($id);

        $estate->status = $request->input('status');
        $estate->save();


        return redirect()->route('estates.index');
    }

    public function classifyEstateByStatus($status)
    {

        $estates = Estate::where('status', $status)->get();

        return view('admin.estates.list', compact('estates'));

    }
}
