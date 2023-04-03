<section class="hero-section px-8">
	<div class="hero-section-bg">
		<img class="hero-bg-2" src="/assets/bg-gradient-2.png" />
	</div>
</section>

<section class="container--column px-8">
    <h1 class="text text-color-large">Новости</h1>

    <div class="container--column align-center">
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
            <div class="paginator-content container">
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

        <div class="news-container">
            <?php foreach( $news as $item ): ?>
                <div class="news-item container--column p-10">
                    <img src="/img/news/thumbs/<?= $item['News']['img'] ?>"/>
                    <div class="container--column">
                        <span class="text text-type-medium text-font-weight-700 text-transform-uppercase">
                            <?= $item['News']['title'] ?>
                        </span>
                        <p class="text text-type-medium">
                            <?= $this->Text->truncate(strip_tags($item['News']['body']), 120, array('ellipsis' => '...', 'exact' => true)) ?>
                        </p>
                        <a 
                            href="/news/<?= $item['News']['alias'] ?>" 
                            class="text text-type-medium text-color-link text-transform-uppercase text-underline-none text-align-center mt-auto"
                        >
                            Читать подробнее
                        </a>
                    </div>
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
            <div class="paginator-content container">
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
