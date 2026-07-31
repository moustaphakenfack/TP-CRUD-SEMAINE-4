<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Gestion Produits
    </title>


    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>

        body {

            background: #f4f6f9;

            font-family: Arial, sans-serif;

        }


        .navbar {

            box-shadow: 0 3px 10px rgba(0,0,0,0.15);

        }


        .card {

            border-radius: 15px;

            box-shadow: 0 5px 20px rgba(0,0,0,0.08);

        }


        .btn {

            border-radius: 8px;

        }


        .container {

            margin-top: 30px;

        }


    </style>


</head>


<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-primary">


<div class="container-fluid">


<a class="navbar-brand fw-bold" href="/products">

<i class="bi bi-box-seam"></i>

Gestion Produits

</a>



<button class="navbar-toggler" 
type="button" 
data-bs-toggle="collapse" 
data-bs-target="#navbarNav">

<span class="navbar-toggler-icon"></span>

</button>




<div class="collapse navbar-collapse" id="navbarNav">


<ul class="navbar-nav ms-auto">


@auth


<li class="nav-item">

<a class="nav-link text-white">

<i class="bi bi-person-circle"></i>

{{ Auth::user()->name }}

</a>

</li>



<li class="nav-item">

<form action="{{ route('logout') }}" method="POST">

@csrf

<button class="btn btn-danger btn-sm mt-1">

<i class="bi bi-box-arrow-right"></i>

Déconnexion

</button>


</form>

</li>



@endauth



</ul>


</div>


</div>


</nav>




@yield('content')





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>


</html>