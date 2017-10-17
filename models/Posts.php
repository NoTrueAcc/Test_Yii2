<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.10.2017
 * Time: 17:22
 */

namespace app\models;


use yii\db\ActiveRecord;

class Posts extends ActiveRecord
{
    public $number;
    public $link;

    public function afterFind()
    {
        $monthes = array(
            '1' => 'Января','2' => 'Февраля','3' => 'Марта','4' => 'Апреля',
            '5' => 'Мая','6' => 'Июня','7' => 'Июля','8' => 'Августа',
            '9' => 'Сентября','10' => 'Октября','11' => 'Ноября','12' => 'Декабря',
        );

        $this->date = date('j ', $this->date) . $monthes[date('n', $this->date)] . date(', Y', $this->date);
        $this->intro_text = $this->replaceContent($this->intro_text);
        $this->full_text = $this->replaceContent($this->full_text);
        $this->img = '/web/images/posts/' . $this->img;
        $this->link = \Yii::$app->urlManager->createUrl(['site/post', 'id' => $this->id]);
    }

    public function replaceContent($text)
    {
        $text = $this->youtube($text);
        $text = $this->flowplayer($text);

        return $text;
    }

    public static function setNumbers($posts)
    {
        $releases = Posts::find()->where(['is_release' => 1])->orderBy('date')->all();
        $number = 1;

        foreach ($releases as $release)
        {
            foreach ($posts as $post)
            {
                if($release->id == $post->id)
                {
                    $post->number = $number;
                }
            }
            $number++;
        }
    }

    private function youtube($text)
    {
        $reg = "/{youtube:([\w-_]*),(\d*)?,(\d*)?}/i";
        $text = preg_replace($reg,
            str_replace(
                array('%name%', '%width%', '%height%'),
                array('\\1', '\\2', '\\3'),
                file_get_contents(\Yii::$app->basePath . \Yii::$app->params['dir_tmpl'] . 'youtube.phtml')),
            $text);

        return $text;
    }

    private function flowplayer($text)
    {
        $reg = "/{flowplayer:([\w-_]*),(\d*)?,(\d*)?}/i";
        $text = preg_replace($reg,
            str_replace(
                array('%name%', '%width%', '%height%'),
                array('\\1', '\\2', '\\3'),
                file_get_contents(\Yii::$app->basePath . \Yii::$app->params['dir_tmpl'] . 'flowplayer.phtml')),
            $text);

        return $text;
    }
}