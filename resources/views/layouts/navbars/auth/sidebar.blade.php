<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <title>Document</title>
</head>
<style>
  .nav-link.inactive {
    size: 17px;
    color: rgb(255, 255, 255);
    background-color: rgb(4, 18, 102);
    border-radius: 5px;
  }

  .nav-link.active {
    size: 17px;
    color: rgb(0, 0, 0);
    background-color: rgb(4, 18, 102);
    border-radius: 5px;
  }

  body.bg-blue-100 {
    background-color: blue; /* Set your desired background color */
    color: white; /* Set your desired text color */
  }

  .nav-item.inactive {
    font-size: 17px;
    color: rgb(255, 255, 255);
    background-color: #faffff;
    border-radius: 5px;
  }

  .nav-item.active {
    color: rgb(0, 0, 0);
    background-color: rgb(4, 18, 102);
    border-radius: 5px;
  }

  .dash {
    font-family: 'Courier New', Courier, monospace;
    border-radius: 5px;
    text-align: center;
    width: 200px;
    font-size: large;
    padding-left: 1rem;
    padding-right: 1rem;
    background-color: #00FFFF;
    font-size: .875rem;
  }

  .user svg {
    width: 23px;
  }

@media only screen and(max-width: 767px) {
      .hr {
          margin-top: 90px;
      }
  .nav-item i {
    color: black;
  }

  .icon-sm svg {
    border-radius: 4.5px;
  }}
  .sidenav{
    background-color:#03297D
  }
</style>
<body class="bg-blue-100">
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const navLinks = document.querySelectorAll('.nav-link');
  
      // Function to set active link in localStorage
      function setActiveLink(link) {
        localStorage.setItem('activeLink', link.getAttribute('href'));
      }
  
      navLinks.forEach(link => {
        link.addEventListener('click', function (event) {
          const href = this.getAttribute('href');
          if (href && href !== '#' && !href.startsWith('#')) {
            // Remove active and inactive classes from all links
            navLinks.forEach(link => {
              link.classList.remove('active', 'inactive');
            });
  
            // Add active class to the clicked link
            this.classList.add('active');
  
            // Add inactive class to other links
            navLinks.forEach(otherLink => {
              if (otherLink !== this) {
                otherLink.classList.add('inactive');
              }
            });
  
            // Set active link in localStorage
            setActiveLink(this);
  
            // Delay navigation to allow time for localStorage to be updated
            setTimeout(() => {
              // Redirect to the URL specified in the href attribute
              window.location.href = href;
            }, 50);
          }
        });
      });
  
      // Check localStorage on page load to set active link
      const storedActiveLink = localStorage.getItem('activeLink');
      if (storedActiveLink) {
        const activeLink = document.querySelector(`.nav-link[href="${storedActiveLink}"]`);
        if (activeLink) {
          activeLink.classList.add('active');
        }
      }
    });
  </script>
  
  
