<?php

$time = 0.05;
$costo = 13;
$nombre="Hernán";
$hast = '$2y$12$lsyFsG0IF99ZVn0rqI0jbeMYzO35OXNGNdACnz9jTW9/RlKWmAkxu';
$nombre_cifrado= password_hash($nombre,PASSWORD_DEFAULT);
// echo "Cifrado: ".$nombre_cifrado."\n";
$nombre_cifradoo = password_hash($nombre, PASSWORD_DEFAULT,array("cost"=>12));
echo "Cifrado Costo: ".$nombre_cifradoo."\n";

if(password_verify('Hernán',$hast)){
    echo "Valido";
}else{
    echo"error";
}


//do{
  //  $costo ++;
    //$inicio = microtime(true);
//     password_hash("test",PASSWORD_BCRYPT,["cost"=>$costo]);
//     $fin = microtime(true);
// }
// while(($fin-$inicio) < $time);
//     echo"Costo apropiado encontrado:".$costo."\n";



?>