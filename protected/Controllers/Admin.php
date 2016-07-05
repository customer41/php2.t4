<?php

namespace App\Controllers;

use App\Components\Text;
use App\Models\News;
use T4\Http\E404Exception;
use T4\Mvc\Controller;

class Admin
    extends Controller
{
    public function actionDefault()
    {
        $items = News::findAll(['order' => '__id desc']);
        $text = new Text();
        foreach ($items as $item) {
            $item->text = $text->trimText($item->text, 200);
        }
        $this->data->count = count($items);
        $this->data->items = $items;
    }

    public function actionNews($id)
    {
        $item = News::findByPK($id);
        if (false == $item) {
            throw new E404Exception();
        }
        $this->data->item = $item;
    }

    public function actionDelete($id)
    {
        $item  = News::findByPK($id);
        if (false == $item) {
            throw new E404Exception();
        }
        News::findByPK($id)->delete();
        $this->redirect('/admin/default');
    }

    public function actionAdd()
    {
        if (!empty($_POST)) {
            $item = new News();
            $item->fill($_POST);
            $item->time = date("Y-m-d H:i:s", time());
            $item->save();
            $this->redirect('/admin/default');
        }
    }
    
    public function actionEdit($id)
    {
        $item = News::findByPK($id);
        if (false == $item) {
            throw new E404Exception();
        }
        if (!empty($_POST)) {
            $item->fill($_POST);
            $item->save();
            $this->redirect('/admin/default');
        }
        $this->data->item = $item;
    }
}