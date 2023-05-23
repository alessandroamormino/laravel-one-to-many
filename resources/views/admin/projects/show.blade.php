@extends('layouts/admin')

@section('content')

<ul class="navbar-nav ml-auto">
  <!-- Authentication Links -->
  @guest
  <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
  </li>
  @if (Route::has('register'))
  <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
  </li>
  @endif
  @else
  <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }}
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('admin.dashboard.home')}}">{{__('Dashboard')}}</a>
          <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
      </div>
  </li>
  @endguest
</ul>

<div class="main">
  <h1>{{$project->title}}</h1>
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