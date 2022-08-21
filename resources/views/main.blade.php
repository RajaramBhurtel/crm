<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #b0d6f7;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">Simple CRM with Login and Registration</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                 <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-link">Login</a>    
                </li> 

                 <li class="nav-item">
                    <a href="{{route('registration')}}" class="nav-link">Register</a>    
                </li>   

                @else
                 <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">Logout</a>    
                </li>   
                @endguest
            </ul>
                
            </div>
            
        </div>
    </nav>
    
    <div class="container mt-5">
    {{-- @if($message = Session::get('success'))
    <div class="alert alert-info">
        {{ $message}}
    </div>

    @endif
    @if($message = Session::get('failed'))
    <div class="alert alert-danger">
        {{ $message}}
    </div>

    @endif --}}
        @yield('content')
        
    </div>
    
</body>
</html>