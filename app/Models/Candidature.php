<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    protected $fillable = ["message","cv","offre_id","user_id"];

    public function offre(){
        return $this->belongsTo(Offre::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
