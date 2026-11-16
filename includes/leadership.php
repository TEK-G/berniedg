<section class="about-profile-section" aria-labelledby="aspirations-title">
    <h2 class="category-heading" id="aspirations-title">Always ready to grow</h2>
    <div class="about-profile-copy">
        <?php foreach($leadership['aspirations'] as $paragraph): ?><p><?=e($paragraph)?></p><?php endforeach; ?>
    </div>
</section>
<section class="about-profile-section" aria-labelledby="contributions-title">
    <h2 class="category-heading" id="contributions-title">How I want to contribute</h2>
    <div class="strengths-grid">
        <?php foreach($leadership['contributions'] as $contribution): ?>
        <article class="strength-card">
            <span class="resource-symbol"><?=icon($contribution['icon'])?></span>
            <h3><?=e($contribution['title'])?></h3>
            <p><?=e($contribution['description'])?></p>
        </article>
        <?php endforeach; ?>
    </div>
</section>
<section class="about-profile-section" aria-labelledby="leadership-view-title">
    <h2 class="category-heading" id="leadership-view-title">My view on leadership</h2>
    <div class="about-profile-copy">
        <?php foreach($leadership['view'] as $paragraph): ?><p><?=e($paragraph)?></p><?php endforeach; ?>
    </div>
</section>
<a class="text-button" href="experience.php">Read my professional profile →</a>
