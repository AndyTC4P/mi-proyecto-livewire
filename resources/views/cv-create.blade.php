@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Crea tu CV</h1>
        @livewire('cv-form')
    </div>
@endsection
