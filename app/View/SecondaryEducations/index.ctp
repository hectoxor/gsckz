
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
	<div class="content-top">
		<div class="container">
			<h1 class="title">
				<?=$data['SecondaryEducation']['h1']?>
			</h1>
			<nav class="page-header-nav">
	            <ul>
                    <li><a href="/<?= $lang ?>abroad-program<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>">Языковые курсы за рубежом</a></li>
                    <li class="active"><a href="/<?= $lang ?>secondary_educations<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>">Среднее образование</a></li>
                    <li class=""><a href="/<?= $lang ?>higher_educations<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>">Высшее образование</a></li>
                    <li class=""><a href="/<?= $lang ?>glion_lesroches?type=glion<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>">Glion</a></li>
                    <li class=""><a href="/<?= $lang ?>glion_lesroches?type=les_roches<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>">Les Roches</a></li>
                    <li class=""><a href="/<?= $lang ?>courses<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>">Летние каникулы за рубежом</a></li>
                    <li class=""><a href="/<?= $lang ?>contacts<?=($this->Session->check('city')) ? '?city=' . $this->Session->read('city') : '?city=nur-sultan' ?>">Контакты</a></li>
                </ul>
	        </nav>
	    </div>    
	</div>
    <section>
        <div class="container">
            <nav class="count-lang-nav">
                <ul>
                    <li class="nav__item under">
                        <a class="js-slide" href="javascript:;">Страна</a>
                        <div class="under-part">
                            <ul class="under-ul under-ul-strana">
                                <li class="<?= (!$checked_country) ? 'active' : '' ?>">
                                    <a href="/<?= $lang ?>secondary_educations?city=<?=$current_city?><?= $edu_lang ?>">Все страны</a>
                                </li>
                                <?php foreach( $countries as $country_id => $country_name ): ?>
                                    <li class="<?= ($checked_country == $country_id) ? 'active' : '' ?>">
                                        <a href="/<?= $lang ?>secondary_educations?city=<?=$current_city?>&country_id=<?= $country_id ?><?= $edu_lang ?>"><?= $country_name ?></a>
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
                                    <a href="/<?= $lang ?>secondary_educations?city=<?=$current_city?><?= $country ?>">Все языки</a>
                                </li>
                                <?php foreach( $edu_langs as $lang_id => $lang_name ): ?>
                                    <li class="<?= ($checked_edu_lang == $lang_id) ? 'active' : '' ?>">
                                        <a href="/<?= $lang ?>secondary_educations?city=<?=$current_city?>&edu_lang=<?= $lang_id ?><?= $country ?>"><?= $lang_name ?></a>
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
                            <li>Страна: <?= $item['Country']['title'] ?></li>
                        </ul>
                        <a href="/<?= $lang ?>university/<?= $item['University']['alias'] ?>" class="btn more">Подробнее</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
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