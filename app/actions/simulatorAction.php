<?php
session_start();
require_once "../../config.php";

$origin = filter_input(INPUT_POST, 'origin', FILTER_VALIDATE_INT); //Atribui à váriavel o valor do campo origin do formuário no index, caso ele seja um inteiro
$destiny = filter_input(INPUT_POST, 'destiny', FILTER_VALIDATE_INT); //Atribui à váriavel o valor do campo destiny do formuário no index, caso ele seja um inteiro
$minutes = filter_input(INPUT_POST, 'minutes', FILTER_VALIDATE_INT); //Atribui à váriavel o valor do campo minutes do formuário no index, caso ele seja um inteiro
$plan = filter_input(INPUT_POST, 'plan', FILTER_VALIDATE_INT); //Atribui à váriavel o valor do campo plan do formuário no index, caso ele seja um inteiro

if($origin && $destiny && $minutes && $plan){ //Verifica se todos os valores são verdadeiros
    $sql = $pdo -> prepare("SELECT taxa_min FROM simulator WHERE origem=:origin AND destino=:destiny"); //Puxa a taxa por minuto da origem e destino da tabela simulator
    $sql -> bindValue(':origin', $origin);
    $sql -> bindValue(':destiny', $destiny);
    $sql -> execute();

    if($sql -> rowCount() > 0){ //Verifica se à váriavel $sql recebeu algum valor da tabela simulator
        $item = $sql -> fetch(); //Atribui os valores que foram puxados com a váriavel $sql a váriavel $item

        $valueWith = $minutes <= $plan ? 0 : ($minutes - $plan) * (($item['taxa_min'] * 0.1) + $item['taxa_min']);//Retorna o valor da ligação com o plano

        $valueWithout = ($minutes * $item['taxa_min']); //Retorna o valor da ligação sem o plano

        $_SESSION['with'] = $valueWith;
        $_SESSION['without'] = $valueWithout;

        header("Location: ../../index.php"); //Retorna para o index
        exit;
    }
} else { //Caso um dos valores seja falso, irá retornar para o index com uma menssagem de erro.
    $_SESSION['error'] = "Simulation failed! Please, try again";

    header("Location: ../../index.php"); //Retorna para o index.
    exit;
}