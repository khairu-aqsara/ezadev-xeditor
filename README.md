Ezadev Summernote Text Editor 
======


## Installation

```bash
composer require ezadev/xeditor
```

Then
```bash
php artisan vendor:publish --tag=ezadev-xeditor
```

## Configuration

In the `extensions` section of the `config/admin.php` file, add some configuration that belongs to this extension.
```php

    'extensions' => [
        'xeditor' => [
            'enable' => true,
            'config' => [
                'lang'   => 'id-ID',
                'height' => 250,
            ]
        ]
    ]

```

## Usage

Use it in the form:
```php
$form->xeditor('content')->set_mode('full|lite|custom')->set_toolbar(['bold','underline']);
```

for custom toolbar please refer to the https://summernote.org/deep-dive/ 