<?php
session_start();

$bdd= new PDO('mysql:host=localhost;dbname=jeuquiz', 'root','');

if (isset($_POST["submit"])) {
    $login=$_POST["login"];
    $pass=sha1($_POST['pass']);
    if(!empty($login) && !empty($pass)){
       $req=$bdd-> query('SELECT * FROM utilisateurs');
       $donnees=$req->fetch();
       if($login=$donnees['login']&& $pass=$donnees['password']){
           echo"Bienvenue!";
           header ('location: interface_admin.php');
       }
    }else {
        
        echo "Veuillez renseigner tous les champs";
    }
    
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style1.css">
    <title>Page connexion</title>
  </head>
  <body>
  <div class="container"> 
      <div class="row">
  <div class="col-lg-12">
      <div class="row">
      <div class="header">
          <div class="logo">
          </div>
          <p class="bienvenue">
          <h1 id="welcom">Welcom</h1>
             <h5 id="titre"> Le plaisir de jouer</h5> 
          </p>
      </div>
      </div>
      <div class="row">
      <div class="contlogin col-lg-10">
      <form action="" method="post" id="inscription">
        <h1 id="login">Login</h1>
        
        <div class="textbox"><input class="form-control form-control-lg" type="text" name="login" error="error-1" id="log" placeholder="User name"></div><br>
       
        <div class="error-form" id="error-1"></div>

        
        <div class="textbox"><input class="form-control form-control-lg" type="password" name="pass" error="error-2"id="pass" placeholder="Password"></div><br>
      
        <div class="error-form" id="error-2"></div>
       
        <button type="submit" id="submit" name="submit">SUBMIT</button> <br><br>
        <a href=""><h4 id="signin">Sign In</h4></a>
        
      </div>
      </form>
      </div>
      
  </div>
 
  
  </div>


  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
   <script>
  const inputs=document.getElementsByTagName("input");
for(input of inputs){
    input.addEventListener("keyup",function(e){
       if(e.target.hasAttribute("error")) {
        var idDivError=e.target.getAttribute("error")
        document.getElementById(idDivError).innerText=""
       }
    })

}

document.getElementById("inscription").addEventListener("submit", function(e){
    const inputs=document.getElementsByTagName("input");
    var error=false;
    for(input of inputs){
        if(input.hasAttribute("error")){
           var idDivError=input.getAttribute("error")
        if(!input.value){                                                      //si le champ est vide
                document.getElementById(idDivError).innerText="Ce champ est obligatoire"
                error=true;                                                  // on met erro a true pour dire qu on a trouve une erreur
            }
           
        }
    }
    if(error){
        e.preventDefault();
    }
//pour que la page ne se recharge pas
    return false;
   
})
   </script>
  </body>
</html>
