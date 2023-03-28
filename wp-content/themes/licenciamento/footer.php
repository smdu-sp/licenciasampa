<?php
/**
 * The template for displaying the footer.
 *
 * @package AprovaSP
 */

?>

<footer id="rodape">
	<?php include_once 'footer/nav.php' ?>
</footer>

<?php wp_footer(); ?>

<style>
	#rodape {
		padding-bottom:90px;
		padding-top:90px;
		background-color:#395aad;
	}

	.footer-nav {
		padding-left: 0;
	}

	.footer-redes-sociais {
		display: block;
		width: 100px;
		padding-left: 0;
	}

	.footer-redes-sociais li {
		display: inline-block;
		margin-right: 16px;
	}

</style>

</body>

</html>
