@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des agents</h2>
        <a href="{{ route('agents.create') }}" class="btn btn-primary">+ Ajouter un agent</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Departement</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($agents as $agent)
                        <tr>
                            <td>{{ $agent->nom }}</td>
                            <td>{{ $agent->prenom }}</td>
                            <td>{{ $agent->departement }}</td>
                            <td>{{ $agent->telephone }}</td>
                            <td>{{ $agent->email}}</td>
                            <td class="text-end">
                                <a href="{{ route('agents.edit', $agent) }}" class="btn btn-sm btn-warning">Modifier</a>

                                <form action="{{ route('agents.destroy', $agent) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Supprimer cet agent ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Aucun agent enregistré.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $agents->links() }}
    </div>
@endsection