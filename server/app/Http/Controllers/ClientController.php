<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Owner;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function getSubscribers() {
        $clients = Client::all();

        return view('admin.clients.subscribed', compact('clients'));
    }

    public function deleteSubscriber($subscriber_id) {
        $client = Client::findOrFail($subscriber_id);

        $client->delete();

        return redirect()->route('clients.subscribers');
    }

    public function getOwners() {
        $owners = Owner::all();

        return view('admin.clients.owners', compact('owners'));

    }


}
