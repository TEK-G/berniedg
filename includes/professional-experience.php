<section class="work-overview" aria-labelledby="work-role-title">
    <span class="eyebrow">CURRENT ROLE</span>
    <h2 id="work-role-title"><?=e($profile['role'])?></h2>
    <p class="work-organization"><?=e($profile['organization'])?></p>
    <div class="work-overview-copy"><h3 class="category-heading">Overview</h3><p><?=e($workExperience['overview'])?></p></div>
</section>
<section class="about-profile-section" aria-labelledby="responsibilities-title">
    <h2 class="category-heading" id="responsibilities-title">Key responsibilities</h2>
    <div class="work-responsibilities-grid">
        <?php foreach($workExperience['areas'] as $area): ?>
        <article class="work-responsibility-card" id="<?=e($area['slug'])?>">
            <div class="work-card-heading"><span class="resource-symbol"><?=icon($area['icon'])?></span><span class="work-area-number"><?=e($area['number'])?></span></div>
            <h3><?=e($area['title'])?></h3>
            <ul><?php foreach($area['responsibilities'] as $responsibility): ?><li><?=e($responsibility)?></li><?php endforeach; ?></ul>
        </article>
        <?php endforeach; ?>
    </div>
</section>
<section class="work-learning" aria-labelledby="work-learning-title">
    <h2 class="category-heading" id="work-learning-title">What I have learned</h2>
    <?php foreach($workExperience['learning'] as $paragraph): ?><p><?=e($paragraph)?></p><?php endforeach; ?>
</section>
<a class="text-button" href="leadership.php">Explore my leadership readiness →</a>
