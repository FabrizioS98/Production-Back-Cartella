<?php

namespace App\Http\Controllers;

use App\Models\Paziente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PazienteController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dottori = Paziente::all();

        return response()->json(['dottori' => $dottori]);
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

        $pazienti = new Paziente();

        $pazienti->name = $request->input('name');
        $pazienti->specializzazione = $request->input('specializzazione');

        $pazienti->save();

        return response()->json(['pazienti' => $pazienti]);
    }


    /**
     * Display the specified resource.
     */
   
    public function show($id)
    {

        $pazienti = Paziente::find($id);
  

        return response()->json(['pazienti' => $pazienti]);
    }
    

  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'specializzazione' => 'required'
    ]);

    // Trova il pazienti dal database utilizzando l'id
    $pazienti = Paziente::find($id);

    // Aggiornamento dei dati del pazienti
    $pazienti->update($request->all());

    return response()->json(['pazienti' => $pazienti]);
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {  $paziente = Paziente::find($id);
        $paziente->delete();

        return response()->json(['message' => 'Paziente eliminato con successo']);
    }

    public function getEsamibyPazId($id)
    {
        // Trova il dottore per l'id specificato
        $paziente = Paziente::where('id', $id)->with('esami')->first();

        

        return response()->json(['esami' => $paziente]);
    }
}
