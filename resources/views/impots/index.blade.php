<!-- resources/views//index.blade.php -->

@extends('layouts.user_type.auth')

@section('content')
<div style="margin-top:-90px;">
    <form style="margin-left: 250px;" method="get" action="{{ route('impots.search') }}">
    @csrf
        <div  style="width: 440px" class="ms-md-3 pe-md-3 d-flex align-items-center">
            <div style="margin-right: 15px" class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input style="background-color: rgb(255, 255, 255) "  type="text" class="form-control" placeholder="Type here..." name="search"  value="{{ request('search') }}">
            </div>
            </div>
        </form></div><br/><br/>
<div>
    <div style="background-color: rgb(4, 18, 102)" class="alert  mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete you can use all functional!</strong> 
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Impots</h5>
                        </div>
                        <a style="background-color:#00FFFF" href="{{ route('impots.create') }}" class="btn btn-sm mb-0" type="button">+&nbsp; New Impot</a>
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
                                        Societe
                                    </th>
                                    
                                    
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($impots as $impot)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $impot->id }}</p>
                                        </td>
                                        
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $impot->login }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $impot->password }}</p>
                                        </td>
                                       

                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $impot->societe->name }}</p>
                                        </td>
                                        
                                        
                                        
                                        
                                       
                                        <td class="text-center d-flex align-items-center">
                                            <a style="color:#1cd09d" href="{{ route('impots.edit', $impot->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit impot">
                                                <i style="color:#1cd09d"  class="fas fa-user-edit "></i>
                                            </a>
                                           
                                            <form data-bs-toggle="tooltip" data-bs-original-title="destroy impot" action="{{ route('impots.destroy', $impot->id) }}" method="post" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
                                                    <i style="color: red" onclick="return confirm('Are you sure?')" class="fas fa-trash-alt"></i>
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
    </div>
</div>

@endsection