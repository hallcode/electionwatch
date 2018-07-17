<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected function authorise()
    {
        if (Auth::check())
        {
            if (Auth::user()->isAdmin) {
                return null;
            }
        }

        return abort(403, "User not authorised");
    }

    public function index()
    {
        $this->authorise();

        return view('admin.index', [
            '_title' => 'Dashboard'
        ]);
    }
}
