<?php

namespace App\Controllers;

use App\Components\Text;
use App\Models\Band;
use App\Models\News;
use T4\Http\E404Exception;
use T4\Mvc\Controller;

class Index
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
    
    public function actionBand()
    {
        $items = Band::findAll();
        $text = new Text();
        foreach ($items as $item) {
            $item->biography = $text->trimText($item->biography, 1000);
        }
        $this->data->items = $items;
    }

    public function actionArtist($id)
    {
        $item = Band::findByPK($id);
        if (false == $item) {
            throw new E404Exception();
        }
        $this->data->item = $item;
    }
}