<?php

namespace App\Http\Controllers;

use App\Models\Esame;
use App\Http\Controllers\Controller;
use App\Models\Dottore;
use App\Models\Paziente;
use Illuminate\Http\Request;

class EsameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $esami = Esame::all();

        return response()->json(['esami' => $esami]);
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
            'descrizione' => 'required',
            'id_dottore' => 'required', // Assicurati che il campo id_chiave_esterna_1 sia presente nella richiesta
            'id_paziente' => 'required', // Assicurati che il campo id_chiave_esterna_2 sia presente nella richiesta
        ]);

        $esami = new Paziente();

        $esami->name = $request->input('name');
        $esami->descrizione = $request->input('descrizione');
        $esami->id_dottore = $request->input('id_dottore');
        $esami->id_paziente = $request->input('id_paziente');
        $esami->save();

        return response()->json(['esami' => $esami]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $esami = Paziente::find($id);
  

        return response()->json(['esami' => $esami]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Esame $esame)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required',
                'descrizione' => 'required'
            ]);
        
            // Trova il pazienti dal database utilizzando l'id
            $esami = Esame::find($id);
        
            // Aggiornamento dei dati del esami
            $esami->update($request->all());
        
            return response()->json(['esami' => $esami]);
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {  $esami = Esame::find($id);
        $esami->delete();

        return response()->json(['message' => 'esame eliminato con successo']);
    }
}
