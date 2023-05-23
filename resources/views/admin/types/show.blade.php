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

  <div class="button-section">
    
      {{-- Aggiungo un bottone per modificare il progetto --}}
      <button class="btn"><a href="{{route('admin.types.edit', $type)}}">Modifica Tipologia</a></button>
    
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-danger rounded-0" data-bs-toggle="modal" data-bs-target="#deleteType">
        Cancella Tipologia
      </button>
    
      <!-- Modal -->
      <div class="modal fade" id="deleteType" tabindex="-1" aria-labelledby="deleteTypeLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Cancella Tipologia</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Sei sicuro di voler cancellare la tipologia? 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
              <form action="{{route('admin.types.destroy', $type)}}" method="POST">
                @csrf
                @method('DELETE')
      
                <button type="submit" class="btn btn-danger">Elimina</button>
              </form>
            </div>
          </div>
        </div>
      </div>

  </div>

  <div class="mt-5">
    <a href="{{route('admin.types.index')}}">Torna all'elenco di tutte le tipologie</a>
  </div>
  
</div>
@endsection