<?php

class ControllerSimulator {
    private $pdo;

    public function __construct($pdo){
        $this -> pdo = $pdo;
    }

    public function findAllPlan(){
        try{
            $sql = $this -> pdo -> query('SELECT * FROM plans');

            if($sql -> rowCount()){

                $data = $sql -> fetchAll();
                foreach($data as $item){
                    $simulator = new Simulator();
                    $simulator -> setPlan($item['nome_plano']);
                    $simulator -> setPlanValue($item['valor_plano']);

                    $list[] = $simulator;
                }

                return $list;
            }
        }catch(PDOException $e){
            return false;
        }
        
    }

}