


<?php

$checked_countries = [];
$checked_edu_langs = [];

if (isset($_GET['country_ids'])) {
	$checked_countries = $_GET['country_ids'];
	// Filter universities based on countries
	$universities = array_filter($universities, function($university) use ($checked_countries) {
		return in_array($university['University']['country_id'], $checked_countries);
	});
	// Reindex keys
	$universities = array_values($universities);
}

if (isset($_GET['edu_lang_ids'])) {
	$checked_edu_langs = $_GET['edu_lang_ids'];
	// Filter universities based on languages
	$universities = array_filter($universities, function($university) use ($checked_edu_langs) {
		$univer_langs = explode(',', $university['University']['edu_language_ids']);
		foreach($univer_langs as $lang_id) {
			if (in_array($lang_id, $checked_edu_langs)) {
				return true;
			}
		}
		return false;
	});
	// Reindex keys

	$universities = array_values($universities);

// Define the number of items per page
	$items_per_page = 10; // or whatever number you want

// Calculate the total number of pages
	$total_pages = ceil(count($universities) / $items_per_page);

// Get the current page from the query string, default to 1 if not set
	$page_number = isset($_GET['page']) ? $_GET['page'] : 1;

// Make sure the page number is within the range of available pages
	$page_number = max(1, min($total_pages, $page_number));

// Create chunks of the universities array, each containing $items_per_page items
	$chunks = array_chunk($universities, $items_per_page);

// Get the universities for the current page
	$paged_universities = $chunks[$page_number - 1];
}


?>

<section class="hero-section px-8">
	<div class="hero-section-bg">
		<img class="hero-bg-2" src="/assets/bg-gradient-2.png" />
	</div>
</section>
<section class="container--column gap-24 px-8 mx-40 mx-0-mobile">
	<div class="container--column gap-24 w-75 w-100-mobile">
		<h1 class="text text-color-large">Образование за рубежом</h1>
		<span class="text text-type-medium-16">
GSC Study сопровождает ученика на пути от выбора иностранного вуза и программы до успешного поступления, помогая с документами, подготовкой к экзаменам и визовыми вопросами.
		</span>
		<h3 class="text text-color-large">Выберите школу или колледж</h3>
		<span class="text text-type-medium-16">
            В этом разделе представлена подробная информация о программах обучения, условиях проживания и стоимости в зарубежных школах и колледжах
        </span>
	</div>



<!--	<section>-->
<!--		<div class="container">-->
<!--			<nav class="count-lang-nav">-->
<!--				<ul>-->
<!--					<li class="nav__item under">-->
<!--						<a class="js-slide" href="javascript:">Страна</a>-->
<!--						<div class="under-part">-->
<!--							<ul class="under-ul">-->
<!--								<li class="--><?php //= (!$checked_country) ? 'active' : '' ?><!--">-->
<!--									<a href="/--><?php //= $lang ?><!--higher_educations?city=--><?php //=$current_city?><!----><?php //= $edu_lang ?><!--">Все страны</a>-->
<!--								</li>-->
<!--								--><?php //foreach( $countries as $country_id => $country_name ): ?>
<!--									<li class="--><?php //= ($checked_country == $country_id) ? 'active' : '' ?><!--">-->
<!--										<a href="/--><?php //= $lang ?><!--higher_educations?city=--><?php //=$current_city?><!--&country_id=--><?php //= $country_id ?><!----><?php //= $edu_lang ?><!--">--><?php //= $country_name ?><!--</a>-->
<!--									</li>-->
<!--								--><?php //endforeach; ?>
<!--							</ul>-->
<!--						</div>-->
<!--					</li>-->
<!--					<li class="nav__item under">-->
<!--						<a class="js-slide" href="javascript:">язык</a>-->
<!--						<div class="under-part">-->
<!--							<ul class="under-ul">-->
<!--								<li class="--><?php //= (!$checked_edu_lang) ? 'active' : '' ?><!--">-->
<!--									<a href="/--><?php //= $lang ?><!--higher_educations?city=--><?php //=$current_city?><!----><?php //= $country ?><!--">Все языки</a>-->
<!--								</li>-->
<!--								--><?php //foreach( $edu_langs as $lang_id => $lang_name ): ?>
<!--									<li class="--><?php //= ($checked_edu_lang == $lang_id) ? 'active' : '' ?><!--">-->
<!--										<a href="/--><?php //= $lang ?><!--higher_educations?city=--><?php //=$current_city?><!--&edu_lang=--><?php //= $lang_id ?><!----><?php //= $country ?><!--">--><?php //= $lang_name ?><!--</a>-->
<!--									</li>-->
<!--								--><?php //endforeach; ?>
<!--							</ul>-->
<!--						</div>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</nav>-->
<!--		</div>-->
<!--	</section>-->


	<!-- ... Other code ... -->
	<form method="GET" action="">
		<div class="container">
			<nav class="count-lang-nav">
				<ul>
					<li class="nav__item under">
						<a class="js-slide" href="javascript:">Страна</a>
						<div class="under-part">
							<ul class="under-ul">
								<?php foreach ($countries as $country_id => $country_name): ?>
									<li>
										<input type="checkbox" id="country<?= $country_id ?>" name="country_ids[]" value="<?= $country_id ?>"
												<?= (in_array($country_id, $checked_countries)) ? 'checked' : '' ?>>
										<label for="country<?= $country_id ?>"><?= $country_name ?></label>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</li>
					<li class="nav__item under">
						<a class="js-slide" href="javascript:">язык</a>
						<div class="under-part">
							<ul class="under-ul">
								<?php foreach ($edu_langs as $lang_id => $lang_name): ?>
									<li>
										<input type="checkbox" id="lang<?= $lang_id ?>" name="edu_lang_ids[]" value="<?= $lang_id ?>"
												<?= (in_array($lang_id, $checked_edu_langs)) ? 'checked' : '' ?>>
										<label for="lang<?= $lang_id ?>"><?= $lang_name ?></label>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</li>
					<li class="nav__item under">
						<input class = "filter1" type="submit" value="filter">
					</li>
				</ul>
			</nav>
		</div>
	</form>

	<!-- ... Other code ... -->




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
	</div>
</section>

