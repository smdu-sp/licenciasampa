<?php
/*
Template Name: Modo Escuro
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

        $campos = getDados("cadastro_campos");
        $contatos = getDados("cadastro_contatos");

?>

<style> 	</style>


<script>
/*
var checkbox = document.querySelector('input[name=theme]');

checkbox.addEventListener('change', function() {
    if(this.checked) {
        trans()
        document.documentElement.setAttribute('data-theme', 'dark')
    } else {
        trans()
        document.documentElement.setAttribute('data-theme', 'light')
    }
})

let trans = () => {
    document.documentElement.classList.add('transition');
    window.setTimeout(() => {
        document.documentElement.classList.remove('transition')
    }, 1000)
}

</script>

<?php
    endwhile;
endif;

get_footer();
?>