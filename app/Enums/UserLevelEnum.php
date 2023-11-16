<?php

namespace App\Enums;

use InvalidArgumentException;

/**
 * Enum representing user levels.
 */
enum UserLevelEnum: int
{
    case CUSTOMER_LEVEL = 0;
    case BASIC_LEVEL = 1;
    case SILVER_LEVEL = 2;
    case GOLD_LEVEL = 3;
    case PLATINUM_LEVEL = 4;
    case AMBASSADOR_LEVEL = 5;

    public static function getString($value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return strtolower($case->name);
            }
        }
        throw new InvalidArgumentException('Invalid value: ' . $value);
    }


    public static function getName($value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return strtolower(str_replace('_', ' ', $case->name));
            }
        }
        throw new InvalidArgumentException('Invalid value: ' . $value);
    }

    /**
     * @return array
     */
    public static function getKeyValues(): array
    {
        $keyValues = [];
        foreach (self::cases() as $case) {
            $keyValues[$case->value] = strtolower(str_replace('_', ' ', $case->name));
        }
        return $keyValues;
    }
}
