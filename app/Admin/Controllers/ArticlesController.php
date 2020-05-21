<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticlesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->id('ID')->sortable();
        $grid->title('文章标题');
        $grid->category('文章类别');
        $grid->read_count('阅读数');
        $grid->comment_count('评论数');
        $grid->on_show('是否显示')->display(function ($value) {
            return $value ? '是' : '否';
        });

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
        $form = new Form(new Article());

        $form->text('title', '文章标题')->rules('required');
        $form->image('cover', '文章封面')->rules('required|image');
        $form->text('description', '文章简述')->rules('required');
        $form->text('category', '文章类别')->rules('required');
        $form->quill('content', '文章内容')->rules('required');
        $form->radio('on_show', '是否显示')->options([
            '1' => '是',
            '0' => '否'
        ])->default('1');

        return $form;
    }
}
