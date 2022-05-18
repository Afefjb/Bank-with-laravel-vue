<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Compte;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Compte = Compte::with('Client','Agence')->get()->toArray();
        return array_reverse($Compte);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Compte = new Compte([
            'numero_de_compte' => $request->input('numero_de_compte'),
            'solde' => $request->input('solde'),
            'type' => $request->input('type'),
            'ClientbID'=>$request->input('ClientbID'),
            'AgenceID'=>$request->input('AgenceID'),
        ]);
        $Compte->save();
        return response()->json('Compte créé !');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Compte = Compte::find($id);
        return response()->json($Compte);

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
        $Compte = Compte::find($id);
        $Compte->update($request->all());
        return response()->json('Compte MAJ !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Compte = Compte::find($id);
        $Compte->delete();
        return response()->json('Compte supprimé !');
    }
}
