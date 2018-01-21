<div class="block-search">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" name="s" placeholder="<?=__('Recherche','utweb-dailinh')?>" id="search-key">
		<button type="submit" style="width: 50px;text-align: right;cursor: pointer;">
			<?php echo getSvgIcon('arrow-right', '0 0 11.4 11.4'); ?>
		</button>
	</form>
	<a href="#" class="trigger-search">
		<?php echo getSvgIcon('loupe', '0 0 12.6 12.6'); ?>
	</a>
</div>