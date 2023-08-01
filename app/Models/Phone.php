<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    // protected $table = 'phone'; if the name of table is single
    protected $fillable = ['code', 'phone', 'user_id'];
    protected $hidden = ['user_id'];
    public $timestamps = false;

    ############# Relation #############

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
