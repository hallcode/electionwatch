<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    protected $path = "/Pages";

    public function page($title)
    {
        $fullpath = $this->path . '/' . strtolower($title) . '.md';

        if (Storage::disk('static')->exists($fullpath)) {
            $file = Storage::disk('static')->get($fullpath);

            return view('page', [
                'content' => $file,
                '_title' => ucfirst($title)
            ]);
        }

        abort(404);

    }
}
