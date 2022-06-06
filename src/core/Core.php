<?php

namespace core;

use core\Manager;
use core\utils\Config;
use pocketmine\utils\Config as IConfig;
use pocketmine\utils\SingletonTrait;
use pocketmine\plugin\PluginBase;

class Core extends PluginBase {

    use SingletonTrait;

    private $startTime;

    public function onEnable(): void {
        self::setInstance($this);
        $this->getLogger()->info("§einicializando...");
        $this->startTime = microtime(true);

        new Manager;
        $this->getLogger()->info("§aSe tardaron " . round((microtime(true) - $this->startTime), 2) . "s en inicializar");

        // Test config cacheada
        $time2 = microtime(true);
        $value = Config::getInstance()->get("Test/Test", "name");
        echo PHP_EOL . "Se tardo: " . round((microtime(true) - $time2), 4) . "s utilizando config cacheada". PHP_EOL;
        
        // Test config normal
        $time1 = microtime(true);
        $config = new IConfig($this->getDataFolder() . "Test/Test.yml", IConfig::YAML);
        $value = $config->get("name");
        echo PHP_EOL . "Se tardo: " . round((microtime(true) - $time1), 4) . "s utilizando config normal". PHP_EOL;

    }
}