<?php

declare(strict_types=1);

namespace WeslenOliveira\CommonUi\Factories;

use WeslenOliveira\CommonUi\Components\DialogComponent;
use WeslenOliveira\CommonUi\Components\BaseComponent;
use WeslenOliveira\CommonUi\Enums\ComponentType;

class UIFactory
{
    public static function component(string $type): BaseComponent
    {
        if (!in_array(strtolower($type), ComponentType::available())) {
            throw new \InvalidArgumentException(sprintf('O tipo %s de componente informado não existe.', $type));
        }

        $className = 'WeslenOliveira\\CommonUi\\Components\\' . ucfirst($type) . 'Component';

        return new $className();
    }

    public static function dialogComponent(string $title = '', string $description = '', string $image = '', array $buttons = []): DialogComponent
    {
        return new DialogComponent($title, $description, $image, $buttons);
    }
}