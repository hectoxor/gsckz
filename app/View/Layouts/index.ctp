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
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php
            echo $this->Html->meta(
                'favicon.ico',
                '/favicon.svg?v=1.1',
                array('type' => 'icon')
            );
        ?>

	    <!-- <link rel="stylesheet" href="/css/slick.css" /> -->
        <!-- <link rel="stylesheet" href="/css/jquery.fancybox.min.css" /> -->
        <!-- <link rel="stylesheet" href="/css/styleNew.css?v=1.658486" /> -->
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
</div>
	<body class="container--column gap-24">
		<?php echo $this->element('navbar') ?>
		<section class="hero-section px-8">
            <div class="hero-section-bg">
                <img class="hero-bg" src="/assets/bg-gradient1.png" />
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
                <div class="container container--column-mobile">
                    <a href="/" class="button button-primary">
                        <span class="text text-color-white text-type-medium text-font-weight-700 text-transform-uppercase">получить консультацию</span>
                    </a>
                    <a href="/" class="button button-secondary">
                        <span class="text text-color-white text-type-medium text-font-weight-700 text-transform-uppercase">узнать уровень английского</span>
                    </a>
                </div>
			</div>
		</section>
        <section class="container container--column-mobile px-8 my-25">
            <div class="card card-type-1">
                <h3 class="text text-transform-uppercase">Образование за рубежом</h3>
                <span class="text text-type-medium text-font-weight-500">
                    Находим учебное заведение с подходящей программой и условиями. Сопровождаем на всем пути подготовки и подачи документов.
                </span>

                <a href="/" class="button button-outline button-ico text-color-white">
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

                <a href="/" class="button button-outline button-ico text-color-white">
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

                <a href="/" class="button button-outline button-ico text-color-white">
                    <span class="ico ico-20">
                        <i class="ico-arrow-right"></i>
                    </span>
                </a>
            </div>
        </section>
        <section class="container container--column-mobile px-8 my-25">
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
        <section class="container grid-mobile px-8 my-25">
            <div class="container--column align-center flex-1">
                <img class="img object-fit-cover border-radius-10" src="/assets/timeline-1.png" height="512px" />
                <h5 class="text text-transform-uppercase">2011 год — Первый офис в Астане</h5>
            </div>
            <div class="container--column align-center flex-1">
                <img class="img object-fit-cover border-radius-10" src="/assets/timeline-2.png" height="512px" />
                <h5 class="text text-transform-uppercase"> 2012 — Начало сотрудничества с Sommet Education</h5>
            </div>
            <div class="container--column align-center flex-1">
                <img class="img object-fit-cover border-radius-10" src="/assets/timeline-3.png" height="512px" />
                <h5 class="text text-transform-uppercase">2021 — Получение аккредитации Quality English</h5>
            </div>
            <div class="container--column align-center flex-1">
                <img class="img object-fit-cover border-radius-10" src="/assets/timeline-3.png" height="512px" />
                <h5 class="text text-transform-uppercase">2021 — Партнерство с British Council</h5>
            </div>
            <div class="container--column align-center flex-1">
                <img class="img object-fit-cover border-radius-10" src="/assets/timeline-3.png" height="512px" />
                <h5 class="text text-transform-uppercase">2023 — Открытие филиала в Алматы</h5>
            </div>
        </section>
        <section class="container container--column-mobile px-8 my-25">
            <div class="container--column align-start flex-1 gap-0">
                <h2 class="text">12 лет отправляем</h2>
                <h2 class="text">учиться за рубеж</h2>
                <span class="text text-type-medium-20 pt-12">
                    За эти годы мы разрешили немало сложных ситуаций: не понаслышке знаем, что такое успеть подать документы, 
                    когда осталось совсем мало времени до конца приема заявок. Всю коммуникацию с учебными заведениями мы берем 
                    на себя: от начала подачи документов до заселения в общежитие.
                </span>
            </div>
            <div class="grid grid--column-mobile flex-1 gap-56 row-3 pt-25">
                <div class="container--column align-center flex-1 gap-0">
                    <img class="img mb-4 " src="/assets/illustration-4.svg" height="80px" />
                    <h4 class="text text-align-center">Стран</h4>
                    <span class="text text-type-medium-18 text-align-center">в которых мы помогаем получить образование нашим ученикам</span>
                </div>
                <div class="container--column align-center flex-1 gap-0">
                    <img class="img mb-4" src="/assets/illustration-5.svg" height="80px" />
                    <h4 class="text text-align-center">Студентов</h4>
                    <span class="text text-type-medium-18 text-align-center">в год поступают за рубеж с нашим сопровождением</span>
                </div>
                <div class="container--column align-center flex-1 gap-0">
                    <img class="img mb-4" src="/assets/illustration-6.svg" height="80px" />
                    <h4 class="text text-align-center">Учебных заведений</h4>
                    <span class="text text-type-medium-18 text-align-center">сотрудничают с GSC STUDY по всему миру</span>
                </div>
            </div>
        </section>
        <section class="container--column px-8 my-25">
            <h2 class="text">Сопровождаем на каждом этапе поступления</h2>
            <div class="container container--column-mobile">
                <div class="card card-type-gradient flex-1">
                    <h5 class="text text-transform-uppercase">План поступления</h5>
                    <span class="text text-type-medium-14">представляем список учебных заведений по вашему портфолио и пошаговую стратегию поступления.</span>
                    <a href="/" class="button button-outline button-ico border-circle text-color-white ml-auto">
                        <span class="ico ico-20">
                            <i class="ico-tl-arrow"></i>
                        </span>
                    </a>
                </div>
                <div class="card card-type-gradient flex-1">
                    <h5 class="text text-transform-uppercase">Сбор документов</h5>
                    <span class="text text-type-medium-14">заполняем онлайн заявки и подготавливаем сопроводительные документы.</span>
                    <a href="/" class="button button-outline button-ico border-circle text-color-white ml-auto">
                        <span class="ico ico-20">
                            <i class="ico-tl-arrow"></i>
                        </span>
                    </a>
                </div>
                <div class="card card-type-gradient flex-1">
                    <h5 class="text text-transform-uppercase">Приглашение и виза</h5>
                    <span class="text text-type-medium-14">помогаем выполнить все условия зачисления и подготовиться к интервью для учебной визы.</span>
                    <a href="/" class="button button-outline button-ico border-circle text-color-white ml-auto">
                        <span class="ico ico-20">
                            <i class="ico-tl-arrow"></i>
                        </span>
                    </a>
                </div>
            </div>
        </section>
        <section class="container--column px-8 my-25">
            <h2 class="text">Наши сертификаты</h2>
            <div class="container justify-center">
                <img src="/assets/certificates/certificate-1.png" />
                <img src="/assets/certificates/certificate-1.png" />
                <img src="/assets/certificates/certificate-1.png" />
                <img src="/assets/certificates/certificate-1.png" />
                <img src="/assets/certificates/certificate-1.png" />
                <img src="/assets/certificates/certificate-1.png" />
            </div>
        </section>
        <section class="container--column justify-center align-center gap-56 background-secondary px-8 pt-25 pb-40 my-25">
            <div class="container">
                <div class="container--column flex-1">
                    <img src="/assets/icons/fill-out.svg" height="80px" />
                    <h3 class="text text-color-white text-align-center text-transform-uppercase">Подаете заявку</h3>
                    <span class="text text-color-white text-type-medium-14 text-align-center">
                        Чтобы получить консультацию, вы можете оставить заявку на сайте или позвонить нам по телефону
                    </span>
                </div>
                <div class="container--column flex-1">
                    <img src="/assets/icons/assistant.svg" height="80px" />
                    <h3 class="text text-color-white text-align-center text-transform-uppercase">Получаете бесплатную консультацию</h3>
                    <span class="text text-color-white text-type-medium-14 text-align-center">
                        С вами свяжется менеджер и подробно расскажет обо всех программах GSC STUDY
                    </span>
                </div>
                <div class="container--column flex-1">
                    <img src="/assets/icons/grad-hat.svg" height="80px" />
                    <h3 class="text text-color-white text-align-center text-transform-uppercase">Выбираете программу</h3>
                    <span class="text text-color-white text-type-medium-14 text-align-center">
                        После консультации вы можете выбрать подходящую программу, составить план действий и расписание
                    </span>
                </div>
            </div>
            <a href="/" class="button button-white">
                <span class="text text-type-medium-14 text-color-secondary text-font-weight-500 text-transform-uppercase">
                    Получить консультацию
                </span>
            </a>
        </section>

        <!-- TODO: Create "About company section" -->
        <section>
        </section>

        <section class="container--column px-8 my-25">
            <h2 class="text">Наши партнеры</h2>
            <div class="grid grid-column-4 justify-center">
                <img src="/assets/partners/default.png" />
                <img src="/assets/partners/default.png" />
                <img src="/assets/partners/default.png" />
                <img src="/assets/partners/default.png" />
                <img src="/assets/partners/default.png" />
            </div>
        </section>
        <!-- TODO: Figure out which part of the code determines the number of news items listed here -->
        <!-- Understood where. routes.php handles which controller to use when displaying some view. From there we can determine which variables are used  -->
        <?php if( isset($news) && $news ): ?>
            <section class="container--column px-8 my-25">
                <h2 class="text">Новости</h2>
                <div class="container">
                    <?php foreach($news as $item): ?>
                    <div class="container--column flex-1">
                        <a href="/">
                            <img class="img object-fit-cover border-radius-10" src="/img/news/thumbs/<?=$item['News']['img']?>" height="512px">
                        </a>
                        <a href="/" class="text text-type-h4 text-underline-none text-color-primary">
                            <?=$item['News']['title']?>
                        </a>
                        <span class="text text-type-medium">
                            <?= $this->Text->truncate(strip_tags($item['News']['body']), 128, array('ellipsis' => '...', 'exact' => true)) ?>
                        </span>
                    </div>
                    <?php endforeach ?>
                </div>
            </section>
        <?php endif; ?>
        <?php echo $this->element('footer') ?>

        <!-- https://book.cakephp.org/2/en/core-libraries/helpers/js.html -->
        <?php echo $this->Js->writeBuffer(); ?>
	</body>

    <!-- <body>
        <div class="alert <?=(isset($_SESSION['Message']['good']) || isset($_SESSION['Message']['bad'])) ? 'alert--active' : '';?>">
            <div class="container">
                <?php //var_dump($_SESSION); ?>
                <?php echo $this->Session->flash('good'); ?>
                <?php echo $this->Session->flash('bad'); ?>
                <?php if(isset($_SESSION['Message'])){unset($_SESSION['Message']);} ?>
                <div class="my-alert__close"></div>
            </div>
        </div>
        <?php //echo $this->element('left_sidebar') ?>
        <section class="header-bottom">
            <img class="header-bottom__img" src="../img/pic_horizont2.jpg">
            <div class="container">
                <div class="header-bottom__wrapper">
                    <h1 class="header-bottom__title way way--active"><?php //= $slides[0]['Slide']['title'] ?></h1>
                    <div class="subtitle way way--active"><?php //= $slides[0]['Slide']['body'] ?></div>
                    <a href="javascript:;" data-src="#school" data-fancybox="" class="btn header-bottom-btn way way--active">Оставить заявку</a>
                </div>
            </div>
        </section>
        <section class="section expert">
            <div class="container">
                <div class="expert__wrapper">
                    <div class="experts">
                        <div class="experts-pic">
                            <img src="/img/pic1.jpg" alt="">
                        </div>
                        <div class="experts__info">
                            <h2 class="title experts__title"><?=$h2?></h2>
                            <?=$seotext?>
                            <a href="javascript:;" data-src="#school" data-fancybox="" class="btn more">Оставить заявку</a>
                        </div>
                    </div>
                    <?php if( isset($advans) && $advans ): ?>
                        <div class="adv-numbers">
                            <?php foreach( $advans as $item ): ?>
                                <div class="adv-number">
                                    <div class="adv__title"><?= $item['Advan']['title'] ?></div>
                                    <p><?= $item['Advan']['body'] ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="expert__cards way">
                        <div class="expert__card way">
                            <a href="/<?= $lang ?>higher_educations<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>" class="expert__card-pic pic-increase">
                                <img src="/img/pic2.jpg" alt="">
                            </a>
                            <a href="/<?= $lang ?>higher_educations<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>" class="expert__card-title">Высшее образование</a>
                            <a href="/<?= $lang ?>higher_educations<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>" class="btn more">Подробнее</a>
                        </div>
                        <div class="expert__card way">
                            <a href="/<?= $lang ?>secondary_educations<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>" class="expert__card-pic pic-increase">
                                <img src="/img/pic3.jpg" alt="">
                            </a>
                            <a href="/<?= $lang ?>secondary_educations<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>" class="expert__card-title">Среднее образование</a>
                            <a href="/<?= $lang ?>secondary_educations<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>" class="btn more">Подробнее</a>
                        </div>
                        <div class="expert__card way">
                            <a href="/<?= $lang ?>abroad-program<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>" class="expert__card-pic pic-increase">
                                <img src="/img/pic4.jpg" alt="">
                            </a>
                            <a href="/<?= $lang ?>abroad-program<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>" class="expert__card-title">Языковые курсы</a>
                            <a href="/<?= $lang ?>abroad-program<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>" class="btn more">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="popuptest" id="popuptest" style="display: none;">
            <div class="popuptest-block">
                <div class="popuptest-title">Узнай свой уровень английского</div>
                <a href="/test" class="popuptest-link">Пройди тест онлайн</a>
            </div>
        </div>
        <?php if( isset($univers) && $univers ): ?>
            <section class="section univers">
                <div class="container">
                    <h2 class="title">Поступайте в лучшие университеты мира</h2>
                    <div class="univers__slider">
                        <?php foreach( $univers as $item ): ?>
                            <div class="univers__slide">
                                <a href="/<?= $lang ?>university/<?= $item['University']['alias'] ?>" class="univers__slide-pic pic-increase">
                                    <img src="/img/universities/thumbs/<?= $item['University']['img'] ?>" alt="">
                                </a>
                                <a href="/<?= $lang ?>university/<?= $item['University']['alias'] ?>" class="univers__slide-title"><?= $item['University']['title'] ?></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php if( isset($news) && $news ): ?>
            <section class="section news">
                <div class="container">
                    <h2 class="title"><?= __('Новости') ?></h2>
                    <div class="news__items way">
                        <?php foreach($news as $item): ?>
                        <div class="news__item">
                            <div class="news-item way-news way--active">
                                <a href="/<?= $lang ?>news/<?=$item['News']['alias']?>" class="news__item-pic pic-increase">
                                    <img src="/img/news/thumbs/<?=$item['News']['img']?>" alt="">
                                </a>
                                <a class="news__item-title"><?=$item['News']['title']?></a>
                                <p><?= $this->Text->truncate(strip_tags($item['News']['body']), 102, array('ellipsis' => '...', 'exact' => true)) ?></p>
                                <a href="/<?= $lang ?>news/<?=$item['News']['alias']?>" class="moree"><?= __('Читать подробнее') ?></a>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <a href="/<?= $lang ?>news<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>" class="btn more">все новости</a>
                </div>
            </section>
        <?php endif; ?>
        <?php echo $this->element('footer') ?>
       <script>
            var CaptchaCallback = function() {
                // grecaptcha.render('RecaptchaField1', {'sitekey' : '6LffIpccAAAAAJfPSByDZuJgvbBuEcUIQRaZo3fy'});
                // grecaptcha.render('RecaptchaField2', {'sitekey' : '6LffIpccAAAAAJfPSByDZuJgvbBuEcUIQRaZo3fy'});
                if( document.querySelector('#RecaptchaField1') ){
                    grecaptcha.render('RecaptchaField1', {'sitekey' : '6LdmWE0gAAAAAPM7X7E4ph9KK-UvuElX_uPKgPXt'});
                }
                if( document.querySelector('#RecaptchaField2') ){
                    grecaptcha.render('RecaptchaField2', {'sitekey' : '6LdmWE0gAAAAAPM7X7E4ph9KK-UvuElX_uPKgPXt'});
                }
            };

            function checkCapcha(){
              var elem = event.srcElement;
              var form = elem.parentNode;
              var attr = elem.getAttribute("data-id");
              console.log(form);
              if (grecaptcha.getResponse(attr).length !== 0){
                console.log('капча есть');
                form.submit();
              } else{
                alert('Проверка не пройдена, потвердите что вы не являетесь роботом');
                return false;
              }
            }
        </script>
        <script src="/js/jquery-3.0.0.min.js"></script>
        <script src="/js/jquery.waypoints.min.js"></script>
        <script src="/js/jquery.fancybox.min.js"></script>
        <script src="/js/slick.min.js"></script>
        <script src="/js/jquery.maskedinput.min.js"></script>
        <script src="/js/script.js?v=1.1954"></script>
        <script>
            window.onload = () => {
            	$.fancybox.open({
            		src: '#popuptest',
            		type: 'inline'
            	});
            }
        </script>
    </body> -->
</html>