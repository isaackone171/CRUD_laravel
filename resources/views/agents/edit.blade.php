@extends('layouts.app')

@section('content')
    <h2 class="mb-3">Modifier l'agent</h2>

    <div class="card card-body">
        <form action="{{ route('agents.update', $agent) }}" method="POST">
            @csrf
            @method('PUT')
            @include('agents.form')

            <div class="mt-4">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
                <a href="{{ route('agents.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection