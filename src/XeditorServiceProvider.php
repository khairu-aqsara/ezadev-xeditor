<?php
namespace Ezadev\Xeditor;

use Ezadev\Admin\Admin;
use Ezadev\Admin\Form;
use Illuminate\Support\ServiceProvider;

class XeditorServiceProvider extends ServiceProvider
{
    public function boot(Xeditor $extension)
    {
        if (! Xeditor::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'ezadev-xeditor');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/ezadev-xeditor/summernote')],
                'ezadev-xeditor'
            );
        }

        Admin::booting(function () {
            $name = Xeditor::config('field_name', 'xeditor');
            Form::extend($name, Editor::class);
        });

        Admin::booted(function () {
            if ($lang = Xeditor::config('config.lang')) {
                Admin::js("vendor/ezadev-xeditor/summernote/dist/lang/summernote-{$lang}.js");
            }
        });
    }
}