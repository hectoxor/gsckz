<h1>Список Карточек</h1>

<a class="btn btn--add" href="/admin/language_cards/add">Добавить материал</a>
<br><br>

<?php if($data): ?>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Заголовок</th>
				<th>Приоритет</th>
				<th>Редактирование</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach( $data as $advan ): ?>
			<tr>
				<td>
					<?php echo $advan['LanguageCard']['id'] ?>
				</td>
				<td>
					<?= $advan['LanguageCard']['title'] ?>
				</td>
				<td>
					<?= $advan['LanguageCard']['item_order'] ?>
				</td>
				<td>
					<a href="/admin/language_cards/edit/<?php echo $advan['LanguageCard']['id'] ?>?lang=ru">rus</a> |
					<a href="/admin/language_cards/edit/<?php echo $advan['LanguageCard']['id'] ?>?lang=kz">kaz</a> |
					<a href="/admin/language_cards/edit/<?php echo $advan['LanguageCard']['id'] ?>?lang=en">eng</a> |
					<?php  echo $this->Form->postLink('Удалить', "/admin/language_cards/delete/{$advan['LanguageCard']['id']}", array('confirm' => 'Удалить материал?')) ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>

<div class="pagi">
	<div class="pages"><div class="page-count"> <strong><?=__('Страница')?>:</strong></div>
	<?php 
	echo $this->Paginator->counter(array(
	    'separator' => ' из ',
	    
	    ));
	 ?>
	</div>		
	<div class="pag-bot">
		<div class="pag-bot__arrow"><?php echo $this->Paginator->first('<<'); ?></div>
		<ul class="pagination">
		<?php echo $this->Paginator->numbers(
		    array(
		        'separator' => '',
		        'tag' => 'li',
		        'modulus' => 4
		        )
		); ?>
    	</ul>
		<div class="pag-bot__arrow"><?php echo $this->Paginator->last('>>'); ?></div>
	</div>	
</div>