<aside  class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-blue-500 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none text-white" aria-hidden="true" id="iconSidenav"></i>
  
      <span style="color: rgb(255, 255, 255); margin-top:-10px;font-family:'Trattatello, fantasy	'" class="ms-3 font-weight-bold">

        <img style="width: 50px;height:50px;color:white;margin-left:41px;margin-top:15px"  src="{{ asset('assets/img/winbest.webp') }}">

        <p style="width: 50px;height:50px;color:white;margin-left:119px;margin-top:-27px"> WinBest</p>   </span>
    </a>
   
  </div>
 
  <hr style="color: aqua">
  <div   class="do" id="sidenav-collapse-main">
    &nbsp;
    <ul class="navbar-nav">
      <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        
    <a class="nav-link" href="{{ url('dashboard') }}">
      <div style="background-color:#00FFFF" class=" icon-sm shadow border-radius-md  text-center me-2 d-flex align-items-center ">

        <?xml version="1.0" ?>
        <svg   width="30px" 
        style="background-color:#00FFFF" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
       >
            <defs>
                <style>.cls-1{fill:none;}</style>
            </defs>
            <title/>
            <g data-name="Layer 2" id="Layer_2">
                <path d="M24,29H8a3,3,0,0,1-3-3V16a1, 1,0,0,1,2,0V26a1,1,0,0,0,1,1H24a1,1,0,0,0,1-1V16a1,1,0,0,1,2,0V26A3,3,0,0,1,24,29Z"/>
                <path d="M15,29H10a1,1,0,0,1-1-1V22a3,3,0,0,1,3-3h1a3,3,0,0,1,3,3v6A1,1,0,0,1,15,29Zm-4-2h3V22a1,1,0,0,0-1-1H12a1,1,0,0,0-1,1Z"/>
                <path d="M25,17a4,4,0,0,1-4-4,1,1,0,0,1,2,0,2,2,0,0,0,4,0v-.76L24.38,7H7.62L5,12.24V13a2,2,0,0,0,4,0,1,1,0,0,1,2,0,4,4,0,0,1-8,0V12a1,1,0,0,1,.11-.45l3-6A1,1,0,0,1,7,5H25a1,1,0,0,1,.89.55l3,6A1,1,0,0,1,29,12v1A4,4,0,0,1,25,17Z"/>
                <path d="M13,17a4,4,0,0,1-4-4,1,1,0,0,1,2,0,2,2,0,0,0,4,0,1,1,0,0,1,2,0A4,4,0,0,1,13,17Z"/>
                <path d="M19,17a4,4,0,0,1-4-4,1,1,0,0,1,2,0,2,2,0,0,0,4,0,1,1,0,0,1,2,0A4,4,0,0,1,19,17Z"/>
                <path d="M22,22H19a1,1,0,0,1,0-2h3a1,1,0,0,1,0,2Z"/>
            </g>
            <g id="frame">
                <rect class="cls-1" height="12" width="12"/>
            </g>
        </svg></div>
        <span  class="nav-link-text ms-1">Dashboard</span>
    </a>
</li>


