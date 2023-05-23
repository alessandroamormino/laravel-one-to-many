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

<h3>Tutti i progetti</h3>

<table class="table table-dark ">
  <thead>
    <th>Titolo</th>
    <th>Contenuto</th>
    <th>Slug</th>
    <th>Immagine</th>
    <th>Linguaggi</th>
    <th>Repo</th>
    <th>Dettaglio</th>
  </thead>

  <tbody>

    @foreach($projects as $project)
    <tr>
      <td>{{$project->title}}</td>
      <td>{{$project->content}}</td>
      <td>{{$project->slug}}</td>
      <td>{{$project->thumb}}</td>
      <td>{{$project->languages}}</td>
      <td>{{$project->repo}}</td>
      <td><a href="{{route('admin.projects.show', $project->slug)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
    </tr>
    @endforeach


  </tbody>
</table>

<button class="btn">
  <a href="{{route('admin.projects.create')}}">Aggiungi Progetto</a>
</button>

@endsection