<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'title', 'hospital_id', 'gender', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = true; // default value is true

    public function hospital()
    {
        return $this->belongsTo('\App\Models\Hospital', 'hospital_id');
    }
}
