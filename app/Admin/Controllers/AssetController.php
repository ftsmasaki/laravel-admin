<?php

namespace App\Admin\Controllers;

use App\Models\Asset;
use App\Models\Customer; //追記
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AssetController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Asset';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Asset());

        $grid->column('id', __('Id'));
        //$grid->column('customer_id', __('Customer id'));
        //リレーション　顧客名を表示
        $grid->customer()->customer_name(__('Customer name'));
        $grid->column('asset_name', __('Asset name'));
        $grid->column('asset_user_name', __('Asset user name'));
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
        $show = new Show(Asset::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('customer_id', __('Customer id'));
        $show->field('asset_name', __('Asset name'));
        $show->field('asset_user_name', __('Asset user name'));
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
        $form = new Form(new Asset());
        
        //$form->number('customer_id', __('Customer id'));

        //顧客名を選択するセレクトボックス
        //Customerとリレーションさせて、顧客名を選択するとidを取得する
        $form->select('customer_id', __('Customer name'))->options(Customer::all()->pluck('customer_name','id'));
        
        $form->text('asset_name', __('Asset name'));
        $form->text('asset_user_name', __('Asset user name'));

        return $form;
    }
}
