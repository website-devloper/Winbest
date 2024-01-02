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
        <h5 class="mb-0">Edit Damancom</h5>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('damancoms.update', $damancom->id) }}">
            @csrf
            @method('PUT') 

            <div class="mb-3">
                <label for="identif" class="form-label">Identifiant</label>
                <input type="text" class="form-control" id="login" name="login" value="{{ $damancom->login }}" required>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Password</label>
              <input type="text" class="form-control" id="password" name="password" value="{{ $damancom->login }}" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Societe</label>
            <select class="form-select" id="societe_id" name="societe_id" required>
                    <option value="">Select Societe</option>
                    @foreach($societes as $societe)
                        
                            <option value="{{ $societe->id }}" {{ $damancom->societe_id == $societe->id ? 'selected' : '' }}>
                                {{ $societe->name }}
                            </option>
                    @endforeach
                </select>
        </div>

            <button type="submit" class="btn btn-primary">Update Damancom</button>
        </form>
    </div>
</div>

@endsection