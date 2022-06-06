<?php

namespace core\utils;

use core\Core;
use pocketmine\utils\Config as IConfig;
use pocketmine\utils\SingletonTrait;

class Config {

    use SingletonTrait;

    private $configs = [];
    private $dataFolder;

    public function __construct() {
        self::setInstance($this);
        $this->dataFolder = Core::getInstance()->getDataFolder();
        $this->loadConfigs();
        $this->set("Test/Test", "name", "buba");
    }

    public function loadConfigs() {
        $files = [
            "Test/Test"
        ];

        foreach ($files as $file) {
            $this->readFile($file);
        }
    }


    public function readFile(string $path) {
        $this->configsLoaded[$path] = new IConfig($this->dataFolder . $path . ".yml", IConfig::YAML);
        $this->configs[$path] = $this->configsLoaded[$path]->getAll();
    }

    public function getAll($file) {
        if ($file === null) return $this->configs;
        return $this->configs[$file];
    }

    public function get($file, $key) {
        return $this->configs[$file][$key];
    }

    public function exist($file, $key): bool {
        if (!isset($this->configsLoaded[$file])) $this->readFile($file);
        return isset($this->configs[$file][$key]);
    }

    public function set($file, $key, $value) {
        $config = $this->configsLoaded[$file];
        $config->set($key, $value);
        $config->save();
        $this->configs[$file][$key] = $value;
    }

    public function remove($file, $key) {
        $config = $this->configsLoaded[$file];
        $config->remove($key);
        $config->save();
        unset($this->configs[$file][$key]);
    }

    public function setAll($file, array $content) {
        $config = $this->configsLoaded[$file];
        $config->setAll($value);
        $config->save();
        $this->configs[$file][$key] = $value;
    }

    public function removeAll($file) {
        unset($this->configsLoaded[$file]);
        unset($this->configs[$file]);
        unlink($this->dataFolder . $file . ".yml");
    }
}