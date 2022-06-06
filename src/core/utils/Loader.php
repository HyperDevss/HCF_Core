<?php

namespace core\utils;

use core\Core;
use core\utils\ClassUtils;
use pocketmine\utils\SingletonTrait;

class Loader {
    
    use ClassUtils;
    use SingletonTrait;
    
    private $main;
    
    public function __construct() { 
        self::setInstance($this);
        $this->main = $this->getMain();
        $this->saveResources();
    }
    
    public function saveResources() {
        $files = [];
        
        /**foreach ($files as $file) {
            $this->main->saveResource($file);
        }*/
    }
}

