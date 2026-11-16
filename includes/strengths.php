<div class="strengths-grid">
    <?php foreach($professionalStrengths as $strength): ?>
    <article class="strength-card" id="<?=e($strength['slug'])?>">
        <span class="resource-symbol"><?=icon($strength['icon'])?></span>
        <h3><?=e($strength['title'])?></h3>
        <p><?=e($strength['description'])?></p>
    </article>
    <?php endforeach; ?>
</div>
