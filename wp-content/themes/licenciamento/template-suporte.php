<?php
/*
Template Name: Formulário Suporte
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

        $suporteCampos = carregarFormulario("suporte");
?>

        <div class="interna info info-4" style="width: 100%; background-repeat: no-repeat; min-height: 1000px">
            <div class="container" style="max-width: 1200px; font-size: 1.6rem; padding: 60px 0">
                <form action="" style="padding: 1rem">
                    <div class="row mb-5">
                        <?php foreach ($suporteCampos as $campo) { ?>
                            <div class="col-md-<?= calculaCol($campo->largura) ?> mb-3">
                                <label class="form-label" for="<?= $campo->id ?>"><?= $campo->label ?></label>

                                <?php if ($campo->tipo === 'select') { ?>
                                    <select class="form-select" id="<?= $campo->id ?>" name="<?= $campo->nome ?>" <?= $campo->attr ?>>
                                        <option selected disabled>--- selecione ---</option>

                                        <?php foreach ($campo->options as $arr) { ?>
                                            <option><?= $arr->option ?></option>
                                        <?php } ?>

                                    </select>

                                <?php } elseif ($campo->tipo === 'textarea') { ?>
                                    <textarea class="form-control" name="<?= $campo->campo_nome ?>" id="<?= $campo->id ?>" <?= $campo->attr ?>></textarea>

                                <?php } else { ?>
                                    <input class="form-control" type="<?= $campo->tipo ?>" name="<?= $campo->campo_nome ?>" id="<?= $campo->id ?>" <?= $campo->attr ?>>
                                <?php } ?>

                            </div>
                        <?php } ?>
                    </div>
                    <button type="button" class="btn btn-primary btn-enviar" onclick="">Enviar</button>
                </form>
            </div>
        </div>

<?php
    endwhile;
endif;

get_footer();
?>