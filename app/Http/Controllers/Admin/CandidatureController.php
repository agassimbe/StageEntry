<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use App\Models\Offre;
use App\Models\Role;
use App\Models\SecteurActivite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatureController extends Controller
{

    function __construct()
    {
         $this->middleware('can:offre list', ['only' => ['index','show']]);
         $this->middleware('can:offre create', ['only' => ['create','store']]);
         $this->middleware('can:offre edit', ['only' => ['edit','update']]);
         $this->middleware('can:offre delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $candidatures = $this->getCandidatures(auth()->user()?->id);
        //$candidatures = (new Candidature())->newQuery();

        // if (request()->has('search')) {
        //     $candidatures->where('name', 'Like', '%' . request()->input('search') . '%');
        // }
        // if (request()->query('sort')) {
        //     $attribute = request()->query('sort');
        //     $sort_order = 'ASC';
        //     if (strncmp($attribute, '-', 1) === 0) {
        //         $sort_order = 'DESC';
        //         $attribute = substr($attribute, 1);
        //     }
        //     $candidatures->orderBy($attribute, $sort_order);
        // } else {
        //     $candidatures->latest();
        // }
        $candidatures = $candidatures;
        return view('admin.candidature.index', compact('candidatures'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secteurActivites = SecteurActivite::all();
        return view('admin.offre.create', compact('secteurActivites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "lieu" => "required",
            "temps" => "required",
            "salaire" => "required",
            "secteur_activite_id" => "required|exists:secteur_activites,id",
            "titre" => "required",
            'description' => ['required', 'string','min:30'],
        ]);

        $data = $request->all();
        $data['publish'] =1;
        $data['user_id'] = auth()->user()?->id;
        Offre::create($data);
        return redirect()->route('offre.index')
        ->with('message', 'Offre crée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre)
    {
        return view('admin.offre.show',compact('offre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit(Offre $offre)
    {
        $secteurActivites = SecteurActivite::all();
        return view('admin.offre.edit',compact('offre', 'secteurActivites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offre $offre)
    {
        $request->validate([
            "lieu" => "required",
            "temps" => "required",
            "salaire" => "required",
            "secteur_activite_id" => "required|exists:secteur_activites,id",
            "titre" => "required",
            'description' => ['required', 'string','min:30'],
        ]);
        $offre->update($request->all());
        return redirect()->route('offre.index')
                        ->with('message','Offre mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offre $offre)
    {
        $offre->delete();
        return redirect()->route('offre.index')
                    ->with('message','Offre supprimée avec succès');
    }

    public function getCandidatures($userId)
    {
        $candidatures = DB::table('candidatures')
			->join('users', 'candidatures.user_id', '=', 'users.id')
            ->join('offres', 'candidatures.offre_id', '=', 'offres.id')
            ->select('users.name','candidatures.id', 'candidatures.cv', 'candidatures.message')
			->where('offres.user_id', '=', $userId)
            ->get();

           return $candidatures;
    }
}
