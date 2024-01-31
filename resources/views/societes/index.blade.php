@extends('layouts.user_type.auth')

@section('content')

<style>
.search-container {
        margin-top: -120px;
        text-align: center;
    }

    .search-form {
        display: flex;
        justify-content: center;
    }

    .input-group {
        margin-right: 25px;
        display: flex;
        align-items: center;
    }

    .input-group-text {
        background-color: rgb(255, 255, 255);
        border: none;
        color: #555;
    }

    .form-control1 {
        background-color: rgb(255, 255, 255);
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 8px;
        font-size: 14px;
    }

    .form-control1:focus {
        outline: none;
        border-color: #1cd09d; 
    }

    .search-btn {
        background-color: #1cd09d;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 8px 15px;
        font-size: 14px;
        cursor: pointer;
    }

    .search-btn:hover {
        background-color: #0bb289; 
    }


 
    @media (max-width: 720px) {
    .text-center-500 {
        margin-top: 200px; 
    }

    .search-form {
        margin-top: 60px;  
    }

    .input-group {
        width:100%;
    }

    .form-control1 {
        background-color: rgb(255, 255, 255);
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        
    }
    
}
</style>

<body>

@section('content')
<div style="margin-top:-80;" class="search-container ">
    <form class="search-form" method="get" action="{{ route('societes.search') }}">
        <div class="ms-md-3 pe-md-3 d-flex align-items-center">
            <div style="margin-right: 25px" class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input style="background-color: rgb(255, 255, 255) "  type="text" class="form-control1" placeholder="Type here..." 
                name="search"  value="{{ request('search') }}">
            </div>
        </div>
    </form>
</div>

</div>


<br/>
@if(Session::has('toastrNotification'))
    @php
        $notification = Session::get('toastrNotification');
    @endphp

    <script>
        toastr.{{ $notification['type'] }}("{{ $notification['message'] }}");
    </script>
