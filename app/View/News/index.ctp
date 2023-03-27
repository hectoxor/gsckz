<section class="hero-section px-8">
	<div class="hero-section-bg">
		<img class="hero-bg-2" src="/assets/bg-gradient-2.png" />
	</div>
</section>

<section class="container--column px-8">
    <h1 class="text text-color-large">Новости</h1>

    <div class="container--column align-center">
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
                        <a href="/news/<?= $item['News']['alias'] ?>" class="text text-type-medium text-color-link text-transform-uppercase">Читать подробнее</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="paginator-container">
            <?php echo $this->Paginator->first(
                '<span class="ico ico-20">
                    <i class="ico ico-left-head-arrow"></i>
                </span>',
                array(
                    'class' => array('button', 'button-ico', 'border-circle', 'background-gradient', 'button-white'),
                    'escape' => false,
                )
            ); ?>
            <div class="paginator-content">
                <?php echo $this->Paginator->numbers(
                    array(
                        'separator' => '',
                        'class' => 'paginator-item',
                        'currentClass' => 'paginator-item--active',
                        'modulus' => 3
                        )
                ); ?>
            </div>
            <?php echo $this->Paginator->last(
                '<span class="ico ico-20">
                    <i class="ico ico-right-head-arrow"></i>
                </span>',
                array(
                    'class' => array('button', 'button-ico'),
                    'escape' => false,
                )
            ); ?>
        </div>
    </div>
</section>

<div class="content">
    <div class="content-top">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="/<?= $lang ?>">Главная </a>
                </li>
                <li>
                    <span>Новости</span>
                </li>
            </ol>
            <h1 class="title">Новости</h1>
        </div>
    </div>
    <section class="section news-page">
        <div class="container">
            <div class="news__items">
                <?php foreach( $news as $item ): ?>
                    <div class="news__item way">
                        <div class="news-item">
                            <a href="/<?= $lang ?>news/<?= $item['News']['alias'] ?>" class="news__item-pic pic-increase">
                                <img src="/img/news/thumbs/<?= $item['News']['img'] ?>" alt="">
                            </a>
                            <a href="/<?= $lang ?>news/<?= $item['News']['alias'] ?>" class="news__item-title"><?=$item['News']['title']?></a>
                            <p><?= $this->Text->truncate(strip_tags($item['News']['body']), 120, array('ellipsis' => '...', 'exact' => true)) ?></p>
                            <a href="/<?= $lang ?>news/<?= $item['News']['alias'] ?>" class="moree">Читать подробнее</a>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="pagi">
                <div class="pag-bot">
                    <ul class="pagination">
                        <!-- <li class="pag-bot__arrow">
                            <?php echo $this->Paginator->first('<<'); ?>
                        </li> -->
                        <?php echo $this->Paginator->numbers(
                            array(
                                'separator' => '',
                                'tag' => 'li',
                                'modulus' => 4
                                )
                        ); ?>
						<li class="pag-bot__arrow"><?php echo $this->Paginator->first('<<'); ?></li>
                        <li class="pag-bot__arrow"><?php echo $this->Paginator->last('>>'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>