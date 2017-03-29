<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $this->Html->charset(); ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="http://redeinclusao.org.br/v2/css/bootstrap/css/bootstrap.css" />
        <style>
            body {
                font-size: 10pt;
            }
            table { page-break-after:auto; }
            tr    { page-break-inside:avoid; page-break-after:auto }
            td    { page-break-inside:avoid; page-break-after:auto }
            thead { display:table-header-group }
            tfoot {
                display:table-footer-group;
                border-bottom: hidden;
                border-left: hidden;
                border-right: hidden;
            }

            .clear {
                clear: both;
            }
            #cabecalho {
                position: relative;
                width: 100%;
                margin-bottom: 5%;
            }
            #logo {
                float: left;
                height: 40px;
                margin: 0 10px 0 0;
                /*width: 200px;*/
                width: 20%;
            }
            #logo a img {
                height: 37px;
                width: 200px;
            }
            #informacoes {
                float: left;
                width: 65%;
                height: 40px;
                text-align: center;
            }
            #informacoes h3, p {
                margin: 0;
            }
            .dataRelatorio {
                float: right;
                position: relative;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row" id="cabecalho">
                <div class="col-sm-2" id="logo">
                    <a class="navbar-brand" href="#"><img src="http://redeinclusao.org.br/v2/img/logorede.png" width="50%" /></a>
                </div>
                <div id="informacoes" class="text-center">
                    <h3>Relatório de Empresas</h3>
                    <strong>Filtros:</strong><br>
                    <strong>Status:</strong> <?= ($this->request->query['status'] == 'R') ? 'Receptivo' : 'Efetivado' ?>
                    |
                    <strong>Ativo:</strong> <?= ($this->request->query['ativo'] == 'N') ? 'Não' : 'Sim' ?>
                    <?php if (!empty($this->request->query['cidade'])) : ?>
                        |
                        <strong>Cidade:</strong> <?= $this->request->query['cidade'] ?>
                    <?php endif; ?>
                    <?php if (!empty($this->request->query['inicio'])) : ?>
                        |
                        <strong>De:</strong> <?= $this->request->query['inicio'] ?>
                        <strong>até:</strong> <?= $this->request->query['termino'] ?>
                    <?php endif; ?>
                </div>
                <div class="dataRelatorio">
                    Data: <?= date('d/m/Y') ?>
                </div>
            </div>
            
            <div class="table-responsive" id="table">
                <table class="table table-bordered">
                    <thead style="background-color:#F79646;">
                    <th style="text-align:center;">Nome</th>
                    <th style="text-align:center;">Contato</th>
                    <th style="text-align:center;">Telefone</th>
                    <th style="text-align:center;">Email</th>
                    <th style="text-align:center;">Email 2</th>
                    <!--<th style="text-align:center;">Ata</th>-->
                    </thead>
                    <tfoot>
                        <tr><td colspan="15"></td></tr>
                    </tfoot>
                    <tbody class="text-center">
                        <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td><?= $cliente['Cliente']['razao_social'] ?></td>
                                <td><?= $cliente['Cliente']['contato'] ?></td>
                                <td><?= $cliente['Cliente']['telefone'] ?></td>
                                <td><?= $cliente['Cliente']['e_mail'] ?></td>
                                <td><?= $cliente['Cliente']['e_mail_2'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
