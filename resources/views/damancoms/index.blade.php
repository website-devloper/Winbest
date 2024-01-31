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

@section('content')
<div style="margin-top:-80;" class="search-container ">
    <form class="search-form" method="get" action="{{ route('damancoms.search') }}">
        <div class="ms-md-3 pe-md-3 d-flex align-items-center">
            <div style="margin-right: 25px" class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input style="background-color: rgb(255, 255, 255) "  type="text" class="form-control1" placeholder="Type here..." 
                name="search"  value="{{ request('search') }}">
            </div>
        </div>
    </form>
</div>

@if(Session::has('toastrNotification'))
    @php
        $notification = Session::get('toastrNotification');
    @endphp

    <script>
        toastr.{{ $notification['type'] }}("{{ $notification['message'] }}");
    </script>
@endif
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
                            <h5 class="mb-0">Touts Damancoms</h5>
                        </div>
                        
                        <a style="background-color:#00FFFF" href="{{ route('damancoms.create') }}" class="btn btn-sm mb-0 p-2" type="button">Nouveaux Damancom</a>
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
                                
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Login
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Password
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        societe
                                    </th>
                                    
                                    
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($damancoms as $damancom)
                                    <tr >
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $damancom->id }}</p>
                                        </td>
                                        
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $damancom->login }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $damancom->password }}</p>
                                        </td>
                                       

                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $damancom->societe->name}}</p>
                                        </td>

                                        <td class="text-center d-flex align-items-center">
    <a style="color:#1cd09d" href="{{ route('damancoms.edit', $damancom->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit damancom">
        <i style="color:#1cd09d" class="fas fa-user-edit"></i>
    </a>

    <form data-bs-toggle="tooltip" data-bs-original-title="destroy damancom" action="{{ route('damancoms.destroy', $damancom->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;" onclick="return confirm('Are you sure?')">
            <i style="color: red" class="fas fa-trash-alt"></i>
        </button>
    </form>
</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $damancoms->links('vendor.pagination.default') }}

    </div>
    @endif










    <div>
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
                            <h5 class="mb-0">Touts Damancoms</h5>
                        </div>
                        <a style="background-color:#00FFFF" href="{{ route('damancoms.create') }}" class="btn btn-sm mb-0" type="button">+&nbsp; Nouveau Damancom</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder ">
                                        ID
                                    </th>
                                
                                    <th class="text-center text-uppercase text-secondary text-4rem font-weight-bolder ">
                                        Login
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                        Password
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                        societe
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($damancoms as $damancom)
                                <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0" onclick="copyText('id_{{ $damancom->id }}')">{{ $damancom->id }}</p>
                    </td>
                    
                    <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0" onclick="copyText('login_{{ $damancom->id }}')">{{ $damancom->login }}</p>
                    </td>
                    <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0" onclick="copyText('password_{{ $damancom->id }}')">{{ $damancom->password }}</p>
                    </td>
                    <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0" onclick="copyText('societe_{{ $damancom->id }}')">{{ $damancom->societe->name}}</p>
                    </td>
                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $damancoms->links('vendor.pagination.default') }}

    </div>
    @endif
    <script>
        function copyText(elementId) {
            var element = document.getElementById(elementId);
            var textToCopy = element.innerText;

            navigator.clipboard.writeText(textToCopy)
                .then(function() {
                    console.log('Text successfully copied to clipboard');
                })
                .catch(function(err) {
                    console.error('Unable to copy text to clipboard', err);
                });
        }
    </script>
    <div>
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
                            <h5 class="mb-0">Touts Damancoms</h5>
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
                                
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Login
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Password
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        societe
                                    </th>
                                    
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($damancoms as $damancom)
                                    <tr >
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $damancom->id }}</p>
                                        </td>
                                        
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $damancom->login }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $damancom->password }}</p>
                                        </td>
                                       

                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $damancom->societe->name}}</p>
                                        </td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $damancoms->links('vendor.pagination.default') }}

    </div>
    @endif

</div>
   


@endsection