<?php 
$repeaters = get_field( 'citation_hp' );
if( $repeaters ){
	foreach( $repeaters as $repeater ){ ?>
		<section class="section">
			<div class="grid">
				<div class="grid__row">
					<div class="grid__col-xxs--0 grid__col-m--2"></div>
					<div class="grid__col-xxs--12 grid__col-m--8">
						<div class="quote u-tac">
							<svg class="shape js-reveal" x="0px" y="0px" width="171px" height="199.6px" viewBox="0 0 171 199.6">
								<path d="M85.6,111.8c1.4,0,2.5,1.1,2.5,2.5c0,1.4-1.1,2.5-2.5,2.5s-2.5-1.1-2.5-2.5
									C83.1,112.9,84.2,111.8,85.6,111.8z"/>
								<path opacity="0.1" fill="none" class="trace" stroke="#000000" d="M85.5,29.1c46.9,0,85,38.1,85,85
									c0,46.9-38.1,85-85,85s-85-38.1-85-85C0.5,67.2,38.6,29.1,85.5,29.1z"/>
								<path opacity="0.1" fill="none" stroke="#000000" d="M85.5,106.1c4.4,0,8,3.6,8,8c0,4.4-3.6,8-8,8
									c-4.4,0-8-3.6-8-8C77.5,109.7,81.1,106.1,85.5,106.1z"/>
								<path fill="none" stroke="#000000" class="trace trace-hover" d="M85.5,29.1c46.9,0,85,38.1,85,85
									c0,46.9-38.1,85-85,85s-85-38.1-85-85C0.5,67.2,38.6,29.1,85.5,29.1z"/>
								<path fill="#FFFFFF" stroke="#000000" d="M83,1.1l15.5,30.5L83,62.1L67.5,31.6L83,1.1z"
									/>
							</svg>

							<h2 class="word-breaker js-reveal"><?= $repeater['quotation'] ?></h2>
							<div class="quote__author desc js-reveal"><?= $repeater['auteur'] ?></div>
		                    <?php
		                        $url_link = $repeater['lien'] ? get_the_permalink( $repeater['lien'] ) : '#';
		                    ?>
							<a href="<?= $url_link ?>" class="link js-reveal">
								<?= $repeater['texte_du_lien'] ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php 
	}
}
?>