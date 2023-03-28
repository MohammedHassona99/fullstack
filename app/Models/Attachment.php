<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'old_name', 'new_name', 'path', 'type', 'user_id', 'size'
    ];
}
