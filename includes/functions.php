<?php
declare(strict_types=1);
function e(string $value): string { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }
function icon(string $name, string $class = ''): string {
    $paths = [
        'plus'=>'<path d="M12 4v16M4 12h16"/>',
        'heart'=>'<path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8Z"/><path d="M4 12h4l2-4 4 8 2-4h4"/>',
        'stethoscope'=>'<path d="M5 3v6a5 5 0 0 0 10 0V3M3 3h4m6 0h4M10 14v2a5 5 0 0 0 10 0v-3"/><circle cx="20" cy="10" r="3"/>',
        'coffee'=>'<path d="M4 8h12v7a5 5 0 0 1-5 5H9a5 5 0 0 1-5-5V8Zm12 1h2a3 3 0 1 1 0 6h-2M2 22h18M7 2v3m4-3v3m4-3v3"/>',
        'bag'=>'<path d="M5 7h14l-1 14H6L5 7Z"/><path d="M9 7V5a3 3 0 0 1 6 0v2"/>',
        'article'=>'<rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5"/>',
        'book'=>'<path d="M12 5C9 3 5 3 2 4v15c4-1 7-1 10 1 3-2 6-2 10-1V4c-3-1-7-1-10 1Zm0 0v15"/>',
        'people'=>'<circle cx="9" cy="7" r="3"/><path d="M3 21v-2a6 6 0 0 1 12 0v2M16 4a3 3 0 0 1 0 6m2 5a5 5 0 0 1 3 5"/>',
        'case'=>'<rect x="3" y="7" width="18" height="14" rx="2"/><path d="M8 7V4h8v3M3 12h18M10 15h4"/>',
        'shield'=>'<path d="M12 2 3 6v6c0 5 9 10 9 10s9-5 9-10V6l-9-4Z"/><path d="m8 12 3 3 5-6"/>',
        'chat'=>'<path d="M3 4h18v13H9l-6 4V4Z"/><path d="M7 9h10M7 13h6"/>',
        'flower'=>'<path d="M12 8c-7-12-14 1-4 4-12 7 1 14 4 4 7 12 14-1 4-4 12-7-1-14-4-4Z"/><circle cx="12" cy="12" r="2"/>',
        'mail'=>'<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 6 9 7 9-7"/>',
        'arrow'=>'<path d="M5 12h14m-6-6 6 6-6 6"/>',
        'external'=>'<path d="M6 18 18 6M6 6h12v12"/>',
        'sun'=>'<circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M2 12h2m16 0h2M5 5l1.5 1.5m11 11L19 19M5 19l1.5-1.5m11-11L19 5"/>',
        'moon'=>'<path d="M21 13a9 9 0 1 1-10-10 7 7 0 0 0 10 10Z"/>',
        'monitor'=>'<rect x="3" y="3" width="18" height="14" rx="2"/><path d="M12 17v4m-4 0h8"/>',
        'sound'=>'<path d="M3 10v4h4l5 4V6l-5 4H3Zm13-2a6 6 0 0 1 0 8m3-11a10 10 0 0 1 0 14"/>',
        'mute'=>'<path d="M3 10v4h4l5 4V6l-5 4H3Zm13 0 6 6m0-6-6 6"/>',
        'menu'=>'<path d="M4 6h16M4 12h16M4 18h16"/>',
        'close'=>'<path d="m5 5 14 14M19 5 5 19"/>',
        'search'=>'<circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 5 5"/>',
        'download'=>'<path d="M12 3v12m-5-5 5 5 5-5M4 16v5h16v-5"/>',
        'keyboard'=>'<rect x="2" y="5" width="20" height="14" rx="2"/><path d="M6 9h.01M10 9h.01M14 9h.01M18 9h.01M6 13h.01M10 13h.01M14 13h.01M18 13h.01M7 16h10"/>',
        'replay'=>'<path d="M3 10a9 9 0 1 1 2 8M3 3v7h7"/>',
        'leaf'=>'<path d="M20 3C4 1 1 12 8 17S23 14 20 3ZM4 21 16 9"/>',
        'paw'=>'<ellipse cx="4.5" cy="10" rx="2" ry="2.5"/><ellipse cx="9" cy="5" rx="2" ry="2.5"/><ellipse cx="15" cy="5" rx="2" ry="2.5"/><ellipse cx="19.5" cy="10" rx="2" ry="2.5"/><path d="M8 14c1-1.8 2-3 4-3s3 1.2 4 3l1.5 2.5c1.5 2.5-.5 5-3 4l-2.5-.8-2.5.8c-2.5 1-4.5-1.5-3-4L8 14Z"/>',
    ];
    return '<svg class="icon '.e($class).'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.($paths[$name] ?? $paths['plus']).'</svg>';
}
function sectionHeading(string $number, string $title, string $linkText, string $href): void { ?>
    <div class="section-heading"><h2><?=e($number === '' ? $title : $number.' — '.$title)?></h2><a href="<?=e($href)?>"><?=e($linkText)?> →</a></div>
<?php }
function credentialCard(array $item, int $index): void { ?>
    <button class="credential-card" data-credential="<?=$index?>"><span class="credential-icon"><?=icon($item['icon'])?></span><strong><?=e($item['name'])?></strong><span><?=e($item['issuer'])?></span><small>❬ VIEW DETAILS ❭</small></button>
<?php }
function quoteCard(array $item): void { ?>
    <article class="quote-card"><span class="quote-mark" aria-hidden="true">“</span><blockquote><?=e($item['quote'])?></blockquote><div class="quote-person"><span class="avatar"><?=e($item['initials'])?></span><div><strong><?=e($item['name'])?></strong><small><?=e($item['role'])?></small></div></div></article>
<?php }
