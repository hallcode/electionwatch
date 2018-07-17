<?php

namespace App\Http\Controllers;

use App\Notice;
use App\Poll;
use App\YamlModels\Alert;
use App\YamlModels\Election;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home', [
            'alerts' => Alert::getActive(),
            'elections' => Election::getWatched(),
            'polls' => Poll::soon()->get(),
            'notices' => Notice::recent()->get()
        ]);
    }
}
