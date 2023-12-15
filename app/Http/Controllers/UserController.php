<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $dottori = User::all();

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

        $user = new User();

        $user->name = $request->input('name');
        $user->specializzazione = $request->input('specializzazione');

        $user->save();

        return response()->json(['user' => $user]);
    }


    /**
     * Display the specified resource.
     */
   
    public function show($id)
    {

        $user = User::find($id);
        return response()->json(['user' => $user]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        $request->validate([
            'name' => 'required|string',
            'specializzazione' => 'required|string'
        ]);
        
        // Trova il user dal database utilizzando l'id
        $user = User::find($id);
    
        // Aggiornamento dei dati del user
        $user->update($request->all());
        
        return response()->json(['pazienti' => $user]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {  $user = User::find($id);
        $user->delete();

        return response()->json(['message' => 'user eliminato con successo']);
    }


    public function getEsamebyDottId($id)
    {
        // Trova il user per l'id specificato
        $user = User::where('id', $id)->with('esami.paziente')->first();

        

        return response()->json(['esami' => $user]);
    }
}
