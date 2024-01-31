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
        display: block;
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

<a href="{{route('societes.index')}}"><button type="submit" class="btn btn-primary">Back</button></a>



    <div class="details-section">
        <h4>Les Informations de societe:</h4>
        <ul class="details-list row">
            <li class="col-md-4"><strong>Societe Name:</strong> {{$societe->name}}</li>
            <li class="col-md-4"><strong>Forme Juridique:</strong> {{$societe->formeJuri}}</li>
            <li class="col-md-4"><strong>Siege Social:</strong> {{$societe->siegeSocial}}</li>
            <li class="col-md-4"><strong>Capital:</strong> {{$societe->capital}}</li>
            <li class="col-md-4"><strong>Activite Principal:</strong> {{$societe->activiteprincipal}}</li>
            <li class="col-md-4"><strong>RC:</strong> {{$societe->RC}}</li>
            <li class="col-md-4"><strong>Patente:</strong> {{$societe->patente}}</li>
            <li class="col-md-4"><strong>IF:</strong> {{$societe->IF}}</li>
            <li class="col-md-4"><strong>CNSS:</strong> {{$societe->CNSS}}</li>
            <li class="col-md-4"><strong>ICE:</strong> {{$societe->ICE}}</li>
            <li class="col-md-4"><strong>RIB:</strong> {{$societe->RIB}}</li>
            <li class="col-md-4"><strong>Date Exploitation:</strong> {{$societe->dateexploitation}}</li>
            <li class="col-md-4"><strong>Date DbDexploitation:</strong> {{$societe->dateDbDexploitatiion}}</li>
        </ul>
    </div>

    <div class="details-section">
    
        <h4>Les Informations de damancom:</h4>
        <ul class="details-list row">
            <li class="col-md-4"><strong>Login:</strong> {{$damancomInfo->login}}<li>
            <li class="col-md-4"><strong>Password:</strong> {{$damancomInfo->password}}<li>
        </ul>
    </div>

    <div class="details-section">
        <h4>Les Informations de Impot:</h4>
        <ul class="details-list row">
            <li class="col-md-4"><strong>Login:</strong> {{$impotInfo->login}}</li>
            <li class="col-md-4"><strong>Password:</strong> {{$impotInfo->password}}</li>
        </ul>
    </div>

    <div class="details-section">
        <h4>Les Informations de Cimr:</h4>
        <ul class="details-list row">
            <li class="col-md-4"><strong>Login:</strong> {{$cimrInfo->login}}<li>
            <li class="col-md-4"><strong>Password:</strong> {{$cimrInfo->password}}<li>
        </ul>
    </div>

    <div class="details-section">
        <h4>Les Informations de regus:</h4>
        <ul class="details-list row">
            <li class="col-md-4"><strong>Login:</strong> {{$regusInfo->login}}</li>
            <li class="col-md-4"> <strong>Password:</strong> {{$regusInfo->password}}</li>
        </ul>
    </div>
</div>



@endsection