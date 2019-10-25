<?php
abstract class Will {
    protected $person;
    private function __construct(Person $person){
        $this->person = $person;
    }
    public static function createWill(Person $person, $typeWill) {
        return new $typeWill($person);
    }
}
abstract class Person {
    public $will;
    public abstract function setEvidences($targetHyp,$evidences); //Set evidences for a target Hypothesis
    public abstract function getBelief($targetHyp):boolean; //Return True or False according with the preset evidences
    protected abstract function setBelief($targetHyp); //A Person's Will doesn't have access to this function, because it's Protected!
    public function __construct($willClass){
        $this->will= $willClass::createWill($this,$willClass);
    }
}

class JWill extends Will{
    public function getPersonName()
    {
        return $this->person->name;
    }
}
class Joao extends Person{
    public function setEvidences($targetHyp,$evidences){}
    public function getBelief($targetHyp):boolean{}
    protected function setBelief($targetHyp){}
    
    public function __construct($willClass){
        parent::__construct($willClass);
        $this->name="JOAO";
    }
}

$joao = new Joao(JWill::class);
echo $joao->will->getPersonName();