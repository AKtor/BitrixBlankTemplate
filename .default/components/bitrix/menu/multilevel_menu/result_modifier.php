<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/*
Добавляет в массив каждого элемента меню элемент с ключем CLASS,
который содержит список CSS-классов. Например: parent selected
*/

if (!empty($arResult)) {
	foreach ($arResult as $arItemKey => &$arItem) { // Обработка &$arItem по ссылке
		// Если ключ не числовой, значит это не элемент меню
		if (!is_int($arItemKey)) {
			continue;
		}

		$classes = array();

		if ($arItem['IS_PARENT']) {
			$classes[] = 'parent';
		}

		if ($arItem['SELECTED']) {
			$classes[] = 'selected';
		}

		if ($arItem['PERMISSION'] == 'D') {
			$classes[] = 'denied';
		}

		$arItem['CLASS'] = implode(' ', $classes);
	}

	unset($arItem); // Удаление ссылки
}
