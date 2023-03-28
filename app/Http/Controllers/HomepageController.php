<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;
use App\Models\Comment;
use App\Models\Trainee;
use App\Models\Course;

class HomepageController extends Controller
{
    public function index()
    {
        // Mail::to('mohammedhassona1999@gmail.com')->send(new Welcome());
        $courses = Course::all();
        $sliders = Post::where([['is_slider', 1], ['status', 1]])->get();
        return view('pages.welcome', compact('sliders', 'courses'));
    }
    public function news()
    {
        $news = Post::where('status', 1)->get();
        return view('pages.news', compact('news'));
    }
    public function single_post(Request $request, $id)
    {
        if ($request->post()) {
            $data = $request->all();
            $data['post_id'] = $id;
            Comment::create($data);
        }
        $post = Post::where('id', "=", $id)->get()->first();
        return view('pages.single_post', compact('post'));
    }
    public function add_trainee(Request $request)
    {
        if ($request->post()) {

            $result = Trainee::create($request->all());
            if ($result === true) {
                return ['status' => true];
            } else {
                return ['status' => false];
            }
        }
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function course()
    {
        return view('pages.course');
    }
    public function formContact(Request $request)
    {
        $arr = [];
        $arr['fname'] = $request->post('firstName');
        $arr['lname'] = $request->post('lastName');
        return view('pages.contact', $arr);
    }
}
