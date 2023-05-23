@extends('layouts/admin')

@section('content')

<h3>Tutte le tipologie</h3>

<table class="table table-dark">
  <thead>
    <th>Nome</th>
    <th>Slug</th>
    <th>Descrizione</th>
    <th>N. Progetti</th>
    <th>Dettaglio</th>
  </thead>

  <tbody>

    @foreach($types as $type)
    <tr>
      <td>{{$type->name}}</td>
      <td>{{$type->slug}}</td>
      <td>{{$type->description}}</td>
      <td>{{count($type->projects)}}</td>
      <td><a href="{{route('admin.types.show', $type->slug)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
    </tr>
    @endforeach


  </tbody>
</table>

<button class="btn">
  <a href="{{route('admin.types.create')}}">Aggiungi Tipologia</a>
</button>

@endsection