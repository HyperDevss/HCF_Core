<?php

namespace core\faction;

use core\faction\Faction;
use pocketmine\world\Position;

class Location {
    
    private $faction;
    public $home;
    public $firstPos;
    public $secondPos;
    
    private $config;
    
    public function __constrcut($faction) {
        $this->faction = $faction;
        $this->config = $this->getConfig();
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
        $this->config->set("factions/" . $this->faction, "home", $this->vectorToArray($this->home)); 
    }
    
    public function setFirstPos(Position $firstPos) {
        $this->firstPos = $firstPos;
        $this->config->set("factions/" . $this->faction, "firstPos", $this->vectorToArray($this->firstPos)); 
    }
    
    public function setSecondPos(Position $secondPos) {
        $this->secondPos = $secondPos;
        $this->config->set("factions/" . $this->faction, "secondPos", $this->vectorToArray($this->secondPos)); 
    }
}