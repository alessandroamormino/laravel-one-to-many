@extends('layouts/admin')

@section('content')

<div class="main">
  <h1>{{$project->title}}</h1>
  <h6>Tipologia: {{$project->type?->name}}</h6>
  <hr>
  <p>
    Descrizione: {{$project->content}}
  </p>
  <div class="mt-2">Link immagine: {{$project->thumb}}</div>
  <div class="mt-2">Linguaggi: {{$project->languages}}</div>
  <div class="mt-2">Repo: {{$project->repo}}</div>

  {{-- Aggiungo un bottone per modificare il progetto --}}
  <button class="btn"><a href="{{route('admin.projects.edit', $project)}}">Modifica Progetto</a></button>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-danger rounded-0" data-bs-toggle="modal" data-bs-target="#deleteProject">
    Cancella Progetto
  </button>

  <!-- Modal -->
  <div class="modal fade" id="deleteProject" tabindex="-1" aria-labelledby="deleteProjectLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Cancella Progetto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sei sicuro di voler cancellare il progetto? 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
          <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
            @csrf
            @method('DELETE')
  
            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-5">
    <a href="{{route('admin.projects.index')}}">Torna all'elenco dei prodotti</a>
  </div>
  
</div>
@endsection