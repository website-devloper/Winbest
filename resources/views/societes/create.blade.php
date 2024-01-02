@extends('layouts.user_type.auth')

@section('content')

<div class="card mb-4 mx-4">
    <div style="background-color: rgb(4, 18, 102)" class="alert  mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete you can use all functional!</strong> 
        </span>
    </div>

    <div class="card-header">
        <h5 class="mb-0">Ajouter Société </h5>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('societes.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"> nom de Société</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"> Form Juridique</label>
                <input type="text" class="form-control" id="formes_juridique" name="formeJuri" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"> Siege Social</label>
                <input type="text" class="form-control" id="cin" name="siegeSocial" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">   Capital</label>
                <input type="text" class="form-control" id="cin" name="capital" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">  Activite Principale</label>
                <input type="text" class="form-control" id="activite_principal" name="activiteprincipal" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"> RC</label>
                <input type="number" class="form-control" id="rc" name="RC" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"> Patente</label>
                <input type="number" class="form-control" id="patente" name="patente" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"> IF</label>
                <input type="number" class="form-control" id="if" name="IF" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"> CNSS</label>
                <input type="number" class="form-control" id="cnss" name="CNSS" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"> ICE</label>
                <input type="number" class="form-control" id="ice" name="ICE" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"> RIB</label>
                <input type="text" class="form-control" id="rib" name="RIB" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Date D'exploitation</label>
                <input type="date" class="form-control" id="date_exploitation" name="dateexploitation" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date De Début D'exploitation Activité
                </label>
                <input type="date" class="form-control" id="date_debut_exploitation" name="dateDbDexploitatiion" required>
            </div>
            

            <button type="submit" class="btn btn-primary">Ajouter une Société</button>
        </form>
    </div>
</div>

@endsection