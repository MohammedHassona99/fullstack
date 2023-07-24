<?php
    
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Attachment;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('dashboard.home');
    }
    public function show_news(Request $request)
    {
        if (isset($_GET['active'])) {
            $active = $_GET['active'];
            $post_id = $_GET['post_id'];
            $post = Post::find($post_id);
            if ($active == 0) {
                $post->status = 1;
            } else {
                $post->status = 0;
            }
            $post->save();
        }
        $posts = Post::all()->sortByDesc('id');
        return view('dashboard.news.show', compact('posts'));
    }
    public function add_news(Request $request)
    {
        if ($request->post()) {
            $allow_extension = ['pdf', 'jpg', 'jpeg', 'png'];
            $img = $request->file('post_img');
            if ($img != null) {
                $img_org_name = $img->getClientOriginalName();
                $img_ex = $img->getClientOriginalExtension();
                $img_size = $img->getSize();
                $rand_name = date('dmy') . rand(111111111, 999999999);
                $img_name = $rand_name . "." . $img_ex;
                $target_img = 'uploads/images';
                if (in_array($img_ex, $allow_extension)) {
                    $request->post_img->move(public_path($target_img), $img_name);
                    $image_map = $target_img . "/" . $img_name;
                    $img_insert = Attachment::create([
                        'old_name' => $img_org_name,
                        'new_name' => $img_name,
                        'path' => $image_map,
                        'type' => $img_ex,
                        'user_id' => Auth::user()->id,
                        'size' => $img_size
                    ]);
                    $img_id = $img_insert->id;
                }
            } else {
                $img_id = null;
            }
            $request->post('is_slider') === null ? $is_slider = false : $is_slider = true;
            $rule = [
                'title' => 'required|max:100|unique:posts,title',
                'description' => 'required|max:255'
            ];
            $message = ['title.required' => __('message.titleName'), 'title.unique' => __('message.titleUnique'), 'description.required' => __('message.descRequired')];
            $validate = Validator::make($request->all(), $rule, $message);
            // if ($validate->failed()) {
            //     return redirect()->back()->withErrors($validate)->withInputs($request->all());
            // }
            Post::create([
                'title' => $request->title,
                'description' => $request->content,
                'category' => $request->category,
                'author' => Auth::user()->id,
                'image' => $img_id,
                'is_slider' => $is_slider,
            ]);
        }
        $cats = Category::all();
        return view('dashboard.news.add', compact('cats'));
    }

    public function edit_news($id, Request $request)
    {

        if ($request->post()) {
            $post = Post::find($id);
            $allow_extension = ['pdf', 'jpg', 'jpeg'];
            $img = $request->file('post_img');
            if ($img != null) {
                $img_ex = $img->getClientOriginalExtension();
                $rand =  date('dmy') .  rand(111111111, 999999999);
                $img_name = $rand . "." . $img_ex;
                $target_img = 'uploads/images';
                if (in_array($img_ex, $allow_extension)) {
                    $request->post_img->move(public_path($target_img), $img_name);
                    $image_map = $target_img . "/" . $img_name;
                }
                $post->image = $image_map;
            }
            $post->title = $request->post('title');
            $post->description = $request->post('content');
            $post->category = $request->post('category');
            $post->save();
        }
        $news = Post::where('id', $id)->get()->first();
        $cats = Category::all();
        return view('dashboard.news.edit', compact('news', 'cats'));
    }

    public function show_course(Request $request)
    {
        if (isset($_GET['active'])) {
            $active = $_GET['active'];
            $post_id = $_GET['post_id'];

            $post = Course::find($post_id);
            if ($active == 0) {
                $post->status = 1;
            } else {
                $post->status = 0;
            }
            $post->save();
        }
        $courses = Course::all()->sortByDesc('id');
        return view('dashboard.courses.show', compact('courses'));
    }
    public function add_course(Request $request)
    {
        if ($request->post()) {
            $allow_extension = ['pdf', 'jpg', 'jpeg'];
            $img = $request->file('course_img');
            if ($img != null) {
                $img_org_name = $img->getClientOriginalName();
                $img_ex = $img->getClientOriginalExtension();
                $img_size = $img->getSize();
                $rand_name = date('dmy') . rand(111111111, 999999999);
                $img_name = $rand_name . "." . $img_ex;
                $target_img = 'uploads/images';
                if (in_array($img_ex, $allow_extension)) {
                    $request->course_img->move(public_path($target_img), $img_name);
                    $image_map = $target_img . "/" . $img_name;
                    $img_course = Attachment::create([
                        'old_name' => $img_org_name,
                        'new_name' => $img_name,
                        'path' => $image_map,
                        'type' => $img_ex,
                        'user_id' => Auth::user()->id,
                        'size' => $img_size
                    ]);

                    $img_id = $img_course->id;
                }
            } else {
                $img_id = null;
            }
            Course::create([
                'name' => $request->post('name'),
                'description' => $request->post('description'),
                'course_date' => $request->post('course_date'),
                'image' => $img_id,

            ]);
        }

        return view('dashboard.courses.add');
    }

    public function edit_course($id, Request $request)
    {

        if ($request->post()) {
            $post = Course::find($id);
            $allow_extension = ['pdf', 'jpg', 'jpeg'];
            $img = $request->file('course_img');
            if ($img != null) {
                $img_ex = $img->getClientOriginalExtension();
                $rand =  date('dmy') .  rand(111111111, 999999999);
                $img_name = $rand . "." . $img_ex;
                $target_img = 'uploads/images';
                if (in_array($img_ex, $allow_extension)) {
                    $request->course_img->move(public_path($target_img), $img_name);
                    $image_map = $target_img . "/" . $img_name;
                }
                $post->image = $image_map;
            }
            $post->name = $request->post('name');
            $post->description = $request->post('description');
            $post->course_date = $request->post('course_date');
            $post->save();
        }

        $courses = Course::where('id', $id)->get()->first();
        return view('dashboard.courses.edit', compact('courses'));
    }

    public function add_category(Request $request)
    {
        if ($request->post()) {
            $name = $request->post('name');
            $desc = $request->post('description');
            $res = Category::create(['title' => $name, 'description' => $desc, 'by_user' => Auth::User()->id]);
            if ($res) {
                return ['title' => $name, 'description' => $desc, 'status' => 1];
            } else {
                return ['status' => 0];
            }
        }
        $cats = Category::all();
        return view('dashboard.categories.add', compact('cats'));
    }
    public function show_category()
    {
        $cats = Category::all();
        return view('dashboard.categories.show', compact('cats'));
    }
}
