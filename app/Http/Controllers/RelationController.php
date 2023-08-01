<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Models\User;

class RelationController extends Controller
{
    public function hasOne()
    {
        $user = User::with(['phone' => function ($q) {
            $q->select('code', 'user_id');
        }])->find(1);
        return $user->phone->code;
        return response()->json($user);
    }

    public function hasOneReverse()
    {
        $phone = Phone::with(['user' => function ($q) {
            $q->select('id', 'email');
        }])->find(1);
        $phone->makeVisible(['user_id']);
        // $phone->makeHidden(['code']);
        return response()->json($phone);
    }
    public function hasPhone()
    {
        return User::whereHas('phone', function ($q) {
            $q->where('code', '00972');
        })->get();
    }
}
