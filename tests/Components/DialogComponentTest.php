<?php

declare(strict_types=1);

namespace Tests\Components;

use PHPUnit\Framework\TestCase;
use WeslenOliveira\CommonUi\Components\DialogComponent;
use WeslenOliveira\CommonUi\Enums\ButtonActionType;
use WeslenOliveira\CommonUi\Enums\ButtonType;

class DialogComponentTest extends TestCase
{
    public function testCreateDialogComponentComplete()
    {
        $alertComponent = new DialogComponent(
            'Componente de Alerta',
            'Esta é a descrição do componente de alerta',
            'https://s3.amazonaws.com/cdn.picpay.com/apps/picpay/imgs/mgm_receipt.png',
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
        $this->assertArrayHasKey('title', $data['dialog']);
        $this->assertArrayHasKey('text', $data['dialog']);
        $this->assertArrayHasKey('image', $data['dialog']);
        $this->assertArrayHasKey('buttons', $data['dialog']);
        $this->assertEquals('Componente de Alerta', $data['dialog']['title']);
        $this->assertEquals('Esta é a descrição do componente de alerta', $data['dialog']['text']['value']);
    }

    public function testCreateDialogComponentOnlyPrimaryButton()
    {
        $alertComponent = new DialogComponent(
            'Componente de Alerta',
            'Esta é a descrição do componente de alerta',
        );

        $alertComponent->addPrimaryButton('Este é um botão primario', ButtonActionType::DEEP_LINK);

        $data = $alertComponent->create();

        $this->assertArrayHasKey('buttons', $data['dialog']);
    }

    public function testCreateDialogComponentOnlySecondaryButton()
    {
        $alertComponent = new DialogComponent(
            'Componente de Alerta',
            'Esta é a descrição do componente de alerta',
        );

        $alertComponent->addSecondaryButton('Este é um botão secundario', ButtonActionType::DEEP_LINK);

        $data = $alertComponent->create();

        $this->assertArrayHasKey('buttons', $data['dialog']);
    }

    public function testCreateDialogComponentOnlyTertiaryButton()
    {
        $alertComponent = new DialogComponent(
            'Componente de Alerta',
            'Esta é a descrição do componente de alerta',
        );

        $alertComponent->addTertiaryButton('Este é um botão terciario', ButtonActionType::DEEP_LINK);

        $data = $alertComponent->create();

        $this->assertArrayHasKey('buttons', $data['dialog']);
    }

    public function testCreateDialogComponentOnlyDangerButton()
    {
        $alertComponent = new DialogComponent(
            'Componente de Alerta',
            'Esta é a descrição do componente de alerta',
        );

        $alertComponent->addDangerButton('Este é um botão danger', ButtonActionType::DEEP_LINK);

        $data = $alertComponent->create();

        $this->assertArrayHasKey('buttons', $data['dialog']);
    }

    public function testCreateDialogComponentOnlyLinkButton()
    {
        $alertComponent = new DialogComponent(
            'Componente de Alerta',
            'Esta é a descrição do componente de alerta',
        );

        $alertComponent->addLinkButton('Este é um botão link', ButtonActionType::DEEP_LINK);

        $data = $alertComponent->create();

        $this->assertArrayHasKey('buttons', $data['dialog']);
    }
}