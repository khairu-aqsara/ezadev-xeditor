<?php
namespace Ezadev\Xeditor;

use Ezadev\Admin\Extension;

class Xeditor extends Extension
{
    public $name = 'xeditor';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';
}