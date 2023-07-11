<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Attachment;

class APIController extends Controller
{
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
            $post = Post::create([
                'title' => $request->title,
                'description' => $request->content,
                'category' => $request->category,
                'author' => Auth::user()->id,
                'image' => $img_id,
                'is_slider' => $is_slider,
            ]);
            if ($post) {
                return response()->json([
                    'status' => true,
                    'msg' => 'Adding is Done',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'failed'
                ]);
            }
        }
    }
    public function delete_course($id)
    {
        $result = Course::where('id', $id)->get()->first()->delete();
        if ($result) {
            return ['status' => 1];
        } else {
            return ['status' => 0];
        }
    }
    public function delete_cat($id)
    {
        $result = Category::where('id', $id)->get()->first()->delete();

        if ($result) {
            return ['status' => 1];
        } else {
            return ['status' => 0];
        }
    }
    public function delete_post($id)
    {
        $result = Post::where('id', $id)->first()->delete();
        if ($result) {
            return ['success' => 'Success'];
        } else {
            return ['error' => 'Error'];
        }
    }
    public function get_cats()
    {
        $cats = Category::all();
        return response($cats);
    }
    public function add_item()
    {
        return ['status' => 1];
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
