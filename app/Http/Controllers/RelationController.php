<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
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

    public function hasMany()
    {
        $doctors = Hospital::with('doctor')->find(1)->doctor;
        // foreach ($doctors as $doctor) {
        //     echo $doctor->name . "<br>";
        // }
        // return Hospital::find(1);
        Doctor::find(3)->hospital->name;
    }
    public function hospitals()
    {
        $hospitals = Hospital::select('id', 'name', 'address')->get();
        return view('pages.hospital', compact('hospitals'));
    }
    public function doctors($id)
    {
        $doctors = Hospital::find($id)->doctor;
        // $doctor = $hospital->doctor;
        return view('pages.doctor', compact('doctors'));
    }
}
