<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();?>

<?
/*
Шаблон многоуровневого меню. Ничего лишнего, только html код.
Ссылки у которых доступ закрыт не выводятся, в отличии от стандартных шаблонов,
например шаблона horizontal_multilevel.

Генерирует код следующего вида:
<ul>
	<li><a href=""></a></li>
	<li><a href=""></a></li>
	<li><a href=""></a></li>
	<li class="parent selected"><a href=""></a>
		<ul>
			<li class="parent selected"><a href=""></a>
				<ul>
					<li class="selected"><a href=""></a></li>
				</ul>
			</li>
		</ul>
	</li>
	<li><a href="" target="_blank" rel="nofollow"></a></li>
</ul>

Дополнительные атрибуты для ссылок:
1. Откройте меню для редактирования в Расширенном режиме
2. Добавьте необходимым ссылкам параметр ATTRIBUTES
3. Укажите нужное значение. Например: target="_blank" rel="nofollow"
*/
?>

<?if (!empty($arResult)):?>
<ul>

<?
$previousLevel = 0;
foreach ($arResult as $arItemKey => $arItem):
	// Если ключ элемента не целое число - это не элемент меню
	if (!is_int($arItemKey)) {
		continue;
	}
?>

	<?if ($previousLevel && $arItem['DEPTH_LEVEL'] < $previousLevel):?>
		<?=str_repeat('</ul></li>', ($previousLevel - $arItem['DEPTH_LEVEL']));?>
	<?endif?>

	<?// Параметр CLASS добавлен в файле result_modifier.php?>
	<li<?if ($arItem['CLASS']):?> class="<?=$arItem['CLASS']?>"<?endif?>>

	<a href="<?=$arItem['LINK']?>"<?if ($arItem['PARAMS']['ATTRIBUTES']):?> <?=$arItem['PARAMS']['ATTRIBUTES']?><?endif?>><?=$arItem['TEXT']?></a>

	<?if ($arItem['IS_PARENT']):?>
		<ul>
	<?else:?>
		</li>
	<?endif?>

	<?$previousLevel = $arItem['DEPTH_LEVEL']?>

<?endforeach?>

<?if ($previousLevel > 1):?>
	<?=str_repeat('</ul></li>', ($previousLevel - 1));?>
<?endif?>

</ul>
<?endif?>