@extends('layouts/admin')

@section('content')
  <h1>Administration page</h1>
<hr>

<ul>
  <li><a href="{{route('admin.projects.index')}}">Mostra tutti i progetti</a></li>
  <li><a href="{{route('admin.types.index')}}">Mostra tutte le tipologie</a></li>
</ul>
@endsection