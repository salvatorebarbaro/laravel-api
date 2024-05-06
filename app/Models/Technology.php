<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    //fillable
    protected $fillable = ['name', 'color'];

    // pivot 
    public function projects() {
        return $this->belongsToMany(Project::class);
    }
}
