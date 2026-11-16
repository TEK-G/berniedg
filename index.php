<?php $page='home'; include __DIR__.'/includes/header.php'; ?>
<section class="hero">
    <div class="hero-grid">
        <div class="portrait-column enter" style="--delay:50ms">
            <div class="portrait" id="profile-portrait" data-portrait>
                <img class="portrait-original" src="assets/images/bernadette-portrait.jpg" alt="Portrait of <?=e($site['name'])?>" width="800" height="533" fetchpriority="high">
                <div class="portrait-pixel-layer" aria-hidden="true"><img src="assets/images/bernadette-portrait.jpg" alt="" width="800" height="533"><div class="portrait-texture"></div></div>
            </div>
        </div>
        <div class="hero-copy">
            <h1 class="enter profile-name" style="--delay:120ms" data-tour-target="name"><?php foreach($site['name_lines'] as $line):?><span><?=e($line)?></span> <?php endforeach;?></h1>
            <p class="profile-full-name enter" style="--delay:155ms"><?=e($site['full_name'])?></p>
            <a class="resume-cta enter" style="--delay:175ms" href="<?=e($site['resume_path'])?>" download="<?=e($site['resume_filename'])?>" aria-label="Download <?=e($site['name'])?>’s résumé (PDF, <?=e($site['resume_year'])?>)"><span class="resume-symbol"><?=icon('download')?></span><span class="resume-copy"><strong>Download résumé</strong><small><?=e($site['resume_year'])?> · PDF</small></span><?=icon('arrow')?></a>
            <p class="intro-copy enter" style="--delay:190ms">I’m a <span class="intro-tag"><?=icon('book')?>Biology graduate</span>, major in <span class="intro-tag"><?=icon('paw')?>Zoology</span>.</p>
            <p class="intro-copy enter" style="--delay:260ms">Currently a <span class="intro-tag"><?=icon('monitor')?><?=e($profile['role'])?></span> at <?=e($profile['organization'])?>, supporting <span class="intro-tag"><?=icon('shield')?>patient safety</span> through virtual monitoring.</p>
            <div class="social-links enter" style="--delay:330ms" data-tour-target="socials"><a href="professional-experience.php">my experience ↗</a><a href="stack.php">my strengths ↗</a><a href="contact.php#inquiry">say hello ↗</a></div>
        </div>
    </div>
</section>
<?php if($sectionVisibility['affiliations']): ?>
<section class="affiliation-strip" aria-label="Care and community">
    <?php foreach($affiliations as $item):?><a href="affiliations.php"><?=icon($item['icon'])?><span><strong><?=e($item['name'])?></strong><small><?=e($item['role'])?></small></span></a><?php endforeach;?>
</section>
<?php endif; ?>
<section class="stats-strip" aria-label="Explore the practice" data-tour-target="stats">
    <button data-info="approach"><strong>people first <sup>↗</sup></strong><span>THE APPROACH</span></button>
    <a href="experience.php#education"><strong>B.S. Biology <sup>↗</sup></strong><span>MAJOR IN ZOOLOGY</span></a>
    <button data-info="initiatives"><strong>3 ideas <sup>↗</sup></strong><span>FOR BETTER CARE</span></button>
</section>
<div class="dot-divider" aria-hidden="true"></div>
<section class="home-section journal-section" id="journal">
    <?php sectionHeading('01','journal','all posts','blog.php'); ?>
    <div class="journal-list"><?php foreach(array_slice($articles,0,3) as $item):?><a class="journal-row" href="post.php?slug=<?=e($item['slug'])?>"><div><h3><?=e($item['title'])?></h3><p><?=e($item['excerpt'])?></p></div><time><?=e($item['date'])?></time></a><?php endforeach;?></div>
    <div class="section-dots" aria-hidden="true"></div>
