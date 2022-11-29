<?php
/*
Template Name: TAR Aprova Rápido - Tabelas
*/
?>

    <style>
      @font-face {
        font-family: "Calibri";
        src: url("/fonts/calibri.ttf");
      }

      @font-face {
        font-family: "Calibri Bold";
        src: url("/fonts/calibrib.ttf");
      }

      p, ul {
        margin: 0;
      }

      ul {
        padding-left: 4px;
        padding-top: 4px;
		    text-align: left;
      }

      ul li {
        list-style-type: none;
      }

      ul li ul {
        padding-left: 40px;
      }

      table {
        table-layout: fixed;
        width: 600px;
        margin: 60px auto;
        border-collapse: collapse;
        border: solid 1px #000;
      }

      table * {
        font-family: "Calibri", sans-serif;
        font-size: 12px;
        font-weight: 500;
      }

      table tr {
        border: solid 1px #000;
      }
		
	  table td {
        border: solid 1px #000;
      }

      table tr:first-of-type th {
        background-color: #c0bdbd;
        text-transform: uppercase;
        font-family: "Calibri Bold", sans-serif;
      }

      table tr td,
      table tr th {
        padding: 10px 8px;
        vertical-align: top;
      }

      table tr th {
        text-align: left;
        border-right: none;
      }

      table tr th:first-of-type,
      table tr div {
        width: 36px;
        text-align: right;
      }

      table .coluna-alternativa {
        width: 40px;
        text-align: center;
      }
      
      table .coluna-alternativa {
        margin: auto !important;
      }

      table tr div {
        display: inline-block;
      }

      table tr td:first-of-type {
        border-left: none;
      }

      .linha-alternativa * {
        padding: 0;
        background-color: #eee;
        text-align: center;
        font-size: 11px;
        height: 14px;
      }

      .checkbox {
        display: inline-block;        
        width: 8px;
        height: 8px;
        border: solid 1px #000;
        border-radius: 3px;
        vertical-align: middle;
        margin-right: 20px;
        margin: 0 16px 0 0;
        border-radius: 0;
      }

      table td > .checkbox {
        margin: auto;
        display: block;
      }

      .checkbox-marcado {
          position: relative;
          height: 8px; /* this can be anything */
          width: 8px;  /* ...but maintain 1:1 aspect ratio */
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
      }

      .checkbox-marcado::before,
      .checkbox-marcado::after {
          position: absolute;
          content: '';
          width: 150%;
          height: 1.5px; /* cross thickness */
          background-color: black;
      }

      .checkbox-marcado::before {
          transform: rotate(45deg);
      }

      .checkbox-marcado::after {
          transform: rotate(-45deg);
      }

      .linha-pontilhada {
        border-bottom: dotted 1px #000;
        width: 70%;
        margin-left: 1px;
        text-align: left;
      }

    </style>

    <table summary="Identificação">
      <tbody>
        <tr>
          <th scope="row">1.</th>
          <th scope="col">Identificação</th>
        </tr>
        <tr>
          <th scope="row">1.1.</th>
          <td>Proprietário (ou possuidor): Nome do proprietário</td>
        </tr>
        <tr>
          <th scope="row">1.2.</th>
          <td>CPF/CNPJ: 123.456.789-12</td>
        </tr>
        <tr>
          <th scope="row">1.3.</th>
          <td>Responsável técnico pelo projeto: Nome do responsável</td>
        </tr>
        <tr>
          <th scope="row">1.4.</th>
          <td>CREA/CAU: 000000000-0</td>
        </tr>
        <tr>
          <th scope="row">1.5.</th>
          <td>Endereço da obra: Rua São Bento, 405, Centro, 20º andar – CEP 01011-100 – São Paulo – SP</td>
        </tr>
      </tbody>
    </table>
    
    <table summary="Alvará de autorização para estande de vendas">
      <tbody>
        <colgroup>
          <col class="coluna-alternativa">
          <col>
          <col class="coluna-alternativa">
          <col class="coluna-alternativa">
        </colgroup> 
        <tr>
          <th scope="row">6.</th>
          <th colspan="3" scope="col">PARTICIPAÇÃO DE OUTRAS SECRETARIAS e/ou ÓRGÃOS MUNICIPAIS, ALÉM DA SEL (Em caso de ‘SIM’, marcar a opção correspondente)</th>
        </tr>
        <tr class="linha-alternativa">
          <th scope="row">&nbsp;</th>
          <td></td>
          <td>SIM</td>
          <td>NÃO</td>
        </tr>
        <tr>
          <th nowrap="nowrap" scope="row">6.1.1.</th>
          <td>
            SVMA/GTMAPP
            <ul>
              <li>
                <div class="checkbox"><div class="checkbox-marcado"></div></div>Previsão de manejo arbóreo;
              </li>
			        <li>
                <div class="checkbox"></div>Presença de Área de Preservação Permanente – APP;
              </li>
			        <li>
                <div class="checkbox"></div>Curso d’água natural a céu aberto:
                <ul>
                  <li>
                    <div class="checkbox"></div>Dentro do lote, 
                  </li>
                  <li>
                    <div class="checkbox"></div>Próximo ao lote.
                  </li>
                </ul>
			        </li>
		          <li>
                <div class="checkbox"><div class="checkbox-marcado"></div></div>Curso d’água canalizado a céu aberto:
				        <ul>
                  <li>
                    <div class="checkbox"><div class="checkbox-marcado"></div></div>Dentro do lote,
                  </li>
				          <li>
                    <div class="checkbox"></div>Próximo ao lote.
                  </li>
              	</ul>
			        </li>
			        <li>
                <div class="checkbox"></div><div>Outros:</div><div class="linha-pontilhada"></div>
			        </li>
          </td>
          <td><div class="checkbox"><div class="checkbox-marcado"></div></div></td>
          <td><div class="checkbox"></div></td>
        </tr>
        <tr>
          <th scope="row">6.1.2.</th>
          <td>
            SVMA/GTAC<br>Obs. Deverá ser assinalada a interface nas seguintes hipóteses:
            <ul>
              <li>
                <div class="checkbox"></div>Caso tenha sido apresentado documento emitido pela CETESB, ainda não avalizado pela SVMA/GTAC;
              </li>
              <li>
                <div class="checkbox"></div>Em se tratando de imóvel INCRA, caso na Ficha Técnica/BDT conste informação de que deverá ser consultada SVMA.
              </li>
            </ul>
          </td>
          <td><div class="checkbox"></div></td>
          <td><div class="checkbox"><div class="checkbox-marcado"></div></div></td>
        </tr>
        <tr>
          <th scope="row">6.2</th>
          <td>SMT/CET<br>Obs. Deverá ser assinalada a interface quando o projeto for enquadrado como Polo Gerador de Tráfego.</td>
          <td><div class="checkbox"></div></td>
          <td><div class="checkbox"><div class="checkbox-marcado"></div></div></td>
        </tr>
        <tr>
          <th scope="row">6.3.</th>
          <td>DPH/CONPRESP<br>Obs. Deverá ser assinalada a interface quando se tratar de imóvel em área envoltória de bem tombado cuja competência de análise, segundo Resolução de tombamento, seja de SMC.</td>
          <td><div class="checkbox"></div></td>
          <td><div class="checkbox"><div class="checkbox-marcado"></div></div></td>
        </tr>
        <tr>
          <th scope="row">6.4.</th>
          <td>
            SIURB/PROJ
            <ul>
              <li>
                <div class="checkbox"></div>Imóvel atingido por plano de melhoramento viário aprovado por lei posterior à data de 08/11/1988;
              </li>
              <li>
                <div class="checkbox"><div class="checkbox-marcado"></div></div>Imóvel objeto de faixa “non aedificandi”:
                <ul>
                  <li>
                    <div class="checkbox"></div>Córrego canalizado
                  </li>
                  <li>
                    <div class="checkbox"><div class="checkbox-marcado"></div></div>Galerias internas ao lote
                  </li>
                  <li>
                    <div class="checkbox"></div>Galerias lindeiras ao lote
                  </li>
                </ul>
              </li>
              <li>
                <div class="checkbox"></div>Outros:<div class="linha-pontilhada"></div>
              </li>
            </ul>
          </td>
          <td><div class="checkbox"><div class="checkbox-marcado"></div></div></td>
          <td><div class="checkbox"></div></td>
        </tr>
        <tr>
          <th scope="row">6.5.</th>
          <td>
            DESAP (PGM)/ CGPATRI (SMG)<br>Obs. Deverá ser assinalada a interface quando, constatada uma das hipóteses deste subitem, ainda não houver parecer e/ou demarcação nas peças gráficas por SIURB/PROJ.
            <ul>
              <li>
                <div class="checkbox"></div>Imóvel objeto de desapropriação: incidência de desapropriação ajuizada com ou sem imissão de posse relativa a:
                <ul>
                  <li>
                    <div class="checkbox"></div>DIS
                  </li>
                  <li>
                    <div class="checkbox"></div>DUP
                  </li>
                </ul>
              </li>
            </ul>
          </td>
          <td><div class="checkbox"></div></td>
          <td><div class="checkbox"><div class="checkbox-marcado"></div></div></td>
        </tr>
      </tbody>
    </table>
	  
    <table summary="Alvará de autorização para estande de vendas">
      <tbody>
        <tr>
          <th scope="row">7.</th>
          <th colspan="11" scope="col">PARÂMETROS E EXIGÊNCIAS BÁSICAS DO PDE, DA LOE E DA LPUOS, COM ATENDIMENTO OBRIGATÓRIO</th>
        </tr>
        <tr class="linha-alternativa">
          <td colspan="12"></td>
        </tr>
        <tr style="background-color: #eee">
          <th>7.1.</th>
          <td colspan="11" nowrap="nowrap" scope="row"><span style="text-decoration: underline;">Dados gerais</td>
        </tr>
        <tr>
          <td colspan="4" scope="row">Área do terreno</td>
          <td colspan="4" scope="row">Real: 2000 m²</td>
          <td colspan="4" nowrap="nowrap" scope="row">Escritura: 2000 m²</td>
        </tr>
        <tr>
          <td colspan="4" scope="row">SQL/INCRA envolvido(s)</td>
          <td colspan="8" nowrap="nowrap" scope="row">000.000.0000-0</td>
        </tr>
        <tr>
          <td colspan="4" scope="row">Subcategoria(s) de uso</td>
          <td colspan="8" nowrap="nowrap" scope="row">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4" scope="row">Zona(s) de uso</td>
          <td colspan="8" nowrap="nowrap" scope="row">&nbsp;</td>
        </tr>
        <tr class="linha-alternativa">
          <td colspan="12" scope="row"></td>
        </tr>
        <tr style="background-color: #eee">
          <th>7.2.</th>
          <td colspan="11" scope="row"><span style="text-decoration: underline;">Índices urbanísticos e parâmetros de ocupação</span></td>
        </tr>
        <tr class="linha-alternativa">
          <td colspan="10" nowrap="nowrap" scope="row">&nbsp;</td>
          <td class="coluna-alternativa">SIM            </td>
          <td class="coluna-alternativa">NÃO            </td>
        </tr>
        <tr>
          <th>7.2.1.</th>
          <td colspan="9" nowrap="nowrap" scope="row">O projeto atende aos índices e parâmetros de ocupação estabelecidos:
            <ul>
			  <li>
              <div class="checkbox"></div>
            no Quadro 3 anexo à Lei nº 16.402/16? ou</li>
			</ul>
			<ul>
            <li>
              <div class="checkbox"><div class="checkbox-marcado"></div></div>
              no Quadro 2 anexo ao Decreto nº 59.885/20?</li>
			</ul>
          </td>
          <td><div class="checkbox"><div class="checkbox-marcado"></div></td>
          <td><div class="checkbox"></div></td>
        </tr>
        <tr>
          <th>7.2.2.</th>
          <td colspan="9" nowrap="nowrap" scope="row"><p>7.2.2. O projeto se utiliza de algum benefício ou exceção relacionados aos índices e<br>
            parâmetros (gabarito, supressão de recuos, uso incentivado, etc.)?<br>
          Em caso afirmativo, especificar abaixo:          </p>
          <p>
            <div style="display: block; width: 80%; border-bottom: solid 1px #000; height: 16px"></div>
            <div style="display: block; width: 80%; border-bottom: solid 1px #000; height: 16px"></div>
            <div style="display: block; width: 80%; border-bottom: solid 1px #000; height: 16px"></div>
          </p></td>
          <td><div class="checkbox"></div></td>
          <td><div class="checkbox"><div class="checkbox-marcado"></div></div></td>
        </tr>
        <tr>
          <th>7.2.3.</th>
          <td colspan="9" scope="row">Existência de vila ou via sem saída com largura inferior a 10m na quadra (Art. 64 da<br>
            Lei nº 16.402/16 ou inciso II do Art. 13 do Decreto nº 59.885/20)?<br>
            Se ‘SIM’, observa gabarito de:
            <ul>
  <li>
    <div class="checkbox"></div>
    28,00m nas ZEU, ZEUP, ZEM e ZEMP;</li>

  <li>
    <div class="checkbox"><div class="checkbox-marcado"></div></div>
    15,00m nas demais zonas.</li></ul></td>
          <td><div class="checkbox"><div class="checkbox-marcado"></div></div></td>
          <td><div class="checkbox"></div></td>
        </tr>
        <tr>
          <th>7.2.4.</th>
          <td colspan="9" scope="row">Doação de área para alargamento de calçadas (Art. 67 da Lei nº 16.402/16 ou<br>
            Decretos nº 59.885/20 e nº 59.886/20)?
            <p>&nbsp;</p>
            <ul>
              <li> </li>
            </ul></td>
          <td><div class="checkbox"></div></td>
          <td><div class="checkbox"><div class="checkbox-marcado"></div></div></td>
        </tr>
        <tr>
          <th>7.2.5.</th>
          <td colspan="9" scope="row">Quota máxima de terreno por unidade - uso residencial (§1º do Art. 79 da Lei nº<br>
            16.050/14):<br>
            Para “Sim” considerar: N = (CAu x AT) / (CAmáx x Q) = 
            <div style="display: inline-block; width: 10%; border-bottom: dotted 1px #000; height: 16px"></div>
          <td><div class="checkbox"></div></td>
          <td><div class="checkbox"><div class="checkbox-marcado"></div></div></td>
        </tr>
        <tr>
          <th>7.2.6.</th>
          <td colspan="9" scope="row">Quota ambiental (Artigos 74 a 81 e Quadro 3B da Lei nº 16.402/17 e Decreto nº<br>
          57.565/16)?</td>
          <td><div class="checkbox"><div class="checkbox-marcado"></div></div></td>
          <td><div class="checkbox"></div></td>
        </tr>
      </tbody>
    </table>
    <table summary="Alvará de autorização para estande de vendas">
      <tbody>
        <tr>
          <th width="231" scope="row">9.</th>
          <th colspan="11" scope="col">DECLARAÇÕES</th>
        </tr>
        <tr>
          <th></th>
          <td colspan="11" nowrap="nowrap" scope="row">
		<ul>
			  <li>            
			    <div class="checkbox"><div class="checkbox-marcado"></div></div>DECLARO que não existem processos em andamento para o(s) imóvel(s) em questão.
                <p><br></p>
              </li>
            <li>
                <div class="checkbox"></div>DECLARO que existem os seguintes processos em andamento para o(s) imóvel(s) em questão:
                <div style="margin-left: 24px; display: block; width: 75%; border-bottom: dotted 1px #000; height: 16px"></div>
                <div style="margin-left: 24px; display: block; width: 75%; border-bottom: dotted 1px #000; height: 16px"></div>
                <div style="margin-left: 24px; display: block; width: 75%; border-bottom: dotted 1px #000; height: 16px"></div>
                <div style="margin-left: 24px; display: block; width: 75%; border-bottom: dotted 1px #000; height: 16px"></div>
            </li>
		</ul>
        <br><br>
            <p style="margin-left: 30px">DECLARO, ainda:</p><br>
            <p style="margin-left: 70px;"><br>
              I) Que a competência de análise do projeto protocolado é da Secretaria Municipal de<br>
              Licenciamento (SEL);<br><br>
              II) Ter ciência de que, no caso em que não for admissível a aplicação do procedimento<br>
              APROVA RÁPIDO, o pedido prosseguirá pela via ordinária de aprovação de projetos;<br><br>
              III) Serem as informações aqui prestadas verdadeiras.<br><br>
            </p>
            <br>
            <p align="center">
              São Paulo, de <span style="display: inline-block; width: 24px; border-bottom: solid 1px #000">25</span> de <span style="display: inline-block; width: 132px; border-bottom: solid 1px #000">novembro</span> de 20<span style="display: inline-block; width: 24px; border-bottom: solid 1px #000">22</span>.<br><br><br>
              <span style="display: inline-block; width: 200px; border-bottom: solid 1px #000"></span><br>
              Proprietário (ou possuidor)<br><br><br>
              <span  style="display: inline-block; width: 220px; border-bottom: solid 1px #000"></span><br>
              Responsável técnico pelo projeto<br>
            CREA/CAU nº <span style="display: inline-block; width: 140px; border-bottom: solid 1px #000">000000000-0</span></p><br></td>
        </tr>
      </tbody>
    </table>