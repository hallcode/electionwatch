<?php

namespace App\Http\Controllers;

use App\YamlModels\Election;
use App\YamlObject;

class ElectionController extends Controller
{
    public function index()
    {
        return view('elections.index',[
            'elections' => Election::all()->sortByDesc('order'),
            '_title' => 'Elections'
        ]);
    }

    public function show($slug)
    {
        $election = Election::open($slug);

        return view('elections.show',[
            'election' => $election,
            'polls_soon' => $election->polls()->soon()->get(),
            'polls_old' => $election->polls()->previous()->get(),
            '_title' => $election->name
        ]);
    }
}
