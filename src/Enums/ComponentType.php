<?php

declare(strict_types=1);

namespace WeslenOliveira\CommonUi\Enums;

class ComponentType
{
    const DIALOG = 'dialog';

    /**
     * @return string[]
     */
    public static function available(): array
    {
        return [
            self::DIALOG
        ];
    }
}