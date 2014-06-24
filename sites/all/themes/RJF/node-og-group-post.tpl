<?php 
$vars = get_defined_vars();
$view = RJF_art_get_drupal_view();
$message = $view->get_incorrect_version_message();
if (!empty($message)) {
print $message;
die();
}
$is_blog_page = isset($node->body['und'][0]['summary']) && (strpos($node->body['und'][0]['summary'], 'ART_BLOG_PAGE') !== FALSE);
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<?php if (!$is_blog_page): ?>
<article class="rjf-post rjf-article">
                                <?php print render($title_prefix); ?>
<?php echo RJF_art_node_title_output($title, $node_url, $page); ?>
<?php print render($title_suffix); ?>

                                                <?php if ($submitted): ?>
<div class="rjf-postheadericons rjf-metadata-icons"><?php echo RJF_art_submitted_worker($date, $name); ?>
</div><?php endif; ?>

                <div class="rjf-postcontent rjf-postcontent-0 clearfix"><div class="rjf-article">
  <?php endif; ?>
  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    $terms = RJF_art_terms_D7($content);
    hide($content[$terms['#field_name']]);
    print $user_picture;
    print render($content);
  ?>
  <?php if (!$is_blog_page): ?>
</div>
</div>
                                <?php $access_links = true;
if (isset($content['links']['#access'])) {
$access_links = $content['links']['#access'];
}
if ($access_links && (isset($content['links']) || isset($content['comments']))):
$output = RJF_art_links_woker_D7($content);
if (!empty($output)):	?>
<div class="rjf-postfootericons rjf-metadata-icons"><?php echo $output; ?>
</div><?php endif; endif; ?>

                

<?php print render($content['comments']); ?></article>	<?php endif; ?>
</div>
