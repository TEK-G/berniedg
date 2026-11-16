<footer class="site-footer"><div><a href="index.php" class="brand"><?=e($site['name'])?></a><a href="#main-content" class="back-top">back to top ↑</a></div><p class="footer-full-name"><?=e($site['full_name'])?></p><p>Patient safety, clear communication, and dependable teamwork. © 2026.</p><span>Made with a little care.</span></footer>
</div></main>
<?php include __DIR__.'/overlays.php'; ?>
<div class="guide-cursor" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m4 3 5 16 3-7 7-3Z"/></svg><span><b><?=e($site['first_name'])?></b><span data-guide-text></span></span></div>
<div class="guide-prompt" hidden><button data-tour-replay><?=icon('replay')?>take a little tour</button><button data-tour-dismiss aria-label="Dismiss tour prompt"><?=icon('close')?></button></div>
<div class="toast" role="status" aria-live="polite"></div>
<script type="application/json" id="site-data"><?=json_encode(['site'=>$site,'projects'=>$projects,'credentials'=>$credentials,'resources'=>$resources,'faqs'=>$faqs], JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_UNESCAPED_UNICODE)?></script>
</body></html>
