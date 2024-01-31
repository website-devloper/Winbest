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

    .gerant-list {
    display: flex;
    flex-wrap: wrap;
}

.gerant-card {
    border: 1px solid #ccc;
    border-radius: 8px;
    margin: 10px;
    padding: 15px;
    width: 300px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.gerant-card:hover {
    transform: translateY(-5px);
}

.details-list {
    list-style: none;
    padding: 0;
}

.details-list li {
    margin-bottom: 8px;
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
    

    
        
        @if($societe->gerantsInfo->isNotEmpty())
        <a href="{{ route('societes.index') }}" class="btn btn-primary">Retour</a>
        <h4>Les Gerants lies a la Societe <span style="color: rgb(4, 18, 102)">{{ $S->name }} :</span></h4>
        <div class="gerant-list">

            @foreach($societe->gerantsInfo as $gerant)
                <div class="gerant-card">
                    <h5>Gerant #{{ $loop->index + 1 }}</h5>
                    <div class="details-section">
                        <ul class="details-list">
                            <li><strong>Full Name:</strong> {{ $gerant->fullName }}</li>
                            <li><strong>Email:</strong> {{ $gerant->email }}</li>
                            <li><strong>N° CIN:</strong> {{ $gerant->cin }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        @else
            <h4> desole! Il n'y a pas de gerants lie a cette societe</h4>
        @endif
    </div>
</div>




@endsection