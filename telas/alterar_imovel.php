<?php
require($_SERVER['DOCUMENT_ROOT'] . '/imoveis//html/meta.php');
?>


    <div class="col-md-7">
				
				<span style="font:16px 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#069;">
					<strong> 
					1:informa��es
					</strong>
					| 2:Endere�os | 3:imagens
				</span>
    <form name="cadastraimovel-1" id="cadastraimovel-1" method="post" action="novo_imovel_2.php"
          enctype="multipart/form-data">
        <table style="width:100%">

            <tr>
                <td>
                    <label>
                        <span>T�tulo do Anuncio:</span>
                    </label>
                <td>
            </tr>
            <tr>
                <td>
                    <input type="text" size="80" name="titulo"/>
                <td>
            </tr>


            <tr>
                <td>
                    <label>
                        <span>Imagem de Exibi��o do Im�vel: <strong>N�o poder� ser alterado</strong></span>
                    </label>
                <td>
            </tr>

            <tr>
                <td>
                    <input type="file" name="foto" size="60"/>
                <td>
            </tr>


            <tr>
                <td>
                    <label>
                        <span>Categoria Im�vel:</span>
                    </label>
                </td>
            <tr>
                <td>
                    <label>Casa</label>
                    <input type="radio" name="tipo" value="casa"/>
            </tr>
            </td>
            <tr>
                <td>

                    <label>Apartamento</label>
                    <input type="radio" name="tipo" value="apartamento"/>
            </tr>
            </td>
            <tr>
                <td>
                    <label>Ch�cara</label>
                    <input type="radio" name="tipo" value="chacara"/>
            </tr>
            </td>
            <tr>
                <td>
                    <label>Terreno</label>
                    <input type="radio" name="tipo" value="terreno"/>
            </tr>
            </td>
            <tr>
                <td>
                    <label>Condom�nio</label>
                    <input type="radio" name="tipo" value="condominio"/>
                </td>
            </tr>


            <tr>
                <td>
                    <label>
                        <span>Valor: (Para R$150.000,00 informe 150.000,00)</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" size="40" name="valor"/>
                </td>
            </tr>


            <tr>
                <td>
                    <label>
                        <span>Descri��o :</span>
                    </label>
                </td>
            </tr>
            </tr>
            <td>
                <textarea rows="3" cols="60" type="text" name="descricao"></textarea> </label>
                </tr>
            </td>

            <tr>
                <td>
                    <label>
                        <span>Comodos: (Informe quantos quartos tem o Im�vel)</span>
                    </label>
                </td>
            </tr>
            </tr>
            <td>
                <input type="text" name="comodos"/>
                </tr>
            </td>

            <tr>
                <td>
                    <label>
                        <span>Suites: (Se n�o tiver suites deixe o campo em branco)</span>
                    </label>
                </td>
            </tr>
            </tr>
            <td>
                <input type="text" name="suites"/>
                </tr>
            </td>

            <tr>
                <td>
                    <label>
                        <span>Banheiros: (informe quantos banheiros tem o �movel)</span>
                    </label>
                </td>
            </tr>
            </tr>
            <td>
                <input type="text" name="banheiros"/>
                </tr>
            </td>

            <tr>
                <td>
                    <label>
                        <span>Salas: (informe quantas salas tem o �movel)</span>
                    </label>
                </td>
            </tr>
            </tr>
            <td>
                <input type="text" name="salas"/>
                </tr>
            </td>

            <tr>
                <td>
                    <label>
                        <span>Novidades:</span>
                    </label>
                </td>
            </tr>
            </tr>
            <td>
                <input type="text" name="novidades"/>
                </tr>
            </td>

            <tr>
                <td>
                    <label>
                        <span>Outros:</span>
                    </label>
            </tr>
            </td>

            <tr>
                <td>
                    <input type="checkbox" name="churrasqueira" value="Sim"/> Churrasqueira
                </td>
            </tr>

            <tr>
                <td>
                    <input type="checkbox" name="garagem" value="Sim"/> Garagem
                </td>
            </tr>

            <tr>
                <td>
                    <input type="checkbox" name="servico" value="Sim"/> �rea de Servi�o
                </td>
            </tr>

            <tr>
                <td>
                    <input type="checkbox" name="piscina" value="Sim"/> Piscina
                </td>
            </tr>

            <tr>
                <td>
                    <input class="btn" type="submit" name="submit" value="Pr�ximo Passo"/>

                    <input class="btn" type="submit" href="novo_imovel.php" name="cadastrar" value="Cancelar"/>
                </td>
            </tr>

        </table>
    </form>


</div>

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/imoveis//html/footer.php');
?>
