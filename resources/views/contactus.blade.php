@extends('layouts.user_type.auth')

<style>
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
    <form class="search-form" method="get" action="{{ route('regus.search') }}">
        <div class="ms-md-3 pe-md-3 d-flex align-items-center">
            <div style="margin-right: 25px" class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input style="background-color: rgb(255, 255, 255) "  type="text" class="form-control1" placeholder="Type here..." 
                name="search"  value="{{ request('search') }}">
            </div>
        </div>
    </form>
</div><br/><br/>

    
<div>
    <div class="container">
        <h1>Contact US </h1>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('mails.send') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Your Message</label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
</div>
   
</div>

@endsection