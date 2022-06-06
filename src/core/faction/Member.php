<?php

namespace core\faction;

use core\faction\Faction;
use core\utils\ConfigUtils;

class Member {

    use ClassUtils;

    public const OWNER = 'owner';
    public const COLEADER = 'coleader';
    public const CAPITAIN = 'capitain';

    private $name;
    private $faction;
    private $type;

    private $config;

    public function __construct(string $name, Faction $faction) {
        $this->name = $name;
        $this->faction = $faction;

        $this->config = $this->getConfig();
    }

    public function getName(): string {
        return $this->name;
    }

    public function getFaction(): Faction {
        return $this->faction;
    }

    public function setType(string $type) {
        if ($this->type === $type) return;
        $this->removeFormList();
        $this->type = $type;

        $list = $this->config->get("factions/" . $this->faction->getName(), $this->type . "s");
        $list[] = $this->name;
        $this->config->set("factions/" . $this->faction->getName(), $this->type . "s", $list);
    }

    public function getType(): string {
        return $this->type;
    }

    public function getKills(): int {
        if (!$this->config->exist("kdr/" . $this->name, "kills")) {
            $this->config->set("kdr/" . $this->name, "kills", 0);
        }

        return $this->config->get("kdr/" . $this->name, "kills");
    }

    public function getDeaths(): int {
        if (!$this->config->exist("kdr/" . $this->name, "deaths")) {
            $this->config->set("kdr/" . $this->name, "deaths", 0);
        }

        return $this->config->get("kdr/" . $this->name, "deaths");
    }

    public function getKDR(): int {
        if (!$this->config->exist("kdr/" . $this->name, "kdr")) {
            $this->config->set("kdr/" . $this->name, "kdr", 0);
        }

        return $this->config->get("kdr/" . $this->name, "kdr");
    }

    public function __destruct() {
        $this->removeFormList();
    }

    public function removeFromList() {
        $list = $this->config->get("factions/" . $this->faction->getName(), $this->type . "s");
        unset($list[$this->name]);
        $this->config->set("factions/" . $this->faction->getName(), $this->type . "s", $list);
    }
}