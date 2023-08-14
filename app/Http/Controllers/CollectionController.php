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
        // return $categories;

        // remove
        // add
        // return $categories->each(function ($category) {
        //     $category->name = 'mohammed';
        //     unset($category->title);
        //     unset($category->description);
        //     return $category;
        // });
        $categories->collect($categories);
        return $categories->transform(function ($value) {
            return 'title are : ' . $value['title'];
        });
    }
}
