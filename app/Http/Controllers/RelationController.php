<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Phone;
use App\Models\Service;
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
        return Hospital::with('doctor')->whereHas('doctor', function ($q) {
            $q->where('gender', '1');
        })->get();
    }
    public function hospitals()
    {
        $hospitals = Hospital::select('id', 'name', 'address')->get();
        return view('pages.hospital', compact('hospitals'));
    }
    public function doctors($id)
    {
        $hospital = Hospital::find($id);
        $doctor = $hospital->doctor;
        return view('pages.doctor', compact('doctor'));
    }
    public function deleteDoctor($id)
    {
        $hospital = Hospital::find($id);

        if (!$hospital)
            return abort('404');

        $hospital->doctor()->delete();
        $hospital->delete();
        redirect()->back();
    }
    public function getDoctorServices()
    {
        return $doctor = Doctor::with('services')->find(2);
        // return $doctor->services;
    }
    public function getServiceDoctors()
    {
        return Service::find(1);
    }
    public function doctors_services($id)
    {
        $doctor = Doctor::find($id);
        // return $services = $doctor->services;
        $doctors = Doctor::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();
        return view('pages.doctors_services', compact('doctors', 'services'));
    }
    public function saveServices(Request $request)
    {
        $doctor = Doctor::find($request->doctors);
        $doctor->services()->attach($request->services); // insert many to many any data
        // $doctor->services()->sync($request->services); inset many to many but delete the data and add
        // $doctor->services()->syncWithoutDetaching($request->services); insert many to many without delete any data
        return 'success';
    }
    public function hasOneThrough()
    {
        return $patient = Patient::find(1)->doctor;
    }
    public function hasManyThrough()
    {
        $country = Country::with('doctor')->find(1);
        return $country;
    }
}
