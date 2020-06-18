<?php

namespace Azuriom\Models\Traits;

trait InteractsWithMoney
{
    public function addMoney(float $amount)
    {
        $this->increment('money', $amount);
    }

    public function removeMoney(float $amount)
    {
        $this->decrement('money', $amount);
    }

    public function hasMoney(float $amount)
    {
        return $this->money >= $amount;
    }
}
