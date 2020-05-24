<?php

namespace App\Admin\Controllers;

use App\Models\Diary;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DiariesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '日记';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Diary());

        $grid->model()->orderBy('id', 'desc');

        $grid->id('ID')->sortable();

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
        $form = new Form(new Diary());

        $form->quill('content', '文章内容')->rules('required');

        return $form;
    }
}