</section>
<section class="home-section" id="initiatives">
    <?php sectionHeading('02','initiatives','all initiatives','projects.php'); ?>
    <div class="deck" aria-label="Care initiatives" aria-roledescription="carousel" data-deck tabindex="0">
        <?php foreach($projects as $i=>$item):?><article class="deck-card <?=$i===0?'is-center':($i===1?'is-left':'is-right')?>" data-card="<?=$i?>" role="group" aria-roledescription="slide" aria-label="<?=e($item['name'])?>">
            <button class="card-select" data-card-select="<?=$i?>" aria-label="Select <?=e($item['name'])?>" aria-pressed="<?=$i===0?'true':'false'?>"></button>
            <div class="card-badges"><span class="badge badge-dark">❬ <?=e($item['tag'])?> ❭</span><?php foreach($item['tags'] as $tag):?><span class="badge"><?=e($tag)?></span><?php endforeach;?></div>
            <div class="project-title"><span class="project-icon <?=e($item['color'])?>"><?=icon($item['icon'])?></span><h3><?=e($item['name'])?> <span>— <?=e($item['subtitle'])?></span></h3></div>
            <p><?=e($item['description'])?></p><button class="button button-dark small" data-project="<?=$i?>">Explore initiative <?=icon('arrow')?></button>
        </article><?php endforeach;?>
    </div>
    <p class="sr-only" data-deck-status aria-live="polite">Open Door selected. Use left and right arrows to explore initiatives.</p>
</section>
<section class="home-section" id="experience">
    <?php sectionHeading('03','professional experience','full experience','professional-experience.php'); ?>
    <article class="work-spotlight">
        <span class="eyebrow">CURRENT ROLE · PATIENT SAFETY</span>
        <h3><?=e($profile['role'])?></h3>
        <p class="work-organization"><?=e($profile['organization'])?></p>
        <p class="work-spotlight-overview"><?=e($workExperience['overview'])?></p>
        <div class="work-area-links"><?php foreach($workExperience['areas'] as $area):?><a href="professional-experience.php#<?=e($area['slug'])?>"><span><?=e($area['number'])?></span><strong><?=e($area['title'])?></strong><?=icon('external')?></a><?php endforeach;?></div>
        <a class="text-button" href="professional-experience.php">Explore my responsibilities and what I have learned →</a>
    </article>
    <div class="profile-education-preview"><a href="experience.php#education"><?=icon('book')?><span><strong><?=e($profile['degree'])?></strong><small>Major in <?=e($profile['major'])?></small></span></a></div>
    <div class="specialties-preview"><div class="mini-heading"><h3>Professional strengths</h3><a href="stack.php">view all →</a></div><div class="chips"><?php foreach($professionalStrengths as $strength):?><a href="stack.php#<?=e($strength['slug'])?>"><?=e($strength['title'])?></a><?php endforeach;?></div></div>
    <a class="collab-callout leadership-preview" href="leadership.php"><span>Always ready to grow</span><p>Ready to learn, explore new responsibilities, and support my team—with patient safety guiding the way.</p><?=icon('arrow')?></a>
</section>
<?php if($sectionVisibility['certifications']): ?>
<section class="home-section" id="credentials">
    <?php sectionHeading('04','credentials','all credentials','certifications.php'); ?>
    <div class="credential-grid"><?php foreach(array_slice($credentials,0,3) as $i=>$item) credentialCard($item,$i);?></div>
</section>
<?php endif; ?>
<?php if($sectionVisibility['recommendations']): ?>
<section class="home-section" id="kind-words">
    <?php sectionHeading('05','kind words','all kind words','recommendations.php'); ?>
    <div class="quote-grid"><?php foreach(array_slice($testimonials,0,3) as $item) quoteCard($item);?></div>
</section>
<?php endif; ?>
<?php if($sectionVisibility['affiliations']): ?>
<section class="home-section" id="affiliations">
    <?php sectionHeading('06','affiliations','all affiliations','affiliations.php'); ?>
    <div class="affiliation-list"><?php foreach($affiliations as $item):?><a href="affiliations.php"><span class="affiliation-icon"><?=icon($item['icon'])?></span><span><strong><?=e($item['name'])?></strong><small><?=e($item['role'])?></small></span></a><?php endforeach;?></div>
</section>
<?php endif; ?>
<?php if($sectionVisibility['community_activity']): ?>
<section class="home-section activity-section" id="community">
    <?php sectionHeading('07','small acts of care','the community','collabs.php'); ?>
    <div class="care-pattern" aria-hidden="true"><?php for($i=0;$i<364;$i++):$level=($i*37+$i%9*13)%11;?><span style="--dot:<?=$level<3?2:($level<7?4:7)?>px;--dot-opacity:<?=$level<3?'.12':'.85'?>"></span><?php endfor;?></div><p class="activity-caption">A LITTLE CARE, EVERY DAY · ILLUSTRATIVE ACTIVITY</p>
</section>
<div class="dot-divider end-divider" aria-hidden="true"></div>
<?php endif; ?>
<?php include __DIR__.'/includes/footer.php'; ?>
