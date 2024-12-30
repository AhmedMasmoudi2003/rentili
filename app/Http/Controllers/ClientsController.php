<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    //index
    public function index(){
        $Clients = Clients::paginate(5);
        return view('Client/index', compact('Clients'));
    }
    //create
    public function create(){
        return view('Client/create');
    }
    //store
    public function store(Request $request){
        //lahna unique:Clients no9sdou biha fama mail barka ib heka il adresse fil tableau Clients
        $request->validate([
            //n5aliw il max imta3 il name lil 20 bech maya3milha 7ad sql injection
            'name' => ['required', 'string', 'max:20'],
            'mail' => ['required', 'email', 'unique:clients'],
            'phone' => ['nullable'],
            'CIN' => ['required', 'integer', 'unique:clients'],
        ]);
        Clients::create($request->all());
        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }
    //edit
    public function edit(Clients $client){
        return view('Client/edit')->with("client",$client);
    }
    //update
    public function update(Request $request, Clients $client){
        DB::beginTransaction();
        try {
            $client = Clients::where('id', $client->id)->lockForUpdate()->first();
            if (!$client) {
                throw new \Exception('Produit introuvable ou inaccessible.');
            }
            $request->validate([
                'name' => ['required', 'string', 'max:20'],
                'mail' => ['required', 'email', 'unique:clients,mail,' . $client->id],
                'phone' => ['nullable'],
                'CIN' => ['required', 'integer', 'unique:clients,CIN,' . $client->id],
            ]);
            $client->update($request->all());
            DB::commit();
            return redirect()->route('clients.index')
                ->with('success', 'Client updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('clients.index')
                ->with('error', 'an Error occured : ' . $e->getMessage());
            }
    }
    //show
    public function show(Clients $client){
        return view('client.show', compact('client'));
    }
    //destory
    public function destroy(Clients $client){
        DB::beginTransaction();
        try {
            $client = Clients::where('id', $client->id)->lockForUpdate()->first();
            if (!$client) {
                return redirect()->route('clients.index')
                    ->with('error', 'There are no such Client');
            }
            $client->delete();
            DB::commit();
            return redirect()->route('clients.index')
                ->with('success', 'Client deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('clients.index')
                ->with('error', 'an Error occured : ' . $e->getMessage());
        }
    }
    //addwarning
    public function addWarning(Clients $client)
    {
        $client->warnings_count += 1;
        $client->save();
        return redirect()->route('clients.index')->with('success', 'Warning added successfully');
    }
}
