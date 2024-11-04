<?= $this->extend("templates/layoutSite"); ?>

<?= $this->section("conteudo") ?>

<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-left">
                <h1 style="color: #6A0DAD;">Criar nova conta</h1>
            </div>
        </div>
    </div>
</section>

<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <div class="hover">
                        <h4>Já possui conta?</h4>
                        <p>
                            Faça seu login e curta, comente, marcar como lido nossos conteúdos criados para você.
                        </p>
                        <a class="button button-account" href="/login">Login</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner register_form_inner">
                    <h3>Crie sua nova conta aqui</h3>

                    <?= form_open("gravarNovaConta", ["class" => "row login_form", "id" => "register_form"]) ?>

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="nome" name="nome" 
                                    placeholder="Nome Completo" onfocus="this.placeholder = ''" 
                                    onblur="this.placeholder = 'Nome Completo'" autofocus  
                                    value="<?= setaValor('nome', $data) ?>">
                            <?= setaMsgErrorCampo('nome', $errors) ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="text" class="form-control" id="ddd1" name="ddd1" placeholder="DDD" onfocus="this.placeholder = ''" 
                                    onblur="this.placeholder = 'DDD'"
                                    value="<?= setaValor('ddd1', $data) ?>">
                            <?= setaMsgErrorCampo('ddd1', $errors) ?>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" id="celular1" name="celular1" placeholder="Celular para contato" 
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Celular para contato'"
                                    value="<?= setaValor('celular1', $data) ?>">
                            <?= setaMsgErrorCampo('celular1', $errors) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Seu melhor e-mail" 
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Seu melhor e-mail'"
                                    value="<?= setaValor('email', $data) ?>">
                            <?= setaMsgErrorCampo('email', $errors) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Sua senha" 
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Sua senha'">
                            <?= setaMsgErrorCampo('senha', $errors) ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha" 
                                    placeholder="Confirme sua senha" onfocus="this.placeholder = ''" 
                                    onblur="this.placeholder = 'Confirme sua senha'">
                        </div>
                        <div class="col-md-12 form-group">
                            <?= mensagemSucesso() ?>
                            <?= mensagemError() ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="button button-register w-100">Criar conta</button>
                        </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>