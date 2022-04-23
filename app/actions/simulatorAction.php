<?php
session_start();
require_once "../../config.php";

$origin = filter_input(INPUT_POST, 'origin', FILTER_VALIDATE_INT);
$destiny = filter_input(INPUT_POST, 'destiny', FILTER_VALIDATE_INT);
$minutes = filter_input(INPUT_POST, 'minutes', FILTER_VALIDATE_INT);
$plan = filter_input(INPUT_POST, 'plan', FILTER_VALIDATE_INT);

if($origin && $destiny && $minutes && $plan){
    $sql = $pdo -> prepare("SELECT taxa_min FROM simulator WHERE origem=:origin AND destino=:destiny");
    $sql -> bindValue(':origin', $origin);
    $sql -> bindValue(':destiny', $destiny);
    $sql -> execute();

    if($sql -> rowCount() > 0){
        $item = $sql -> fetch();

        $valueWith = $minutes <= $plan ? 0 : ($minutes - $plan) * (($item['taxa_min'] * 0.1) + $item['taxa_min']);

        $valueWithout = ($minutes * $item['taxa_min']);

        $_SESSION['with'] = $valueWith;
        $_SESSION['without'] = $valueWithout;

        header("Location: ../../index.php");
        exit;
    }

    // $simulator = new Simulator();
    // $data = new ControllerSimulator($this -> pdo);

    // $simulator -> setOrigin($origin);
    // $simulator -> setDestiny($destiny);
    // $simulator -> setPlan($plan);

    // $data -> checkResult($simulator);
} else {
    $_SESSION['error'] = "Simulation failed! Please, try again";

    header("Location: ../../index.php");
    exit;
}