@extends('layouts/admin')

@section('content')

<div class="main">
  {{-- <h1>{{$type->name}}</h1>
  <h6>Tipologia: {{$type->name}}</h6>
  <hr>
  <p>
    Descrizione: {{$type->description}}
  </p> --}}
  <h1>Tutti i progetti della tipologia {{$type->name}}</h1>

  @if(count($type->projects) > 0)
    <table class="table table-dark">
      <thead>
        <th>Titolo</th>
        <th>Slug</th>
        <th>Dettaglio</th>
      </thead>
      <tbody>
        @foreach($type->projects as $project)
          <tr>
            <td>{{$project->title}}</td>
            <td>{{$project->slug}}</td>
            <td>
              <a href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-magnifying-glass"></i></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <em>Nessun progetto per questa tipologia</em>
  @endif

  <div class="mt-5">
    <a href="{{route('admin.types.index')}}">Torna all'elenco di tutte le tipologie</a>
  </div>
  
</div>
@endsection