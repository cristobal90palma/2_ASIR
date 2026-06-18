<?php
include_once "bbdd.php";
session_start();

#funcion para tener todos los codigos de error (y no error tmb) juntos
function obtenerError($cod){
    switch ($cod){
        case 1:
            echo "<p>Error: Faltan datos.</p>";
            unset($_SESSION['error']);
            break;
        case 2:
            echo "<p>Error: Las contraseñas no coinciden.</p>";
            unset($_SESSION['error']);
            break;
        case 3:
            echo "<p>Error: El usuario ya existe.</p>";
            unset($_SESSION['error']);
            break;
        case 4:
            echo "<p>Error: No se ha podido crear el usuario. Vuelve mas tarde.</p>";
            unset($_SESSION['error']);
            break;
        case 5:
            echo "<p>Error: Usuario/Contraseña incorrectos.</p>";
            unset($_SESSION['error']);
            break;
        case 6:
            echo "<p>Registro exitoso. Ahora puedes iniciar sesión.</p>";
            unset($_SESSION['error']);
            break;
        case 7:
            echo "<p>Error: No se puede recuperar los datos</p>";
            unset($_SESSION['error']);
            break;
        case 8:
            echo "<p>Error: Debe seleccionar al menos un producto.</p>";
            unset($_SESSION['error']);
            break;
        case 9:
            echo "<p>Error: ande vas con un campo tan largo. que me vas a petar la db</p>";
            unset($_SESSION['error']);
            break;
        case 10:
            echo "<p>Error: El teléfono no es válido.</p>";
            unset($_SESSION['error']);
            break;
        case 99:
            echo "<p>Error: algo ha pasaado :(.</p>";
            unset($_SESSION['error']);
            break;
        default:
            unset($_SESSION['error']);
            break;
    
    }
}
#funcion que hace un select y obtiene el menu desde la DB
function obtenerMenu(){
    try{
        global $server, $user, $passwd, $db;
        $conn = mysqli_connect($server,$user,$passwd,$db);
        $sql = "select * from producto";
        $resultados = mysqli_query($conn,$sql);
        
        if ($resultados){
            return mysqli_fetch_all($resultados, MYSQLI_ASSOC);
        }else{
            $_SESSION['error'] = 7; # error al obtener datos
            return;
        }



    }catch (Exception $e){
        echo obtenerError(99);
        echo "<b><p>".$e->getMessage()."</p></b>";
    }

}

function obtenerProductosPorId($prodId){
    try{
        global $server, $user, $passwd, $db;
        $conn = mysqli_connect($server,$user,$passwd,$db);
        
        $sql = "select n_producto from pedidio_producto where n_pedido=".$prodId;
        $resultados = mysqli_query($conn,$sql);
        $id = mysqli_fetch_all($resultados, MYSQLI_ASSOC);

        $productos = [];
        foreach($id as $prod){
            $sql2 = "select nombre from producto where n_producto=".$prod['n_producto'];
            $resultados2 = mysqli_query($conn,$sql2);
            $nombreProd = mysqli_fetch_assoc($resultados2);
            $productos[] = $nombreProd['nombre'];
        }
        return implode(", ", $productos);


    }catch (Exception $e){
        echo obtenerError(99);
        echo "<b><p>".$e->getMessage()."</p></b>";
    }
}


function obtenerListadoProducto(){
    try{
        global $server, $user, $passwd, $db;
        $conn = mysqli_connect($server,$user,$passwd,$db);
        $sql = "select * from pedido";
        $resultados = mysqli_query($conn,$sql);
        
        if ($resultados){
            return mysqli_fetch_all($resultados, MYSQLI_ASSOC);
        }else{
            $_SESSION['error'] = 7; # error al obtener datos
            return;
        }
    }catch (Exception $e){
        echo obtenerError(99);
        echo "<b><p>".$e->getMessage()."</p></b>";
    }
}

