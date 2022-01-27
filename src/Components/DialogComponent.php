<?php

declare(strict_types=1);

namespace WeslenOliveira\CommonUi\Components;

class DialogComponent extends BaseComponent
{
    protected string $type = 'dialog';

    protected string $title = 'Alert title';

    protected string $description = 'This is a alert description';

    const LIMIT_BUTTONS = 2;

    function __construct(string $title = '', string $description = '', string $image = '', array $buttons = [])
    {
        $this->setTitle($title ?? $this->title);
        $this->setDescription($description ?? $this->description);
        $this->addImage($image);
        $this->addButtons($buttons);
    }

    public function prepareValidateButton(array $button): void
    {
        parent::prepareValidateButton($button);

        if (count($this->buttons) >= self::LIMIT_BUTTONS) {
            throw new \Exception('Foi atingido o limite máximo de botões.');
        }
    }
}