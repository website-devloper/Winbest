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
        <span class="text-white">
            <strong>Add, Edit, Delete you can use all functional!</strong> 
        </span>
    </div>


 

<div class="container">
<a href="{{route('gerants.index')}}"><button type="submit" class="btn btn-primary">Back</button></a>

    <div class="details-section">
        <h4>Employee Information:</h4>
        <ul class="details-list row">
            <div class="col-md-4"><li><strong>Full Name:</strong> {{$gerant->fullName}}</li></div>
            <div class="col-md-4"><li><strong>Email:</strong> {{$gerant->email}}</li></div>
            <div class="col-md-4"><li><strong>Ncin:</strong> {{$gerant->cin}}</li></div>
            
            
            
        </ul>
    </div>

    <div class="details-section">
        <h4>Societe Information:</h4>
        <ul class="details-list row">
            <li class="col-md-4"><strong>Societe Name:</strong> {{$gerant->societe->name}}</li>
            <li class="col-md-4"><strong>Forme Juridique:</strong> {{$gerant->societe->formeJuri}}</li>
            <li class="col-md-4"><strong>Siege Social:</strong> {{$gerant->societe->siegeSocial}}</li>
            <li class="col-md-4"><strong>Capital:</strong> {{$gerant->societe->capital}}</li>
            <li class="col-md-4"><strong>Activite Principal:</strong> {{$gerant->societe->activiteprincipal}}</li>
            <li class="col-md-4"><strong>RC:</strong> {{$gerant->societe->RC}}</li>
            <li class="col-md-4"><strong>Patente:</strong> {{$gerant->societe->patente}}</li>
            <li class="col-md-4"><strong>IF:</strong> {{$gerant->societe->IF}}</li>
            <li class="col-md-4"><strong>CNSS:</strong> {{$gerant->societe->CNSS}}</li>
            <li class="col-md-4"><strong>ICE:</strong> {{$gerant->societe->ICE}}</li>
            <li class="col-md-4"><strong>RIB:</strong> {{$gerant->societe->RIB}}</li>
            <li class="col-md-4"><strong>Date Exploitation:</strong> {{$gerant->societe->dateexploitation}}</li>
            <li class="col-md-4"><strong>Date DbDexploitation:</strong> {{$gerant->societe->dateDbDexploitatiion}}</li>
        </ul>
    </div>

    <div class="details-section">
        <h4>Damancom Information:</h4>
        <ul class="details-list row">
            <li class="col-md-4"><strong>Login:</strong> ----------</li>
            <li class="col-md-4"><strong>Password:</strong> ----------</li>
        </ul>
    </div>

    <div class="details-section">
        <h4>Impots Information:</h4>
        <ul class="details-list row">
            <li class="col-md-4"><strong>Login:</strong> ----------</li>
            <li class="col-md-4"><strong>Password:</strong> ----------</li>
        </ul>
    </div>

    <div class="details-section">
        <h4>CIMR Information:</h4>
        <ul class="details-list row">
            <li class="col-md-4"><strong>Login:</strong> ----------</li>
            <li class="col-md-4"><strong>Password:</strong> ----------</li>
        </ul>
    </div>

    <div class="details-section">
        <h4>Regus Information:</h4>
        <ul class="details-list row">
            <li class="col-md-4"><strong>Login:</strong> ----------</li>
            <li class="col-md-4"> <strong>Password:</strong> ----------</li>
        </ul>
    </div>
</div>



@endsection
