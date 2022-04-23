<?php

class ControllerSimulator {
    private $pdo;

    public function __construct($pdo){ //Recebe a conexão com o banco de dados
        $this -> pdo = $pdo;
    }

    public function findAllPlan(){ //Método para pegar todos os planos do banco de dados
        try{
            $sql = $this -> pdo -> query('SELECT * FROM plans'); //Tenta pegar os valores do banco de dados

            if($sql -> rowCount() > 0){ //Verifica se na váriavel $sql existe algum dado

                $data = $sql -> fetchAll();
                foreach($data as $item){
                    $simulator = new Simulator();
                    $simulator -> setPlan($item['nome_plano']);
                    $simulator -> setPlanValue($item['valor_plano']);

                    $list[] = $simulator;
                }

                return $list; //Retorna um array com os dados do plano.
            }
        }catch(PDOException $e){
            return false;
        }
        
    }

}