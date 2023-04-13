<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title><?=$title_for_layout?></title>
        <?php if(isset($meta['keywords'])): ?>
            <?php echo $this->Html->meta('keywords', $meta['keywords']); ?>
        <?php endif; ?>
        <?php if(isset($meta['description'])): ?>
            <?php echo $this->Html->meta('description', $meta['description']); ?>
        <?php endif; ?>

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

        <?php
            echo $this->Html->meta(
                'favicon.ico',
                '/favicon.svg?v=1.1',
                array('type' => 'icon')
            );
        ?>

        <!-- <script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script> -->
        <!-- <script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit"></script> -->

        <link rel="stylesheet" href="/css/style.css" />

        <?php
            echo $this->Html->script(
                array('jquery-3.0.0.min', 'index'),
                array('defer' => true)
            );
        ?>
    </head>
	<body class="container--column gap-24">
        <?php echo $this->element('modals') ?>
		<?php echo $this->element('navbar') ?>
		<section class="hero-section px-8">
            <div class="hero-section-bg">
                <img class="hero-bg" src="/assets/bg-gradient-1.png" />
                <div class="hero-illustration-content">
                    <img class="illustration-1" src="/assets/graduation-hat.png" />
                    <img class="illustration-shadow-2" src="/assets/illustration-1-shadow.png" />
                    <img class="illustration-2" src="/assets/illustration-1.png" />
                    <img class="illustration-3" src="/assets/globe.png" />
                </div>
            </div>
			<div class="hero-inner">
                <div class="hero-inner-title">
                    <h1 class="text text-color-secondary">Помогаем</h1>
                    <h1 class="text text-color-large">поступить за рубеж</h1>
                    <h1 class="text text-color-large">и выучить английский</h1>
                </div>
				<div class="note-content my-25">
                    <span class="note-border"></span>
					<span class="text text-color-black text-type-medium ">
						<b>GSC STUDY</b> — образовательный центр, где вам не придется переживать о сроках подачи документов,
						мотивационном письме и готовности визы. Мы сопровождаем наших студентов в вопросах изучения языка, сдачи международных
						экзаменов и поступления в учебные заведения.
					</span>
				</div>
                <div class="container gap-12 container--column-mobile gap-24-mobile">
                    <a class="button button-primary" onclick="handleModalToggle('apply-modal');">
                        <span class="text text-color-white text-type-medium text-font-weight-700 text-transform-uppercase">получить консультацию</span>
                    </a>
                    <a class="button button-secondary" onclick="handleModalToggle('english-school-apply-modal');">
                        <span class="text text-color-white text-type-medium text-font-weight-700 text-transform-uppercase">узнать уровень английского</span>
                    </a>
                </div>
			</div>
		</section>
        <section class="container gap-12 container--column-mobile gap-24-mobile px-8 my-25">
            <div class="card card-type-1">
                <h3 class="text text-transform-uppercase">Образование за рубежом</h3>
                <span class="text text-type-medium text-font-weight-500">
                    Находим учебное заведение с подходящей программой и условиями. Сопровождаем на всем пути подготовки и подачи документов.
                </span>
                <a href="/catalog" class="button button-outline button-ico text-color-white mt-auto">
                    <span class="ico ico-20">
                        <i class="ico-arrow-right"></i>
                    </span>
                </a>
            </div>
            <div class="card card-type-2">
                <h3 class="text text-transform-uppercase">Школа английского языка</h3>
                <span class="text text-type-medium text-font-weight-500">
                    Обучаем английскому детей с 6 лет, подростков и взрослых офлайн и онлайн. Готовим к международным экзаменам IELTS и SAT.
                </span>

                <a href="/language-school" class="button button-outline button-ico text-color-white mt-auto">
                    <span class="ico ico-20">
                        <i class="ico-arrow-right"></i>
                    </span>
                </a>
            </div>
            <div class="card card-type-3">
                <h3 class="text text-transform-uppercase">Летние программы</h3>
                <span class="text text-type-medium text-font-weight-500">
                    Организуем каникулы с полным погружением в языковую среду. Обеспечиваем безопасное пребывание наших учеников в лучших колледжах Лондона, Нью-Йорка, Лос-Анджелеса и Сеула.
                </span>

                <a href="/summer-programs" class="button button-outline button-ico text-color-white mt-auto">
                    <span class="ico ico-20">
                        <i class="ico-arrow-right"></i>
                    </span>
                </a>
            </div>
        </section>
        <section class="container gap-12 container--column-mobile gap-24-mobile px-8 my-25">
            <div class="info-illustration-2-container align-center">
                <img class="img" src="/assets/illustration-2.png" />
                <div>
                    <h3 class="text text-transform-uppercase text-overflow">В одиночку:</h3>
                    <ul class="list-style-frown">
                        <li>
                            <span class="text text-type-medium">
                                приходится тратить много времени и сил на поиск учебных материалов
                            </span>
                        </li>
                        <li>
                            <span class="text text-type-medium">
                                искать учебные заведения с подходящей программой
                            </span>
                        </li>
                        <li>
                            <span class="text text-type-medium">
                                разбираться с условиями подачи заявок в университеты разных стран
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="separator--vertical"></div>
            <div class="info-illustration-3-container align-start">
                <img class="img" src="/assets/illustration-3.png" />
                <div class="">
                    <h3 class="text text-transform-uppercase">в gsc study:</h3>
                    <ul class="list-style-smile">
                        <li>
                            <span class="text text-type-medium">
                                находят друзей с общими целями и мотивацией
                            </span>
                        </li>
                        <li>
                            <span class="text text-type-medium">
                                изучают язык по наработанным годами материалам
                            </span>
                        </li>
                        <li>
                            <span class="text text-type-medium">
                                знакомятся с новыми людьми и культурой разных стран во время летних каникул
                            </span>
                        </li>
                        <li>
                            <span class="text text-type-medium">
                                получают полное сопровождение при поступлении в зарубежную школу или университет
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="carousel container--column gap-24 px-8 my-25">
            <div class="slides">
                <div class="slides-item container--column align-center px-4" id="slides-item-14">
                    <img class="img object-fit-cover border-radius-10" src="/assets/timeline-1.png" height="384px" />
                    <h5 class="text text-transform-uppercase">2011 год — Первый офис в Астане</h5>
                </div>
                <div class="slides-item container--column gap-24 align-center px-4" id="slides-item-15">
                    <img class="img object-fit-cover border-radius-10" src="/assets/timeline-2.png" height="384px" />
                    <h5 class="text text-transform-uppercase"> 2012 — Начало сотрудничества с Sommet Education</h5>
                </div>
                <div class="slides-item container--column gap-24 align-center px-4" id="slides-item-16">
                    <img class="img object-fit-cover border-radius-10" src="/assets/timeline-3.png" height="384px" />
                    <h5 class="text text-transform-uppercase">2021 — Получение аккредитации Quality English</h5>
                </div>
                <div class="slides-item container--column gap-24 align-center px-4" id="slides-item-17">
                    <img class="img object-fit-cover border-radius-10" src="/assets/timeline-3.png" height="384px" />
                    <h5 class="text text-transform-uppercase">2021 — Партнерство с British Council</h5>
                </div>
                <div class="slides-item container--column gap-24 align-center px-4" id="slides-item-18">
                    <img class="img object-fit-cover border-radius-10" src="/assets/timeline-3.png" height="384px" />
                    <h5 class="text text-transform-uppercase">2023 — Открытие филиала в Алматы</h5>
                </div>
            </div>
            <div class="carousel--nav pt-5">
                <a href="#slides-item-14" class="slider-nav"></a>
                <a href="#slides-item-15" class="slider-nav"></a>
                <a href="#slides-item-16" class="slider-nav"></a>
                <a href="#slides-item-17" class="slider-nav"></a>
                <a href="#slides-item-18" class="slider-nav"></a>
            </div>
        </section>
        <section class="container gap-12 container--column-mobile gap-24-mobile px-8 my-25">
            <div class="container--column gap-24 align-start flex-1 gap-0">
                <h2 class="text">12 лет отправляем</h2>
                <h2 class="text">учиться за рубеж</h2>
                <span class="text text-type-medium-20 pt-12">
                    За эти годы мы разрешили немало сложных ситуаций: не понаслышке знаем, что такое успеть подать документы,
                    когда осталось совсем мало времени до конца приема заявок. Всю коммуникацию с учебными заведениями мы берем
                    на себя: от начала подачи документов до заселения в общежитие.
                </span>
            </div>
            <div class="grid grid--column-mobile gap-24 flex-1 gap-56 row-3 pt-25">
                <div class="container--column gap-0 align-center flex-1">
                    <img class="img mb-4 " src="/assets/illustration-4.svg" height="80px" />
                    <h4 class="text text-align-center">Стран</h4>
                    <span class="text text-type-medium-18 text-align-center">в которых мы помогаем получить образование нашим ученикам</span>
                </div>
                <div class="container--column gap-0 align-center flex-1">
                    <img class="img mb-4" src="/assets/illustration-5.svg" height="80px" />
                    <h4 class="text text-align-center">Студентов</h4>
                    <span class="text text-type-medium-18 text-align-center">в год поступают за рубеж с нашим сопровождением</span>
                </div>
                <div class="container--column gap-0 align-center flex-1">
                    <img class="img mb-4" src="/assets/illustration-6.svg" height="80px" />
                    <h4 class="text text-align-center">Учебных заведений</h4>
                    <span class="text text-type-medium-18 text-align-center">сотрудничают с GSC STUDY по всему миру</span>
                </div>
            </div>
        </section>
        <section class="container--column gap-24 px-8 my-25">
            <h2 class="text">Сопровождаем на каждом этапе поступления</h2>
            <div class="container gap-12 container--column-mobile gap-24-mobile">
                <div class="card card-type-gradient flex-1">
                    <h5 class="text text-transform-uppercase">План поступления</h5>
                    <span class="text text-type-medium-14">представляем список учебных заведений по вашему портфолио и пошаговую стратегию поступления.</span>
                    <a href="/contacts" class="button button-outline button-ico border-circle text-color-white ml-auto mt-auto" >
                        <span class="ico ico-20">
                            <i class="ico-tl-arrow"></i>
                        </span>
                    </a>
                </div>
                <div class="card card-type-gradient flex-1">
                    <h5 class="text text-transform-uppercase">Сбор документов</h5>
                    <span class="text text-type-medium-14">заполняем онлайн заявки и подготавливаем сопроводительные документы.</span>
                    <a href="/contacts" class="button button-outline button-ico border-circle text-color-white ml-auto mt-auto">
                        <span class="ico ico-20">
                            <i class="ico-tl-arrow"></i>
                        </span>
                    </a>
                </div>
                <div class="card card-type-gradient flex-1">
                    <h5 class="text text-transform-uppercase">Приглашение и виза</h5>
                    <span class="text text-type-medium-14">помогаем выполнить все условия зачисления и подготовиться к интервью для учебной визы.</span>
                    <a href="/contacts" class="button button-outline button-ico border-circle text-color-white ml-auto mt-auto">
                        <span class="ico ico-20">
                            <i class="ico-tl-arrow"></i>
                        </span>
                    </a>
                </div>
            </div>
        </section>
        <!-- Certificate section -->
        <section class="container--column gap-24 px-8 my-25">
            <h2 class="text">Наши сертификаты</h2>
            <div class="carousel container--column gap-24 py-10">
                <div class="slides">
                    <div class="slides-item" id="slides-item-5"><img src="/assets/certificates/ASU.png" class="img w-75 object-fit-contain box-shadow-layer-1"/></div>
                    <div class="slides-item" id="slides-item-6"><img src="/assets/certificates/Les Roches.png" class="img w-75 object-fit-contain box-shadow-layer-1"/></div>
                    <div class="slides-item" id="slides-item-7"><img src="/assets/certificates/glion.png" class="img w-75 object-fit-contain box-shadow-layer-1"/></div>
                    <div class="slides-item" id="slides-item-8"><img src="/assets/certificates/Ecole.png" class="img w-75 object-fit-contain box-shadow-layer-1"/></div>
                    <div class="slides-item" id="slides-item-9"><img src="/assets/certificates/kaplan.png" class="img w-75 object-fit-contain box-shadow-layer-1"/></div>
					<div class="slides-item" id="slides-item-10"><img src="/assets/certificates/HWD.png" class="img w-75 object-fit-contain box-shadow-layer-1"/></div>
                </div>
                <div class="carousel--nav pt-5">
                    <a href="#slides-item-5" class="slider-nav"></a>
                    <a href="#slides-item-6" class="slider-nav"></a>
                    <a href="#slides-item-7" class="slider-nav"></a>
                    <a href="#slides-item-8" class="slider-nav"></a>
                    <a href="#slides-item-10" class="slider-nav"></a>
                </div>
            </div>
        </section>
        <section class="container--column container--column-mobile gap-56 justify-center align-center background-secondary px-8 pt-25 pb-40 my-25">
            <div class="container gap-24 container--column-mobile gap-24-mobile">
                <div class="container--column gap-24 flex-1">
                    <img src="/assets/icons/fill-out.svg" height="80px" />
                    <h3 class="text text-color-white text-align-center text-transform-uppercase">Подаете заявку</h3>
                    <span class="text text-color-white text-type-medium-14 text-align-center">
                        Чтобы получить консультацию, вы можете оставить заявку на сайте или позвонить нам по телефону
                    </span>
                </div>
                <div class="container--column gap-24 flex-1">
                    <img src="/assets/icons/assistant.svg" height="80px" />
                    <h3 class="text text-color-white text-align-center text-transform-uppercase">Получаете бесплатную консультацию</h3>
                    <span class="text text-color-white text-type-medium-14 text-align-center">
                        С вами свяжется менеджер и подробно расскажет обо всех программах GSC STUDY
                    </span>
                </div>
                <div class="container--column gap-24 flex-1">
                    <img src="/assets/icons/grad-hat.svg" height="80px" />
                    <h3 class="text text-color-white text-align-center text-transform-uppercase">Выбираете программу</h3>
                    <span class="text text-color-white text-type-medium-14 text-align-center">
                        После консультации вы можете выбрать подходящую программу, составить план действий и расписание
                    </span>
                </div>
            </div>
            <a class="button button-white" onclick="handleModalToggle('apply-modal');">
                <span class="text text-type-medium-14 text-font-weight-600 text-transform-uppercase">
                    Получить консультацию
                </span>
            </a>
        </section>
        <!-- About Company Section -->
        <section class="container gap-12 container--column-mobile gap-24-mobile px-40 my-25">
            <div class="container gap-12 justify-center flex-1">
                <img class="object-fit-contain" src="/assets/venera.png" width="400"/>
            </div>
            <div class="container--column gap-24 justify-center flex-1">
                <h2 class="text text-color-large">Байжигитова Венера Тимуровна</h2>
                <span class="text text-type-medium-16">
                    Я верю, что самое главное в нашей работе — счастье ребенка. Отправляясь за границу, дети начинают вершить судьбу, а мы сопровождаем их на этом пути.
                </span>
                <a href="/about" class="button button-primary">
                    <span class="text text-color-white text-type-medium text-font-weight-700 text-transform-uppercase">О компании</span>
                </a>
            </div>
        </section>
        <!-- Partners section -->
        <section class="container--column gap-24 px-8 my-25">
            <h2 class="text">Наши партнеры</h2>
            <div class="carousel container--column gap-24 py-10">
                <div class="slides">
                    <div class="slides-item" id="slides-item-101"><img src="/assets/partners/default.png" /></div>
                    <div class="slides-item" id="slides-item-11"><img src="/assets/partners/default.png" /></div>
                    <div class="slides-item" id="slides-item-12"><img src="/assets/partners/default.png" /></div>
                    <div class="slides-item" id="slides-item-13"><img src="/assets/partners/default.png" /></div>
                </div>
                <div class="carousel--nav pt-5">
                    <a href="#slides-item-101" class="slider-nav"></a>
                    <a href="#slides-item-11" class="slider-nav"></a>
                    <a href="#slides-item-12" class="slider-nav"></a>
                    <a href="#slides-item-13" class="slider-nav"></a>
                </div>
            </div>
        </section>
        <!-- News section -->
        <?php if( isset($news) && $news ): ?>
            <section class="container--column gap-24 px-8 my-25">
                <h2 class="text">Новости</h2>
                <div class="container--column gap-40">
                    <div class="carousel container--column gap-24 py-10">
                        <div class="slides gap-24">
                            <?php foreach($news as $item): ?>
                                <?php $index = array_search($item, $news); ?>
                                <div class="slides-item container--column gap-24 px-2" id="slides-item-<?= $index?>">
                                    <a href="/">
                                        <img class="img object-fit-cover border-radius-10" src="/img/news/thumbs/<?=$item['News']['img']?>" height="256px">
                                    </a>
                                    <a href="/" class="text text-type-h4 text-transform-uppercase text-underline-none text-color-primary">
                                        <?=$item['News']['title']?>
                                    </a>
                                    <span class="text text-type-medium">
                                        <?= $this->Text->truncate(strip_tags($item['News']['body']), 120, array('ellipsis' => '...', 'exact' => true)) ?>
                                    </span>
                                    <a
                                        href="/news/<?= $item['News']['alias'] ?>"
                                        class="text text-type-medium text-color-link text-transform-uppercase text-underline-none text-align-center mt-auto"
                                    >
                                        Читать подробнее
                                    </a>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="carousel--nav pt-5">
                            <?php foreach($news as $item): ?>
                                <?php $index = array_search($item, $news); ?>
                                <a href="#slides-item-<?= $index?>" class="slider-nav"></a>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <a href="/news/" class="button button-primary mx-auto">
                        <span class="text text-type-medium text-color-white text-font-weight-600 text-transform-uppercase px-25">
                            Все новости
                        </span>
                    </a>
                </div>
            </section>
        <?php endif; ?>

        <script src="/js/jquery-3.0.0.min.js"></script>
        <script src="/js/jquery.waypoints.min.js"></script>
        <script src="/js/jquery.fancybox.min.js"></script>
        <script src="/js/jquery.maskedinput.min.js"></script>

        <?php echo $this->element('footer') ?>
	</body>
</html>
