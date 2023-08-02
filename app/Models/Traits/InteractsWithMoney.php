<?php

namespace Azuriom\Models\Traits;

trait InteractsWithMoney
{
    public function addMoney(float $amount): int
    {
        return $this->increment('money', $amount);
    }

    public function removeMoney(float $amount): int
    {
        return $this->decrement('money', $amount);
    }

    public function hasMoney(float $amount): bool
    {
        return $this->money >= $amount;
    }
}
