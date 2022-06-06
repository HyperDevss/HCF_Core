<?php

namespace core\faction;

use core\faction\Faction;
use pocketmine\world\Position;

class Location {
    
    private $faction;
    private $home;
    private $firstPos;
    private $secondPos;
    
    public function __constrcut(Faction $faction) {
        $this->faction = $faction;
    }
    
    public function getHome() {
        return $this->home;
    }
    
    public function getFirstPos() {
        return $this->firstPos;
    }
    
    public function getSecondPos() {
        return $this->secondPos;
    }
    
    public function setHome(Position $home) {
        $this->home = $home;
    }
    
    public function setFirstPos(Position $firstPos) {
        $this->firstPos = $firstPos;
    }
    
    public function setSecondPos(Position $secondPos) {
        $this->secondPos = $secondPos;
    }
}