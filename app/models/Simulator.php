<?php

class Simulator {
    private $origin;
    private $destiny;
    private $minutes;
    private $plan;
    private $planValue;
    private $withPlan;
    private $noPlan;

    public function getOrigin(){
        return $this -> origin;
    }
    public function setOrigin($origin){
        $this -> origin = $origin;
    }

    public function getDestiny(){
        return $this -> destiny;
    }
    public function setDestiny($destiny){
        $this -> destiny = $destiny;
    }

    public function getPlan(){
        return $this -> plan;
    }
    public function setPlan($plan){
        $this -> plan = $plan;
    }

    public function getPlanValue(){
        return $this -> planValue;
    }
    public function setPlanValue($planValue){
        $this -> planValue = $planValue;
    }
}

?>