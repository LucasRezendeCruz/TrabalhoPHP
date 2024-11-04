<?php 

    $this->extend('templates/layoutSite');
    $this->section('conteudo');

    ?>
    
    <?= exibeTitulo("Uf", ['acao' => $action]) ?>

    <?= form_open("Uf/". ($action == "delete" ? 'delete' : 'store')) ?>

        <div class="row">

            <div class="form-group col-12 col-md-3">
                <label for="sigla" class="form-label">Sigla</label>
                <input type="text" name="sigla" id="sigla"  class="form-control" maxlength="50" value="<?= setaValor('sigla', $data) ?>" required autofocus>
                <?= setaMsgErrorCampo('sigla', $errors) ?>
            </div>

            <div class="form-group col-12 col-md-6">
                <?= comboboxRegiao(setaValor('regiao', $data)) ?>
                <?= setaMsgErrorCampo('regiao', $errors) ?>
            </div>

            <div class="form-group col-12 col-md-3">
                <label for="codIBGE" class="form-label">Código IBGE</label>
                <input type="text" name="codIBGE" id="codIBGE"  class="form-control" maxlength="2" value="<?= setaValor('codIBGE', $data) ?>" required>
                <?= setaMsgErrorCampo('codIBGE', $errors) ?>
            </div>

        </div>

        <div class="row">
            <div class="form-group col-12 col-md-12">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" name="descricao" id="descricao"  class="form-control" maxlength="50" value="<?= setaValor('descricao', $data) ?>" required autofocus>
                <?= setaMsgErrorCampo('descricao', $errors) ?>
            </div>

            <input type="hidden" name="action" value="<?= $action ?>">
            <input type="hidden" name="id" value="<?= setaValor("id", $data) ?>">
        </div>
        <div class="row">
            <div class="form-group col-12 col-md-12">
                <a href="<?= base_url() ?>/Uf">Voltar</a>
                <button type="submit" value="submit" class="button button-login ml-3">Gravar</button>
            </div>
        </div>

    <?= form_close() ?>

<?= $this->endSection() ?>