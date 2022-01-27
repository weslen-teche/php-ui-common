<?php

declare(strict_types=1);

namespace WeslenOliveira\CommonUi\Enums;

class ButtonType
{
    const PRIMARY = 'primary';
    const SECONDARY = 'secondary';
    const TERTIARY = 'tertiary';
    const DANGER = 'danger';
    const LINK = 'link';

    /**
     * @return string[]
     */
    public static function available(): array
    {
        return [
            self::PRIMARY,
            self::SECONDARY,
            self::TERTIARY,
            self::DANGER,
            self::LINK
        ];
    }
}