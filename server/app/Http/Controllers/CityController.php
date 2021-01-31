<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function  index() {
        $cities = City::all();
    //after create users table, add user_name to view
        return view('admin.cities.list', compact('cities'));
    }

    public function create() {
        $city = new City();
        //after create users table, create option list user_name to view
        return view('admin.cities.add');
    }

    public function store(CityRequest $request) {
        $city = new City();

        $city->name = $request->input('name');

        $city->save();

        return redirect()->route('cities.index');
    }

    public function edit($id) {

        $city = City::findOrFail($id);
        //after create users table, add user_name to view
        return view('admin.cities.edit', compact('city'));


    }

    public function update(CityRequest $request, $id) {
        $city = City::findOrFail($id);

        $city->name = $request->input('name');

        $city->save();

        return redirect()->route('cities.index');
    }

    public function delete($id) {
        $city = City::findOrFail($id);

        $city->delete();

        return redirect()->route('cities.index');

    }
}
