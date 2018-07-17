<?php

namespace App\Http\Controllers\Admin;

use App\Poll;
use App\YamlModels\Election;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class PollsController extends Controller
{
    protected function authorise()
    {
        if (Auth::check())
        {
            if (Auth::user()->isAdmin)
            {
                return null;
            }
        }

        return abort(403, "User not authorised");
    }

    public function index()
    {
        $this->authorise();

        $polls = Poll::whereDate('date', '>', date('Y-m-d'))
            ->latest('date')
            ->paginate(10);

        return view(
            'admin.polls-index',
            [
                '_title' => 'Polls',
                'polls' => $polls,
            ]
        );
    }

    public function create()
    {
        $this->authorise();

        return view('admin.polls-form', [
            '_title' => 'Create New Poll',
            'elections' => Election::all()->sortByDesc('order')
        ]);
    }

    public function store(Request $request)
    {
        $this->authorise();

        $request->validate([
            'election' => 'required',
            'date.day' => 'required|integer|between:1,31',
            'date.month' => 'required|integer|between:1,12',
            'date.year' => 'required|integer|between:1990,2100'
        ]);

        $poll = new Poll();

        $date = Carbon::create($request->input('date.year'), $request->input('date.month'), $request->input('date.day'));

        $poll->election_id = $request->input('election');
        $poll->date = $date->toDateString();

        $poll->save();

        return redirect('/admin/polls');
    }

    public function delete($id)
    {
        $this->authorise();

        $poll = Poll::findOrFail($id);

        $poll->delete();

        return redirect('/admin/polls');
    }
}
