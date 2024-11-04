<?= $this->extend("templates/layoutSite"); ?>

<?= $this->section("conteudo") ?>

<main class="container">

    <?= exibeTitulo("Produto", ['acao' => $action]) ?>

    <section class="mb-5">

        <?= form_open("Produto/". ($action == "delete" ? 'delete' : 'store') , ['enctype' => 'multipart/form-data']) ?>

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

                <div class="form-group col-12">
                    <label for="detalhamento" class="form-label">Detalhamento</label>
                    <textarea class="form-control" name="detalhamento" id="detalhamento"
                        placeholder="Descreva detalhes técnicos do produto"><?= setaValor("detalhamento", $data) ?></textarea>
                    <?= setaMsgErrorCampo("detalhamento", $errors) ?>
                </div>

                <div class="form-group col-6">
                    <label for="departamento_id" class="form-label">Departamento</label>
                    <select name="departamento_id" id="departamento_id" class="form-control" required>
                        <option value="">...</option>
                        <?php foreach ($aDepartamento as $departamentoValue): ?>
                            <option value="<?= $departamentoValue['id'] ?>" <?= (setaValor("departamento_id", $data) == $departamentoValue['id'] ? "selected" : "") ?>><?= $departamentoValue['descricao'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= setaMsgErrorCampo("departamento_id", $errors) ?>
                </div>
                
                <div class="form-group col-12 col-md-3">
                    <label for="precoVenda" class="form-label">Preço de Venda</label>
                    <input type="text" name="precoVenda" id="precoVenda"  class="form-control" maxlength="20" value="<?= setaValor('precoVenda', $data) ?>" required dir="rtl">
                    <?= setaMsgErrorCampo('precoVenda', $errors) ?>
                </div>
                
                <div class="form-group col-12 col-md-3">
                    <label for="pesoBruto" class="form-label">Peso Bruto (kg)</label>
                    <input type="text" name="pesoBruto" id="pesoBruto"  class="form-control" maxlength="20" value="<?= setaValor('pesoBruto', $data) ?>" required dir="rtl">
                    <?= setaMsgErrorCampo('pesoBruto', $errors) ?>
                </div>

                <div class="form-group col-12 col-md-4">
                    <label for="largura" class="form-label">Largura (cm)</label>
                    <input type="text" name="largura" id="largura"  class="form-control" maxlength="20" value="<?= setaValor('largura', $data) ?>" required>
                    <?= setaMsgErrorCampo('largura', $errors) ?>
                </div>

                <div class="form-group col-12 col-md-4">
                    <label for="altura" class="form-label">Altura (cm)</label>
                    <input type="text" name="altura" id="altura"  class="form-control" maxlength="20" value="<?= setaValor('altura', $data) ?>" required>
                    <?= setaMsgErrorCampo('altura', $errors) ?>
                </div>

                <div class="form-group col-12 col-md-4">
                    <label for="profundidade" class="form-label">Profundidade (cm)</label>
                    <input type="text" name="profundidade" id="profundidade"  class="form-control" maxlength="20" value="<?= setaValor('profundidade', $data) ?>" required>
                    <?= setaMsgErrorCampo('profundidade', $errors) ?>
                </div>

                <div class="col-12 form-group">
                    <label for="imagem" class="form-label">Imagens</label>
                    <input type="file" class="form-control" id="imagem" name="imagem[]" multiple>
                    <div id="imagem" class="form-text">Recomendamos Imagens de Até 210x210</div>
                </div>

            </div>

            <hr />
            <h3>Imagens</h3>

            <div class="row">

                <?php foreach ($aAnexo as $anexo): ?>
                    <div class="col-3">
                        <img src="<?= base_url('uploads/produto/' . $anexo['nomeArquivo']) ?>" alt="..." width="210" height="210">
                        <a href="<?= base_url() ?>/Produto/excluirImagem/<?= setaValor("id", $data) . "/" . $action . "/" . $anexo['nomeArquivo'] ?>">Excluir</a>
                    </div>
                <?php endforeach; ?>

            </div>
            
            <hr />

            <div class="row">

                <input type="hidden" name="action" value="<?= $action ?>">
                <input type="hidden" name="id" value="<?= setaValor("id", $data) ?>">

                <div class="form-group col-12">
                    <a href="<?= base_url() ?>/Produto">Voltar</a>
                    <button type="submit" value="submit" class="button button-login ml-3">Gravar</button>
                </div>

            </div>

        <?= form_close() ?>

    </section>
    
</main>

<script src="<?= base_url("assets/ckeditor5/ckeditor.js") ?>" type="text/Javascript"></script>

<script type="text/javascript">
    
    ClassicEditor
        .create(document.querySelector('#detalhamento'))
        .catch(error => {
            console.error(error);
    });

    $(document).ready( function() { 
        $('#precoVenda').mask('##.###.###.##0,00', {reverse: true});
        $('#pesoBruto').mask('##.###.###.##0,000', {reverse: true});
    })

</script>

<?= $this->endSection() ?>