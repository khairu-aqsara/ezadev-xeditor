<?php

namespace Ezadev\Xeditor;

use Ezadev\Admin\Form\Field;

class Editor extends Field
{
    protected $view = 'ezadev-xeditor::editor';

    protected $mode = "full";
    public $toolbar = [];
    protected $feature_mode = [
            'lite'=>['bold','italic','underline','strikethrough','ol','ul','paragraph','hr','clear']
        ];

    protected static $css = [
        'vendor/ezadev-xeditor/summernote/dist/summernote.css',
    ];

    protected static $js = [
        'vendor/ezadev-xeditor/summernote/dist/summernote.min.js',
    ];

    public function set_mode($mode){
        $this->mode = $mode;
        return $this;
    }

    public function set_toolbar($toolbar){
        $this->toolbar = $toolbar;
        return $this;
    }

    public function render()
    {
        $name = $this->formatName($this->column);

        $config = (array) Xeditor::config('config');
        
        if($this->mode == 'custom'){
            $feature = $this->toolbar;
        }else{
            $feature = $this->feature_mode[$this->mode];
        }

        $config = json_encode(array_merge(['toolbar'=>[['text',$feature]]], $config));


        $this->script = <<<EOT
$('#{$this->id}').summernote($config);
$('#{$this->id}').on("summernote.change", function (e) {
    var html = $('#{$this->id}').summernote('code');
    $('input[name="{$name}"]').val(html);
});
EOT;
        return parent::render();
    }
}