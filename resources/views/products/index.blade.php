@extends('layouts.app')


@section('content')


<div class="row justify-content-center mt-3">

<div class="col-md-12">



@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif




<div class="card">


<div class="card-header d-flex justify-content-between align-items-center">


<div>

<h4 class="mb-0">

Liste des produits

</h4>


<small>

Bonjour {{ Auth::user()->name }}

</small>


</div>



<form action="{{ route('logout') }}" method="POST">

@csrf

<button class="btn btn-danger">

Déconnexion

</button>

</form>


</div>





<div class="card-body">



<a href="{{ route('products.create') }}" 
class="btn btn-success btn-sm mb-3">

<i class="bi bi-plus-circle"></i>

Ajouter un produit

</a>





<table class="table table-striped table-bordered">


<thead>


<tr>

<th>#</th>

<th>Code</th>

<th>Nom</th>

<th>Quantité</th>

<th>Prix</th>

<th>Actions</th>


</tr>


</thead>



<tbody>



@forelse($products as $product)


<tr>


<td>

{{ $loop->iteration }}

</td>



<td>

{{ $product->code }}

</td>



<td>

{{ $product->name }}

</td>



<td>

{{ $product->quantity }}

</td>



<td>

{{ $product->price }}

</td>




<td>


<form action="{{ route('products.destroy',$product->id) }}" method="POST">


@csrf

@method('DELETE')



<a href="{{ route('products.show',$product->id) }}" 
class="btn btn-warning btn-sm">

Voir

</a>



<a href="{{ route('products.edit',$product->id) }}" 
class="btn btn-primary btn-sm">

Modifier

</a>



<button class="btn btn-danger btn-sm"
onclick="return confirm('Supprimer ce produit ?')">

Supprimer

</button>



</form>


</td>


</tr>



@empty


<tr>

<td colspan="6" class="text-center text-danger">

Aucun produit trouvé

</td>

</tr>



@endforelse



</tbody>



</table>



{{ $products->links() }}




</div>


</div>



</div>

</div>


@endsection