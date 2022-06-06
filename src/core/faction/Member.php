<?php

namespace core\faction;

use core\faction\Faction;
use core\utils\ConfigUtils;

class Member {
    
    use ClassUtils;
    
    public const OWNER = 'owner';
    public const COLEADER = 'coleader';
    public const CAPITAIN = 'capitain';
    
    private $name;
    private $faction;
    private $type;
    
    private $config;
    
    public function __construct(string $name, string $tyow, Faction $faction) {
        $this->name = $name;
        $this->type = $type;
        $this->faction = $faction;
        
        $this->config = $this->config;
    }
    
    public function getName(): string {
        return $this->name;
    }
    
    public function getFaction(): Faction {
        return $this->faction;
    }
    
    public function getType(): string {
        return $this->type;
    }
    
    public function getKills(): int {
        if (!$this->config->exist("kdr/" . $this->name, "kills") {
            $this->config->set("kdr/" . $this->name, "kills", 0);
        }
        
        return $this->config->get("kdr/" . $this->name, "kills");
    }
    
    public function getDeaths(): int {
        if (!$this->config->exist("kdr/" . $this->name, "deaths") {
            $this->config->set("kdr/" . $this->name, "deaths", 0);
        }
        
        return $this->config->get("kdr/" . $this->name, "deaths");
    }
    
    public function getKDR(): int {
        if (!$this->config->exist("kdr/" . $this->name, "kdr") {
            $this->config->set("kdr/" . $this->name, "kdr", 0);
        }
        
        return $this->config->get("kdr/" . $this->name, "kdr");
    }
}