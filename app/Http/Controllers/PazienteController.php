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

        $pazienti =Paziente::find($id);
  

        return response()->json(['pazienti' => $pazienti]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paziente $paziente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paziente $paziente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paziente $paziente)
    {
        //
    }
}