<li style="margin-left: -5px" class="nav-item {{ Request::is('societes.index') ? 'active' : '' }} mt-3">

        <a class="nav-link" href="{{ route('societes.index') }}">
            <div style="background-color:#00FFFF" class=" icon-sm shadow border-radius-md  text-center me-2 d-flex align-items-center justify-content-center">
              
              <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.0//EN' 
              'http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd'>
             <svg style="background-color:#00FFFF"  width="23PX"  enable-background="new 0 0 24 24" id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" 
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g>
               <path d="M9,9c0-1.7,1.3-3,3-3s3,1.3,3,3c0,1.7-1.3,3-3,3S9,10.7,9,9z M12,14c-4.6,0-6,3.3-6,3.3V19h12v-1.7C18,17.3,16.6,14,12,14z   "/>
             </g><g><g><circle cx="18.5" cy="8.5" r="2.5"/></g><g>
               <path d="M18.5,13c-1.2,0-2.1,0.3-2.8,0.8c2.3,1.1,3.2,3,3.2,3.2l0,0.1H23v-1.3C23,15.7,21.9,13,18.5,13z"/></g></g><g><g>
                <circle cx="18.5" cy="8.5" r="2.5"/></g><g><path d="M18.5,13c-1.2,0-2.1,0.3-2.8,0.8c2.3,1.1,3.2,3,3.2,3.2l0,0.1H23v-1.3C23,15.7,21.9,13,18.5,13z"/></g></g><g><g><circle cx="5.5" cy="8.5" r="2.5"/></g><g>
               <path d="M5.5,13c1.2,0,2.1,0.3,2.8,0.8c-2.3,1.1-3.2,3-3.2,3.2l0,0.1H1v-1.3C1,15.7,2.1,13,5.5,13z"/>
             </g></g></svg>
            </div>
            <span  class="nav-link-text ms-1">Sociétés</span>
        </a>
      </li>
     
      <li style="margin-left: -5px" class="nav-item {{ Request::is('associes.index') ? 'active' : '' }} mt-3">
        <a class="nav-link " href="{{ route('associes.index') }}">
            <div  style="background-color:#00FFFF" class="icon-sm shadow border-radius-md  text-center me-2 d-flex align-items-center justify-content-center">
                
              <i style="font-size: 1rem;color:black" class="fas fa-handshake ps-2 pe-2 text-center text-dark {{ (Request::is('user-management') ? 'text-dark' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Associés</span>
        </a>
      </li>
     
      <li style="margin-left: -5px" class="nav-item {{ Request::is('gerants.index') ? 'active' : '' }} mt-3">
        <a class="nav-link " href="{{ route('gerants.index') }}">
            <div  style="background-color:#00FFFF" class="icon-sm shadow border-radius-md  text-center me-2 d-flex align-items-center justify-content-center">
                
              <i style="font-size: 1rem;colore:black" class="fas fa-briefcase ps-2 pe-2 text-center text-dark {{ (Request::is('user-management') ? 'text-dark' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Gérants</span>
        </a>
      </li>
      
      <li style="margin-left: -5px" class="nav-item {{ Request::is('damancoms.index') ? 'active' : '' }} mt-3">
        <a class="nav-link" href="{{ route('damancoms.index') }}">
            <div style="background-color:#00FFFF" class="icon-sm shadow border-radius-md  text-center me-2 d-flex align-items-center justify-content-center">
                
              <?xml version="1.0" ?>
              <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
              <svg xmlns="http://www.w3.org/2000/svg" height="26px" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm64 192c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm64-64c0-17.7 14.3-32 32-32s32 14.3 32 32V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V160zM320 288c17.7 0 32 14.3 32 32v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V320c0-17.7 14.3-32 32-32z"/>
              </svg>
                  </div>
            <span  class="nav-link-text ms-1">Damancom	</span>
        </a>
      </li>
      <li style="margin-left: -5px" class="nav-item {{ Request::is('impots.index') ? 'active' : '' }} mt-3">
        <a class="nav-link" href="{{ route('impots.index') }}">
            <div style="background-color:#00FFFF" class="icon-sm shadow border-radius-md  text-center me-2 d-flex align-items-center justify-content-center">
                
              <?xml version="1.0" ?><svg style="width: 12px" id="Layer_1_1_" style="enable-background:new 0 0 16 16;" version="1.1"
               viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" 
               xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M8,0C3.582,0,0,3.582,0,8s3.582,8,8,8s8-3.582,8-8S12.418,0,8,0z M7,8h2c1.103,0,2,0.897,2,2v1c0,1.103-0.897,2-2,2v1H8v-1  H7c-1.103,0-2-0.897-2-2h1c0,0.551,0.448,1,1,1h1h1c0.552,0,1-0.449,1-1v-1c0-0.551-0.448-1-1-1H7C5.897,9,5,8.103,5,7V6  c0-1.103,0.897-2,2-2h1V3h1v1c1.103,0,2,0.897,2,2h-1c0-0.551-0.448-1-1-1H7C6.448,5,6,5.449,6,6v1C6,7.551,6.448,8,7,8z"/></svg>
              </div>
           
                <span  class="nav-link-text ms-1">Impots	</span>
        </a>
      </li>
      <li style="margin-left: -5px" class="nav-item {{ Request::is('cimrs.index') ? 'active' : '' }} mt-3">
        <a class="nav-link" href="{{ route('cimr.index') }}">
            <div style="background-color:#00FFFF" class="icon-sm shadow border-radius-md  text-center me-2 d-flex align-items-center justify-content-center">
                
              <i style="font-size: 1rem;color:black" class="fas fa-handshake ps-2 pe-2 text-center text-dark {{ (Request::is('user-management') ? 'text-dark' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span  class="nav-link-text ms-1">Cimrs	</span>
        </a>
      </li>
      <li style="margin-left: -5px" class="nav-item {{ Request::is('regus.index') ? 'active' : '' }} mt-3">
        <a class="nav-link" href="{{ route('regus.index') }}">
      <div style="background-color:#00FFFF" class="icon-sm shadow border-radius-md  text-center me-2 d-flex align-items-center justify-content-center">
                
              <i style="font-size: 1rem;color:black" class="	fas fa-handshake ps-2 pe-2 text-center text-dark {{ (Request::is('user-management') ? 'text-dark' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span  class="nav-link-text ms-1">Regus	</span>
        </a>
      </li>




<hr>     
 
    </ul>
  </div>
  <div  style="margin-top: 43PX" style=" sidenav-footer mx-3 ">
    <div   id="sidenavCard">
      <div class="full-background" style="background-image: url('../assets/img/curved-images/peerfect.jpg')"></div>
      <div style="color: black ;margin-top:2.7px" class="card-body text-start p-3 w-100 badge filter bg-gradient-info">
        <div >
        As-tu besoin d'aide!!  <li  class="nav-item d-flex align-items-center ps-4">
            @if(session('user_email'))
            <p >{{ session('user_email')}}</p>

        @endif
         </li>        
</div>

      
 </div>
    </div>
  </div>
  </div>
  
  
</aside>

</body>
</html>