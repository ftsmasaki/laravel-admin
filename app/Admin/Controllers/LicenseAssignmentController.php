<?php

namespace App\Admin\Controllers;

use App\Models\LicenseAssignment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LicenseAssignmentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'LicenseAssignment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new LicenseAssignment());

        $grid->column('id', __('Id'));
        $grid->column('license_id', __('License id'));
        $grid->column('asset_id', __('Asset id'));
        $grid->column('seat_memo', __('Seat memo'));
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
        $show = new Show(LicenseAssignment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('license_id', __('License id'));
        $show->field('asset_id', __('Asset id'));
        $show->field('seat_memo', __('Seat memo'));
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
        $form = new Form(new LicenseAssignment());

        //$form->number('license_id', __('License id'));
        //$form->number('asset_id', __('Asset id'));

        //ライセンスを選択するリストボックス
        //Licenseとリレーションさせて、レコードを選択するとidを取得する
        //ここにコード記載

        //製品を選択するリストボックス
        //Assetとリレーションさせて、レコードを選択するとidを取得する
        //ここにコード記載

        $form->text('seat_memo', __('Seat memo'));

        return $form;
    }
}
