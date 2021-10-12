<?php
 include 'conexionBD.php';
 
 print_r($_POST);

if(isset($_POST['txtUsuario']) && isset($_POST['txtPassword']) ) {
    //todo correcto
    if($_POST['txtUsuario'] == "" || $_POST['txtPassword'] == "") {
        echo  "<script>alert('No deben de ir campos vacios')</script>";
        echo  "<script>window.location.href='index.html';</script>";
        //header('Location: index.html');
     
    }else {
        //La validacion seria si se esta registrando o se esta autenticando 
        if (isset($_POST['btnLogin'])) {
            $registros = $mysql->query("select COUNT(*) contador from tblusuarios where usuario ='$_POST[txtUsuario]' and password='$_POST[txtPassword]' ") or
            die($mysql->error);
            if ($reg = $registros->fetch_array()){
                if($reg['contador'] > 0){
                    echo  "<script>alert('Bienvenido')</script>";
                    echo  "<script>window.location.href='principal.php';</script>";
                }else {
                    echo  "<script>alert('El usuario y/o contraseña incorrectos')</script>";
                    echo  "<script>window.location.href='index.html';</script>";
                }
            }
        }else {
            //Consultar a la base de datos si existe o no
            $registros = $mysql->query("select COUNT(*) contador from tblusuarios where usuario ='$_POST[txtUsuario]'") or
            die($mysql->error);
            
            if ($reg = $registros->fetch_array()){
                if($reg['contador'] > 0){
                    echo  "<script>alert('El usuario ya existe')</script>";
                    echo  "<script>window.location.href='index.html';</script>";
                }else {
                        //Sirve para insertar a la base de datos
                        $password =  md5($_POST[txtPassword]);
                    $mysql->query("insert into tblusuarios(usuario,password,fecharegistro) values ('$_POST[txtUsuario]','$password',Now())") or
                            die($mysql->error);
                    $mysql->close();
                    echo  "<script>alert('Se han insertado corectamente')</script>";
                    echo  "<script>window.location.href='index.html';</script>";
                }
            } 
        }

       
 
        
    }
}else {
    echo "Captura los datos solicitados";
}


?>