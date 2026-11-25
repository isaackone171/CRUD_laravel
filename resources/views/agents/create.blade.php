@extends('layouts.app')

@section('content')
    <h2 class="mb-3">Ajouter un agent</h2>

    <div class="card card-body">
        <form action="{{ route('agents.store') }}" method="POST">
            @csrf
            @include('agents.form')

            <div class="mt-4">
                <button type="submit" class="btn btn-success">Enregistrer</button>
                <a href="{{ route('agents.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection