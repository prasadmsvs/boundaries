<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Property;

class PropertyController extends Controller
{
    public function actionIndex()
    {
        $query = Property::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $properties = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'properties' => $properties,
            'pagination' => $pagination,
        ]);
    }
}