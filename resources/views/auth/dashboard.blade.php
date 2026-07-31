@extends('layouts.app')


@section('content')


<div class="container mt-5">


<div class="card shadow">


<div class="card-header bg-primary text-white">

<h3>

Tableau de bord

</h3>

</div>



<div class="card-body">


<h4>

Bienvenue {{ Auth::user()->name }}

</h4>


<p>

Vous êtes connecté à votre espace de gestion.

</p>



<div class="row mt-4">


<div class="col-md-4">


<div class="card text-center">

<div class="card-body">


<h2>

📦

</h2>


<h5>

Gestion des produits

</h5>


<a href="{{ route('products.index') }}" 
class="btn btn-success">

Voir le CRUD

</a>


</div>

</div>


</div>




<div class="col-md-4">


<div class="card text-center">

<div class="card-body">


<h2>

👤

</h2>


<h5>

Utilisateur connecté

</h5>


<p>

{{ Auth::user()->email }}

</p>


</div>

</div>


</div>



</div>


</div>


</div>


</div>


@endsection