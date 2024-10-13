<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tier extends Model
{
    use HasFactory;
    protected $fillable=['name', 'slug'];


    public function quizzes():HasMany
    {
        return $this->hasMany(Quiz::class);
    }

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::creating(function ($tier){
            if(empty($tier->slug)){
                $tier->slug=Str::slug($tier->name);
            }
        });
    }
}
