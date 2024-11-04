<?php 

    $this->extend('templates/layoutSite');
    $this->section('conteudo');

    ?>

    <?= exibeTitulo("Uf") ?>
    
    <div class="table-responsive table_custom">
        <table class="table table-hover table-bordered table-striped table-sm" id="tbListaUf">
            <thead>
                <tr class="text-weight-bold">
                    <td>Sigla</td>
                    <td>Descrição</td>
                    <td>Região</td>
                    <td>Código IBGE</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $value): ?>
                    <tr>
                        <td><?= $value['sigla'] ?></td>                    
                        <td><?= $value['descricao'] ?></td>
                        <td><?= descricaoRegiao($value['regiao']) ?></td>
                        <td><?= $value['codIBGE'] ?></td>
                        <td>
                            <a href="<?= base_url() ?>/Uf/form/view/<?= $value['id'] ?>" class="btn btn-secondary btn-sm btn-icons-crud" title="Visualizar"><i class="fa fa-eye" aria-hidden="true"></i></a>    
                            <a href="<?= base_url() ?>/Uf/form/update/<?= $value['id'] ?>" class="btn btn-secondary btn-sm btn-icons-crud" title="Alterar"><i class="fa fa-file" aria-hidden="true"></i></a>    
                            <a href="<?= base_url() ?>/Uf/form/delete/<?= $value['id'] ?>" class="btn btn-secondary btn-sm btn-icons-crud" title="Excluir"><i class="fa fa-trash" aria-hidden="true"></i></a>                               
                        </td>
                    </tr>
                <?php endforeach; ?>                
            </tbody>
        </table>
    </div>

<?= getDataTables("tbListaUf") ?>

<?= $this->endSection() ?>