<?php

namespace App\Http\Controllers;

use App\YamlModels\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        return view('levels.index',[
            '_title' => 'Threat Levels',
            'levels' => Level::all()->sortByDesc('order'),
        ]);
    }

    public function show($slug)
    {
        $level = Level::open($slug);

        return view('levels.show', [
            '_title' => $level->title,
            'level' => $level
        ]);
    }
}
