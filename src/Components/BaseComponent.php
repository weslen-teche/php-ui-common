<?php

declare(strict_types=1);

namespace WeslenOliveira\CommonUi\Components;

use WeslenOliveira\CommonUi\Enums\ButtonActionType;
use WeslenOliveira\CommonUi\Enums\ButtonType;

abstract class BaseComponent
{
    protected string $type = 'component';
    protected string $title = 'This is a title';
    protected string $description = 'This is a description';
    protected string $image = '';
    protected array $buttons = [];

    public function setTitle(string $value): self
    {
        if (!empty(trim($value))) {
            $this->title = trim($value);
        }

        return $this;
    }

    public function setDescription(string $value): self
    {
        if (!empty(trim($value))) {
            $this->description = trim($value);
        }

        return $this;
    }

    public function addImage(string $value): self
    {
        if (filter_var(trim($value), FILTER_VALIDATE_URL) && checkdnsrr(trim($value), 'A')) {
            $this->image = trim($value);
        }

        return $this;
    }

    protected function prepareValidateButton(array $button): void
    {
        if (empty($button['type'])) {
            throw new \Exception('Deve-se informar o tipo do botão.');
        }

        if (empty($button['title'])) {
            throw new \Exception('Deve-se informar o titulo do botão.');
        }

        if (empty($button['action'])) {
            throw new \Exception('Deve-se informar a ação do botão.');
        }

        if (!in_array(strtolower($button['type']), ButtonType::available())) {
            throw new \InvalidArgumentException(sprintf('O tipo do botão %s não é valido.', $button['type']));
        }

        if (!in_array(strtolower($button['action']), ButtonActionType::available())) {
            throw new \InvalidArgumentException(sprintf('O tipo de ação %s não é valido.', $button['action']));
        }

        if (is_int(array_search($button['type'], array_column($this->buttons, 'type')))) {
            throw new \Exception(sprintf('Não é possivel adicionar outro botão do tipo %s', $button['type']));
        }
    }

    public function addButton(string $type, string $title, string $action): self
    {
        if (!in_array(strtolower($type), ButtonType::available())) {
            throw new \InvalidArgumentException(sprintf('O tipo de botão %s não é valido.', $type));
        }

        $this->addNewButton($type, $title, $action);

        return $this;
    }

    private function addNewButton(string $type, string $title, string $action)
    {
        $button = [
            'type' => $type,
            'title' => $title,
            'action' => $action
        ];

        $this->prepareValidateButton($button);

        $this->buttons[] = $button;
    }

    protected function addButtons(array $buttons): void
    {
        foreach ($buttons as $button) {
            if (empty($button['title']) || empty($button['type']) || empty($button['action'])) {
                throw new \InvalidArgumentException('Você deve informar todas as propriedades obrigatorias do botão');
            }

            $this->addButton($button['type'], $button['title'], $button['action']);
        }
    }

    public function addPrimaryButton(string $title, string $action): self
    {
        $this->addNewButton(ButtonType::PRIMARY, $title, $action);

        return $this;
    }

    public function addSecondaryButton(string $title, string $action): self
    {
        $this->addNewButton(ButtonType::SECONDARY, $title, $action);

        return $this;
    }

    public function addTertiaryButton(string $title, string $action): self
    {
        $this->addNewButton(ButtonType::TERTIARY, $title, $action);

        return $this;
    }

    public function addDangerButton(string $title, string $action): self
    {
        $this->addNewButton(ButtonType::DANGER, $title, $action);

        return $this;
    }

    public function addLinkButton(string $title, string $action): self
    {
        $this->addNewButton(ButtonType::LINK, $title, $action);

        return $this;
    }

    public function create(): array
    {
        return [
            strval($this->type) => [
                'title' => $this->title,
                'text' => [
                    'type' => 'plain',
                    'value' => $this->description
                ],
                'image' => [
                    'url' => $this->image
                ],
                'buttons' => $this->buttons,
            ],
        ];
    }
}