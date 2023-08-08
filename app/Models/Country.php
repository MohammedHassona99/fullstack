<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = false;

    public function doctor()
    {
        return $this->hasManyThrough('App\Models\Doctor', 'App\Models\Hospital', 'country_id', 'hospital_id', 'id', 'id');
    }
}
