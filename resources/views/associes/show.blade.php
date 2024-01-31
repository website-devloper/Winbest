@extends('layouts.user_type.auth')

@section('content')
<style>
    .container {
        margin: 20px auto;
        max-width: 98%;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        background-color: #fff;
    }

    .details-section {
        margin-bottom: 20px;
    }

    .details-section h4 {
        color: #333;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    .details-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .details-list li {
        color: #666;
        line-height: 1.6;
        margin-bottom: 10px;
        display: block; /* Set display to block for vertical layout */
    }
</style>
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
@endif
    </div>

   

 

<div class="container">
<a href="{{route('associes.index')}}"><button type="submit" class="btn btn-primary">Retour</button></a>
    <div class="details-section">
        <h4>Les informations de employee:</h4>
        <ul class="details-list row">
            <div class="col-md-4"><li><strong>Full Name:</strong> {{$associe->fullName}}</li></div>
            <div class="col-md-4"><li><strong>Email:</strong> {{$associe->email}}</li></div>
            <div class="col-md-4"><li><strong>Ncin:</strong> {{$associe->cin}}</li></div>
            
            
            
        </ul>
    </div>

    <div class="details-section">
        <h4>Les Informations de Societe:</h4>
        <ul class="details-list row">
            <li class="col-md-4"><strong>Societe Name:</strong> {{$associe->societe->name}}</li>
            <li class="col-md-4"><strong>Forme Juridique:</strong> {{$associe->societe->formeJuri}}</li>
            <li class="col-md-4"><strong>Siege Social:</strong> {{$associe->societe->siegeSocial}}</li>
            <li class="col-md-4"><strong>Capital:</strong> {{$associe->societe->capital}}</li>
            <li class="col-md-4"><strong>Activite Principal:</strong> {{$associe->societe->activiteprincipal}}</li>
            <li class="col-md-4"><strong>RC:</strong> {{$associe->societe->RC}}</li>
            <li class="col-md-4"><strong>Patente:</strong> {{$associe->societe->patente}}</li>
            <li class="col-md-4"><strong>IF:</strong> {{$associe->societe->IF}}</li>
            <li class="col-md-4"><strong>CNSS:</strong> {{$associe->societe->CNSS}}</li>
            <li class="col-md-4"><strong>ICE:</strong> {{$associe->societe->ICE}}</li>
            <li class="col-md-4"><strong>RIB:</strong> {{$associe->societe->RIB}}</li>
            <li class="col-md-4"><strong>Date Exploitation:</strong> {{$associe->societe->dateexploitation}}</li>
            <li class="col-md-4"><strong>Date DbDexploitation:</strong> {{$associe->societe->dateDbDexploitatiion}}</li>
        </ul>
    </div>
</div>

@endsection
