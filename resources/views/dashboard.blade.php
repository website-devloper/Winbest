@extends('layouts.user_type.auth')

@section('content')
<style>
 .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card-body {
            padding: 20px;
        }

        .icon-container {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #00FFFF;
            color: white;
            border-radius: 50%;
            height: 60px;
            width: 60px;
            margin-bottom: 20px;
        }

        .icon1 {
            font-size: 30px;
            color: #35495e;
            text-align: center;
        }

        .numbers {
            text-align: center;
        }

        .card-title {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-left:30px;
        }

        .text-success {
            color: #28a745;
        }

        .text-danger {
            color: #dc3545;
        }
        .dot {
        width: 6px;
        height: 6px;
        background-color: #42b883; /* Change the color to your desired color */
        border-radius: 50%;
        display: inline-block;
        margin-left: 5px; /* Adjust the margin as needed */
    }
    /* =============================================== */
    .grid-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr); /* Updated to three columns */
            gap: 20px;
            margin: 20px;
            
        }

        @media (min-width: 640px) {
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .grid-item {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .grid-item:hover {
            transform: scale(1.05);
        }
        /* .background{
    background-color:#03297D

        } */
        .card1 {
            padding: 20px;
        }

        .card1 h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .card1 p {
            color: #666;
        }

        .grid-link {
            display: inline-block;
            padding: 8px 12px;
            text-decoration: none;
            background-color: #03297D;
            color: #fff;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .grid-link:hover {
            background-color: #00FFFF;
            color:#03297D;
        }

        /* Icon styles */
        .icon {
            font-size: 33px;
            margin: 10px;
            padding-top:15px;
          
            background-color: #00FFFF;
            border-radius: 50%;
            height: 60px;
            width: 60px;
            text-align:center;
             
        }
        .background{
          background-color: #032974;
          width:100%;
          padding:50px;
          border-radius: 10px;
          margin-top:30px;
        }

      .banner-container {
      display: flex;
      align-items: center;
      justify-content: end;
      padding: 2rem;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-top:20px;
      
    }

    .text-container {
      max-width: 80%;
    }

    .text-container h2 {
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .text-container p {
      font-size: 1rem;
      color: #555;
    }

    .image-container img {
      width: 70%;
      height:20%;
      border-radius: 8px;
      padding:0;
      margin:0;
    }
    /* .horizontal{
      width:50%;
      height:20%;
      color:00FFFF;
      
    } */
    .list-unstyled {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap; /* Wrap the list items to the next line if they exceed the container width */
}
    </style>
</head>
<body>


</style>
<script src="https://kit.fontawesome.com/48adce65bb.js" crossorigin="anonymous"></script>
 <div class="container mt-3">
  
        <div class="row">

<!-- Card 1 -->
@php
  $societes = session('societes');
  $associe = session('associe');
  $gerants = session('gerants');
@endphp
<div class="row">

<div class="col-lg-4 col-md-6 mb-3">
    <div class="card">
        <div class="card-body text-center d-flex">
            <div class="icon-container d-flex align-items-center mr-2"> 
                <span class="icon1"><i class="fa-solid fa-users"></i></span>
            </div>
            <div class="numbers d-flex flex-column align-items-center">
                <h5 class="card-title mb-0 text-capitalize font-weight-bolder">
                    {{ session('user_name') }}
                </h5>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6 mb-4">
    <div class="card">
        <div class="card-body text-center d-flex">
            <div class="icon-container d-flex align-items-center mr-10"> <!-- Add mr-2 for right margin -->
                <span class="icon1"><img style="width: 50px;height:50px;margin-bottom:10px"  src="{{ asset('assets/img/winbest.webp') }}"></span>
            </div>
            <div class="numbers d-flex flex-column align-items-center">
                <h5 class="card-title  mb-0 text-capitalize font-weight-bolder">
                    Winbest
                </h5>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-4 col-md-6  mb-0">
    <div class="card">
        <div class="card-body text-center d-flex">
            
            <div class="numbers d-flex flex-column align-items-center">
                <h5 class="font-weight-bolder  text-sm mb-0">
                    <span class="dot"></span> Online Users
                </h5>
                <span class="text-success text-sm font-weight-bolder">
                    <ul class="list-unstyled">
                        @forelse(session('onlineUsers', []) as $user)
                            <li>
                                <h4 class="card-title text-sm mb-0 text-capitalize font-weight-bolder text-success">
                                    <i class="fa-solid fa-user text-success"></i> &nbsp; {{ $user->fullName }}
                                </h4>
                            </li>
                        @empty
                            <li class="text-muted">No online users</li>
                        @endforelse
                    </ul>
                </span>
            </div>
        </div>
    </div>
</div>








</div>

</div>



<div class="banner-container">
  <div class="text-container">
    <h2>Winbest est...</h2>
    <p>
    Notre société de nettoyage à Casablanca au Maroc est la plus importante entreprise de ménage ayant su se faire une place parmi les sociétés de nettoyage au Maroc. 
    </p>
  </div>
  <div class="image-container">
    <img src="{{asset('assets\images\12427683_4959498.jpg')}}" alt="ntt" >
  </div>
</div>

</body>

      
<div class="background">
<div>
    <h4 style="color:white;font-size:30px;text-align:center; padding:20px">NOS SERVICES</h4>
  </div>
  <div class="horizontal">

  </div>
 
  <div class="grid-container">
        <!-- Service 1 -->
        <div class="grid-item">
            <div class="card1">
                <i class="icon fas fa-building"></i>
                <h5>Société de nettoyage bureaux</h5>
                <p>Pour accroître la productivité, il est conseillé de consacrer tous les efforts nécessaires pour créer une atmosphère agréable et une ambiance conviviale pour vos salariés...</p>
                <a href="https://www.nettoyage-casablanca-maroc.com/societe-nettoyage-bureaux-casablanca.html" class="grid-link">Learn More</a>
            </div>
        </div>

        <!-- Service 2 -->
        <div class="grid-item">
            <div class="card1">
                <i class="icon fas fa-broom"></i>
                <h5>Société de femmes de ménage</h5>
                <p>Faites appel à notre société de femmes de ménage à Casablanca, des spécialistes pour prendre soin de votre intérieur. WINBEST NETTOYAGE est la solution si vous voulez prendre soin de votre domicile...</p>
                <a href="https://www.nettoyage-casablanca-maroc.com/societe-femme-menage-casablanca.html" class="grid-link">Learn More</a>
            </div>
        </div>

        <!-- Service 3 -->
        <div class="grid-item">
            <div class="card1">
                <i class="icon fas fa-couch"></i>
                <h5>Société de nettoyage et d'entretien de canapés</h5>
                <p>Pensez à nettoyer votre canapé et vos fauteuils pour préparer la saison estivale ou en fin de saison. Désinfectez, nettoyez et enlevez les mauvaises odeurs pour assainir votre intérieur...</p>
                <a href="https://www.nettoyage-casablanca-maroc.com/societe-nettoyage-canapes-casablanca.html" class="grid-link">Learn More</a>
            </div>
        </div>

        <!-- Service 4 -->
        <div class="grid-item">
            <div class="card1">
                <i class="icon fas fa-utensils"></i>
                <h5>Société de nettoyage des restaurants</h5>
                <p>Avec une équipe compétente et professionnelle, notre entreprise propose une variété de techniques de nettoyage, respectant les lois et réglementations en vigueur...</p>
                <a href="https://www.nettoyage-casablanca-maroc.com/societe-nettoyage-restaurants-casablanca.html" class="grid-link">Learn More</a>
            </div>
        </div>

        <!-- Service 5 -->
        <div class="grid-item">
            <div class="card1">
                <i class="icon fas fa-window-maximize"></i>
                <h5>Société de nettoyage de vitres</h5>
                <p>Notre équipe expérimentée de nettoyage professionnel de vitres à Casablanca et dans tout le Maroc est spécialisée dans divers environnements...</p>
                <a href="https://www.nettoyage-casablanca-maroc.com/societe-nettoyage-vitres-casablanca.html" class="grid-link">Learn More</a>
            </div>
        </div>

        <!-- Service 6 -->
        <div class="grid-item">
            <div class="card1">
                <i class="icon fas fa-paint-roller"></i>
                <h5>Société de nettoyage de parquets</h5>
                <p>Le ponçage à Casablanca permet de retrouver le bois brut, d'aplanir la surface, d'effacer les taches et d'enlever la couche de traitement précédente si le parquet avait été vitrifié, ciré ou huilé...</p>
                <a href="https://www.nettoyage-casablanca-maroc.com/societe-nettoyage-parquets-casablanca.html" class="grid-link">Learn More</a>
            </div>
        </div>

        <!-- Add more grid items for additional services -->
    </div>

@endsection
