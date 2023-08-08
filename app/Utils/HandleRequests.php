<?php

namespace App\Utils;

class HandleRequests
{
    /**
     * Check if an array row contains only empty values
     * 
     * @param array
     * @return bool
     */
    public static function checkEmptyRow(array $row): bool
    {
        foreach ($row as $value) {
            if (!empty($value)) {
                return false;
            }
        }
        return true;
    }
}
