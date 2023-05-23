@extends('layouts/admin')

@section('content')
<h3>Aggiungi un Progetto</h3>
<div class="container p-5">
  <form action="{{route('admin.projects.store')}}" method="POST">
    @csrf
  
    <div class="row mb-3">
      <label for="title">Titolo</label>
      <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title')}}">
      {{-- espongo messaggio di errore --}}
      @error('title')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  
    <div class="row mb-3">
      <label for="content">Descrizione</label>
      <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{old('content')}}</textarea>
      @error('content')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  
    <div class="row mb-3">
      <label for="thumb">Immagine</label>
      <input class="form-control @error('thumb') is-invalid @enderror" type="text" id="thumb" name="thumb" value="{{old('thumb')}}">
      {{-- espongo messaggio di errore --}}
      @error('thumb')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  
    <div class="row mb-3">
      <label for="languages">Linguaggi</label>
      <input class="form-control @error('languages') is-invalid @enderror" type="text" id="languages" name="languages" value="{{old('languages')}}">
      {{-- espongo messaggio di errore --}}
      @error('languages')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="row mb-3">
      <label for="type_id">Tipologia</label>
      <select name="type_id" class="form-select @error('type_id') is-invalid @enderror" type="text" id="type_id" value="{{old('type_id')}}">
        <option value="">Nessuna</option>
        @foreach($types as $type)
          <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->name}}</option>
        @endforeach
      </select>
      {{-- espongo messaggio di errore --}}
      @error('type_id')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  
    <div class="row mb-3">
      <label for="repo">Repository</label>
      <input class="form-control @error('repo') is-invalid @enderror" type="text" id="repo" name="repo" value="{{old('repo')}}">
      {{-- espongo messaggio di errore --}}
      @error('repo')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  
    <div class="button-section mt-5">
      <button class="btn btn-secondary" type="submit">Aggiungi!</button>
    </div>
  </form>

</div>

@endsection