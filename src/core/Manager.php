<?php

namespace core;

use core\utils\Config;
use core\utils\Loader;
use core\listener\EventManager;
use core\command\CommandManager;

class Manager {
    
    public function __construct() {
        new Loader();
        new Config();
        new EventManager();
        new CommandManager();
    }
}
