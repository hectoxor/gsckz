<section class="container--column px-8 pt-40 mt-40 mx-40">
	<span class="text text-type-medium-16">
		<a href="/" class="text-color-black text-underline-none">Главная</a>
		/
		<a href="/news" class="text-color-black text-underline-none">Новости</a>
	</span>
	<h2 class="text text-color-large">
		<?= $post['News']['title'] ?>
	</h2>
	<div class="container--column mx-40">
		<img 
			class="img object-fit-contain border-radius-10"
			src="/img/news/<?= $post['News']['img'] ?>"
			alt=""
		/>
		<span class="text text-type-medium-16">
			<?= $post['News']['body'] ?>
		</span>
	</div> 
</section>