<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Course;

class APIController extends Controller
{
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
