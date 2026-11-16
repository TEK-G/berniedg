<?php
require_once __DIR__.'/../data/content.php';
require_once __DIR__.'/functions.php';
$page = $page ?? 'home';
if (!($sectionVisibility[$page] ?? true)) {
    header('Location: index.php', true, 302);
    exit;
}
$title = $documentTitle ?? ($page === 'home' ? $site['name'].' — Patient Safety & Virtual Monitoring' : (($pageMeta[$page][0] ?? 'Journal').' — '.$site['name']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=e($site['full_name'])?> — Biology graduate, major in Zoology, and Virtual Safety Companion at <?=e($profile['organization'])?>.">
    <meta name="author" content="<?=e($site['full_name'])?>">
    <meta name="theme-color" content="#f1f9f2">
    <title><?=e(ucfirst($title))?></title>
    <link rel="icon" href="assets/icons/favicon.svg" type="image/svg+xml">
    <link rel="preload" href="assets/fonts/inter-variable.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/animations.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/pages.css?v=portrait-up-1">
    <link rel="stylesheet" href="assets/css/theme.css?v=contact-loading-1">
    <link rel="stylesheet" href="assets/css/typography.css?v=inter-1">
    <script>try{const t=localStorage.getItem('care-theme-green')||'light';document.documentElement.dataset.theme=t;document.documentElement.classList.toggle('dark',t==='dark'||(t==='system'&&matchMedia('(prefers-color-scheme:dark)').matches));}catch(e){}</script>
    <script src="assets/js/main.js?v=remove-lounge-1" defer></script>
    <script src="assets/js/animations.js?v=contact-1" defer></script>
</head>
<body data-page="<?=e($page)?>">
<a href="#main-content" class="skip-link">Skip to content</a>
<div class="background-dots" aria-hidden="true"><div></div><div></div></div>
<?php include __DIR__.'/navbar.php'; ?>
<main id="main-content" tabindex="-1"><div class="content-wrap">
