<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    // softdeletes
    use SoftDeletes;

    // fillable
    protected $fillable = ['title', 'description', 'url', 'type_id','slug' ];

    // foreign
    public function type() {
        return $this->belongsTo(Type::class);
    }
    // pivot 
    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }

    public function getThumbAttribute($value): string
    {
        return $value ? asset($value) : '';
    }
}
