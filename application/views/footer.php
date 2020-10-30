<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	</main><!-- #site-content -->

	<footer id="site-footer" role="contentinfo">
	</footer><!-- #site-footer -->

	

	<?php  
		$url = $_SERVER['REQUEST_URI']; 
		
		if(strpos($url,"calendar")) { ?>

	<!---  Add New Item End Here ----->
    <script src="<?= base_url('assets/js/my_js.js') ?>"></script>
    
    <?php } ?>

</body>
</html>