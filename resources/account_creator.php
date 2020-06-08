<?php
session_start();
if(!(isset($_SESSION['login']))){
    if(isset($_POST['enter'])){
        $login=$_POST['usuario'];    
        $pass=$_POST['pass'];
        $pass=md5($pass);
        print $pass;
        $conexion = mysqli_connect ("localhost", "root", "") or die ("No se puede conectar con el servidor");
        mysqli_select_db ($conexion,"cv-ar") or die ("No se puede seleccionar la base de datos");
        
        $consulta = mysqli_query ($conexion, "select * from usuarios where login='".$login."'") or die ("Fallo en la consulta");
      
        $nfilas = mysqli_num_rows ($consulta);
        if($nfilas==1){
            $fila = mysqli_fetch_array ($consulta);
            if($pass==$fila["pswd"]){
                session_destroy();    //destruimos la sesion por si hay algo creado
                session_start();    //creamos una nueva sesion
                $_SESSION['login']=$login;  //inicializamos la variable de la sesion con el login del usuario
                header('Location:../src/register.php');
            }else{
                print "la contraseña no es correcta";
                header('refresh:3,url=../src/register.php');
            }
        }else{
            print "El login no es correcto";
            header('refresh:3,url=../src/register.php');
        }  
	mysqli_close($conexion);
    }
    if(isset($_POST['accept'])){
        $login=$_POST['login'];    
        $pswd1=$_POST['pswd1'];
        $pswd2=$_POST['pswd2'];
        $mail=$_POST['mail'];
        
        $conexion = mysqli_connect ("localhost", "root", "") or die ("No se puede conectar con el servidor");
        mysqli_select_db ($conexion,"cv-ar") or die ("No se puede seleccionar la base de datos");
	
        $consulta = mysqli_query ($conexion, "SELECT * FROM usuarios WHERE login='".$login."'")
		or die ("Fallo en la consulta de usuarios 1");
		
        if(mysqli_num_rows($consulta)==0){
            if($pswd1==$pswd2){
                $consulta = mysqli_query ($conexion, "INSERT INTO usuarios(login, pswd, mail) VALUES ('".$login."','".md5($pswd1)."','".$mail."')") or die ("Fallo en la consulta de usuarios 2");
                mysqli_close($conexion);
                session_destroy();
                session_start();
                $_SESSION['login']=$login;
                header('refresh:3,url=../src/register.php');
            }else{
                print "Las Contraseñas escritas no son iguales";
                header('refresh:3,url=../src/new_account.php');
            }
        }else{
            print "ese usuario ya existe";
            header('refresh:3,url=../src/new_account.php');
        }
    }
    if(isset($_POST['return'])){
        header('Location:../src/register.php');
    }
}else{
    if(isset($_POST['exit'])){
        session_destroy();
    }
    header('Location:../src/index.php');
}
?>