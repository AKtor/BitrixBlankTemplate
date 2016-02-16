<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

/*
Шаблон одноуровневого меню. Ничего лишнего, только html код.

Генерирует код следующего вида:
<ul>
	<li><a href=""></a></li>
	<li class="active"><a href=""></a></li>
	<li><a href=""></a></li>
	<li><a href=""></a></li>
	<li><a href="" target="_blank" rel="nofollow"></a></li>
</ul>

Дополнительные атрибуты для ссылок:
1. Откройте меню для редактирования в Расширенном режиме
2. Добавьте необходимым ссылкам параметр ATTRIBUTES
3. Укажите нужное значение. Например: target="_blank" rel="nofollow"
*/

if (!empty($arResult)):?>
<ul>
	<?
	foreach ($arResult as $arItemKey => $arItem):
		if (
			$arItem['DEPTH_LEVEL'] > 1
			|| $arItem['PERMISSION'] == 'D'
			|| !is_int($arItemKey)
		)
		{
			continue;
		}
	?>
		<li<?=( $arItem['SELECTED'] ? ' class="active"' : '' )?>><a href="<?=$arItem['LINK']?>"<?=( $arItem['PARAMS']['ATTRIBUTES'] ? ' ' . $arItem['PARAMS']['ATTRIBUTES'] : '' )?>><?=$arItem['TEXT']?></a></li>
	<?endforeach?>
</ul>
<?endif?>