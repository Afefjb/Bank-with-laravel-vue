<?php

namespace App\Http\Controllers;

use App\Models\Clientb;
use Illuminate\Http\Request;

class ClientbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Clientb = Clientb::with('Agence')->get()->toArray();
        return array_reverse($Clientb);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Clientb = new Clientb([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'civilité' => $request->input('civilité'),
            'datenais' => $request->input('datenais'),
            'nature_de_client' => $request->input('nature_de_client'),
            'adresse' => $request->input('adresse'),
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'Photo'=> $request->input('Photo'),
            'AgenceID' => $request->input('AgenceID'),
        ]);
        $Clientb->save();
        return response()->json('Client créé !');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Clientb = Clientb::find($id);
        return response()->json($Clientb);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $Clientb = Clientb::find($id);
        $Clientb->update($request->all());

        return response()->json('Client MAJ !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Clientb = Clientb::find($id);
        $Clientb->delete();

        return response()->json('Client supprimé !');
    }
    /**
     * Show specified resource.
     *
     * @param  \App\Models\Clientb  $idag
     * @return \Illuminate\Http\Response
     */
    public function showclientByag($idag)
    {
        $Clientb= Clientb::where('AgenceID', $idag)->with('Agence')->get()->toArray();
        return array_reverse($Clientb);
    }
}
