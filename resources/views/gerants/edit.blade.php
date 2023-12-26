<!-- resources/views/associes/edit.blade.php -->

@extends('layouts.user_type.auth')

@section('content')

<div class="card mb-4 mx-4">
    <div style="background-color: rgb(4, 18, 102)" class="alert  mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete you can use all functional!</strong>
        </span>
    </div>

    <div class="card-header">
        <h5 class="mb-0">Edit gerants</h5>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('gerants.update', $gerant->id) }}">
            @csrf
            @method('PUT') 

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $gerant->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $gerant->email }}" required>
            </div>
            <div class="mb-3">
                <label for="cin" class="form-label">N°cin</label>
                <input type="cin" class="form-control" id="cin" name="cin" value="{{ $gerant->cin }}" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="user" {{ $gerant->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="gerant" {{ $gerant->role === 'gerant' ? 'selected' : '' }}>gerant</option>
                    <option value="gérant" {{ $gerant->role === 'gérant' ? 'selected' : '' }}>Gérant</option>
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

            <button type="submit" class="btn btn-primary">Update Gerant</button>
        </form>
    </div>
</div>

@endsection
