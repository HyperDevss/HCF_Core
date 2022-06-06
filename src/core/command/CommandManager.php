<?php

namespace core\command;

use core\utils\ClassUtils;

class CommandManager {
    
    use ClassUtils;
    
    public function __construct() {
        $commandMap = $this->getMain()->getServer()->getCommandMap();
    }
}
