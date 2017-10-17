<?php
use yii\widgets\LinkPager;

$this->title = "Личный блог Alex_R";

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Личный блог Alex_R и его выпуски рассылки.'
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'alex_r, блог alex_r, рассылка alex_r'
])

?>
<?php
foreach ($posts as $post)
{
    include "intro_post.php";
}
?>
<br />
<hr />
<div id="pages">
    <?= LinkPager::widget([
        'pagination' => $pagination,
        'firstPageLabel' => 'В начало',
        'lastPageLabel' => 'В конец',
        'prevPageLabel' => '&laquo;'
    ]) ?>
    <span>Страница <?=$active_page?> из <?=$count_pages?></span>
    <div class="clear"></div>
</div>