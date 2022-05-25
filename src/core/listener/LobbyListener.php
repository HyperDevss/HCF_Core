<?php

namespace core\listener;

use core\Core;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;

class LobbyListener implements Listener {
    
    private $defaultWorld;
    
    public function __construct() {
        $this->defaultWorld = Core::getInstance()->getServer()->getWorldManager()->getDefaultWorld();
    }
    
    public function onBreak(BlockBreakEvent $event) {
        
    }
    
    public function inLobby($object) {
        return $object->getPosition()->getWorld()->getFolderName() === $this->defaultWorld->getFolderName();
    }
}

