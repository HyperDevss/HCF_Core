<?php

namespace core;

use core\Manager;
use pocketmine\utils\SingletonTrait;
use pocketmine\plugin\PluginBase;

class Core extends PluginBase {
    
    use SingletonTrait;
    
    private $startTime;
    
    public function onEnable(): void {
        self::setInstance($this);
        $this->getLogger()->info("§ecargando...");
        
        $this->startTime = microtime(true);
        new Manager;
        
        $this->getLogger()->info("§aSe tardaron " . round((microtime(true) - $this->startTime), 2) . "s en cargar");    
    }
}

