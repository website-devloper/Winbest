<!-- resources/views/associes/edit.blade.php -->

@extends('layouts.user_type.auth')

@section('content')

<div class="card mb-4 mx-4">
    <div style="background-color: rgb(4, 18, 102)" class="alert  mx-4" role="alert">
    @if(session('role')==='super-admin')
        <span class="text-white">
        <strong>Ajouter, Modifiér, Supprimer tu peux faire tous les fonctionalités!</strong> 
        </span>
    </div>
@endif
@if(session('role')==='admin')
        <span class="text-white">
        <strong>Tu peut Seulement Ajouter </strong> 
        </span>
    </div>
@endif

@if(session('role')==='gerant' || session('role')==='associe')
        <span class="text-white">
        <strong>Tu peut Seulement voir Les donnees</strong> 
        </span>
    </div>
    </div>
@endif


    <div class="card-header">
        <h5 class="mb-0">Edit Associé</h5>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('associes.update', $associé->id) }}">
            @csrf
            @method('PUT') 

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $associé->fullName }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $associé->email }}" required>
            </div>
            <div class="mb-3">
                <label for="cin" class="form-label">N°cin</label>
                <input type="cin" class="form-control" id="cin" name="cin" value="{{ $associé->cin }}" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="user" {{ $associé->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="associé" {{ $associé->role === 'associé' ? 'selected' : '' }}>Associé</option>
                    <option value="gérant" {{ $associé->role === 'gérant' ? 'selected' : '' }}>Gérant</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="societe" class="form-label">Societe</label>
                <select class="form-select" id="societe" name="societe" required>
                <option value="">Select Company</option>

                @foreach($societes as $societe)

                    <option value="{{$societe->name}}">{{$societe->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mise a jour Associé</button>
        </form>
    </div>
</div>

@endsection
