<!doctype html>
<html lang="en">
<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


 <?php
$host = 'mysql:dbname=test_projet;host=127.0.0.1';
$user = 'root';
$password = 'oumarsow';

try {
$connexion = new PDO($host, $user, $password);
echo "La connexion à la base est ok";
 $requette =$connexion->prepare("select last_name from test where last_name='palmer'");
 $requette2= $connexion->prepare("select first_name,last_name from test where gender='Female'");
 $requette3 = $connexion->prepare("select country_code from test where country_code LIKE 'N%'");
 $requette4 = $connexion->prepare("SELECT * FROM test where email LIKE '%google%'");
 $requette5 = $connexion->prepare("SELECT country_code,COUNT(country_code) as nombre FROM test GROUP BY country_code ORDER BY nombre ASC");
    $requette6 = $connexion->prepare("SELECT count(gender) as nombredefemme FROM test where gender LIKE '%Female%'");
    $requette7 = $connexion->prepare("SELECT count(gender) as nombrehomme FROM test where gender LIKE 'Male'");
    $requette7 = $connexion->prepare("INSERT INTO test (id, first_name, last_name, email, gender, ip_adress,birth_day,country_code,avatar_url ) VALUES ()");

    $requette2->execute();
 $requette->execute();
  $requette5->execute();
    $requette3->execute();
    $requette4->execute();
    $requette6->execute();
    $requette7->execute();
?>

     <?php
  while( $resultat= $requette->fetch())
  {
   echo "<br>".$resultat['last_name'];
  }?>
<?php
    while( $resultat2= $requette2->fetch())
    {

  echo "<br>".$resultat2['first_name']."&nbsp&nbsp&nbsp";
        echo $resultat2['last_name'];
    }
    while( $resultat3= $requette3->fetch())
    {
        echo "<br>".$resultat3['country_code'];
    }
    while( $resultat4= $requette4->fetch())
    {
        echo "<br>".$resultat4['email'];
    }
while( $resultat5= $requette5->fetch())
{

    echo "<br>".$resultat5['country_code'];
    echo "&nbsp&nbsp&nbsp".$resultat5['nombre'];

}
    while( $resultat6= $requette6->fetch())
    {
        echo "<br>"."le nombre de femme: &nbsp &nbsp &nbsp".$resultat6['nombredefemme'];
    }
    while( $resultat7= $requette7->fetch())
    {
        echo "<br>"."le nombre d'homme: &nbsp &nbsp &nbsp".$resultat7['nombrehomme'];
    }
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

 ?>


 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </body>
</html>