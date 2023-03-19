<nav class="navbar py-12" data-toggled="false" data-transitionable="false">
	<ul class="navbar-nav">
		<li class="logo">
			<a href="/" class="nav-link">
				<img src="/assets/logo.svg" alt="Logo GSC Study"/>
			</a>
		</li>

		<li class="nav-mobile-wrapper">
			<div class="nav-dropdown" tabindex="0">
				<div class="nav-dropdown-text">
					<span class="text text-type-medium text-color-primary text-font-weight-600 text-overflow">Образование за рубежом</span>
					<span class="ico ico-16">
						<i class="ico-chevron-down"></i>
					</span>
				</div>
				<div class="nav-dropdown-content py-4 px-8">
					<a href="/" class="nav-dropdown-content__item nav-link">
						<span class="text text-type-medium text-color-primary text-font-weight-600">Языковые курсы</span>
					</a>
					<a href="/" class="nav-dropdown-content__item nav-link">
						<span class="text text-type-medium text-color-primary text-font-weight-600">Среднее образование</span>
					</a>
					<a href="/" class="nav-dropdown-content__item nav-link">
						<span class="text text-type-medium text-color-primary text-font-weight-600">Высшее образование</span>
					</a>
					<a href="/" class="nav-dropdown-content__item nav-link">
						<span class="text text-type-medium text-color-primary text-font-weight-600">Glion</span>
					</a>
					<a href="/" class="nav-dropdown-content__item nav-link">
						<span class="text text-type-medium text-color-primary text-font-weight-600">Les Roches</span>
					</a>
					<a href="/" class="nav-dropdown-content__item nav-link">
						<span class="text text-type-medium text-color-primary text-font-weight-600">Летние каникулы за рубежом</span>
					</a>
					<a href="/" class="nav-dropdown-content__item nav-link">
						<span class="text text-type-medium text-color-primary text-font-weight-600">Контакты</span>
					</a>
				</div>
			</div>
			<div class="nav-text">
				<a href="/" class="nav-link">
					<span class="text text-type-medium text-color-primary text-font-weight-600 text-overflow">Школа английского</span>
				</a>
			</div>
			<div class="nav-dropdown" tabindex="0">
				<div class="nav-dropdown-text">
					<span class="text text-type-medium text-color-primary text-font-weight-600 text-overflow">Летние программы</span>
					<span class="ico ico-16">
							<i class="ico-chevron-down"></i>
						</span>
				</div>
				<div class="nav-dropdown-content py-4 px-8">
					<a href="/" class="nav-dropdown-content__item nav-link">
						<span class="text text-type-medium text-color-primary text-font-weight-600">Языковая среда</span>
					</a>
					<a href="/" class="nav-dropdown-content__item nav-link">
						<span class="text text-type-medium text-color-primary text-font-weight-600">Сопровождение</span>
					</a>
					<a href="/" class="nav-dropdown-content__item nav-link">
						<span class="text text-type-medium text-color-primary text-font-weight-600">Безопасность</span>
					</a>
				</div>
			</div>
			<div class="nav-text">
				<a href="/" class="nav-link">
					<span class="text text-type-medium text-color-primary text-font-weight-600 text-overflow">Контакты</span>
				</a>
			</div>
			<div class="nav-contacts--desktop container--column align-center">
				<div class="nav-text">
					<span class="text text-type-medium-20  text-font-weight-600 text-font-family-primary text-overflow">+7 (700) 127 77 88</span>
				</div>
				<a href="/" class="nav-link button button-primary">
					<span class="text text-type-medium-14 text-color-white text-font-weight-700 text-font-family-primary text-transform-uppercase text-overflow">Получить консультацию</span>
				</a>
			</div>
		</li>
		<li class="nav-right-content">
			<div class="nav-dropdown language-select p-5" tabindex="0">
				<div class="nav-dropdown-text">
					<span class="text text-type-medium text-color-black text-font-weight-600 text-transform-uppercase"><?= $l ?></span>
					<span class="ico ico-16">
						<i class="ico-chevron-down"></i>
					</span>
				</div>
				<div class="nav-dropdown-content px-8">
					<a href="/" class="nav-dropdown-content__item nav-link">
						<span class="text text-type-medium text-color-primary text-font-weight-600 text-transform-uppercase">ru</span>
					</a>
					<a href="/kz" class="nav-dropdown-content__item nav-link">
						<span class="text text-type-medium text-color-primary text-font-weight-600 text-transform-uppercase">kz</span>
					</a>
					<a href="/en" class="nav-dropdown-content__item nav-link">
						<span class="text text-type-medium text-color-primary text-font-weight-600 text-transform-uppercase">en</span>
					</a>
				</div>
			</div>
			<div class="nav-contacts--mobile container align-center">
				<div class="nav-text">
					<span class="text text-type-medium-20 text-color-white text-font-weight-600 text-font-family-primary text-overflow">+7 (700) 127 77 88</span>
				</div>
				<a class="nav-link button button-outline text-color-white" onclick="handleModalToggle('apply-modal');">
					<span class="text text-type-medium-14 text-color-white text-font-weight-700 text-font-family-primary text-transform-uppercase text-overflow">Получить консультацию</span>
				</a>
			</div>
			<div id="nav-toggle-button" class="button button-ico button-white" onclick="handleNavToggle();">
				<span class="ico ico-24">
					<i class="ico-bars"></i>
					<i class="ico-close"></i>
				</span>
			</div>
		</li>
	</ul>
</nav>
