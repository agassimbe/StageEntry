<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Offre;
// use App\Http\Requests\StoreCandidatureRequest;
// use App\Http\Requests\UpdateCandidatureRequest;
use Illuminate\Http\Request;


class CandidatureoldController extends Controller
{

    function __construct()
    {
         $this->middleware('can:offre list', ['only' => ['index','show']]);
        //  $this->middleware('can:offre create', ['only' => ['create','store']]);
        //  $this->middleware('can:offre edit', ['only' => ['edit','update']]);
        //  $this->middleware('can:offre delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function index(Offre $offre)
    {
        dd($offre);
        return view('candidature.index',compact('offre'));
    }



    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \App\Http\Requests\StoreCandidatureRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StoreCandidatureRequest $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Candidature  $candidature
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Candidature $candidature)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Candidature  $candidature
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Candidature $candidature)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateCandidatureRequest  $request
    //  * @param  \App\Models\Candidature  $candidature
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(UpdateCandidatureRequest $request, Candidature $candidature)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Candidature  $candidature
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Candidature $candidature)
    // {
    //     //
    // }


}
