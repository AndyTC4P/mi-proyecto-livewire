@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Mis CVs</h1>
        
        @foreach($cvs as $cv)
            <div class="border p-4 mb-4 rounded">
                <h2 class="text-lg font-semibold">{{ $cv->nombre }} {{ $cv->apellido }}</h2>
                <p>{{ $cv->experiencia }}</p>
                <p class="text-sm">{{ $cv->publico ? '📢 Público' : '🔒 Privado' }}</p>
            </div>
        @endforeach
    </div>
@endsection
