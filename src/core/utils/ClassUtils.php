<?php

namespace core\utils;

use core\Core;
use core\utils\Config; 
use core\utils\Loader;
use pocketmine\Server;

trait ClassUtils {
    
    public function getMain(): Core {
        return Core::getInstance();
    }
    
    public function getConfig(): Config {
        return Config::getInstance();
    }
    
    public function getLoader(): Loader {
        return Loader::getInstance();
    }
    
    public function getServer(): Server {
        return Server::getInstance();
    }
}
