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
    <form id="main" method="POST" action="/admin/notices">
        @csrf

        <input name="id" value="{{ $notice->id or '' }}" readonly hidden>

        <div class="field">
            <label class="label">Headline</label>
            <input name="title" class="input" type="text" placeholder="Headline"
            value="{{ $notice->title or '' }}">
        </div>

        <div class="field">
            <label class="label">Election Type</label>
            <div class="select">
                <select name="election">
                    @foreach($elections as $election)
                        <option value="{{ $election->_id }}"
                                @if(isset($notice))
                                {{ $election->_id == $notice->election()->_id ? 'selected' : ''}}
                                @endif>
                            {{ $election->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label class="label">Alert Level</label>
            <div class="select">
                <select name="level">
                    @foreach($levels as $level)
                        <option value="{{ $level->_title }}"
                                @if(isset($notice))
                                {{ $level->_title == $notice->level()->_title ? 'selected' : ''}}
                                @endif>
                            {{ $level->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="field">
            <label class="label">Post</label>
            <p>You can use <a href="https://www.markdownguide.org/cheat-sheet/">markdown</a> in the text box below.</p>

            <textarea name="post" rows="12" class="textarea" type="text"
                  placeholder="Write about why this notice is being issued">{{ $notice->post or '' }}</textarea>


        </div>


    </form>
    <article class="list-meta">
        <p>
            When you click save, this notice will be issued immediately.
        </p>
        <nav>
            <button form="main" class="button is-link">Save</button>
            <a href="/admin/notices" class="button">Cancel</a>
        </nav>
    </article>

@endsection