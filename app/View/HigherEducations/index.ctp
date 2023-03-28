
<section class="hero-section px-8" style = "margin-left:16%">

	<div class="hero-section-bg">
		<img class="hero-bg-2" src="/assets/bg-gradient-2.png" />

	</div>

	<div class="hero-inner">
		<a href="\">
			<span class="text text-color-black text-type-medium-20">
             Главная
	    </span>
		</a>
		<span> / </span>

		<a href="catalog">
			<span class="text text-color-black text-type-medium-20">
             Образование за рубежом
	    </span>
		</a>

		<div class="hero-inner-title">
			<h1 class="text text-color-large">Школа английского языка</h1>
		</div>
		<div class="container--column mt-5 mb-25">
			<span class="text text-color-black text-type-medium-20">
                Уровень преподавания в GSC STUDY одобрен независимой британской организацией Quality English, которая следит за качеством преподавания английского языка по всему миру.
			</span>
		</div>

		<div class="hero-inner-title">
			<h1 class="text text-color-large" style = "font-size: 40px;">Выберите школу или колледж</h1>
		</div>
		<div class="container--column mt-5 mb-25">
			<span class="text text-color-black text-type-medium-20">
                В этом разделе представлена подробная информация о программах обучения, условиях проживания и стоимости в зарубежных школах и колледжах
			</span>
		</div>


	</div>
</section>



<?php
    $country = '';
    $checked_country = '';
    if( isset($_GET['country_id']) && $_GET['country_id'] ){
        $country = '&country_id='.$_GET['country_id'];
        $checked_country = $_GET['country_id'];
    }

    $edu_lang = '';
    $checked_edu_lang = '';
    if( isset($_GET['edu_lang']) && $_GET['edu_lang'] ){
        $edu_lang = '&edu_lang='.$_GET['edu_lang'];
        $checked_edu_lang = $_GET['edu_lang'];
    }
?>

<div class="content">
	<section>
		<div class="container">
			<nav class="count-lang-nav">
                <ul>
                    <li class="nav__item under">
                        <a class="js-slide" href="javascript:;">Страна</a>
                        <div class="under-part">
                            <ul class="under-ul">
                                <li class="<?= (!$checked_country) ? 'active' : '' ?>">
                                    <a href="/<?= $lang ?>higher_educations?city=<?=$current_city?><?= $edu_lang ?>">Все страны</a>
                                </li>
                                <?php foreach( $countries as $country_id => $country_name ): ?>
                                    <li class="<?= ($checked_country == $country_id) ? 'active' : '' ?>">
                                        <a href="/<?= $lang ?>higher_educations?city=<?=$current_city?>&country_id=<?= $country_id ?><?= $edu_lang ?>"><?= $country_name ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                    <li class="nav__item under">
                        <a class="js-slide" href="javascript:;">язык</a>
                        <div class="under-part">
                            <ul class="under-ul">
                                <li class="<?= (!$checked_edu_lang) ? 'active' : '' ?>">
                                    <a href="/<?= $lang ?>higher_educations?city=<?=$current_city?><?= $country ?>">Все языки</a>
                                </li>
                                <?php foreach( $edu_langs as $lang_id => $lang_name ): ?>
                                    <li class="<?= ($checked_edu_lang == $lang_id) ? 'active' : '' ?>">
                                        <a href="/<?= $lang ?>higher_educations?city=<?=$current_city?>&edu_lang=<?= $lang_id ?><?= $country ?>"><?= $lang_name ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
		</div>
	</section>
	<section class="section courses-aroad">
        <div class="container">
            <div class="courses-aroad__items">
                <?php foreach( $universities as $item ): ?>
                    <div class="courses-aroad__item">
                        <a href="/<?= $lang ?>university/<?= $item['University']['alias'] ?>" class="courses-aroad__item-pic pic-increase">
                            <img src="/img/universities/<?= $item['University']['img'] ?>" alt="">
                        </a>
                        <a href="/<?= $lang ?>university/<?= $item['University']['alias'] ?>" class="courses-aroad__item-title"><?= $item['University']['title'] ?></a>
                        <ul>
                            <li>
                                Языки:
                                <?php $univer_langs = explode(',', $item['University']['edu_language_ids']); ?>
                                <?php foreach( $univer_langs as $index => $univer_lang_id ): ?>
                                    <?= ($index > 0) ? ', ' : '' ?><?= $edu_langs[$univer_lang_id] ?>
                                <?php endforeach; ?>
                            </li>
                            <li>Страна: <?= $countries[$item['University']['country_id']] ?></li>
                        </ul>
                        <a href="/<?= $lang ?>university/<?= $item['University']['alias'] ?>" class="btn more">Подробнее</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
	<!-- <div class="section section--nobot">
		<div class="container">
			<div class="info-vuz info-vuz__vuz_2">
				<div class="info-vuz__img info-vuz_2__img">
					<img src="/img/vuzs/<?=$data['HigherEducation']['img']?>" alt="">
				</div>
				<div class="info-vuz-text info-vuz-2-text">
					<?=$data['HigherEducation']['body']?>
					<div class="share">
						<span class="share__heading">Поделиться:</span>
						<?=$this->element('share') ?>
						<a class="btn" data-fancybox data-src="#zakazat" href="javascript:;">Заказать звонок</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<section class="section req">
        <div class="container">
            <h2 class="title">подберем для вас учебное заведение</h2>
            <div class="request">
                <form class="form" action="/requests/send" method="POST">
                    <div class="input-parent">
                        <input class="form_input" type="text" name="name" placeholder="Фамилия Имя Отчество" required="">
                        <input class="form_input" type="email" name="mail" placeholder="Электронная почта" required="">
                        <input class="form_input" type="tel" name="phone" placeholder="Номер телефона" required="">

                        <input name="url" value="<?php echo Router::url(null, true) ?>" type="hidden">
                        <input name="page" type="hidden" value="b24">

                        <?php if($this->Session->check('city')): ?>
                            <input type="hidden" name="city" value="<?=$this->Common->get_city($this->Session->read('city'))?>">
                        <?php else: ?>
                           <input type="hidden" name="city" value="Нур-Султан">
                        <?php endif ?>
                    </div>
                    <div class="input-parent input-parent--sec">
                        <div id="RecaptchaField3"></div>
                    </div>
                    <div class="btn more" data-id="2" onclick="checkCapcha2()" type="submit">Оставить заявку</div>
                </form>
            </div>
        </div>
    </section>
</div>
