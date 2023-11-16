<?php

namespace App\Enums;

use InvalidArgumentException;

/**
 * Enum State status.
 */
enum PhraseUserStateEnum: int
{
    /**
     * Learn status.
     */
    case LEARN = 1;

    /**
     * Review status.
     */
    case REVIEW = 0;

    /**
     * Get the string representation of the enum value.
     *
     * @param int $value
     * @return string
     * @throws InvalidArgumentException
     */
    public static function getString(int $value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return strtolower($case->name);
            }
        }
        throw new InvalidArgumentException('Invalid value: ' . $value);
    }

    /**
     * Get the name representation of the enum value.
     *
     * @param int $value
     * @return string
     * @throws InvalidArgumentException
     */
    public static function getName(int $value): string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return strtolower(str_replace('_', ' ', $case->name));
            }
        }
        throw new InvalidArgumentException('Invalid value: ' . $value);
    }


    /**
     * Get key-value pairs for the enum values.
     *
     * @return array<int, string>
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
