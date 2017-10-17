<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.10.2017
 * Time: 17:21
 */

namespace app\models;


use yii\db\ActiveRecord;

class Courses extends ActiveRecord
{
    public $img;
    public $order;
    public $link;

    public function afterFind()
    {
        $this->img = '/web/images/courses/' . $this->alias;
        $this->order = \Yii::$app->urlManager->createUrl(['order', 'product_ids' . $this->srs_id]);
        $this->link = \Yii::$app->urlManager->createUrl([$this->alias]);
    }
}