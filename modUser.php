<?php 
	include 'connection.php';

	if(isset($_POST)){
    print_r($_POST);
    switch($_POST['typeOp']){
        case 1:
          insertUser($_POST);
          break;
        case 2:
          editUser($_POST);
          break;
        case 3:
          deleteUser($_POST);
          break;
     }
	}
	//$data = $_POST

	function insertUser($data){
    $con = connect();
    $nombre = $data['fName'];
    $rapellidos = $data['lName'];
    $rfc = $data['nRFC'];
    $idT = $data['idT'];
    $NickName = $data['nName'];
    $Psw = $data['nPsw'];
    $resultado = mysqli_query( $con, "CALL proAddNwUser('$nombre','$rapellidos','$rfc',$idT,'$NickName','$Psw');" ) or die ( "Algo ha ido mal en la consulta a la base de datos");
		if($resultado){
      mysqli_close($con);
      echo "Usuario Creado con Éxito";
    }else{
      echo "Usuario no creado";
    }


	}
