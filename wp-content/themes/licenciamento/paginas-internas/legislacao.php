<?php 
    $botoes_legislacao = get_field( "botoes_legislacao", ID_BOTOES );
    $botao_complementar_url = get_field("botoes_legislacao")['complementar_url'];
    
    if (isset($botao_complementar_url) && strlen($botao_complementar_url) > 0) {
        $botoes_legislacao['complementar']['url'] = $botao_complementar_url;
    }

    if (!isset($botao_complementar_url) || strlen($botao_complementar_url) < 1) {
        unset( $botoes_legislacao['complementar']);
    }
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
