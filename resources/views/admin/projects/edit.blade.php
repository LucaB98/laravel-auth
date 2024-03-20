@extends('layouts.app')

@section('title', 'Modifica Projects')

@section('content')

  <header>
    <h1>Modifica Progetto</h1>
  </header>
  <hr>
 @include('includes.projects.form')
@endsection

@section('scripts')
 @vite('resources/js/preview.js')
@endsection

