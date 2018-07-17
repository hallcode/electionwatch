@extends('layouts.admin')

@section('content')
    <h2>{{ $_title }}</h2>
    @if($errors->any())
        <article class="box errors">
            <p>
                <strong>There were errors with your submission:</strong>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </article>
    @endif
    <form id="main" method="POST" action="/admin/polls">
        @csrf

        <div class="field">
            <label class="label">Election Type</label>
            <div class="select">
                <select name="election">
                    @foreach($elections as $election)
                        <option value="{{ $election->_id }}"
                        @if(isset($notice))
                            {{ $election->_id == $poll->election()->_id ? 'selected' : ''}}
                                @endif>
                            {{ $election->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label class="label">Date of Poll</label>
            <div class="field is-grouped">
                <div class="control">
                    <input name="date[day]" class="input" size="2" maxlength="2">
                    <p class="help">Day</p>
                </div>
                <div class="control">
                    <input name="date[month]" class="input" size="2" maxlength="2">
                    <p class="help">Month</p>
                </div>
                <div class="control">
                    <input name="date[year]" class="input" size="4" maxlength="4">
                    <p class="help">Year</p>
                </div>
            </div>
        </div>


    </form>
    <article class="list-meta">
        <p>
        </p>
        <nav>
            <button form="main" class="button is-link">Save</button>
            <a href="/admin/polls" class="button">Cancel</a>
        </nav>
    </article>

@endsection