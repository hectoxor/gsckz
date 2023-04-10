<section class="grid grid--column-mobile gap-40 px-8 pt-40 mt-40 mb-25">
    <div class="container--column gap-24">
        <h2 class="text text-color-large">
            <?=$data['University']['title']?>
        </h2>
        <div class="container gap-12 align-center w-fit-content background-tertiary text-color-white border-radius-4 py-3 px-8">
            <span class="ico ico-20">
                <i class="ico ico-location"></i>
            </span>
            <span class="text text-type-medium-16 text-color-white">
                <?=$data['Country']['title']?>, <?=$data['University']['city_name']?>
            </span>
        </div>        
        <span class="text text-type-medium-16">
            <?= $data['University']['body'] ?>
        </span>
        <a class="button button-primary w-50 w-100-mobile" onclick="handleModalToggle('apply-modal');">
            <span class="text text-color-white text-type-medium text-font-weight-700 text-transform-uppercase">получить консультацию</span>
        </a>

        <div class="container gap-12 background-secondary justify-between border-radius-10 py-8 px-25">
            <div class="container--column gap-0">
                <div class="container gap-12">
                    <span class="ico ico-20 text-color-white">
                        <i class="ico ico-graduation-hat"></i>
                    </span>
                    <span class="text text-type-medium-14 text-color-white text-font-weight-600">
                        Программа
                    </span>
                </div>
                <span class="text text-type-medium-16 text-color-white">
                    Магистратура, Бакалавриат
                </span>
            </div>
            <div class="container--column gap-0">
                <div class="container gap-12">
                    <span class="ico ico-20 text-color-white">
                        <i class="ico ico-bill-paper"></i>
                    </span>
                    <span class="text text-type-medium-14 text-color-white text-font-weight-600">
                        Стоимость за год от
                    </span>
                </div>
                <span class="text text-type-medium-16 text-color-white">
                    <?=$data['University']['price']?>
                </span>
            </div>
        </div>
    </div>
    <img 
        class="img object-fit-contain border-radius-10"
        src="/img/universities/<?= $data['University']['img'] ?>"
        alt=""
    />
</section> 


<?php if( $data['University']['body_edu'] ): ?>
    <section class="container--column gap-24 px-8">
        <h2 class="text text-color-large">
            <?= ( isset($data['University']['body_edu_title']) ) ? $data['University']['body_edu_title'] : '' ?>
        </h2>

        <div class="container gap-12 container--column-mobile gap-24-mobile">
            <div class="container--column gap-24 flex-1">
                <span class="text text-type-medium-16">
                    <?= $data['University']['body_edu'] ?>
                </span>
            </div>
            <?php if( isset($data['University']['body_program']) && $data['University']['body_program'] ): ?>
                <div class="separator--vertical"></div>
                <div class="container--column gap-24 flex-1">
                    <span class="text text-type-medium-16">
                        <?= $data['University']['body_program'] ?>
                    </span>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if( $data['University']['residence'] ): ?>
    <section class="container--column gap-24 px-8">
        <h2 class="text text-color-large">Проживание</h2>
        <div class="grid grid--column-mobile gap-40">
            <a href="javascript:;" class="lang-courses__item-pic pic-increase" data-fancybox data-src="https://www.youtube.com/embed/<?= $data['University']['youtube'] ?>">
                <?php if( $data['University']['residence_img'] ): ?>
                    <img 
                        class="img object-fit-contain border-radius-10"
                        src="/img/universities/<?= $data['University']['residence_img'] ?>"
                        alt=""
                    />
                <?php else: ?>
                    <iframe src="<?= $data['University']['youtube'] ?>" width="100%" height="100%"></iframe>
                <?php endif; ?>
            </a>
            <div class="container gap-12">
                <span class="text text-type-medium-16">
                    <?= $data['University']['residence'] ?>
                </span>
            </div>
        </div>
    </section>
<?php endif; ?>