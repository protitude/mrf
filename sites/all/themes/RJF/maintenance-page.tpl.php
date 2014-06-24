<?php
$vars = get_defined_vars();
$view = RJF_art_get_drupal_view();
$view->print_maintenance_head($vars);
if (isset($page))
foreach (array_keys($page) as $name)
$$name = & $page[$name];
$art_sidebar_left = isset($sidebar_left) && !empty($sidebar_left) ? $sidebar_left : NULL;
$art_sidebar_right = isset($sidebar_right) && !empty($sidebar_right) ? $sidebar_right : NULL;
if (!isset($vnavigation_left)) $vnavigation_left = NULL;
if (!isset($vnavigation_right)) $vnavigation_right = NULL;
$tabs = (isset($tabs) && !(empty($tabs))) ? '<ul class="arttabs_primary">'.render($tabs).'</ul>' : NULL;
$tabs2 = (isset($tabs2) && !(empty($tabs2))) ?'<ul class="arttabs_secondary">'.render($tabs2).'</ul>' : NULL;
$is_maintenance = (bool)strpos($template_file, 'maintenance-page.tpl.php');
?>

<div id="rjf-main">
    <div class="rjf-sheet clearfix">
<header class="rjf-header"><?php if (!empty($art_header)) { echo render($art_header); } ?>

    <div class="rjf-shapes">
        
            </div>

<?php if (!empty($site_name)) : ?>
<?php if (!$title) : ?>
<h1 class="rjf-headline"><a href="<?php echo check_url($front_page); ?>" title = "<?php echo $site_name; ?>"><?php echo $site_name;  ?></a></h1><?php else : ?><div class="rjf-headline"><a href="<?php echo check_url($front_page); ?>" title = "<?php echo $site_name; ?>"><?php echo $site_name;  ?></a></div><?php endif; ?><?php endif; ?>
<?php if (!empty($site_slogan)) : ?>
<h2 class="rjf-slogan"><?php echo $site_slogan; ?>
</h2><?php endif; ?>






                
                    
</header>
<?php if (!empty($banner1)) { echo '<div id="banner1">'.render($banner1).'</div>'; } ?>
<?php echo RJF_art_placeholders_output(render($top1), render($top2), render($top3), 'tops'); ?>
<div class="rjf-layout-wrapper">
                <div class="rjf-content-layout">
                    <div class="rjf-content-layout-row">
                        <?php if (!empty($art_sidebar_left) || !empty($vnavigation_left)) : ?>
<div class="rjf-layout-cell rjf-sidebar1"><?php echo render($vnavigation_left); ?>
<?php echo render($art_sidebar_left); ?>
</div><?php endif; ?>
                        <div class="rjf-layout-cell rjf-content"><?php if (!empty($banner2)) { echo '<div id="banner2">'.render($banner2).'</div>'; } ?>
<?php if ((!empty($user1)) && (!empty($user2))) : ?>
<div id="user-1-2" class="rjf-content-layout">
    <div class="rjf-content-layout-row">
        <div class="rjf-layout-cell half-width"><?php echo render($user1); ?></div>
        <div class="rjf-layout-cell"><?php echo render($user2); ?></div>
    </div>
</div>
<?php else: ?>
<?php if (!empty($user1)) { echo '<div id="user1">'.render($user1).'</div>'; }?>
<?php if (!empty($user2)) { echo '<div id="user2">'.render($user2).'</div>'; }?>
<?php endif; ?>
<?php if (!empty($banner3)) { echo '<div id="banner3">'.render($banner3).'</div>'; } ?>

<?php if (!empty($breadcrumb)): ?>
<article class="rjf-post rjf-article">
                                
                                                
                <div class="rjf-postcontent"><?php { echo $breadcrumb; } ?>
</div>
                                
                

</article><?php endif; ?>
<?php $art_post_position = strpos($content, "rjf-postcontent"); ?>
<?php if (($is_front || (isset($node) && isset($node->nid))) && !$is_maintenance): ?>

<?php if (!empty($tabs) || !empty($tabs2)): ?>
<article class="rjf-post rjf-article">
                                
                                                
                <div class="rjf-postcontent"><?php if (!empty($tabs)) { echo $tabs.'<div class="cleared"></div>'; }; ?>
<?php if (!empty($tabs2)) { echo $tabs2.'<div class="cleared"></div>'; } ?>
</div>
                                
                

</article><?php endif; ?>

