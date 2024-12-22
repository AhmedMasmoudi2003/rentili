<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use Illuminate\Http\Request;

class AppartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appartments = Appartment::paginate(5);
        return view('appartments.index', compact('appartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('appartments.create');
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
            'client_id' => ['bail','string','required'],
            'client_name' => ['bail','string','required'],
        ]);
        $appartment = Appartment::create($validatedData);
        return redirect()->route('appartments.index')
            ->with('info', 'Appartment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appartment $appartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appartment $appartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appartment $appartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appartment $appartment)
    {
        //
    }
}
