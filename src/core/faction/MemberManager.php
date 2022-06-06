<?php

namespace core\faction;

use core\faction\Faction;
use core\faction\Member;

class MemberManager {
    
    private $faction;
    private $members = [];
    
    public function __construct(Faction $faction) {
        $this->faction = $faction;
    }
    
    public function add(string $name, string $type) {
        return $this->members[$name] = new Member($name, $type, $this->faction);
    }
    
    public function get(string $name): Member {
        return $this->members[$name];
    }
    
    public function is(string $name): bool {
        return isset($this->members[$name]);
    }
    
    public function remove(string $name) {
        unset($this->members[$name]);
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