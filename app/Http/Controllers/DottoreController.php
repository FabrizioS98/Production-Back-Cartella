<?php

namespace App\Http\Controllers;

use App\Models\Dottore;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     */
   
    public function show($id)
    {

        $dottore =Dottore::find($id);
  

        return response()->json(['dottore' => $dottore]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dottore $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dottore $dottore)
    {
        $request->validate([
            'name' => 'required',
            'specializzazione' => 'required',
            
        ]);

        // Aggiornamento dei dati del dottore
        $dottore->update($request->all());

        return response()->json(['dottore' => $dottore]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dottore $dottore)
    {
        //
    }
}
