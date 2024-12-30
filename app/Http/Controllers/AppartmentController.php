<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use App\Models\Clients;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Http\Request;

class AppartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appartments = Appartment::with('client')->paginate(5);
        return view('appartments.index', compact('appartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients=Clients::all();
        return view('appartments.create' , compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'appartment_name' => ['bail','string','required'],
            'location' => ['bail','string','required'],
            'price' => ['bail','integer','required'],
            'client_id' => ['bail','integer','required'],
        ]);
        Appartment::create($validatedData);
        return redirect()->route('appartments.index')
            ->with('info', 'Appartment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appartment $appartment)
    {
        return view('appartments.show', compact('appartment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appartment $appartment)
    {
        return view('appartments.edit',compact('appartment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appartment $appartment)
    {
        $validatedData = $request->validate([
            'appartment_name' => ['bail','string','required'],
            'location' => ['bail','string','required'],
            'price' => ['bail','integer','required'],
            'client_id' => ['bail','integer','required'],
        ]);
        DB::beginTransaction();
        try{
            $lockedAppartment = Appartment::where('id', $appartment->id)->lockForUpdate()->first();
            if (!$lockedAppartment) {
                return redirect()->route('appartments.index')
                    ->with('error', 'Appartment not found.');
            }

            $lockedAppartment->update($validatedData);

            DB::commit();
            return redirect()->route('appartments.index')
                ->with('info', 'Appartment updated successfully.');
        } catch(\Exception $e) {
            DB::rollBack();
            return redirect()->route('appartments.index')
                ->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Appartment $appartment)
    {
        // Démarrer une transaction
        DB::beginTransaction();
        try {
            // Récupérer l'appartement avec un verrou pessimiste
            $lockedAppartment = Appartment::where('id', $appartment->id)->lockForUpdate()->first();

            if (!$lockedAppartment) {
                return back()->with('error', 'Appartement introuvable.');
            }

            // Procéder à la suppression
            $lockedAppartment->delete();

            // Confirmer la transaction
            DB::commit();
            return back()->with('info', 'Appartement supprimé avec succès.');
        } catch (\Exception $e) {
            // Annuler la transaction en cas d'erreur
            DB::rollBack();
            return back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }


    public function search(Request $request)
    {   
        $keyword = trim($request->input('keyword'));

        if (!$keyword) {
            return redirect()->back()->with('error', 'Please enter a keyword to search.');
        }

        $appartments = Appartment::where('appartment_name', 'like', '%'.$keyword.'%')
            ->orWhere('location', 'like', '%'.$keyword.'%')
            ->orWhere('price', 'like', '%'.$keyword.'%')
            ->orWhere('client_name', 'like', '%'.$keyword.'%')
            ->paginate(5);

        return view('appartments.index', compact('appartments'));
    }
}
