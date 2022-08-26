<?php

namespace Azuriom\Models\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use PragmaRX\Google2FA\Google2FA;

trait TwoFactorAuthenticatable
{
    /**
     * Replace the given recovery code with a new one in the user's stored codes.
     *
     * @param  string  $code
     * @return void
     */
    public function replaceRecoveryCode(string $code)
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
     * @param  string  $code
     * @return bool
     *
     * @throws \PragmaRX\Google2FA\Exceptions\Google2FAException
     */
    public function isValidTwoFactorCode(string $code)
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
     *
     * @param  string  $code
     * @return bool
     */
    public function isValidRecoveryCode(string $code)
    {
        return collect($this->two_factor_recovery_codes)
            ->contains(fn ($recoveryCode) => hash_equals($recoveryCode, $code));
    }

    /**
     * Generate two-factor authentification backup codes.
     *
     * @return string[]
     */
    public function generateRecoveryCodes()
    {
        return Collection::times(8, fn () => $this->generateRecoveryCode())->all();
    }

    /**
     * Generate a new recovery code.
     *
     * @return string
     */
    public function generateRecoveryCode()
    {
        return Str::random(8).'-'.Str::random(8);
    }
}