<?php if (!empty($mission) || !empty($help) || !empty($messages) || !empty($action_links)): ?>
<article class="rjf-post rjf-article">
                                
                                                
                <div class="rjf-postcontent"><?php if (isset($mission) && !empty($mission)) { echo '<div id="mission">'.$mission.'</div>'; }; ?>
<?php if (!empty($help)) { echo render($help); } ?>
<?php if (!empty($messages)) { echo $messages; } ?>
<?php if (isset($action_links) && !empty($action_links)): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
</div>
                                
                

</article><?php endif; ?>

<?php if ($art_post_position === FALSE): ?>
<article class="rjf-post rjf-article">
                                
                                                
                <div class="rjf-postcontent"><?php endif; ?>
<?php echo RJF_art_content_replace($content); ?>
<?php if ($art_post_position === FALSE): ?>
</div>
                                
                

</article><?php endif; ?>

<?php else: ?>

<?php $isEmpty = empty($title) && empty($tabs) && empty($tabs2) && empty($mission) && empty($help) && empty($messages) && empty($action_links); ?>
<?php
$head = $isEmpty ? '' : <<< EOT
<article class="rjf-post rjf-article">
	<div class="rjf-postcontent">
EOT;
$tail = $isEmpty ? '' : <<< EOT
	</div>
</article>
EOT;
$content = RJF_art_content_replace($content);
$newContent = $art_post_position ? <<< EOT
	$tail
	$content
EOT
: <<< EOT
	$content	
	$tail
EOT;
?>

<?php echo $head; ?>
<?php print render($title_prefix); ?>
<?php if (!empty($title)): print '<h1'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h1>'; endif; ?>
<?php print render($title_suffix); ?>
<?php if (!empty($tabs)) { echo $tabs.'<div class="cleared"></div>'; }; ?>
<?php if (!empty($tabs2)) { echo $tabs2.'<div class="cleared"></div>'; } ?>
<?php if (isset($mission) && !empty($mission)) { echo '<div id="mission">'.$mission.'</div>'; }; ?>
<?php if (!empty($help)) { echo render($help); } ?>
<?php if (!empty($messages)) { echo $messages; } ?>
<?php if (isset($action_links) && !empty($action_links)): ?>
<ul class="action-links">
  <?php print render($action_links); ?>
</ul>
<?php endif; ?>
<?php echo $newContent; ?>

<?php endif; ?>

<?php if (!empty($banner4)) { echo '<div id="banner4">'.render($banner4).'</div>'; } ?>
<?php if ((!empty($user3)) && (!empty($user4))) : ?>
<div id="user-3-4" class="rjf-content-layout">
    <div class="rjf-content-layout-row">
        <div class="rjf-layout-cell half-width"><?php echo render($user3); ?></div>
        <div class="rjf-layout-cell"><?php echo render($user4); ?></div>
    </div>
</div>
<?php else: ?>
<?php if (!empty($user3)) { echo '<div id="user3">'.render($user3).'</div>'; }?>
<?php if (!empty($user4)) { echo '<div id="user4">'.render($user4).'</div>'; }?>
<?php endif; ?>
<?php if (!empty($banner5)) { echo '<div id="banner5">'.render($banner5).'</div>'; } ?>
</div>
                    </div>
                </div>
            </div><?php echo RJF_art_placeholders_output(render($bottom1), render($bottom2), render($bottom3), 'bottoms'); ?>
<?php if (!empty($banner6)) { echo '<div id="banner6">'.render($banner6).'</div>'; } ?>
<footer class="rjf-footer"><?php
$footer = render($footer_message);
if (isset($footer) && !empty($footer) && (trim($footer) != '')) { echo $footer; } // From Drupal structure
elseif (!empty($art_footer) && (trim($art_footer) != '')) { echo $art_footer; } // From Artisteer Content module
else { // HTML from Artisteer preview
ob_start(); ?>

<a title="RSS" class="rjf-rss-tag-icon" style="position: absolute; bottom: 8px; left: 6px; line-height: 25px; " href="<?php echo $base_path?>rss.xml"></a><div style="position:relative;padding-left:10px;padding-right:10px"><p>Copyright © 2014<br /><br /></p></div>
<?php
  $footer = str_replace('%YEAR%', date('Y'), ob_get_clean());
  echo RJF_art_replace_image_path($footer);
}
?>
<?php if (!empty($copyright)) { echo '<div id="copyright">'.render($copyright).'</div>'; } ?>
</footer>

    </div>
</div>

<?php $view->print_closure($vars); ?>