@endif
<div>
    @if(session('role')==='super-admin')
    <div style="background-color: rgb(4, 18, 102)" class="alert  mx-4" role="alert">
        <span class="text-white">
            <strong>Ajouter, Modifiér, Supprimer tu peux faire tous les fonctionalités!</strong> 
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Tous Les Sociétés</h5>
                        </div>
                        <a style="background-color:#00FFFF" href="{{ route('societes.create') }}" class="btn btn-sm mb-0" type="button"> New Societe</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                        ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Avatar
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Nom de Société 
                                    </th>
                                   
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Form Juridique
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Siege Social
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                     Capital
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Activite Principale
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      RC
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                       Patente
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                       IF
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        CNSS
                                     </th>
                                     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ICE
                                     </th>
                                     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         RIB
                                      </th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Num associe
                                      </th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Num gerant
                                      </th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date D'exploitation
                                     </th>
                                     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Date De Début D'exploitation Activité
                                      </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Date De Creation
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($societes as $societe)
                                    <tr>
                                        <td class="ps-4" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                            <p class="text-xs font-weight-bold mb-0">{{ $societe->id }}</p>
                                        </td>
                                        <td onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                            <div class="avatar avatar-sm me-3" style="background-color: #{{ substr(md5($societe->name), 0, 6) }}; border-radius: 50%; display: flex; align-items: center; justify-content: center; width: 30px; height: 30px;">
                                                <span style="color: white; font-size: 14px;">{{ strtoupper(substr($societe->name, 0, 1)) }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                            <p class="text-xs font-weight-bold mb-0">{{ $societe->name }}</p>
                                        </td>
                                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                            <p class="text-xs font-weight-bold mb-0">{{ $societe->formeJuri }}</p>
                                        </td>
                                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                     
                                        <p class="text-xs font-weight-bold mb-0">{{ $societe->siegeSocial }}</p>
                                   
                                        </td>
                                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                                            <p class="text-xs font-weight-bold mb-0">{{ $societe->capital }}</p>
                                    </td>
                                    <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                                        <p class="text-xs font-weight-bold mb-0">{{ $societe->activiteprincipal }}</p>
                                </td>
                                <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                                    <p class="text-xs font-weight-bold mb-0">{{ $societe->RC }}</p>
                            </td>
                            <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                                <p class="text-xs font-weight-bold mb-0">{{ $societe->patente }}</p>
                        </td>
                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                            <p class="text-xs font-weight-bold mb-0">{{ $societe->IF }}</p>
                    </td>
                    <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                        <p class="text-xs font-weight-bold mb-0">{{ $societe->CNSS }}</p>
                </td>
                <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                    <p class="text-xs font-weight-bold mb-0">{{ $societe->ICE }}</p>
            </td>
            <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                <p class="text-xs font-weight-bold mb-0">{{ $societe->RIB }}</p>
        </td>
        <td class="text-center" onclick="window.location.href='{{ route('societes.showAss', $societe->id) }}';" style="cursor: pointer;">
                                         
                <p class="text-xs font-weight-bold mb-0">{{ $societe->nbrAss }}</p>
        </td>
        <td class="text-center" onclick="window.location.href='{{ route('societes.showGer', $societe->id) }}';" style="cursor: pointer;">
                                         
                <p class="text-xs font-weight-bold mb-0">{{ $societe->nbrGer }}</p>
        </td>
        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
            <p class="text-xs font-weight-bold mb-0">{{ $societe->dateexploitation }}</p>
    </td>
    <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
        <p class="text-xs font-weight-bold mb-0">{{ $societe->dateDbDexploitatiion }}</p>
</td>
        
<td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
    <span class="text-secondary text-xs font-weight-bold">{{ $societe->created_at->format('d/m/y') }}</span>
</td>        
                                        
                                        
                                        
                                       
<td class="text-center">
    <a style="color: #1cd09d" href="{{ route('societes.edit', $societe->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit société">
        <i style="color: #1cd09d" class="fas fa-user-edit"></i>
    </a>

    <form data-bs-toggle="tooltip" data-bs-original-title="Destroy société" action="{{ route('societes.destroy', $societe->id) }}" method="post" style="display: inline-block;">
        @csrf
        @method('DELETE')

        <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
            <i style="color: red" onclick="return confirm('Are you sure?')" class="fas fa-trash-alt"></i>
        </button>
    </form>

    <a href="{{ route('societes.show', $societe->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Details société">
        <i class="fas fa-info-circle text-info"></i>
    </a>
</td>
</tr> @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $societes->links('vendor.pagination.default') }}

    </div>
    @endif








    @if(session('role')==='admin')
    <div style="background-color: rgb(4, 18, 102)" class="alert  mx-4" role="alert">
        <span class="text-white">
            <strong>Tu peut Seulement Ajouter </strong> 
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Tous Les Sociétés</h5>
                        </div>
                        <a style="background-color:#00FFFF" href="{{ route('societes.create') }}" class="btn btn-sm mb-0" type="button">+&nbsp; New Societe</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-black fw-bolder fs-5">
                                        ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Avatar
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Nom de Société 
                                    </th>
                                   
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Form Juridique
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Siege Social
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                     Capital
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Activite Principale
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      RC
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                       Patente
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                       IF
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        CNSS
                                     </th>
                                     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ICE
                                     </th>
                                     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         RIB
                                      </th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Num associe
                                      </th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Num gerant
                                      </th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date D'exploitation
                                     </th>
                                     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Date De Début D'exploitation Activité
                                      </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Date De Creation
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($societes as $societe)
                                    <tr>
                                        <td class="ps-4" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                            <p class="text-xs font-weight-bold mb-0">{{ $societe->id }}</p>
                                        </td>
                                        <td onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                            <div class="avatar avatar-sm me-3" style="background-color: #{{ substr(md5($societe->name), 0, 6) }}; border-radius: 50%; display: flex; align-items: center; justify-content: center; width: 30px; height: 30px;">
                                                <span style="color: white; font-size: 14px;">{{ strtoupper(substr($societe->name, 0, 1)) }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                            <p class="text-xs font-weight-bold mb-0">{{ $societe->name }}</p>
                                        </td>
                                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                            <p class="text-xs font-weight-bold mb-0">{{ $societe->formeJuri }}</p>
                                        </td>
                                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                     
                                        <p class="text-xs font-weight-bold mb-0">{{ $societe->siegeSocial }}</p>
                                   
                                        </td>

                                      
                                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                                            <p class="text-xs font-weight-bold mb-0">{{ $societe->capital }}</p>
                                    </td>
                                    <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                                        <p class="text-xs font-weight-bold mb-0">{{ $societe->activiteprincipal }}</p>
                                </td>
                                <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                                    <p class="text-xs font-weight-bold mb-0">{{ $societe->RC }}</p>
                            </td>
                            <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                                <p class="text-xs font-weight-bold mb-0">{{ $societe->patente }}</p>
                        </td>
                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                            <p class="text-xs font-weight-bold mb-0">{{ $societe->IF }}</p>
                    </td>
                    <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                        <p class="text-xs font-weight-bold mb-0">{{ $societe->CNSS }}</p>
                </td>
                <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                    <p class="text-xs font-weight-bold mb-0">{{ $societe->ICE }}</p>
            </td>
            <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                <p class="text-xs font-weight-bold mb-0">{{ $societe->RIB }}</p>
        </td>
        <td class="text-center" onclick="window.location.href='{{ route('societes.showAss', $societe->id) }}';" style="cursor: pointer;" >
                                         
                <p class="text-xs font-weight-bold mb-0">{{ $societe->nbrAss }}</p>
        </td>
        <td class="text-center" onclick="window.location.href='{{ route('societes.showGer', $societe->id) }}';" style="cursor: pointer;">
                                         
                <p class="text-xs font-weight-bold mb-0">{{ $societe->nbrGer }}</p>
        </td>
        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
            <p class="text-xs font-weight-bold mb-0">{{ $societe->dateexploitation }}</p>
    </td>
    <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
        <p class="text-xs font-weight-bold mb-0">{{ $societe->dateDbDexploitatiion }}</p>
</td>
        
<td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
    <span class="text-secondary text-xs font-weight-bold">{{ $societe->created_at->format('d/m/y') }}</span>
</td>        
                                        
                                        
                                        
                                       
<td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
    <a href="{{ route('societes.show', $societe->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Details société">
        <i class="fas fa-info-circle text-info"></i>
    </a>
</td>
</tr> @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $societes->links('vendor.pagination.default') }}

    </div>
    @endif
