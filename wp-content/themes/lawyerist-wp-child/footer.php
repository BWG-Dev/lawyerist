
<div id="footer">

	<div id="footer_social">
		<span class="social-icon"><a href="https://facebook.com/lawyerist" target="_blank" title="Lawyerist Facebook" class="social-icon_facebook"></a></span>
		<span class="social-icon"><a href="https://twitter.com/lawyerist" target="_blank" title="Lawyerist Twitter" class="social-icon_twitter"></a></span>
		<span class="social-icon"><a href="https://www.linkedin.com/company/lawyerist-media-llc" target="_blank" title="Lawyerist LinkedIn" class="social-icon_linkedin"></a></span>
	</div>
	<div id="footer_info">
		<p>The original content within this website is &copy; <?php echo date( 'Y' ) ?>. Lawyerist, Lawyerist Lab, TBD Law, Small Firm Dashboard, and </p>
		<p>The Small Firm Scorecard are trademarks registered by Lawyerist Media, LLC.</p>

		<p><a target="_blank" href="<?php echo home_url(); ?>/privacy-policy/">Privacy policy</a> // <a href="<?php echo home_url(); ?>/sitemap_index.xml">XML sitemap</a> // <?php if ( is_singular() ) { echo '<span id="pageID">Page ID: ' . $post->ID . '</span>'; } ?></p>
	</div>
	<?php wp_footer(); ?>

</div>


</body>
</html>
