<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.10.2017
 * Time: 17:21
 */

namespace app\models;


use yii\db\ActiveRecord;

class Minicourses extends ActiveRecord
{
    public function afterFind()
    {
        $this->img = '/web/images/minicourses/' . $this->img;
    }
}