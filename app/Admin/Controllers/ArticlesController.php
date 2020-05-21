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
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('cover', __('Cover'));
        $show->field('description', __('Description'));
        $show->field('content', __('Content'));
        $show->field('category', __('Category'));
        $show->field('read_count', __('Read count'));
        $show->field('comment_count', __('Comment count'));
        $show->field('on_show', __('On show'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
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
