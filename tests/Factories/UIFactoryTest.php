<?php

declare(strict_types=1);

namespace Tests\Factories;

use PHPUnit\Framework\TestCase;
use WeslenOliveira\CommonUi\Enums\ButtonActionType;
use WeslenOliveira\CommonUi\Enums\ButtonType;
use WeslenOliveira\CommonUi\Factories\UIFactory;

class UIFactoryTest extends TestCase
{
    public function testCreateComponent()
    {
        $component = UIFactory::component('dialog')
            ->setTitle('Alert title')
            ->setDescription('This is a alert description')
            ->addImage('https://s3.amazonaws.com/cdn.picpay.com/apps/picpay/imgs/mgm_receipt.png')
            ->addPrimaryButton('This is a primary button', ButtonActionType::DEEP_LINK)
            ->addLinkButton('This is a link button', ButtonActionType::CLOSE);

        $data = $component->create();

        $this->assertIsArray($data);
    }

    public function testCreateDialogComponentOnlyConstructor()
    {
        $alertComponent = UIFactory::dialogComponent(
            'Titulo do dialog',
            'Descrição do dialog',
            '',
            [
                [
                    'type' => ButtonType::PRIMARY,
                    'title' => 'This is a primary button',
                    'action' => ButtonActionType::DEEP_LINK
                ],
                [
                    'type' => ButtonType::LINK,
                    'title' => 'This is a link button',
                    'action' => ButtonActionType::CLOSE
                ]
            ]
        );

        $data = $alertComponent->create();

        $this->assertIsArray($data);
    }

    public function testCreateDialogComponentWithoutConstructor()
    {
        $alertComponent = UIFactory::dialogComponent()
            ->setTitle('This is a title dialog')
            ->setDescription('This is a description dialog')
            ->addPrimaryButton('This is a primary button', ButtonActionType::DEEP_LINK)
            ->addLinkButton('This is a link button', ButtonActionType::CLOSE);

        $data = $alertComponent->create();

        $this->assertIsArray($data);
    }
}