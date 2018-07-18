<?php

namespace App\Http\Controllers\Admin;

use App\Notice;
use App\YamlModels\Election;
use App\YamlModels\Level;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class NoticesController extends Controller
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
        
        return view('admin.notice-index',[
            '_title' => 'Notices',
            'notices' => Notice::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        $this->authorise();

        return view('admin.notice-form', [
            '_title' => 'Create Notice',
            'elections' => Election::where('isWatched', true)->sortByDesc('order'),
            'levels' => Level::all()->sortByDesc('order')
        ]);
    }

    public function edit($id)
    {
        $this->authorise();

        return view('admin.notice-form', [
            '_title' => 'Edit Notice',
            'elections' => Election::where('isWatched', true)->sortByDesc('order'),
            'levels' => Level::all()->sortByDesc('order'),
            'notice' => Notice::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $this->authorise();

        $request->validate([
            'title' => [
                'required',
                'max:255',
                Rule::unique('notices')->ignore($request->input('id'))
            ],
            'post' => 'required'
        ]);

        if ($request->input('id') == '')
        {
            $notice = new Notice();
        }
        else
        {
            $notice = Notice::findOrFail($request->input('id'));
        }

        $notice->title = $request->input('title');
        $notice->user_id = Auth::user()->id;
        $notice->election_id = $request->input('election');
        $notice->level = $request->input('level');
        $notice->post = $request->input('post');

        // Set notice direction
        $election = Election::where('_id', $request->input('election'))->first();
        $newLevel = Level::open($request->input('level'));
        if ($election !== null)
        {
            if ($election->activeNotice()->level()->order > $newLevel->order)
            {
                $notice->direction = -1;
            }
            elseif ($election->activeNotice()->level()->order == $newLevel->order)
            {
                $notice->direction = 0;
            }
            elseif ($election->activeNotice()->level()->order < $newLevel->order)
            {
                $notice->direction = 1;
            }
        } else {
            $notice->direction = 0;
        }

        $notice->save();

        return redirect("/admin/notices");
    }

    public function delete($id)
    {
        $this->authorise();

        $notice = Notice::findOrFail($id);

        $notice->delete();

        return redirect("/admin/notices");
    }
}
