<?php

namespace core\utils;

use core\utils\ClassUtils;
use pocketmine\world\World;
use pocketmine\world\WorldManager;

trait Utils {
    
    use ClassUtils;
    
    public function getWorldManager(): WorldManager {
        return $this->getServer()->getWorldManager();
    }
    
    public function getDefaultWorld(): World {
        return $this->getWorldManager()->getDefaultWorld();
    }
    
    public function getPlayer(string $name) {
        foreach ($this->getOnlinePlayers() as $player) {
            if (strtolower($player->getName()) )
        }
        return null;
    }
}
