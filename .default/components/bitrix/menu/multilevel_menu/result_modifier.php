<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/*
Удаление элементов меню у которых доступ закрыт

Добавление всем элементам меню параметра CLASS, который содержит
список CSS-классов. Например: parent selected
*/

if (!empty($arResult)) {
	// Удаление элементов меню у которых доступ закрыт
	foreach ($arResult as $arItemKey => &$arItem) { // Обработка &$arItem по ссылке
		// Если ключ не числовой, значит это не элемент меню
		if (!is_int($arItemKey)) {
			continue;
		}

		if ($arItem['PERMISSION'] == 'D') {
			unset($arResult[$arItemKey]);
		}
	}

	unset($arItem); // Удаление ссылки

	// $arResultKeys и $i необходимы чтобы узнать значение следующего элемента
	// массива, т.к. нельзя использовать функцию next() внутри цикла foreach
	$arResultKeys = array_keys($arResult);
	$i = 0;

	foreach ($arResult as $arItemKey => &$arItem) { // Обработка &$arItem по ссылке
		// Если ключ не числовой, значит это не элемент меню
		if (!is_int($arItemKey)) {
			continue;
		}

		// Вычисление ключа следующего элемента
		$nextItemKey = $arResultKeys[$i + 1];
		$i++;

		// Проверка: остались ли дочерние элементы у текущего родителя
		// после удаления элементов с закрытым доступом
		if (
			$arItem['IS_PARENT']
			&& $arItem['DEPTH_LEVEL'] >= $arResult[$nextItemKey]['DEPTH_LEVEL']
		) {
			$arItem['IS_PARENT'] = false;
		}

		$classes = array();

		if ($arItem['IS_PARENT']) {
			$classes[] = 'parent';
		}

		if ($arItem['SELECTED']) {
			$classes[] = 'selected';
		}

		$arItem['CLASS'] = implode(' ', $classes);
	}

	unset($arItem); // Удаление ссылки
}
