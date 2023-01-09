<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Bill;

class ReportsController extends Controller
{
    public function actionIndex()
    {
        $allBills = Bill::find()
            ->orderby('date ASC')
            ->all();

        $result = [];

        foreach ($allBills as $bill) {
            $result[$bill->date] []= $bill;
        }

       return $this->render('index',[
            'data' => $result
        ]);
    }
}