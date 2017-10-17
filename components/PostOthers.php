<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.10.2017
 * Time: 16:19
 */

namespace app\components;


use app\models\Posts;
use yii\base\Widget;
use yii\helpers\Html;

class PostOthers extends Widget
{
    public $id;

    public function run()
    {
        $posts = Posts::find()->where(['hide' => 0])
            ->where(['not', ['id' => $this->id]])
            ->orderBy('RAND()')
            ->all();

        $trs = '';

        foreach ($posts as $post)
        {
            $img = Html::tag('img', null, ['src' => $post->img, 'alt' => $post->title]);
            $a = Html::tag('a', '&laquo;' . $post->title . '&raquo;', ['href' => $post->link]);
            $span = Html::tag('span', $post->date, ['class' => 'date']);
            $td_1 = Html::tag('td', $img);
            $td_2 = Html::tag('td', $a . $span);
            $trs .= Html::tag('tr', $td_1 . $td_2);
        }

        return Html::tag('table', $trs, ['id' => 'post_others']);
    }
}