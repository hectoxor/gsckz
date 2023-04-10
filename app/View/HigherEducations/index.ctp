<section class="hero-section px-8">
	<div class="hero-section-bg">
		<img class="hero-bg-2" src="/assets/bg-gradient-2.png" />
	</div>
</section>
<section class="container--column gap-24 px-8 mx-40 mx-0-mobile">
    <div class="container--column gap-24 w-75 w-100-mobile">
        <h1 class="text text-color-large">Образование за рубежом</h1>
        <span class="text text-type-medium-16">
            Уровень преподавания в GSC STUDY одобрен независимой британской организацией Quality English, которая следит за качеством преподавания английского языка по всему миру.
        </span>
        <h3 class="text text-color-large">Выберите школу или колледж</h3>
        <span class="text text-type-medium-16">
            В этом разделе представлена подробная информация о программах обучения, условиях проживания и стоимости в зарубежных школах и колледжах
        </span>
    </div>

    <div class="container--column gap-24 align-center">
        <div class="paginator-container">
            <?php echo $this->Paginator->first(
                '<span class="ico ico-20 text-color-white">
                    <i class="ico ico-left-head-arrow"></i>
                </span>',
                array(
                    'class' => array('button', 'button-ico', 'border-circle', 'background-gradient'),
                    'escape' => false,
                )
            ); ?>
            <div class="paginator-content container gap-12">
                <?php echo $this->Paginator->numbers(
                    array(
                        'separator' => '',
                        'class' => 'paginator-item',
                        'currentClass' => 'paginator-item paginator-item--active',
                        'ellipsis' => '...',
                        'modulus' => 4,
                    )
                ); ?>
            </div>
            <?php echo $this->Paginator->last(
                '<span class="ico ico-20 text-color-white">
                    <i class="ico ico-right-head-arrow"></i>
                </span>',
                array(
                    'class' => array('button', 'button-ico', 'border-circle', 'background-gradient'),
                    'escape' => false,
                )
            ); ?>
        </div>
        <div class="catalog-container">
            <?php foreach( $universities as $item ): ?>
                <div class="catalog-item container--column gap-24 p-10">
                    <a href="/university/<?= $item['University']['alias'] ?>">
                        <img class="catalog-img" src="/img/universities/<?= $item['University']['img'] ?>" alt="">
                    </a>
                    <a href="/university/<?= $item['University']['alias'] ?>" class="text-underline-none">
                        <h4 class="text text-color-large text-transform-uppercase">
                            <?= $item['University']['title'] ?>
                        </h4>
                    </a>

                    <div class="container--column gap-24">
                        <div class="container gap-12 justify-between align-center">
                            <span class="text text-type-medium-16">Языки:</span>
                            <?php $univer_langs = explode(',', $item['University']['edu_language_ids']); ?>
                            <div class="container--column gap-24 align-center">
                                <?php foreach( $univer_langs as $index => $univer_lang_id ): ?>
                                    <div class="container gap-12 align-center">
                                        <span class="text text-type-medium-16">
                                            <?= ($index > 0) ? ', ' : '' ?><?= $edu_langs[$univer_lang_id] ?>
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="container gap-12 justify-between align-center">
                            <span class="text text-type-medium-16">Страна:</span>
                            <div class="container gap-12 align-center">
                                <span class="ico ico-20">
                                <img
                                    src="/assets/flags/<?= $countries[$item['University']['country_id']] ?>.svg"
                                    alt="<?= $countries[$item['University']['country_id']] ?>"
                                    class="flag"
                                />
                                </span>
                                <span class="text text-type-medium-16">
                                    <?= $countries[$item['University']['country_id']] ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <a href="/<?= $lang ?>university/<?= $item['University']['alias'] ?>" class="button button-primary w-50 w-100-mobile">
                        <span class="text text-color-white text-type-medium text-font-weight-700 text-transform-uppercase">Подробнее</span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="paginator-container">
            <?php echo $this->Paginator->first(
                '<span class="ico ico-20 text-color-white">
                    <i class="ico ico-left-head-arrow"></i>
                </span>',
                array(
                    'class' => array('button', 'button-ico', 'border-circle', 'background-gradient'),
                    'escape' => false,
                )
            ); ?>
            <div class="paginator-content container gap-12">
                <?php echo $this->Paginator->numbers(
                    array(
                        'separator' => '',
                        'class' => 'paginator-item',
                        'currentClass' => 'paginator-item paginator-item--active',
                        'ellipsis' => '...',
                        'modulus' => 4,
                    )
                ); ?>
            </div>
            <?php echo $this->Paginator->last(
                '<span class="ico ico-20 text-color-white">
                    <i class="ico ico-right-head-arrow"></i>
                </span>',
                array(
                    'class' => array('button', 'button-ico', 'border-circle', 'background-gradient'),
                    'escape' => false,
                )
            ); ?>
        </div>
    </div>
</section>
