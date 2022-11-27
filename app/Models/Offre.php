<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedUpdatedBy;


class Offre extends Model
{
    use HasFactory;
   // use CreatedUpdatedBy;


    protected $fillable = ["lieu","temps","salaire","titre","description","secteur_activite_id","publish","user_id"];

    public function secteur_activite(){
        return $this->belongsTo(SecteurActivite::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
