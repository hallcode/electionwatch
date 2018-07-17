<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        return view('blog', [
            'notices' => Notice::recent(8)->get(),
            '_title' => 'Recent Notices'
        ]);
    }

    public function show($id)
    {
        $notice = Notice::findOrFail($id);
        return view('notice', [
            'notice' => $notice,
            '_title' => $notice->title
        ]);
    }
}
