<?php
/*
Template Name: Perfil Exemplo
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

        $campos = getDados("cadastro_campos");
        $contatos = getDados("cadastro_contatos");
        $conselhos = getDados("cadastro_conselhos");
        $empresas = getDados("cadastro_cnpj");

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
                    <label class="form-label">Contato</label>
                    <div class="row mb-5">
                    <?php foreach ($contatos as $contato) { ?>
                        <div class="col-2 mb-3">
                            <label class="form-label" for="contato-ddd-<?= $contato->id ?>">DDD:</label>
                            <input class="form-control" type="text" id="contato-ddd-<?= $contato->id ?>" name="contato-ddd-<?= $contato->id ?>" value="<?= $contato->ddd ?>">
                        </div>            
                        <div class="col-7 mb-3">
                            <label class="form-label" for="contato-telefone-<?= $contato->id ?>">Telefone:</label>
                            <input class="form-control" type="text" id="contato-telefone-<?= $contato->id ?>" name="contato-telefone-<?= $contato->id ?>" value="<?= substr_replace($contato->telefone, "-", -4, 0) ?>">
                        </div>            
                        <div class="col-3 mb-3">
                            <label class="form-label" for="contato-ramal-<?= $contato->id ?>">Ramal:</label>
                            <input class="form-control" type="text" id="contato-ramal-<?= $contato->id ?>" name="contato-ramal-<?= $contato->id ?>" value="<?= $contato->ramal ?>">
                        </div>            
                        <?php
                    } ?>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary">+ Contato</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-auto mb-3">
                    <label class="form-label">Conselhos</label>
                    <table class="table table-light table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sigla</th>
                                <th>Conselho</th>
                                <th>Ativo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($conselhos as $conselho) { ?>
                                <tr>
                                    <td scope="row"><?= $conselho->id ?></td>
                                    <td><?= $conselho->sigla ?></td>
                                    <td><?= $conselho->nome ?></td>
                                    <td><input type="checkbox" class="form-check-input"<?= $conselho->ativo ? 'checked' : '' ?> ></td>
                                </tr>
                                <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-auto mb-3">
                    <label class="form-label">Vínculo de CNPJ</label>
                    <table class="table table-light table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>CNPJ</th>
                                <th>Razão Social</th>
                                <th>Ativo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($empresas as $empresa) { ?>
                                <tr>
                                    <td scope="row"><?= $empresa->id ?></td>
                                    <td><?= $empresa->cnpj ?></td>
                                    <td><?= $empresa->razao_social ?></td>
                                    <td><input type="checkbox" class="form-check-input"<?= $empresa->ativo ? 'checked' : '' ?> ></td>
                                </tr>
                                <?php
                            } ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary">+ CNPJ</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-enviar">Salvar</button>
        </form>
    </div>
</div>

<?php
    endwhile;
endif;

get_footer();
?>