<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    // Ho creato un metodo PLURALE (dato che è una relazione MANY).
    // Poi ho detto che questa istanza ha (has), dei project.
    public function projects(){
        return $this->hasMany(Project::class);
    }
}
