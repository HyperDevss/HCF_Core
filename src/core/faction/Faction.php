<?php

namespace core\faction;

use core\utils\ClassUtils;

class Faction {

    use ClassUtils;

    private $name;
    private $memberManager;
    private $location;
    private $dtr = 1.99;

    private $config;

    public function __construct($name) {
        $this->name = $name;
        $this->memberManager = new MemberManager($this);
        $this->location = new Location($name);
    }

    public function getDTR() {
        return $this->dtr;
    }

    public function addDTR($dtr) {
        $this->dtr += $dtr;
        $this->config->set("factions/" . $this->name, "dtr", $this->dtr);
    }

    public function init() {
        if (!$this->config->exist("factions/" . $this->name, "name")) $this->config->setAll("factions/" . $this->name, $this->getDefaultConfig());
    }


    public function __destruct() {
        $this->remove();
    }

    public function remove() {}

    public function getDefaultConfig(): array {
        return [
            "name" => $this->name,
            "dtr" => 1.99,
            "state" => "active",
            "crystals" => 0,
            "points" => 0,
            "home" => null,
            "firstPos" => null,
            "secondPos" => null,
            "owner" => null,
            "coleaders" => [],
            "capitains" => [],
            "members" => []
        ];
    }
}