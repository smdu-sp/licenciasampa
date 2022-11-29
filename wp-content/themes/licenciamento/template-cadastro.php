<?php
/*
Template Name: Cadastro Exemplo
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

        $campos = getDados("cadastro_campos");
        $contatos = getDados("cadastro_contatos");

?>

<div class="interna info info-4" style="width: 100%; background-repeat: no-repeat; min-height: 1000px">
    <div class="container" style="max-width: 1200px; font-size: 1.6rem; padding: 60px 0">
        <form action="/perfil" style="padding: 1rem">
            <div class="row mb-5">
                <?php foreach ($campos as $campo) { ?>
                    <div class="col-md-<?= $campo->coluna ?> mb-3">
                        <label class="form-label" for="<?= $campo->nome ?>"><?= $campo->label ?></label>
                        <input class="form-control" type="<?= $campo->tipo ?>" id="<?= $campo->nome ?>" name="<?= $campo->nome ?>" value="<?= $campo->placeholder ?>">
                    </div>            
                    <?php if ($campo->nome === 'email') {echo '<div class="col-md-12"></div>';}
                } ?>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <label for="contato" class="form-label">Contato</label>
                    <table class="table table-light table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>DDD</th>
                                <th>Número</th>
                                <th>Ramal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contatos as $contato) { ?>
                                <tr>
                                    <td scope="row"><?= $contato->id ?></td>
                                    <td><?= $contato->ddd ?></td>
                                    <td><?= substr_replace($contato->telefone, "-", -4, 0) ?></td>
                                    <td><?= $contato->ramal ?></td>
                                    <td><button type="button" class="btn-close" aria-label="Fechar"></button></td>
                                </tr>
                                <?php
                            } ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary">Adicionar Contato</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-enviar" onclick="window.open('/perfil', '_self')">Salvar</button>
        </form>
    </div>
</div>

<?php
    endwhile;
endif;

get_footer();
?>