#obtine pedidos de la db (es practicamente un copia de obtener menu)
function obtenerPedidos($idPedido){
    try{
        global $server, $user, $passwd, $db;
        $conn = mysqli_connect($server,$user,$passwd,$db);
        $sql = "select * from pedido where nPedido = ".$idPedido;
        $sql2 = "select * from pedidio_producto where n_pedido = ".$idPedido;
        $resultados = mysqli_query($conn,$sql);
        $resultados2 = mysqli_query($conn,$sql2);
        
        #almacenamos los pedidos en una variable de sesion
        if ($resultados){
            $_SESSION['pedidos'] = mysqli_fetch_all($resultados, MYSQLI_ASSOC);
            $listado = mysqli_fetch_all($resultados2, MYSQLI_ASSOC);
        }else{
            unset($_SESSION['pedidos']);
            unset($_SESSION['productos']);
            $_SESSION['error'] = 7; # error al obtener datos
            return;
        }
        

        $_SESSION['productos'] = [];
        foreach($listado as $prod){
            $prodId = mysqli_real_escape_string($conn, $prod['n_producto']);
            $obtenerNombre = "select nombre from producto where n_producto = " . $prodId;
            $rowNombre = mysqli_fetch_assoc(mysqli_query($conn, $obtenerNombre));
            $_SESSION['productos'][] = $rowNombre;
        }


        #una vez ya tenemos los datos, vamos a pedido.php y le mostramos los datos
        header("Location: pedido.php");
    }catch (Exception $e){
        echo obtenerError(99);
        echo "<b><p>".$e->getMessage()."</p></b>";
    }
    
}

#funcion para procesaar el pedido
function procesarPedido($nombre,$tlf,$dir,$productos){
    try{
        global $server, $user, $passwd, $db;
        $conn = mysqli_connect($server,$user,$passwd,$db);

        $nombre = mysqli_real_escape_string($conn,$nombre);
        $tlf = mysqli_real_escape_string($conn,$tlf);
        $dir = mysqli_real_escape_string($conn,$dir);
        $userPed = $_SESSION['user'];
        
        if( !isset($nombre) || !isset($tlf) || !isset($dir) || $nombre == "" || $tlf == "" || $dir == "" ){
            $_SESSION['error'] = 1; #faltan datos
            header("Location: pedir.php");
            return;
        }elseif(strlen($nombre) > 50){
            $_SESSION['error'] = 9; #nombre demasiado largo
            header("Location: pedir.php");
            return;
        }elseif(preg_match('/^[0-9]{9}$/',$tlf) == 0){
            $_SESSION['error'] = 10; #telefono no valido
            header("Location: pedir.php");
            return;
        }elseif(strlen($dir) > 100){
            $_SESSION['error'] = 9; #direccion demasiado larga
            header("Location: pedir.php");
            return;
        }elseif(empty($productos)){
            $_SESSION['error'] = 8; #no se selecciono ningun producto
            header("Location: pedir.php");
            return;
        }else{
            #calcular importe
            foreach($productos as $prod){
                $sqlProd = "SELECT precio FROM producto WHERE n_producto = ".$prod;
                $result = mysqli_query($conn,$sqlProd);
                $row = mysqli_fetch_assoc($result);
                $importe += $row['precio'];
            }
            #inserta el pedido
            $sql = "INSERT INTO pedido(nombre,direccion,telefono,importe,username) VALUES ('".$nombre."','".$dir."','".$tlf."',".$importe.",'".$userPed."')";
            mysqli_query($conn,$sql);
            #obtiene el ultimo pedido hecho por el usuario
            $consultarPedido = "SELECT MAX(nPedido) FROM pedido WHERE username = '".$userPed."'"; 
            $idPedido = mysqli_fetch_assoc(mysqli_query($conn,$consultarPedido));
            $idFInal = $idPedido['MAX(nPedido)'];
            #insertamos cada producto seleccionado con el id que sccamos antes.
            foreach($productos as $prod){
                $sqlDet = "INSERT INTO pedidio_producto(n_pedido,n_producto) VALUES (".$idFInal.",".$prod.")";
                mysqli_query($conn,$sqlDet);
            }
            #cuando termina llama a obtenePedidos
            obtenerPedidos($idFInal);
            
        }
       

    }catch (Exception $e){
        echo obtenerError(99);
        echo "<b><p>".$e->getMessage()."</p></b>";
    }
}



function borrarPedido($ids){
    try{
        global $server, $user, $passwd, $db;
        $conn = mysqli_connect($server,$user,$passwd,$db);

        if(empty($ids)){
            $_SESSION['error'] = 1; #faltan datos
            header("Location: pedidos.php");
            return;
        }
        
        foreach($ids as $id){
            $id = mysqli_real_escape_string($conn,$id);
            #borramos primero de la tabla intermedia
            $sqlDet = "DELETE FROM pedidio_producto WHERE n_pedido = ".$id;
            mysqli_query($conn,$sqlDet);
            #borramos de la tabla pedido
            $sql = "DELETE FROM pedido WHERE nPedido = ".$id;
            mysqli_query($conn,$sql);
        }
        
        header("Location: pedidos.php");
        }catch (Exception $e){
        echo obtenerError(99);
        echo "<b><p>".$e->getMessage()."</p></b>";
    }
}





?>