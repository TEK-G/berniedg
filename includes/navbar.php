<header class="mobile-header"><a href="index.php" class="brand" title="<?=e($site['full_name'])?>"><?=e($site['name'])?></a><button data-menu-open aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu"><?=icon('menu')?></button></header>
<?php foreach (['desktop','mobile'] as $navMode): ?>
<nav class="sidebar <?=$navMode==='mobile'?'mobile-menu':''?>" <?=$navMode==='mobile'?'id="mobile-menu" aria-label="Mobile navigation" inert':'aria-label="Main navigation"'?>>
    <div class="nav-top"><a href="index.php" class="brand" data-tour-target="brand" title="<?=e($site['full_name'])?>"><?=e($site['name'])?></a><?php if($navMode==='mobile'):?><button data-menu-close aria-label="Close menu"><?=icon('close')?></button><?php endif;?></div>
    <div class="nav-groups">
    <?php foreach($navigation as $group):
        $group = array_filter($group, static fn(array $item): bool => ($sectionVisibility[$item[0]] ?? true) && ($navigationVisibility[$item[0]] ?? true));
        if (!$group) continue;
    ?><div class="nav-group">
        <?php foreach($group as [$key,$label,$symbol]): ?><a href="<?=e($key)?>.php" class="nav-link <?=$page===$key?'active':''?>" <?=$page===$key?'aria-current="page"':''?> data-tour-target="<?=e($key)?>"><?php if($symbol):?><?=icon($symbol)?><?php endif;?><?=e($label)?></a><?php endforeach;?>
    </div><?php endforeach;?>
    </div>
    <div class="nav-bottom">
        <a class="nav-resume" href="<?=e($site['resume_path'])?>" download="<?=e($site['resume_filename'])?>" aria-label="Download <?=e($site['name'])?>’s résumé (PDF, <?=e($site['resume_year'])?>)"><?=icon('download')?><span>Download résumé</span></a>
        <button class="shortcut" data-open="ask-dialog"><span>Ask anything</span><span><kbd class="mod-key">Ctrl</kbd><i>+</i><kbd>K</kbd></span></button>
        <button class="shortcut" data-open="typing-dialog"><span>Typing test</span><span><kbd class="mod-key">Ctrl</kbd><i>+</i><kbd>J</kbd></span></button>
        <div class="preferences"><div class="theme-switch" role="group" aria-label="Color theme"><button data-theme="system" aria-label="System theme" title="System theme"><?=icon('monitor')?></button><button data-theme="light" aria-label="Light theme" title="Light theme"><?=icon('sun')?></button><button data-theme="dark" aria-label="Dark theme" title="Dark theme"><?=icon('moon')?></button></div><button class="sound-toggle" data-sound aria-label="Enable interface sounds" aria-pressed="false"><?=icon('mute')?></button></div>
        <p class="nav-contact-copy">For care, community &amp; everything in between, say hello.</p><a class="nav-email" href="contact.php#inquiry"><?=icon('mail')?>let’s talk care ↗</a>
    </div>
</nav>
<?php endforeach;?>
