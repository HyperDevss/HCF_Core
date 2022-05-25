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
    }

    public function loadConfigs() {
        $glob = glob($this->dataFolder);
        if (count($glob) === 0) return;

        $dirs = [];
        foreach ($glob as $path) {
            if (is_file($path)) {
                $this->readFile($path);
                continue;
            }

            $dirs[] = $path;
        }

        if (count($dirs) > 0) {
            foreach ($dirs as $path) {
                $this->readDir($path);
            }
        }
    }

    public function readDir(string $dirPath) {
        $glob = glob($dirPath);

        if (count($glob) > 0) {
            foreach ($glob as $path) {
                $this->readFile($path);
            }
        }
    }

    public function readFile(string $path) {}
}