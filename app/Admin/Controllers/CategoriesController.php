<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoriesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章类别';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->model()->orderBy('id', 'desc');

        $grid->id('ID')->sortable();

        $grid->name('名称');

        $grid->created_at('创建时间');
        $grid->updated_at('更新时间');

        $grid->actions(function ($actions) {
            $actions->disableView();
        });


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $form->text('name', '类别名称')->rules('required');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category());

        $form->text('name', __('Name'));

        return $form;
    }
}
