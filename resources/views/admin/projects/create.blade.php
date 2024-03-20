@extends('layouts.app')

@section('title', 'Crea Projects')

@section('content')

  <header>
    <h1>Nuovo Progetto</h1>
  </header>
  <hr>
  @include('includes.projects.form')
@endsection

@section('scripts')
 @vite('resources/js/preview.js')
@endsection

