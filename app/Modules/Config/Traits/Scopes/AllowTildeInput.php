<?php

namespace App\Modules\Config\Traits\Scopes;

trait AllowTildeInput
{
    /**
     * Check whether a value ends with tilde
     *
     * @param      string  $value   The value to be replaced
     *
     * @return     bool
     */
    private function endsWithTilde(string $value): bool
    {
        return preg_match('/\~$/', $value);
    }

    /**
     * Removes a trailing tilde.
     *
     * @param      string  $value  The value
     *
     * @return     string
     */
    private function stripTrailingTilde(string $value): string
    {
        return preg_replace('/(\~)$/', '', $value);
    }
}
