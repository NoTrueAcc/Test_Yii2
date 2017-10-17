<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$action = Yii::$app->controller->action->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="/web/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body>
<?php $this->beginBody() ?>
<div id="bg">
    <div id="container">
        <div id="header">
            <img src="/web/images/header.png" alt="Шапка сайта" />
        </div>
        <div id="topmenu">
            <ul>
                <li>
                    <a  href="<?=Yii::$app->urlManager->createUrl('site/index')?>"
                        <?php if ($action == "index") { ?>
                            class="active"
                        <?php } ?>>
                        <img src="/web/images/home.png" alt="Главная" />
                    </a>
                </li>
                <li>
                    <a  href="<?=Yii::$app->urlManager->createUrl(["site/author"])?>"
                        <?php if ($action == "author") { ?>
                            class="active"
                        <?php } ?>>
                        Об авторе
                    </a>
                </li>
                <li>
                    <a  href="<?=Yii::$app->urlManager->createUrl(["site/video"])?>"
                        <?php if ($action == "video") { ?>
                            class="active"
                        <?php } ?>>
                        Видеокурсы
                    </a>
                </li>
                <li>
                    <a  href="<?=Yii::$app->urlManager->createUrl(["site/rev"])?>"
                        <?php if ($action == "rev") { ?>
                            class="active"
                        <?php } ?>>
                        Видеоотзывы
                    </a>
                </li>
                <li>
                    <a rel="external" href="http://alex.esy.es" >
                        Мой сайт
                    </a>
                </li>
                <li>
                    <a  href="<?=Yii::$app->urlManager->createUrl(["site/sites"])?>"
                        <?php if ($action == "sites") { ?>
                            class="active"
                        <?php } ?>>
                        Сайты учеников
                    </a>
                </li>
            </ul>
            <div id="form_search">
                <?php $form = \yii\widgets\ActiveForm::begin(); ?>
                <table>
                    <tr>
                        <td>
                            <?=''//$form->field($model, 'q')->label('')->textInput(['class' => 'input']) ?>
                        </td>
                        <td>
                            <input type="image" src="/web/images/button_search.png" class="icon_button" alt="Поиск" />
                        </td>
                    </tr>
                </table>
                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
            <div class="clear"></div>
        </div>
        <div>
            <table id="content">
                <tr>
                    <td id="left">
                        <?=$content?>
                    </td>
                    <td id="right">
                        <div class="right_block">
                            <?php if ($action == "index") { ?>
                                <div id="author">
                                    <h3>Михаил Русаков</h3>
                                    <img src="/web/images/mr.png" alt="Михаил Русаков" />
                                    <br />
                                    <a href="<?=Yii::$app->urlManager->createUrl(["site/author"])?>">Об авторе</a>
                                </div>
                            <?php } else { ?>
                                <h3>Другие записи</h3>
                                <?php if ($action == "post")
                                {
                                    $post_id = Yii::$app->getRequest()->getQueryParam('id');
                                }
                                else
                                {
                                    $post_id = null;
                                } ?>
                                <?=\app\components\PostOthers::widget(['id' => $post_id])?>
                            <?php } ?>
                        </div>
                        <div class="right_block">
                            <table id="right_block_courses">
                                <tr>
                                    <td id="right_minicourses_list">
                                        <div class="show">
                                            <h3 class="center">Инструкция по заработку на создании сайтов под заказ</h3>
                                            <table>
                                                <tr>
                                                    <td class="arrow">
                                                        <img src="/web/images/left.png" alt="Влево" onclick="changeMiniCourse(false, 'right_minicourses_list')" />
                                                    </td>
                                                    <td class="arrow">
                                                        <img src="/web/images/right.png" alt="Вправо" onclick="changeMiniCourse(true, 'right_minicourses_list')" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="center">
                                                        <img src="/web/images/courses/freefl.png" alt="Инструкция по заработку на создании сайтов под заказ" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <p class="center">
                                                <a rel="external" href="http://srs.myrusakov.ru/freefl">Получить этот курс Бесплатно</a>
                                            </p>
                                        </div>
                                        <div class="hide">
                                            <h3 class="center">Пример создания блога на WordPress</h3>
                                            <table>
                                                <tr>
                                                    <td class="arrow">
                                                        <img src="/web/images/left.png" alt="Влево" onclick="changeMiniCourse(false, 'right_minicourses_list')" />
                                                    </td>
                                                    <td class="arrow">
                                                        <img src="/web/images/right.png" alt="Вправо" onclick="changeMiniCourse(true, 'right_minicourses_list')" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="center">
                                                        <img src="/web/images/courses/freewp.png" alt="Пример создания блога на WordPress" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <p class="center">
                                                <a rel="external" href="http://srs.myrusakov.ru/freewp">Получить этот курс Бесплатно</a>
                                            </p>
                                        </div>
                                        <div class="hide">
                                            <h3 class="center">HTML5 и CSS3 для начинающих</h3>
                                            <table>
                                                <tr>
                                                    <td class="arrow">
                                                        <img src="/web/images/left.png" alt="Влево" onclick="changeMiniCourse(false, 'right_minicourses_list')" />
                                                    </td>
                                                    <td class="arrow">
                                                        <img src="/web/images/right.png" alt="Вправо" onclick="changeMiniCourse(true, 'right_minicourses_list')" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="center">
                                                        <img src="/web/images/courses/freehtml5.png" alt="HTML5 и CSS3 для начинающих" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <p class="center">
                                                <a rel="external" href="http://srs.myrusakov.ru/freehtml5">Получить этот курс Бесплатно</a>
                                            </p>
                                        </div>
                                        <div class="hide">
                                            <h3 class="center">Создание движка на PHP для начинающих</h3>
                                            <table>
                                                <tr>
                                                    <td class="arrow">
                                                        <img src="/web/images/left.png" alt="Влево" onclick="changeMiniCourse(false, 'right_minicourses_list')" />
                                                    </td>
                                                    <td class="arrow">
                                                        <img src="/web/images/right.png" alt="Вправо" onclick="changeMiniCourse(true, 'right_minicourses_list')" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="center">
                                                        <img src="/web/images/courses/freephp2.png" alt="Создание движка на PHP для начинающих" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <p class="center">
                                                <a rel="external" href="http://srs.myrusakov.ru/freephp2">Получить этот курс Бесплатно</a>
                                            </p>
                                        </div>
                                        <div class="hide">
                                            <h3 class="center">Видеокурс по основам JavaScript</h3>
                                            <table>
                                                <tr>
                                                    <td class="arrow">
                                                        <img src="/web/images/left.png" alt="Влево" onclick="changeMiniCourse(false, 'right_minicourses_list')" />
                                                    </td>
                                                    <td class="arrow">
                                                        <img src="/web/images/right.png" alt="Вправо" onclick="changeMiniCourse(true, 'right_minicourses_list')" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="center">
                                                        <img src="/web/images/courses/freejs.png" alt="Видеокурс по основам JavaScript" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <p class="center">
                                                <a rel="external" href="http://srs.myrusakov.ru/freejs">Получить этот курс Бесплатно</a>
                                            </p>
                                        </div>
                                        <div class="hide">
                                            <h3 class="center">Создание сайта от начала и до конца</h3>
                                            <table>
                                                <tr>
                                                    <td class="arrow">
                                                        <img src="/web/images/left.png" alt="Влево" onclick="changeMiniCourse(false, 'right_minicourses_list')" />
                                                    </td>
                                                    <td class="arrow">
                                                        <img src="/web/images/right.png" alt="Вправо" onclick="changeMiniCourse(true, 'right_minicourses_list')" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="center">
                                                        <img src="/web/images/courses/book.png" alt="Создание сайта от начала и до конца" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <p class="center">
                                                <a rel="external" href="http://srs.myrusakov.ru/book">Получить этот курс Бесплатно</a>
                                            </p>
                                        </div>
                                        <div class="hide">
                                            <h3 class="center">Создание Интернет-магазина с нуля</h3>
                                            <table>
                                                <tr>
                                                    <td class="arrow">
                                                        <img src="/web/images/left.png" alt="Влево" onclick="changeMiniCourse(false, 'right_minicourses_list')" />
                                                    </td>
                                                    <td class="arrow">
                                                        <img src="/web/images/right.png" alt="Вправо" onclick="changeMiniCourse(true, 'right_minicourses_list')" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="center">
                                                        <img src="/web/images/courses/freeim.png" alt="Создание Интернет-магазина с нуля" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <p class="center">
                                                <a rel="external" href="http://srs.myrusakov.ru/freeim">Получить этот курс Бесплатно</a>
                                            </p>
                                        </div>
                                        <div class="hide">
                                            <h3 class="center">Мини-курс по вёрстке сайтов</h3>
                                            <table>
                                                <tr>
                                                    <td class="arrow">
                                                        <img src="/web/images/left.png" alt="Влево" onclick="changeMiniCourse(false, 'right_minicourses_list')" />
                                                    </td>
                                                    <td class="arrow">
                                                        <img src="/web/images/right.png" alt="Вправо" onclick="changeMiniCourse(true, 'right_minicourses_list')" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="center">
                                                        <img src="/web/images/courses/freemakeup.png" alt="Мини-курс по вёрстке сайтов" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <p class="center">
                                                <a rel="external" href="http://srs.myrusakov.ru/freemakeup">Получить этот курс Бесплатно</a>
                                            </p>
                                        </div>
                                        <div class="hide">
                                            <h3 class="center">Видеокурс по основам PHP</h3>
                                            <table>
                                                <tr>
                                                    <td class="arrow">
                                                        <img src="/web/images/left.png" alt="Влево" onclick="changeMiniCourse(false, 'right_minicourses_list')" />
                                                    </td>
                                                    <td class="arrow">
                                                        <img src="/web/images/right.png" alt="Вправо" onclick="changeMiniCourse(true, 'right_minicourses_list')" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="center">
                                                        <img src="/web/images/courses/freephp.png" alt="Видеокурс по основам PHP" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <p class="center">
                                                <a rel="external" href="http://srs.myrusakov.ru/freephp">Получить этот курс Бесплатно</a>
                                            </p>
                                        </div>
                                        <div class="hide">
                                            <h3 class="center">Видеокурс по основам HTML</h3>
                                            <table>
                                                <tr>
                                                    <td class="arrow">
                                                        <img src="/web/images/left.png" alt="Влево" onclick="changeMiniCourse(false, 'right_minicourses_list')" />
                                                    </td>
                                                    <td class="arrow">
                                                        <img src="/web/images/right.png" alt="Вправо" onclick="changeMiniCourse(true, 'right_minicourses_list')" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="center">
                                                        <img src="/web/images/courses/html.png" alt="Видеокурс по основам HTML" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <p class="center">
                                                <a rel="external" href="http://srs.myrusakov.ru/html">Получить этот курс Бесплатно</a>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </table>								</div>
                        <div class="right_block">
                            <div class="online">
                                <h3>Бесплатный онлайн-семинар</h3>
                                <p>
                                    <img src="/web/images/create-im.png" alt="Онлайн-семинар" />
                                </p>
                                <p><span>Как создать профессиональный Интернет-магазин?</span><br />После данного семинара:</p>
                                <ul class="ul_mark">
                                    <li>Вы будете знать, как создать Интернет-магазин.</li>
                                    <li>Вы получите бесплатный подарок с подробным описанием каждого шага.</li>
                                    <li>Вы сможете уже приступить к созданию Интернет-магазина.</li>
                                </ul>
                                <p>
                                    <a rel="external" href="http://srs.myrusakov.ru/createim">Записаться на семинар</a>
                                </p>
                            </div>
                            <hr />
                            <div class="online">
                                <h3>Бесплатный онлайн-семинар</h3>
                                <p>
                                    <img src="/web/images/5steps.png" alt="Онлайн-семинар" />
                                </p>
                                <p><span>5 шагов и профессиональный сайт готов!</span><br />После данного семинара:</p>
                                <ul class="ul_mark">
                                    <li>Вы будете иметь чёткий план действий.</li>
                                    <li>Вы сможете начать создавать сайт.</li>
                                    <li>Вы сможете легко ориентироваться в информации по созданию сайтов.</li>
                                </ul>
                                <p>
                                    <a rel="external" href="http://srs.myrusakov.ru/5steps">Записаться на семинар</a>
                                </p>
                            </div>								</div>
                        <div class="right_block">
                            <h3>Рекомендую</h3>
                            <div class="recommendation">
                                <img src="/web/images/2domains.png" alt="2domains.ru" />
                                <a rel="external" href="http://2domains.ru">2domains.ru</a>
                                <p>Один из лучших регистраторов доменных имен в рунете. Домен .RU и .РФ всего за 99 рублей. Все домены покупаю только у них!</p>
                            </div>
                            <br />
                            <div class="recommendation">
                                <img src="/web/images/hostia.png" alt="Hostia.ru" />
                                <a rel="external" href="http://hostia.ru/billing/host.php?uid=11034">Hostia.ru</a>
                                <p>На мой взгляд, лучший хостинг в Рунете. Я перепробовал много их, то они были медленными, то отключались часто, то была высокая цена. <a rel="external" href="http://hostia.ru/billing/host.php?uid=11034">Hostia.ru</a> - это отличная скорость, высокая надёжность и при этом низкая цена (от 0.88$ в месяц).</p>
                            </div>								</div>
                    </td>
                </tr>
            </table>
            <div class="clear"></div>
        </div>
        <div id="footer">
            <table>
                <tr>
                    <td>
                        <p>Blog_Alex_R<?=date("Y")?></p>
                        <p>Все права защищены.</p>
                    </td>
                    <td class="right">
                        <script type="text/javascript"><!--
                            document.write("<a href='http://www.liveinternet.ru/click' " + "target=_blank><img src='//counter.yadro.ru/hit?t21.11;r"
                                +escape(document.referrer)+((typeof(screen)=="undefined")?"":
                                ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
                                    screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
                                ";"+Math.random()+
                                "' alt='' title='LiveInternet: показано число просмотров за 24"+
                                " часа, посетителей за 24 часа и за сегодня' "+
                                "border='0' width='88' height='31'><\/a>")
                            //--></script>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
