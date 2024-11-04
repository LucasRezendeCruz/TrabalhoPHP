<?= $this->extend("templates/layoutSite"); ?>

<?= $this->section("conteudo") ?>

<div class="container">

    <?= exibeTitulo("Produto") ?>

	<section class="login_box_area mb-5">
        <div class="table-responsive table_custom">
            <table class="table table-hover table-bordered table-striped table-sm" id="tbListaProduto">
                <thead>
                    <tr class="text-weight-bold">
                        <td>Descrição</td>
                        <td>Departamento</td>
                        <td>Preço Venda</td>
                        <td>Status</td>
                        <td>Opções</td>
                    </tr>
                </thead>
                <tbody>

                    <?php if (count($data) > 0): ?>

                        <?php foreach ($data as $value): ?>
                            <tr>                    
                                <td><?= $value['descricao'] ?></td>
                                <td><?= $value['departamentoDescricao'] ?></td>
                                <td class="text-right"><?= formatValor($value['precoVenda']) ?></td>
                                <td class="text-center"><?= mostraStatus($value['statusRegistro']) ?></td>
                                <td>
                                    <a href="<?= base_url() ?>Produto/form/view/<?= $value['id'] ?>" class="btn btn-secondary btn-sm btn-icons-crud" title="Visualizar"><i class="fa fa-eye" aria-hidden="true"></i></a>    
                                    <a href="<?= base_url() ?>Produto/form/update/<?= $value['id'] ?>" class="btn btn-secondary btn-sm btn-icons-crud" title="Alterar"><i class="fa fa-file" aria-hidden="true"></i></a>    
                                    <a href="<?= base_url() ?>Produto/form/delete/<?= $value['id'] ?>" class="btn btn-secondary btn-sm btn-icons-crud" title="Excluir"><i class="fa fa-trash" aria-hidden="true"></i></a>                               
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>                    
                            <td colspan="5">Nenhum produto cadastro no momento...</td>
                        </tr>

                    <?php endif; ?>

                </tbody>
            </table>
            
            <?= /*$pages->links('default', 'paginacao'); */"" ?>

        </div>
	</section>
</div>

<?= getDataTables("tbListaProduto") ?>

<?= $this->endSection() ?>