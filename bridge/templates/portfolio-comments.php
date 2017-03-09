
<?php
global $qode_options_proya;
if(isset($qode_options_proya['enable_portfolio_comments']) && $qode_options_proya['enable_portfolio_comments'] == 'yes') { ?>
	<div class="portfolio_comments_holder">
		<?php comments_template('', true); ?>
	</div>
<?php }
