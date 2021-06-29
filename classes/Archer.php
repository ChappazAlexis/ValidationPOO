<?php 

class Archer extends Character
{

    private $arrow = 5;
    public $aiming = false;

    public function turn($target) {
        $rand = rand(1, 100);
        if ($rand < 50 && $this->arrow > 0 && !$this->aiming ) {
            $status = $this->arrow($target);
        } else if ($rand > 50 && $this->arrow > 0 || $this->aiming) {
            $status = $this->aimedShoot($target);
        } else {
            $status = $this->attack($target);
        }
        return $status;
    } 

    public function arrow($target) {
        $target->setHealthPoints($this->damage);
        $this->arrow --;
        $status = "$this->name tire une flèche sur $target->name ($this->arrow flèches restantes) ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }

    public function aimedShoot($target) {
        $randomMult = rand(1.5, 3);
        $aimDamage = $this->damage * $randomMult;
        if (!$this->aiming) {
            $status = ("$this->name vise le point faible de $target->name.");
            $this->aiming = true;
            return $status;
        } else {
            $target->setHealthPoints($aimDamage);
            $this->arrow --;
            $this->aiming = false;
            $status = "$this->name inflige $aimDamage point de dégâts en visant le point faible de $target->name ($this->arrow flèches restantes) ! Il reste $target->healthPoints points de vie à $target->name !";
            return $status;
        }
    }

    public function attack($target) {
        $target->setHealthPoints($this->damage / 3);
        $status = "$this->name donne un coup de dague à $target->name !  Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }
}