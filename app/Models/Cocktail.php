<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cocktail extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'ingredient', 'glass_type', 'instruction'];

    public function setNameAttribute($_name) {
        $this->attributes['name'] = $_name;
        $this->attributes['slug'] = Str::slug($_name, '&');
    }
}
