<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Inscription</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



<style>

body{

background: linear-gradient(135deg,#198754,#0dcaf0);

height:100vh;

display:flex;

justify-content:center;

align-items:center;

}



.register-card{

width:100%;

max-width:450px;

border-radius:20px;

box-shadow:0 10px 30px rgba(0,0,0,0.2);

}



.form-control{

border-radius:10px;

padding:12px;

}



.btn-register{

border-radius:10px;

padding:12px;

font-size:17px;

}


</style>


</head>



<body>



<div class="card register-card p-4">



<div class="text-center mb-4">


<i class="bi bi-person-plus-fill text-success" 
style="font-size:70px;"></i>


<h2 class="fw-bold mt-3">

Créer un compte

</h2>


<p class="text-muted">

Rejoignez votre espace de gestion

</p>


</div>





<form id="registerForm">



<div class="mb-3">


<label class="form-label">

Nom complet

</label>


<div class="input-group">


<span class="input-group-text">

<i class="bi bi-person"></i>

</span>


<input type="text"
class="form-control"
id="name"
placeholder="Votre nom"
required>


</div>


</div>






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
placeholder="Mot de passe"
required>


</div>


</div>







<div class="mb-3">


<label class="form-label">

Confirmation

</label>


<div class="input-group">


<span class="input-group-text">

<i class="bi bi-shield-lock"></i>

</span>


<input type="password"
class="form-control"
id="password_confirmation"
placeholder="Confirmer mot de passe"
required>


</div>


</div>






<button type="submit" class="btn btn-success w-100 btn-register">


<i class="bi bi-check-circle"></i>

Créer mon compte


</button>



</form>






<div class="text-center mt-4">


<p>

Vous avez déjà un compte ?

</p>



<a href="/login" class="btn btn-outline-success">

Se connecter

</a>



</div>





</div>






<script>


$(document).ready(function(){



$("#registerForm").submit(function(e){


e.preventDefault();



$.ajax({


url:"/register",

type:"POST",



data:{


_token:$('meta[name="csrf-token"]').attr('content'),


name:$("#name").val(),


email:$("#email").val(),


password:$("#password").val(),


password_confirmation:$("#password_confirmation").val()


},




success:function(response){


alert(response.message);



window.location.href=response.redirect;



},




error:function(xhr){


console.log(xhr.responseText);


if(xhr.responseJSON && xhr.responseJSON.message){


alert(xhr.responseJSON.message);


}

else{


alert("Une erreur est survenue");


}


}



});



});



});



</script>



</body>

</html>