<!DOCTYPE html>
<html lang="<?= config('app.locale','en') ?>">
<head>
	<!-- METAS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="csrf-token" content="<?= app('request')->session()->get('_token') ?>">
	@include('components.header.metas')
	<title><?= env('APP_NAME') ?><?= (isset($runtime['pageName']) ? " - ".$runtime['pageName'] : '') ?></title>

	<!-- STYLES -->
	@include('components.header.styles')
</head>
<body <?= (isset($runtime['bodyClass']))? "class='".implode(' ',$runtime['bodyClass'])."'" : "" ?>>