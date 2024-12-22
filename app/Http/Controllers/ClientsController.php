<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(){
        $Clients = Clients::paginate(5);
        return view('Client/index', compact('Clients'));
    }
    public function create(){
        return view('Client/create');
    }
    public function store(Request $request){
        //lahna unique:Clients no9sdou biha fama mail barka ib heka il adresse fil tableau Clients
        $request->validate([
            //n5aliw il max imta3 il name lil 20 bech maya3milha 7ad sql injection
            'name' => 'required|string|max:20',
            'mail' => 'required|email|unique:Clients',
            'phone' => 'nullable',
            'CIN' => 'required|integer|unique:Clients',
        ]);
        Clients::create($request->all());
        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }
    public function edit(Clients $client){
        return view('Client/edit')->with("client",$client);
    }
    public function update(Request $request, Clients $client){
        $request->validate([
            'name' => 'required|string|max:20',
            'mail' => 'required|email|unique:clients,mail,' . $client->id, 
            'phone' => 'nullable',
            'CIN' => 'required|integer|unique:clients,CIN,' . $client->id,
        ]);
        $client->update($request->all());
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
}

    public function destroy(Clients $client){
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
