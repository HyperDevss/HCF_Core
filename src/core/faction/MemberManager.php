<?php

namespace core\faction;

use core\faction\Faction;
use core\faction\Member;

class MemberManager {

    private $faction;
    private $owner;
    private $members = [];

    public function __construct(Faction $faction) {
        $this->faction = $faction;
    }

    public function add(string $name, string $type) {
        $member = $this->members[$name] = new Member($name, $type, $this->faction);
        $member->setType($type);
        return $member;
    }

    public function get(string $name): Member {
        return $this->members[$name];
    }

    public function is(string $name): bool {
        return isset($this->members[$name]);
    }

    public function remove(string $name) {
        if ($this->members[$name]->getType() === Member::OWNER) {
            $this->faction->remove();
        } else {
            unset($this->members[$name]);
        }
    }

    public function getOnly(string $type) {
        $members = [];
        foreach ($this->members as $member) {
            if ($member->getType() === $type && $type === Member::OWNER) return $member;
            $members[] = $member;
        }

        return $members;
    }
}