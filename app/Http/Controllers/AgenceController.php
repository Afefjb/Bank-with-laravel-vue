<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Agence;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Agence = Agence::all()->toArray();
        return array_reverse($Agence);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Agence = new Agence([
            'adresse' => $request->input('adresse'),
            'horaire' => $request->input('horaire'),
            'telephone' => $request->input('telephone'),


        ]);
        $Agence->save();

        return response()->json('Agence créé !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Agence = Agence::find($id);
        return response()->json($Agence);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Agence = Agence::find($id);
        $Agence->update($request->all());

        return response()->json('Agence MAJ !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Agence = Agence::find($id);
        $Agence->delete();

        return response()->json('Agence supprimé !');

    }
}
