@extends('layouts.app')

@section('content')
   <section class="section">
       <main>
           <h1>Page not found</h1>
           <p>
               The resource you selected does not appear to exist, or may have been moved or deleted.
           </p>
           <p>
               {{ $exception->getMessage() }}
           </p>
       </main>
   </section>

@endsection