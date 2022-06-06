<?php

namespace core\faction;

class Faction {
    
    private $name;
    private $memberManager;
    private $location;
    
    public function __construct($name) {
        $this->name = $name;
        $this->memberManager = new MemberManager($this);
        $this->location = new Location($this);
    }
    
    public function init() {
        
    }
    
    public function __destruct() {
        
    }
}