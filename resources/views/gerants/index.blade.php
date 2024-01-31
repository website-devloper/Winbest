
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
    <form class="search-form " method="GET" action="{{ route('gerants.search') }}">
        <div class="ms-md-3 pe-md-3 d-flex align-items-center">
            <div style="margin-right: 25px" class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input style="background-color: rgb(255, 255, 255) "  type="text" class="form-control1" placeholder="Type here..." 
                name="search"  value="{{ request('search') }}">
            </div>
        </div>
    </form>
</div>

<div>
<div>
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
                            <h5 class="mb-0">All Gerants</h5>
                        </div>
                        <a style="background-color:#00FFFF" href="{{ route('gerants.create') }}" class="btn btn-sm mb-0" type="button">+&nbsp; New Gerant</a>
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
                                        FullName
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        N°cin
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Role
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Societe
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Creation Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gerants as $gerant)
                                    <tr onclick="window.location.href='{{ route('gerants.show', $gerant->id) }}';" style="cursor: pointer;">
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $gerant->id }}</p>
                                        </td>
                                        <td>
                                            <div class="avatar avatar-sm me-3" style="background-color: #{{ substr(md5($gerant->fullName), 0, 6) }}; border-radius: 50%; display: flex; align-items: center; justify-content: center; width: 30px; height: 30px;">
                                                <span style="color: white; font-size: 14px;">{{ strtoupper(substr($gerant->fullName, 0, 1)) }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $gerant->fullName }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $gerant->email }}</p>
                                        </td>
                                        <td class="text-center">
                                        @if ($gerant->cin)
                                        <p class="text-xs font-weight-bold mb-0">{{ $gerant->cin }}</p>
                                    @else
                                        <p class="text-xs font-weight-bold mb-0">---</p>
                                    @endif
                                        </td>

                                        <td class="text-center">
                                         
                                                <p class="text-xs font-weight-bold mb-0">{{ $gerant->role }}</p>
                                        </td>

                                        <td class="text-center">
    @if ($gerant->societe)
        <p class="text-xs font-weight-bold mb-0">{{ $gerant->societe->name }}</p>
    @else
        <p class="text-xs font-weight-bold mb-0">---</p>
    @endif
</td>
<td class="text-center" style="font-size:13px">

{{ date('d/m/Y', strtotime($gerant->created_at))  }}
</td >
<td class="text-center">
    <a style="color: #1cd09d" href="{{ route('gerants.edit',$gerant->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit associe">
        <i style="color: #1cd09d" class="fas fa-user-edit"></i>
    </a>

    <form data-bs-toggle="tooltip" data-bs-original-title="Destroy associe" action="{{ route('gerants.destroy', $gerant->id) }}" method="post" style="display: inline-block;">
        @csrf
        @method('DELETE')

        <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
            <i style="color: red" onclick="return confirm('Are you sure?')" class="fas fa-trash-alt"></i>
        </button>
    </form>

    <a href="{{ route('gerants.show', $gerant->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Details associe">
        <i class="fas fa-info-circle text-info"></i>
    </a>
    
</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $gerants->links('vendor.pagination.default') }}

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
                        <h5 class="mb-0">All Gerants</h5>
                    </div>
                    <a style="background-color:#00FFFF" href="{{ route('gerants.create') }}" class="btn btn-sm mb-0" type="button">+&nbsp; New Gerant</a>
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
                                    FullName
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Email
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    N°cin
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Role
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Societe
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Creation Date
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gerants as $gerant)
                                <tr onclick="window.location.href='{{ route('gerants.show', $gerant->id) }}';" style="cursor: pointer;">
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $gerant->id }}</p>
                                    </td>
                                    <td>
                                        <div class="avatar avatar-sm me-3" style="background-color: #{{ substr(md5($gerant->fullName), 0, 6) }}; border-radius: 50%; display: flex; align-items: center; justify-content: center; width: 30px; height: 30px;">
                                            <span style="color: white; font-size: 14px;">{{ strtoupper(substr($gerant->fullName, 0, 1)) }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $gerant->fullName }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $gerant->email }}</p>
                                    </td>
                                    <td class="text-center">
                                    @if ($gerant->cin)
                                    <p class="text-xs font-weight-bold mb-0">{{ $gerant->cin }}</p>
                                @else
                                    <p class="text-xs font-weight-bold mb-0">---</p>
                                @endif
                                    </td>

                                    <td class="text-center">
                                     
                                            <p class="text-xs font-weight-bold mb-0">{{ $gerant->role }}</p>
                                    </td>

                                    <td class="text-center">
@if ($gerant->societe)
    <p class="text-xs font-weight-bold mb-0">{{ $gerant->societe->name }}</p>
@else
    <p class="text-xs font-weight-bold mb-0">---</p>
@endif
</td>
<td class="text-center" style="font-size:13px">

{{ date('d/m/Y', strtotime($gerant->created_at))  }}
</td >
<td class="text-center">

<a href="{{ route('gerants.show', $gerant->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Details associe">
    <i class="fas fa-info-circle text-info"></i>
</a>

</td>       
 </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $gerants->links('vendor.pagination.default') }}

</div>
@endif











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
                        <h5 class="mb-0">Touts Gerants</h5>
                    </div>
                    <a style="background-color:#00FFFF" href="{{ route('gerants.create') }}" class="btn btn-sm mb-0" type="button">+&nbsp; New Gerant</a>
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
                                    FullName
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Email
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    N°cin
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Role
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Societe
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Creation Date
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gerants as $gerant)
                                <tr onclick="window.location.href='{{ route('gerants.show', $gerant->id) }}';" style="cursor: pointer;">
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $gerant->id }}</p>
                                    </td>
                                    <td>
                                        <div class="avatar avatar-sm me-3" style="background-color: #{{ substr(md5($gerant->fullName), 0, 6) }}; border-radius: 50%; display: flex; align-items: center; justify-content: center; width: 30px; height: 30px;">
                                            <span style="color: white; font-size: 14px;">{{ strtoupper(substr($gerant->fullName, 0, 1)) }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $gerant->fullName }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $gerant->email }}</p>
                                    </td>
                                    <td class="text-center">
                                    @if ($gerant->cin)
                                    <p class="text-xs font-weight-bold mb-0">{{ $gerant->cin }}</p>
                                @else
                                    <p class="text-xs font-weight-bold mb-0">---</p>
                                @endif
                                    </td>

                                    <td class="text-center">
                                     
                                            <p class="text-xs font-weight-bold mb-0">{{ $gerant->role }}</p>
                                    </td>

                                    <td class="text-center">
@if ($gerant->societe)
    <p class="text-xs font-weight-bold mb-0">{{ $gerant->societe->name }}</p>
@else
    <p class="text-xs font-weight-bold mb-0">---</p>
@endif
</td>
<td class="text-center" style="font-size:13px">

{{ date('d/m/Y', strtotime($gerant->created_at))  }}
</td >
<td class="text-center">

<a href="{{ route('gerants.show', $gerant->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Details associe">
    <i class="fas fa-info-circle text-info"></i>
</a>

</td>       
 </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $gerants->links('vendor.pagination.default') }}

    </div>
</div>
@endif
    
</div>
</div>

@endsection
