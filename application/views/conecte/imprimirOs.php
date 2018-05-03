<?php $totalServico = 0;
$totalProdutos      = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Map OS</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-media.css"/>
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
    <style>
        .dadosOs > .span12 {
            border-bottom: 1px solid #cccccc;
            margin: 5px 0;
        }

        .dadosOs .span6 {
            width: 50%;
        }

        .dadosOs .span12 {
            width: 100%;
        }

        .dadosOs .span4 {
            width: 33.333%;
        }

        .dadosOs .span3 {
            width: 25%;
        }

        .row-fluid [class*="span"] {
            margin-left: 0;
            padding-left: 0;
            float: left;
        }

        .invoice-head .table {
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .invoice-head .table td {
            vertical-align: middle;
        }

        .invoice-head .table td img {
            max-height: 100px;
        }

        body {
            background: inherit;
        }

        @media print {
            h5 {
                font-size: 14px !important;
                margin: 5px 0 !important;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">

            <div class="invoice-content">
                <div class="invoice-head" style="margin-bottom: 0">
                    <table class="table">
                        <tbody>
                        <?php if ($emitente == null) { ?>
                            <tr>
                                <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a
                                        href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a><<<
                                </td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td style="width: 25%; text-align: center;">
                                    <img src=" <?php echo $emitente[0]->url_logo; ?> ">
                                </td>
                                <td>
                                    <span style="font-size: 20px; "> <?php echo $emitente[0]->nome; ?></span> <br>
                                    <span>
                                        <?php
                                        echo(
                                            $emitente[0]->cnpj . ' <br> ' .
                                            $emitente[0]->rua . ', ' .
                                            $emitente[0]->numero . ' - ' .
                                            $emitente[0]->bairro . ' - ' .
                                            $emitente[0]->cidade . ' - ' . $emitente[0]->uf
                                        );
                                        ?>
                                    </span> <br>
                                    <span>
                                        E-mail: <?php echo $emitente[0]->email; ?> -
                                        Fone: <?php echo $emitente[0]->telefone; ?>
                                    </span>
                                </td>
                                <td style="width: 18%; text-align: center">
                                    #Protocolo:
                                    <span><?php echo $result->idOs ?></span>
                                    <br> <br>
                                    <span>Emissão: <?php echo date('d/m/Y') ?></span>
                                </td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>

                    <div class="dadosOs">
                        <div class="span12">
                            <div class="span6">
                                <h5>Cliente</h5>

                                <p>
                                    <?php echo $result->nomeCliente ?><br>
                                    <?php echo $result->rua ?>,
                                    <?php echo $result->numero ?>, <?php echo $result->bairro ?><br>
                                    <?php echo $result->cidade ?> - <?php echo $result->estado ?>
                                </p>
                            </div>
                            <div class="span6">
                                <h5>Responsável</h5>

                                <p>
                                    <?php echo $result->nome ?> <br>
                                    Telefone: <?php echo $result->telefone ?><br>
                                    Email: <?php echo $result->email ?>
                                </p>
                            </div>
                        </div>
                        <div class="span12">
                            <div class="span3">
                                <h5>Tipo de Atendimento</h5>

                                <p><?php echo $result->tipoAtendimento ? $result->tipoAtendimento : '-' ?></p>
                            </div>
                            <div class="span3">
                                <h5>Setor/Departamento</h5>

                                <p><?php echo $result->setorDepartamento ? $result->setorDepartamento : '-' ?></p>
                            </div>
                            <div class="span3">
                                <h5>Status</h5>

                                <p><?php echo $result->status ?></p>
                            </div>
                            <div class="span3">
                                <h5>Garantia</h5>

                                <p><?php echo $result->garantia ? $result->garantia : '-' ?></p>
                            </div>
                        </div>
                        <div class="span12">
                            <div class="span3">
                                <h5>Data Inicial</h5>

                                <p><?php
                                    echo($result->dataInicial ? date(
                                        'd/m/Y',
                                        strtotime($result->dataInicial)
                                    ) : '-');
                                    ?></p>
                            </div>
                            <div class="span3">
                                <h5>Data Final</h5>

                                <p><?php
                                    echo($result->dataFinal ? date(
                                        'd/m/Y',
                                        strtotime($result->dataFinal)
                                    ) : '-');
                                    ?></p>
                            </div>
                            <div class="span3">
                                <h5>Data de Execução</h5>

                                <p><?php
                                    echo($result->dataExecucao ? date(
                                        'd/m/Y',
                                        strtotime($result->dataExecucao)
                                    ) : '-');
                                    ?></p>
                            </div>
                            <div class="span3">
                                <h5>Hora de Execução</h5>

                                <p><?php
                                    echo($result->horaExecucaoInicial ? $result->horaExecucaoInicial : '-');
                                    ?> - <?php
                                    echo($result->horaExecucaoFinal ? $result->horaExecucaoFinal : '-');
                                    ?></p>
                            </div>
                        </div>
                        <?php if ($result->descricaoProduto != null) { ?>
                            <div class="span12">
                                <h5>Descrição</h5>

                                <p><?php echo $result->descricaoProduto ?></p>
                            </div>
                        <?php } ?>

                        <?php if ($result->defeito != null) { ?>
                            <div class="span12">
                                <h5>Defeito</h5>

                                <p><?php echo $result->defeito ?></p>
                            </div>
                        <?php } ?>
                        <?php if ($result->laudoTecnico != null) { ?>
                            <div class="span12">
                                <h5>Laudo Técnico</h5>

                                <p><?php echo $result->laudoTecnico ?></p>
                            </div>
                        <?php } ?>
                        <?php if ($result->observacoes != null) { ?>
                            <div class="span12">
                                <h5>Observações</h5>

                                <p><?php echo $result->observacoes ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div style="margin-top: 0; padding-top: 0">
                    <?php if ($produtos != null) { ?>
                        <br>
                        <table class="table table-bordered" id="tblProdutos">
                            <thead>
                            <tr>
                                <th style="text-align: left">Produto</th>
                                <th style="text-align: right">Quantidade</th>
                                <th style="text-align: right">Sub-total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($produtos as $p) {
                                $totalProdutos = $totalProdutos + $p->subTotal;
                                echo '
                                    <tr>
                                        <td style="text-align: left">' . $p->descricao . '</td>
                                        <td style="text-align: right">' . $p->quantidade . '</td>
                                        <td style="text-align: right">R$ ' . number_format($p->subTotal, 2, ',', '.') . '</td>
                                    </tr>';
                            } ?>

                            <tr>
                                <td colspan="2" style="text-align: right"><strong>Total:</strong></td>
                                <td style="text-align: right">
                                    <strong>R$ <?php echo number_format($totalProdutos, 2, ',', '.'); ?></strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    <?php } ?>
                    <?php if ($servicos != null) { ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="text-align: left">Serviço</th>
                                <th style="text-align: right">Sub-total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            setlocale(LC_MONETARY, 'en_US');
                            foreach ($servicos as $s) {
                                $preco        = $s->preco;
                                $totalServico = $totalServico + $preco;
                                echo '
                                <tr>
                                    <td style="text-align: left">' . $s->nome . '</td>
                                    <td style="text-align: right">R$ ' . number_format($s->preco, 2, ',', '.') . '</td>
                                </tr>';
                            } ?>

                            <tr>
                                <td colspan="1" style="text-align: right"><strong>Total:</strong></td>
                                <td style="text-align: right">
                                    <strong>R$ <?php echo number_format($totalServico, 2, ',', '.'); ?></strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    <?php } ?>
                    <h5 style="text-align: right">
                        Valor Total: R$ <?php echo number_format($totalProdutos + $totalServico, 2, ',', '.'); ?>
                    </h5>
                </div>

                <table border="0" style="width: 100%;text-align: center">
                    <tr>
                        <td>
                            <br> <br>

                            <div style="width: 90%; height: 1px; border-bottom: 1px solid #AAA;">&nbsp;</div>
                            Assinatura do Cliente
                        </td>
                        <td>
                            <br> <br>

                            <div style="width: 90%; height: 1px; border-bottom: 1px solid #AAA;">&nbsp;</div>
                            Assinatura do Técnico
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>
<script>
    window.print();
</script>
</body>
</html>







