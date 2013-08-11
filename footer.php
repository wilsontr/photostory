<footer>
	&copy; <?php echo(date('Y')); ?> &nbsp;&bull;&nbsp; 
	All rights reserved  
	<?php if ( get_theme_mod('contact_email') ): ?>
	&nbsp;&bull;&nbsp; <a href="mailto:<?php echo(get_theme_mod('contact_email')); ?>">Contact</a>
	<?php endif; ?>
</footer>

<?php wp_footer(); ?>


<?php if ( get_theme_mod('ga_id') ): ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo(get_theme_mod('ga_id')); ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php endif; ?>


<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</body>
</html>