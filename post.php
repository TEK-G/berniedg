<?php
$page='post';
require_once __DIR__.'/data/content.php';
$slug = isset($_GET['slug']) && is_string($_GET['slug']) ? $_GET['slug'] : '';
$article = null;
foreach($articles as $candidate) if($candidate['slug']===$slug) $article=$candidate;
if(!$article) http_response_code(404);
$documentTitle = ($article ? $article['title'] : 'Note not found').' — '.$site['name'];
include __DIR__.'/includes/header.php';
?>
<article class="post enter">
    <a class="back-link" href="blog.php">← back to journal</a>
    <?php if($article):?><div class="post-meta"><span><?=e($article['category'])?></span><time><?=e($article['date'])?></time><span><?=$article['minutes']?> min read</span></div><h1><?=e($article['title'])?></h1><p class="post-lead"><?=e($article['excerpt'])?></p><div class="post-author"><span class="avatar"><?=e($site['initials'])?></span><div><strong title="<?=e($site['full_name'])?>"><?=e($site['name'])?></strong><small>Notes on people, community &amp; care</small></div></div><div class="post-body"><?php foreach($article['body'] as [$heading,$paragraph]):?><h2><?=e($heading)?></h2><p><?=e($paragraph)?></p><?php endforeach;?></div><div class="post-end"><span>Thanks for spending a little time here.</span><button data-copy-link>Copy article link <?=icon('external')?></button></div><a class="text-button" href="shop.php">Explore the free care guides →</a>
    <?php else:?><h1>That note isn’t here.</h1><p>Explore the journal to find the available articles.</p><a class="button button-dark" href="blog.php">Back to journal →</a><?php endif;?>
</article>
<?php include __DIR__.'/includes/footer.php';?>
