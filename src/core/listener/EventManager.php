<?php

namespace core\listener;

use core\utils\ClassUtils;
use core\listener\LobbyListener;

class EventManager {
    
    use ClassUtils;
    
    public function __construct() {
        $core = $this->getMain();
        $pluginManager = $core->getServer()->getPluginManager();
        $pluginManager->registerEvents(new LobbyListener(), $core);
    }
}

