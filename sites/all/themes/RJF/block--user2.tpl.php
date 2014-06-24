<div class="<?php if (isset($classes)) print $classes; ?>" id="<?php print $block_html_id; ?>"<?php print $attributes; ?>>
<div class="rjf-box rjf-post">
<div class="rjf-box-body rjf-post-body">
<article class="rjf-post-inner rjf-article">
<?php print render($title_prefix); ?>
<?php if ($block->subject): ?>
<h2 class="rjf-postheader"><?php print $block->subject ?></h2>
<?php endif;?>
<?php print render($title_suffix); ?>
<div class="rjf-postcontent">
<div class="rjf-article content">
<?php print $content; ?>
</div>
</div>
<div class="cleared"></div>
</article>
<div class="cleared"></div>
</div>
</div>
</div>
