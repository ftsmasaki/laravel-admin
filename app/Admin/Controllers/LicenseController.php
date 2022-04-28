<?php

namespace App\Admin\Controllers;

use App\Models\License;
use App\Models\Product; //追記
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LicenseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'License';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new License());

        $grid->column('id', __('Id'));
        
        //リレーション　製品名を表示
        $grid->product()->product_name(__('Product name'));
        $grid->column('product_key', __('Product key'));
        $grid->column('expire_date', __('Expire date'));
        $grid->column('purchase_date', __('Purchase date'));
        $grid->column('is_notify', __('Is notify'))->bool();
        $grid->column('seats', __('Seats'));
        //$grid->column('created_at', __('Created at'));
        //$grid->column('updated_at', __('Updated at'));

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
        $show = new Show(License::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('product_id', __('Product id'));
        $show->field('product_key', __('Product key'));
        $show->field('expire_date', __('Expire date'));
        $show->field('purchase_date', __('Purchase date'));
        $show->field('is_notify', __('Is notify'));
        $show->field('seats', __('Seats'));
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
        $form = new Form(new License());

        //製品名を選択するセレクトボックス
        //Productとリレーションさせて、製品名を選択するとidを取得する
        $form->select('product_id', __('Product name'))->options(Product::all()->pluck('product_name','id'));

        $form->text('product_key', __('Product key'));
        $form->date('expire_date', __('Expire date'))->default(date('Y-m-d'));
        $form->date('purchase_date', __('Purchase date'))->default(date('Y-m-d'));
        $form->switch('is_notify', __('Is notify'));
        $form->number('seats', __('Seats'));

        return $form;
    }
}
