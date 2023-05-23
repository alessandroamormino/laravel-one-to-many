@extends('layouts/admin')

@section('content')

<div class="main">
  <h1>{{$type->name}}</h1>
  <h6>Tipologia: {{$type->name}}</h6>
  <hr>
  <p>
    Descrizione: {{$type->description}}
  </p>

  <div class="mt-5">
    <a href="{{route('admin.types.index')}}">Torna all'elenco di tutte le tipologie</a>
  </div>
  
</div>
@endsection