<?php

namespace Azuriom\Models\Traits;

trait InteractsWithMoney
{
    public function addMoney(float $amount)
    {
        $this->money += $amount;
    }

    public function removeMoney(float $amount)
    {
        $this->money -= $amount;
    }

    public function hasMoney(float $amount)
    {
        return $this->money >= $amount;
    }
}
