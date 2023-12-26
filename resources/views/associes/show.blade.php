@extends('layouts.user_type.auth')

@section('content')
<style>
.container {
            height: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .details {
            width: 80%;
            padding: 20px;
            text-align: left;
        }

        .details h2 {
            color: #333;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .details ul {
            list-style: none;
            padding: 0;
        }

        .details li {
            color: #666;
            line-height: 1.6;
            margin-bottom: 10px;
        }

</style>
<div>
    <div style="background-color: rgb(4, 18, 102)" class="alert  mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete you can use all functional!</strong> 
        </span>
    </div>

    <div class="container">
    <div class="details">
        <h3>Employee Information</h3>
        <ul>
            <li><strong>Full Name : </strong>{{$associe->fullName}}</li>
            <li><strong>Email : </strong> {{$associe->email}}</li>
            <li><strong>Ncin : </strong> {{$associe->cin}}</li>
        </ul>

        <h3>Societe Information</h3>
        <ul>
            <li><strong>Societe Name : </strong>{{$associe->societe->name}}</li>
            <li><strong>Forme Juridique : </strong>{{$associe->societe->formeJuri}}</li>
            <li><strong>Siege Social : </strong>{{$associe->societe->siegeSocial}}</li>
            <li><strong>Capital : </strong>{{$associe->societe->capital}}</li>
            <li><strong>Activite Principal : </strong>{{$associe->societe->activiteprincipal}}</li>
            <li><strong>RC : </strong>{{$associe->societe->RC}}</li>
            <li><strong>Patente : </strong>{{$associe->societe->patente}}</li>
            <li><strong>IF : </strong>{{$associe->societe->IF}}</li>
            <li><strong>CNSS : </strong>{{$associe->societe->CNSS}}</li>
            <li><strong>ICE : </strong>{{$associe->societe->ICE}}</li>
            <li><strong>RIB : </strong>{{$associe->societe->RIB}}</li>
            <li><strong>dateexploitation : </strong>{{$associe->societe->dateexploitation}}</li>
            <li><strong>dateDbDexploitatiion : </strong>{{$associe->societe->dateDbDexploitatiion}}</li>

        </ul>

        <h3>Damancom Information</h3>
        <ul>
            <li><strong>Login:</strong>----------</li>
            <li><strong>Password:</strong>----------</li>
        </ul>

        <h3>Impots Information</h3>
        <ul>
            <li><strong>Login:</strong>----------</li>
            <li><strong>Password:</strong>----------</li>
        </ul>

        <h3>CIMR Information</h3>
        <ul>
            <li><strong>Login:</strong>----------</li>
            <li><strong>Password:</strong>----------</li>
        </ul>

        <h3>Regus Information</h3>
        <ul>
            <li><strong>Login:</strong>----------</li>
            <li><strong>Password:</strong>----------</li>
        </ul>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
