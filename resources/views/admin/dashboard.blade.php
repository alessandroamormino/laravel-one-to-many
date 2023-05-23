@extends('layouts/admin')

@section('content')
<h1>Administration page</h1>
<hr>

<div class="_container">
  <a href="{{route('admin.projects.index')}}" class="card-section">
      <div class="_card">
          <h3>Progetti</h3>
          <img src="{{Vite::asset('resources/img/projects.png')}}" alt="Projects">
          <div class="text">
              In questa sezione vengono riportati tutti i progetti presenti sul sito.
              <br>
              <br>
              Clicca sulla card per la gestione.
          </div>
      </div>
  </a>
  <a href="{{route('admin.types.index')}}" class="card-section">
      <div class="_card">
          <h3>Tipologie</h3>
          <img src="{{Vite::asset('resources/img/types.png')}}" alt="Types">
          <div class="text">
              In questa sezione vengono riportate tutte le tipologie dei progetti.
              <br>
              <br>
              Clicca sulla card per la gestione.
          </div>
      </div>
  </a>
</div>
@endsection