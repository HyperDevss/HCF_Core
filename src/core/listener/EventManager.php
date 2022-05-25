<?php

namespace core\listener;

use core\Core;
use core\listener\LobbyListener;

class EventManager {
    
    public function __construct() {
        $core = Core::getInstance();
        $pluginManager = $core->getServer()->getPluginManager();
        $pluginManager->registerEvents(new LobbyListener(), $core);
    }
}