</div>














@if(session('role')==='gerant' || session('role')==='associe')
    <div style="background-color: rgb(4, 18, 102)" class="alert  mx-4" role="alert">
        <span class="text-white">
            <strong>Tu peut Seulement voir Les donnees</strong> 
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Tous Les Sociétés</h5>
                        </div>
        
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Avatar
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Nom de Société 
                                    </th>
                                   
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Form Juridique
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Siege Social
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                     Capital
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Activite Principale
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      RC
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                       Patente
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                       IF
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        CNSS
                                     </th>
                                     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ICE
                                     </th>
                                     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         RIB
                                      </th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Num associe
                                      </th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Num gerant
                                      </th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date D'exploitation
                                     </th>
                                     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Date De Début D'exploitation Activité
                                      </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Date De Creation
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($societes as $societe)
                                    <tr >
                                        <td class="ps-4" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                            <p class="text-xs font-weight-bold mb-0">{{ $societe->id }}</p>
                                        </td>
                                        <td onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                            <div class="avatar avatar-sm me-3" style="background-color: #{{ substr(md5($societe->name), 0, 6) }}; border-radius: 50%; display: flex; align-items: center; justify-content: center; width: 30px; height: 30px;">
                                                <span style="color: white; font-size: 14px;">{{ strtoupper(substr($societe->name, 0, 1)) }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                            <p class="text-xs font-weight-bold mb-0">{{ $societe->name }}</p>
                                        </td>
                                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                            <p class="text-xs font-weight-bold mb-0">{{ $societe->formeJuri }}</p>
                                        </td>
                                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                     
                                        <p class="text-xs font-weight-bold mb-0">{{ $societe->siegeSocial }}</p>
                                   
                                        </td>

                                      
                                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                                            <p class="text-xs font-weight-bold mb-0">{{ $societe->capital }}</p>
                                    </td>
                                    <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                                        <p class="text-xs font-weight-bold mb-0">{{ $societe->activiteprincipal }}</p>
                                </td>
                                <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                                    <p class="text-xs font-weight-bold mb-0">{{ $societe->RC }}</p>
                            </td>
                            <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                                <p class="text-xs font-weight-bold mb-0">{{ $societe->patente }}</p>
                        </td>
                        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                            <p class="text-xs font-weight-bold mb-0">{{ $societe->IF }}</p>
                    </td>
                    <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                        <p class="text-xs font-weight-bold mb-0">{{ $societe->CNSS }}</p>
                </td>
                <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                    <p class="text-xs font-weight-bold mb-0">{{ $societe->ICE }}</p>
            </td>
            <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
                <p class="text-xs font-weight-bold mb-0">{{ $societe->RIB }}</p>
        </td>
        <td class="text-center">
                                         
                <p class="text-xs font-weight-bold mb-0">{{ $societe->nbrAss }}</p>
        </td>
        <td class="text-center">
                                         
                <p class="text-xs font-weight-bold mb-0">{{ $societe->nbrGer }}</p>
        </td>
        <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
            <p class="text-xs font-weight-bold mb-0">{{ $societe->dateexploitation }}</p>
    </td>
    <td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
                                         
        <p class="text-xs font-weight-bold mb-0">{{ $societe->dateDbDexploitatiion }}</p>
</td>
        
<td class="text-center" onclick="window.location.href='{{ route('societes.show', $societe->id) }}';" style="cursor: pointer;">
    <span class="text-secondary text-xs font-weight-bold">{{ $societe->created_at->format('d/m/y') }}</span>
</td>        
                                        
                                        
                                        
                                       
<td class="text-center">
    <a href="{{ route('societes.show', $societe->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Details société">
        <i class="fas fa-info-circle text-info"></i>
    </a>
</td>
</tr> @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $societes->links('vendor.pagination.default') }}

    </div>
    @endif
</div>
</div>

@endsection