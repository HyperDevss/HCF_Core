<?php

namespace core\faction;

use core\faction\Faction;

class FactionManager {
    
    use SingletonTrait;
    
    private $factions = [];
    
    public function getFactions(): array {
        return $this->factions;
    }
    
    public function get($name): Faction {
        return $this->faction[$name];
    }
    
    public function is($name): bool {
        return isset($this->factions[$name]);
    }
    
    public function create($name): Faction {
        return $this->faction[$name] = new Faction($name);
    }
    
    public function remove($name) {
        unset($this->factions[$name]);
    }
}