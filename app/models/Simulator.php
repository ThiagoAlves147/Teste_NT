<?php

class Simulator {
    private $plan;
    private $planValue;

    public function getPlan(){
        return $this -> plan; //Retorna o nome do plano
    }
    public function setPlan($plan){
        $this -> plan = $plan; //Pega o nome do plano
    }

    public function getPlanValue(){
        return $this -> planValue; //Retorna o valor do plano
    }
    public function setPlanValue($planValue){
        $this -> planValue = $planValue; //Pega o valor do plano
    }
}

?>