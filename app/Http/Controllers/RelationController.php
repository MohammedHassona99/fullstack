<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RelationController extends Controller
{
    public function hasOne()
    {
        $user = User::with(['phone' => function ($q) {
            $q->select('code','user_id');
        }])->find(1);

        return response()->json($user);
    }
}
