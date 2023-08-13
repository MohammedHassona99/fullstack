<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function collection()
    {
        // $arr = [1, 2, 3, 4];
        $arr = ['name', 'age'];
        $collect = collect($arr);
         $collect->combine(['mohammed', '16']);
         $collect->count();

         $categories = Category::get();

    }
}
