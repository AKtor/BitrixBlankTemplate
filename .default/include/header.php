<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();?>
<?IncludeTemplateLangFile(__FILE__);?>
<!doctype html>
<html lang="<?=LANGUAGE_ID?>">
<head>
	<meta charset="<?=LANG_CHARSET?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Удалить если не адаптированно для мобильных -->

	<title><?$APPLICATION->ShowTitle()?></title>
	<?
	$APPLICATION->SetAdditionalCSS('/bitrix/templates/.default/assets/css/normalize.css');
	$APPLICATION->SetAdditionalCSS('/bitrix/templates/.default/template_styles.css');

	// Вывод скриптов находится в footer.php
	$APPLICATION->AddHeadScript('/bitrix/templates/.default/assets/js/jquery-1.12.0.min.js');
	$APPLICATION->AddHeadScript('/bitrix/templates/.default/assets/js/common.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/assets/js/template.js');

	$APPLICATION->AddHeadString('<!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->');
	$APPLICATION->AddHeadString('<!--[if lt IE 9]><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->');

	$APPLICATION->ShowMeta('robots');
	$APPLICATION->ShowMeta('keywords');
	$APPLICATION->ShowMeta('description');
	$APPLICATION->ShowLink('canonical');
	$APPLICATION->ShowCSS();
	$APPLICATION->ShowHeadStrings();
	?>
</head>
<body>
	<?$APPLICATION->ShowPanel()?>

	<a href="<?= SITE_DIR; ?>">Главная</a>

	<!-- Заголовок страницы должен иметь id="pagetitle" на случай если будет использоваться ajax -->
	<h1 id="pagetitle"><?$APPLICATION->ShowTitle()?></h1>

	<!-- Хлебные крошки должны иметь id="navigation" на случай если будет использоваться ajax -->
	<div class="breadcrumbs" id="navigation"></div>