# UI Common Components

Esta biblioteca tem como responsabilidade auxiliar o processo de geração de componentes básicos do Design System para compor uma Server Driven UI.

## Recursos da Biblioteca

#### [UIFactory](src/Factories/UIFactory.php)

A **_UI Factory_** tem como objetivo criar novos componentes de forma dinamica. No qual é adicionado dinamicamente propriedades ao componente de acordo com a necessidade.

### Exemplos:

#### Exemplo 1:

```php
$dialogComponent = UIFactory::dialogComponent()
    ->setTitle('Titulo do dialog')
    ->setDescription('Descrição do dialog')
    ->addPrimaryButton('This is a primary button', ButtonActionType::DEEP_LINK)
    ->addLinkButton('This is a link button', ButtonActionType::CLOSE);

$data = $dialogComponent->create();
```

#### Exemplo 2:

```php
$dialogComponent = UIFactory::dialogComponent(
    'Titulo do dialog',
    'Descrição do componente de dialog',
    'https://s3.amazonaws.com/cdn.picpay.com/apps/picpay/imgs/mgm_receipt.png',
    [
        [
            'title' => 'This is a primary button',
            'type' => ButtonType::PRIMARY,
            'action' => ButtonActionType::DEEP_LINK
        ],
        [
            'title' => 'This is a link button',
            'type' => ButtonType::LINK,
            'action' => ButtonActionType::CLOSE
        ]
    ]
);

$data = $dialogComponent->create();
```

#### Exemplo 3:
```php
$component = UIFactory::component('dialog')
    ->setTitle('Titulo do dialog')
    ->setDescription('Descrição do dialog')
    ->addImage('https://s3.amazonaws.com/cdn.picpay.com/apps/picpay/imgs/mgm_receipt.png')
    ->addPrimaryButton('This is a primary button', ButtonActionType::DEEP_LINK)
    ->addLinkButton('This is a link button', ButtonActionType::CLOSE);

$data = $component->create();
```

#### Resultado convertido em JSON:

```json
{
  "dialog": {
    "title": "Titulo do dialog",
    "text": {
      "type": "",
      "value": "Descrição do dialog"
    },
    "image": {
      "url": ""
    },
    "buttons": [
      {
        "title": "This is a primary button",
        "type": "primary",
        "action": "deeplink"
      },
      {
        "title": "This is a link button",
        "type": "link",
        "action": "close"
      }
    ]
  }
}
```
