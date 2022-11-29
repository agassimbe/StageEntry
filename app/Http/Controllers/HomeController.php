<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Etudiant;
use App\Models\Entreprise;
use App\Models\Offre;
use App\Models\SecteurActivite;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use PhpParser\Node\Stmt\Switch_;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $secteurActivites = $this->getClasse(SecteurActivite::all());

        $offres = (new Offre)->newQuery();
        if (request()->has('search')) {
            $offres->where('titre', 'Like', '%' . request()->input('search') . '%');
        }
        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $offres->orderBy($attribute, $sort_order);
        } else {
            $offres->latest();
        }
        $offres = $offres->paginate(5);
        return view('accueil', compact('offres', 'secteurActivites'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function getClasse($secteurActivites){
        foreach ($secteurActivites as $secteur) {
            switch ($secteur->nom) {

                case 'Marketing':
                     $secteur["class"] = "fa fa-3x fa-mail-bulk text-primary mb-4";
                    break;
                case 'Service Client':
                    $secteur["class"] = "fa fa-3x fa-headset text-primary mb-4";
                    break;
                case 'Ressources Humaines':
                    $secteur["class"] = "fa fa-3x fa-user-tie text-primary mb-4";
                    break;
                case 'Gestion de Projet':
                    $secteur["class"] = "fa fa-3x fa-tasks text-primary mb-4";
                    break;
                case 'Développement des Affaires':
                    $secteur["class"] = "fa fa-3x fa-chart-line text-primary mb-4";
                    break;
                case 'Ventes & Communication':
                    $secteur["class"] = "fa fa-3x fa-hands-helping text-primary mb-4";
                    break;
                case 'Enseignement et éducation':
                    $secteur["class"] = "fa fa-3x fa-book-reader text-primary mb-4";
                    break;
                case 'Design & Création':
                    $secteur["class"] = "fa fa-3x fa-drafting-compass text-primary mb-4";
                    break;

                default:
                    $secteur["class"] = "fa fa-3x fa-mail-bulk text-primary mb-4";
                    break;
            }

        }

        return $secteurActivites;
    }
    

}
