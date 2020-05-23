<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

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

        $grid->model()->orderBy('id', 'desc');

        $grid->id('ID')->sortable()->style('text-align:center;vertical-align:middle');
        $grid->cover('文章封面')->image()->style('text-align:center;vertical-align:middle');
        $grid->title('文章标题')->style('text-align:center;vertical-align:middle');
        $grid->column('category.name', '文章类别')->style('text-align:center;vertical-align:middle');
        // $grid->category_id('文章类别')->display(function ($value) {
        //     return Category::query()->where('id', $value)->first()->name;
        // });
        $grid->read_count('阅读数')->style('text-align:center;vertical-align:middle');
        $grid->comment_count('评论数')->style('text-align:center;vertical-align:middle');
        $grid->on_show('是否显示')->bool()->style('text-align:center;vertical-align:middle');
        $grid->is_top('是否置顶')->bool()->style('text-align:center;vertical-align:middle');
        $grid->created_at('创建时间')->style('text-align:center;vertical-align:middle');

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
        $form->select('category_id', '文章类别')->options($this->getSelectOptions())->rules('required');
        $form->quill('content', '文章内容')->rules('required');
        $form->radio('on_show', '是否显示')->options([
            '1' => '是',
            '0' => '否'
        ])->default('1');
        $form->radio('is_top', '是否置顶')->options([
            '1' => '是',
            '0' => '否'
        ])->default('0');

        return $form;
    }

    // 获取下拉框的值
    public function getSelectOptions() {
        $options = DB::table('categories')->select('id','name as text')->get();
        $selectOption = [];
        foreach ($options as $option){
            $selectOption[$option->id] = $option->text;
        }
        return $selectOption;
    }
}
