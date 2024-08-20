<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'type_id',
        "name",
        "activity",
        "description",
        "date",
        "image",
    ];

    // In questo caso la tabella ha relazione ONE quindi sarà al SINGOLARE.
    //belongsTo significa che APPARTIENE ad una singola categoria
    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
