<?= $this->extend("templates/layoutSite"); ?>

<?= $this->section("conteudo") ?>

<main class="container">

    <?= exibeTitulo("Departamento", ['acao' => $action]) ?>

    <section class="mb-5">

        <?= form_open("Departamento/". ($action == "delete" ? 'delete' : 'store')) ?>

            <div class="row">

                <div class="form-group col-12 col-md-8">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" name="descricao" id="descricao"  class="form-control" maxlength="50" value="<?= setaValor('descricao', $data) ?>" required autofocus>
                    <?= setaMsgErrorCampo('descricao', $errors) ?>
                </div>

                <div class="form-group col-12 col-md-4">
                    <?= comboboxStatus(setaValor('statusRegistro', $data)) ?>
                    <?= setaMsgErrorCampo('statusRegistro', $errors) ?>
                </div>

                <input type="hidden" name="action" value="<?= $action ?>">
                <input type="hidden" name="id" value="<?= setaValor("id", $data) ?>">

                <div class="form-group col-12 col-md-8">
                    <a href="<?= base_url() ?>/Departamento">Voltar</a>
                    <button type="submit" value="submit" class="button button-login ml-3">Gravar</button>
                </div>

            </div>

        <?= form_close() ?>

    </section>
    
</main>

<?= $this->endSection() ?>