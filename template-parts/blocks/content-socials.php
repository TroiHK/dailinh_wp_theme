<?php 
	$facebook_opt = get_field('facebook_opt', 'option');
	$instagram_opt = get_field('instagram_opt', 'option');
	$linkedin_opt = get_field('linkedin_opt', 'option');
?>

<div class="socials">
	<?php if ( $facebook_opt ) : ?>
	<a href="<?php echo $facebook_opt; ?>" target="_blank">
		<?php echo getSvgIcon('fb', '0 0 7.8 15.3'); ?>
	</a>
	<?php endif; ?>

	<?php if ( $instagram_opt ) : ?>
	<a href="<?php echo $instagram_opt; ?>" target="_blank">
		<?php echo getSvgIcon('insta', '0 0 15.8 15.9'); ?>
	</a>
	<?php endif; ?>

	<?php if ( $linkedin_opt ) : ?>
	<a href="<?php echo $linkedin_opt; ?>" target="_blank">
		<?php echo getSvgIcon('linkedin', '0 0 133 127.1'); ?>
	</a>
	<?php endif; ?>
</div>