@extends('layouts/admin')

@section('content')
<main class="create">
  <div class="container">
    <form action="{{route('admin.types.update', $type)}}" method="POST">
      @csrf

      {{-- inserisco il metodo PUT --}}
      @method('PUT')
  
    <div class="row mb-3">
      <label for="name">Titolo</label>
      <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name') ?? $type->name}}">
      {{-- espongo messaggio di errore --}}
      @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  
    <div class="row mb-3">
      <label for="description">Descrizione</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description') ?? $type->description}}</textarea>
      @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
  
    <div class="button-section mt-5">
      <button class="btn btn-secondary" type="submit">Salva modifiche</button>
    </div>
    </form>
  </div>
</main>
@endsection