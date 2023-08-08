<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    // protected $table = 'services';
    protected $fillable = ['name', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at', 'pivot'];
    public $timestamps = true;

    public function doctors()
    {
        $this->belongsToMany('App\Models\Doctor', 'doctor_service', 'service_id', 'doctor_id');
    }
}
