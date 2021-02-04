<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;


class CityController extends Controller
{
    public function  index() {
        $cities = City::all();

        return view('admin.cities.list', compact('cities'));
    }

    public function create() {
        $city = new City();

        $users = User::all();
        return view('admin.cities.add', compact('users'));
    }

    public function store(CityRequest $request) {
        $city = new City();

        $city->name = $request->input('name');
        $city->user_id = $request->input('user_id');

        $city->save();


        return redirect()->route('cities.index')->with('success','Add Successfully');
    }

    public function edit($id) {

        $city = City::findOrFail($id);
        $users = User::all();

        return view('admin.cities.edit', compact('city', 'users'));


    }

    public function update(Request $request, $id) {
        $city = City::findOrFail($id);

        $city->name = $request->input('name');
        $city->user_id = $request->input('user_id');

        $city->save();

        return redirect()->route('cities.index')->with('success','Update Successfully');;
    }

    public function delete($id) {
        $city = City::findOrFail($id);

        $city->delete();

        return redirect()->route('cities.index')->with('warning','Delete Successfully');

    }
}
