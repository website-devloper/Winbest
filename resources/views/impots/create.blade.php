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
        <h5 class="mb-0">creer Nouveau Impot</h5>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('impots.store') }}">
            @csrf
           
            <div class="mb-3">
                <label for="email" class="form-label">Login</label>
                <input type="text" class="form-control" id="email" name="login" required>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Societe</label>
            <select class="form-select" id="Societe" name="societe_id" required>
                <option value="">Select Societe</option>
                @foreach($societes as $societe)

                <option value="{{ $societe->id }}">{{ $societe->name }} </option>
                   
             @endforeach
            </select>
        </div>

            <button type="submit" class="btn btn-primary">Create impot</button>
        </form>
    </div>
</div>

@endsection