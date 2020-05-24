<?php

namespace App\Admin\Controllers;

use App\Models\Link;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LinksController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '友链';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Link());

        $grid->model()->orderBy('id', 'desc');

        $grid->id('ID');
        $grid->name('网站名称');
        $grid->cover('网站logo')->image();
        $grid->url('网站链接');
        $grid->description('网站描述');
        $grid->created_at('创建时间');
        $grid->updated_at('更新时间');

        $grid->actions(function ($actions) {
            $actions->disableView();
        });

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Link());

        $form->text('name', '网站名称')->rules('required');
        $form->text('cover', '网站logo')->rules('required');
        $form->text('url', '网站链接')->rules('required');
        $form->text('description', '网站简述')->rules('required');

        return $form;
    }
}
