<?php

namespace App\Http\Controllers;

use App\Models\Dottore;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DottoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dottori = Dottore::all();

        return response()->json(['dottori' => $dottori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specializzazione' => 'required'
        ]);

        $dottore = new Dottore();

        $dottore->name = $request->input('name');
        $dottore->specializzazione = $request->input('specializzazione');

        $dottore->save();

        return response()->json(['dottore' => $dottore]);
    }


    /**
     * Display the specified resource.
     */
   
    public function show($id)
    {

        $dottore = Dottore::find($id);
        Log::info($dottore);

        return response()->json(['dottore' => $dottore]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dottore $dottore)
    {
        $data = [
            "dottore" => $dottore
        ];
		
        return view('dottori.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        $request->validate([
            'name' => 'required|string',
            'specializzazione' => 'required|string'
        ]);
        
        // Trova il dottore dal database utilizzando l'id
        $dottore = Dottore::find($id);
    Log::info($dottore);
        // Aggiornamento dei dati del dottore
        $dottore->update($request->all());
        
        return response()->json(['dottori' => $dottore]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {  $dottore = Dottore::find($id);
        $dottore->delete();

        return response()->json(['message' => 'Dottore eliminato con successo']);
    }


    public function getEsamebyDottId($id)
    {
        // Trova il dottore per l'id specificato
        $dottore = Dottore::where('id', $id)->with('esami.paziente')->first();

        

        return response()->json(['esami' => $dottore]);
    }
}