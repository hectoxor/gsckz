<section class="hero-section px-8">
	<div class="hero-section-bg">
		<img class="hero-bg-2" src="/assets/bg-gradient-2.png" />
		<div class="hero-illustration-content">
			<img class="illustration-9" src="/assets/illustration-9.png" />
		</div>
	</div>
	<div class="hero-inner">
		<div class="hero-inner">
			<a href="\">
			<span class="text text-color-black text-type-medium-20">
             Главная
	    </span>
			</a>
			<span> / </span>

			<a href="language-school">
			<span class="text text-color-black text-type-medium-20">
             Школа Английского
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
			<a class="button button-primary" onclick="handleModalToggle('apply-modal');">
				<span class="text text-color-white text-type-medium text-font-weight-700 text-transform-uppercase">получить консультацию</span>
			</a>
			<div class="container--column my-25">
				<h3 class="text text-color-large">Программы обучения английскому языку:</h3>
				<div class="container justify-between card-type-shallow border-radius-10 py-5 px-20">
					<span class="text text-type-medium text-color-primary">Детям от 6 до 9 лет</span>
					<a href="test/kids" class="text text-type-medium text-color-link text-underline">
						<span>Проверить уровень знаний</span>
					</a>
				</div>
				<div class="container justify-between card-type-shallow border-radius-10 py-5 px-20">
					<span class="text text-type-medium text-color-primary">Подросткам 10-12 лет</span>
					<a href="test/teen" class="text text-type-medium text-color-link text-underline">
						<span>Проверить уровень знаний</span>
					</a>
				</div>
				<div class="container justify-between card-type-shallow border-radius-10 py-5 px-20">
					<span class="text text-type-medium text-color-primary">Подросткам 13-17 лет </span>
					<a href="test/teen_2" class="text text-type-medium text-color-link text-underline">
						<span>Проверить уровень знаний</span>
					</a>
				</div>
				<div class="container justify-between card-type-shallow border-radius-10 py-5 px-20">
					<span class="text text-type-medium text-color-primary">Взрослым</span>
					<a href="test/general" class="text text-type-medium text-color-link text-underline">
						<span>Проверить уровень знаний</span>
					</a>
				</div>
				<div class="container justify-between card-type-shallow border-radius-10 py-5 px-20">
					<span class="text text-type-medium text-color-primary">Подготовка к IELTS и SAT</span>
					<a href="test/ielts" class="text text-type-medium text-color-link text-underline">
						<span>Пройти пробный тест формата IELTS</span>
					</a>
				</div>
			</div>
		</div>
</section>





<div class="content">

	<div class="section">
		<div class="container">
			<h1 class="section__heading" style="text-align:center;">Выберите подходящий для вас тест</h1>
			<div class="test__items">
                <div class="test__item">
                    <a href="/<?= $lang ?>test/general" class="test__item-pic">
                        <img src="/img/SVG/general.svg" alt="">
                    </a>
                    <a href="/<?= $lang ?>test/general" class="test__item-title">English For Adults</a>
                  <p>(18+)</p>
                </div>
                <div class="test__item">
                    <a href="/<?= $lang ?>test/teen_2" class="test__item-pic">
                        <img src="/img/PNG/test.png" alt="">
                    </a>
                    <a href="/<?= $lang ?>test/teen_2" class="test__item-title">English for Teens</a>
                    <p>(13 - 17 years)</p>
                </div>
                <div class="test__item">
                    <a href="/<?= $lang ?>test/teen" class="test__item-pic">
                        <img src="/img/PNG/test.png" alt="">
                    </a>
                    <a href="/<?= $lang ?>test/teen" class="test__item-title">English for Teens</a>
                    <p>(10 - 12 years)</p>
                </div>
                <div class="test__item">
                	<a href="/<?= $lang ?>test/kids" class="test__item-pic">
						<img src="/img/SVG/kids.svg" alt="">
					</a>
					<a href="/<?= $lang ?>test/kids" class="test__item-title">English for Kids</a>
                    <p>(6 - 9 years)</p>
				</div>
				<div class="test__item">
                	<a href="/<?= $lang ?>test/ielts" class="test__item-pic">
						<img src="/img/SVG/ielts.svg" alt="">
					</a>
					<a href="/<?= $lang ?>test/ielts" class="test__item-title">IELTS</a>
				</div>
            </div>
		</div>
	</div>
</div>

