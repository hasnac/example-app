
<div id="header" class="sticky-top">
      <nav class="navbar navbar-expand-lg navbar-dark py-2">
        <div class="container text-white d-inline-flex">
            <a class="navbar-brand text-white d-inline-flex" href="#">
                <img src="{{ asset('assets/images/logo_smkn4.png') }}" alt="Logo" width="50">
                
            </a>
            
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
               
                <li class="nav-item ">
                    <a class="nav-link " href="{{ url('/listbook') }}">Books</a>
                </li>
                @if (auth()->user())
                    
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                @endif
                
                
              </ul>
          </div>
        </div>
      </nav>
      
  
</div>
