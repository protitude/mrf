<div class="<?php if (isset($classes)) print $classes; ?>" id="<?php print $block_html_id; ?>"<?php print $attributes; ?>>
<?php $region = $block->region;
$disabled_blockRegion = $region == 'vnavigation_left' || $region == 'vnavigation_right' || $region == 'navigation'
|| $region == 'extra1' || $region == 'extra2' || $region == 'footer_message' || $region == 'art_header';  ?>
<?php if (!$disabled_blockRegion) :?>
<div class="rjf-block clearfix"><?php endif; ?>

        <?php if (!$disabled_blockRegion) :?>
<div class="rjf-blockcontent"><?php endif; ?>
<?php echo $content; ?>
<?php if (!$disabled_blockRegion) :?>
</div><?php endif; ?>

<?php if (!$disabled_blockRegion) :?>
</div><?php endif; ?>
</div>
