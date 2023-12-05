<?php
/**
 * The template for displaying the footer.
 *
 * @package AprovaSP
 */

?>

<?php

if ( is_front_page() ) :
	echo dslc_hf_get_footer();
else :
	include_once 'footer/footer.php';
endif;

?>

<?php wp_footer(); ?>

</body>
</html>
