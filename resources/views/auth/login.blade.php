<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Connexion</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<style>

body{

background: linear-gradient(135deg,#007bff,#6610f2);

height:100vh;

display:flex;

align-items:center;

justify-content:center;

}


.login-card{

width:100%;

max-width:420px;

border-radius:20px;

box-shadow:0 10px 30px rgba(0,0,0,0.2);

}


.form-control{

border-radius:10px;

padding:12px;

}


.btn-login{

border-radius:10px;

padding:12px;

font-size:17px;

}


</style>


</head>


<body>



<div class="card login-card p-4">


<div class="text-center mb-4">


<i class="bi bi-person-circle text-primary" style="font-size:70px;"></i>


<h2 class="fw-bold mt-3">

Connexion

</h2>


<p class="text-muted">

Accédez à votre espace de gestion

</p>


</div>





<form id="loginForm">



<div class="mb-3">


<label class="form-label">

Email

</label>


<div class="input-group">


<span class="input-group-text">

<i class="bi bi-envelope"></i>

</span>


<input type="email" 
class="form-control"
id="email"
name="email"
placeholder="Votre email"
required>


</div>


</div>






<div class="mb-3">


<label class="form-label">

Mot de passe

</label>


<div class="input-group">


<span class="input-group-text">

<i class="bi bi-lock"></i>

</span>


<input type="password"
class="form-control"
id="password"
name="password"
placeholder="Votre mot de passe"
required>


</div>


</div>





<button type="submit" class="btn btn-primary w-100 btn-login">


<i class="bi bi-box-arrow-in-right"></i>

Se connecter


</button>



</form>




<div class="text-center mt-4">


<p>

Vous n'avez pas de compte ?

</p>


<a href="/register" class="btn btn-outline-primary">

Créer un compte

</a>


</div>




</div>






<script>


$(document).ready(function(){


$("#loginForm").submit(function(e){


e.preventDefault();



$.ajax({


url:"/login",

type:"POST",



data:{


_token:$('meta[name="csrf-token"]').attr('content'),


email:$("#email").val(),


password:$("#password").val()


},




success:function(response){


alert(response.message);


window.location.href=response.redirect;


},




error:function(xhr){


if(xhr.responseJSON && xhr.responseJSON.message){


alert(xhr.responseJSON.message);


}

else{


alert("Une erreur est survenue");


}


console.log(xhr);


}



});



});



});



</script>



</body>

</html>