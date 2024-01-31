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
        <h5 class="mb-0">Editer Sociéte</h5>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('societes.update', $societe->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nom de Société </label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $societe->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"> Form Juridique</label>
                <input type="text" class="form-control" id="email" name="formeJuri" value="{{ $societe->formeJuri }}" required>
            </div>
            <div class="mb-3">
                <label for="cin" class="form-label">  Siege Social</label>
                <input type="text" class="form-control" id="cin" name="siegeSocial" value="{{ $societe->siegeSocial }}" required>
            </div>
            <div class="mb-3">
                <label for="cin" class="form-label">  Capital</label>
                <input type="text" class="form-control" id="cin" name="capital" value="{{ $societe->capital }}" required>
            </div>
           
            <div class="mb-3">
                <label for="cin" class="form-label">   Activite Principale</label>
                <input type="text" class="form-control" id="activite_principal" name="activiteprincipal" value="{{ $societe->activiteprincipal }}" required>
            </div>
            <div class="mb-3">
                <label for="cin" class="form-label">    RC</label>
                <input type="number" class="form-control" id="cin" name="RC" value="{{ $societe->RC }}" required>
            </div>
            <div class="mb-3">
                <label for="cin" class="form-label">    Patente</label>
                <input type="number" class="form-control" id="cin" name="patente" value="{{ $societe->patente }}" required>
            </div>
            <div class="mb-3">
                <label for="cin" class="form-label">IF</label>
                <input type="number" class="form-control" id="if" name="IF" value="{{ $societe->IF }}" required>
            </div>
            <div class="mb-3">
                <label for="cin" class="form-label">     CNSS</label>
                <input type="number" class="form-control" id="cnss" name="CNSS" value="{{ $societe->CNSS }}" required>
            </div>
            <div class="mb-3">
                <label for="cin" class="form-label">    ICE</label>
                <input type="number" class="form-control" id="ice" name="ICE" value="{{ $societe->ICE }}" required>
            </div>
            <div class="mb-3">
                <label for="cin" class="form-label">    RIB</label>
                <input type="number" class="form-control" id="RIB" name="RIB" value="{{ $societe->RIB }}" required>
            </div>
            <div class="mb-3">
                <label for="cin" class="form-label">  Date D'exploitation</label>
                <input type="date" class="form-control" id="cin" name="dateexploitation" value="{{ $societe->dateexploitation }}" required>
            </div>
            <div class="mb-3">
                <label for="cin" class="form-label">  Date De Début D'exploitation Activité</label>
                <input type="date" class="form-control" id="cin" name="dateDbDexploitatiion" value="{{ $societe->dateDbDexploitatiion }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Modifier Société</button>
        </form>
    </div>
</div>

@endsection