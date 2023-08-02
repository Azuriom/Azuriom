<?php

namespace Azuriom\Models\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use PragmaRX\Google2FA\Google2FA;

trait TwoFactorAuthenticatable
{
    /**
     * Replace the given recovery code with a new one in the user's stored codes.
     */
    public function replaceRecoveryCode(string $code): void
    {
        $codes = $this->two_factor_recovery_codes;

        if (in_array($code, $codes, true)) {
            $this->forceFill([
                'two_factor_recovery_codes' => array_diff($codes, [$code]),
            ])->save();
        }
    }

    /**
     * Verify the given two-factor authentication code.
     *
     * @throws \PragmaRX\Google2FA\Exceptions\Google2FAException
     */
    public function isValidTwoFactorCode(string $code): bool
    {
        if (! filled($this->two_factor_secret)) {
            return false;
        }

        $code = str_replace(' ', '', $code);

        if ((new Google2FA())->verifyKey($this->two_factor_secret, $code)) {
            return true;
        }

        return $this->isValidRecoveryCode($code);
    }

    /**
     * Verify if the given code is a user recovery code.
     */
    public function isValidRecoveryCode(string $code): bool
    {
        return collect($this->two_factor_recovery_codes)
            ->contains(fn ($recoveryCode) => hash_equals($recoveryCode, $code));
    }

    /**
     * Generate two-factor authentification backup codes.
     *
     * @return string[]
     */
    public function generateRecoveryCodes(): array
    {
        return Collection::times(8, fn () => $this->generateRecoveryCode())->all();
    }

    /**
     * Generate a new recovery code.
     */
    public function generateRecoveryCode(): string
    {
        return Str::random(8).'-'.Str::random(8);
    }
}
