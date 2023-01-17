<?php 
    $botoes_legislacao = get_field( "botoes_legislacao", 1792 );
?>

<div class="container-legislacao">
    <div class="legislacao-conteudo">
        <div class="legislacao-titulo">
            <h2>Legislação</h2>
        </div>
        <div class="legislacao-botoes">
            <?php foreach ($botoes_legislacao as $key => $botao) { ?>
                <div class="legislacao-botao">
                    <a href="<?= $botao["url"] ?>">
                        <div class="botao">
                            <img src="<?= $botao["icone"]?>" alt=""><span><?= $botao["texto"] ?></span>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="legislacao-observacao">
    <span>*Consulte mais na página Legislação Municipal</span>
</div>
