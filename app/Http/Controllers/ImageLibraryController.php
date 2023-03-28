<?php

namespace App\Http\Controllers;

use App\Models\Attachment;

use Illuminate\Http\Request;

class ImageLibraryController extends Controller
{
    public function index()
    {
        $attaches = Attachment::all();
        return view('imagesLibrary.index', compact('attaches'));
    }
}
