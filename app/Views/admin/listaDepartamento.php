<?= $this->extend("templates/layoutSite"); ?>

<?= $this->section("conteudo") ?>

<div class="container">

    <?= exibeTitulo("Departamento") ?>

	<section class="login_box_area mb-5">
        <div class="table-responsive table_custom">
            <table class="table table-hover table-bordered table-striped table-sm" id="tbListaDepartamento">
                <thead>
                    <tr class="text-weight-bold">
                        <td>Descrição</td>
                        <td>Status</td>
                        <td>Opções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $value): ?>
                        <tr>                    
                            <td><?= $value['descricao'] ?></td>
                            <td><?= mostraStatus($value['statusRegistro']) ?></td>
                            <td>
                                <a href="<?= base_url() ?>/Departamento/form/view/<?= $value['id'] ?>" class="btn btn-secondary btn-sm btn-icons-crud" title="Visualizar"><i class="fa fa-eye" aria-hidden="true"></i></a>    
                                <a href="<?= base_url() ?>/Departamento/form/update/<?= $value['id'] ?>" class="btn btn-secondary btn-sm btn-icons-crud" title="Alterar"><i class="fa fa-file" aria-hidden="true"></i></a>    
                                <a href="<?= base_url() ?>/Departamento/form/delete/<?= $value['id'] ?>" class="btn btn-secondary btn-sm btn-icons-crud" title="Excluir"><i class="fa fa-trash" aria-hidden="true"></i></a>                               
                            </td>
                        </tr>
                    <?php endforeach; ?>                
                </tbody>
            </table>
        </div>
	</section>
</div>

<?= getDataTables("tbListaDepartamento") ?>

<?= $this->endSection() ?>