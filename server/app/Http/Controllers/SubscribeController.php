<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index() {
        $subscribes = Subscribe::all();

        return view('admin.subscribes.list',compact('subscribes'));
    }

    public function getSubscribeById($id) {
        $subscribe = Subscribe::findOrFail($id);

        return view('admin.subscribes.detail',compact('subscribe'));
    }

    public function changeStatus(Request $request, $id) {
        $subscribe = Subscribe::findOrFail($id);

        $subscribe->status = $request->status;
        $subscribe->save();

        return redirect()->route('subscribes.index');

    }

    public function classifySubscribeByStatus($status) {
        $subscribes = Subscribe::where('status',$status)->get();

        return view('admin.subscribes.list',compact('subscribes'));
    }
}
