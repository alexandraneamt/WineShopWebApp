<?php
class Wine {
    private $name;
    private $description;
    private $year;
    private $type;
    private $servingTemp;
//declare variables
    
    public function __construct ($n, $d, $y, $t, $st){ 
        $this->name =$n;
        $this->description =$d;
        $this->year =$y;
        $this->type = $t;
        $this->servingTemp =$st;
    }
 //constructs default parameter
    
    public function getName() { return $this->name;}
    public function getDescription() { return $this->description;}
    public function getYear() { return $this->year;}
    public function getType(){ return $this->type;}
    public function getServingTemp () { return $this->servingTemp;}
    
}
//displays the wines in a table