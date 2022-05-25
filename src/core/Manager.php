<?php

namespace core;

use core\utils\Config;
use core\listener\EventManager;

class Manager {
    
    public function __construct() {
        new EventManager();
        new Config();
    }
}

