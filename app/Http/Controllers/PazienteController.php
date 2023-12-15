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
        $pazienti = Paziente::all();

        return response()->json(['pazienti' => $pazienti]);
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cognome' => 'required',
            'codice_fiscale' => 'required',
            'data_nascita' => 'required'
        ]);

        $pazienti = new Paziente();

        $pazienti->name = $request->input('name');
        $pazienti->cognome = $request->input('cognome');
        $pazienti->codice_fiscale = $request->input('codice_fiscale');
        $pazienti->data_nascita = $request->input('data_nascita');

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
            'cognome' => 'required',
            'codice_fiscale' => 'required',
            'data_nascita' => 'required'
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
