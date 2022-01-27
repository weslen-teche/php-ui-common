<?php

declare(strict_types=1);

namespace WeslenOliveira\CommonUi\Enums;

class ButtonActionType
{
    const DEEP_LINK = 'deeplink';
    const CLOSE = 'close';

    /**
     * @return string[]
     */
    public static function available(): array
    {
        return [
            self::CLOSE,
            self::DEEP_LINK
        ];
    }
}