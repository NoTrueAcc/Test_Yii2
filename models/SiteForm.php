<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 16.10.2017
 * Time: 18:36
 */

namespace app\models;


use yii\base\Model;

class SiteForm extends Model
{
    public $description;
    public $address;

    public function rules()
    {
        return [
            ['address', 'required', 'message' => 'Вы не ввели адрес сайта'],
            ['address', 'url', 'message' => 'Вы ввели некорректный адрес сайта'],
            ['description', 'required', 'message' => 'Вы не ввели описание сайта'],
        ];
    }
}