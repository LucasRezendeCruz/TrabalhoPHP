<?= $this->extend("templates/layoutSite"); ?>

<?= $this->section("conteudo") ?>

<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-left">
                <h1 style="color: #384aeb;">Pagamento</h1>
            </div>
        </div>
    </div>
</section>
<section class="checkout_area section-margin--small">
    <div class="container">
        <div class="returning_customer">
            <div class="check_title">
                <h2>Não tem cadastro? <a href="index.php?view=criar-nova-conta">Clique aqui para cadastrar</a></h2>
            </div>
            <form class="row contact_form mt-1" action="#" method="post" novalidate="novalidate">
                <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" placeholder="E-mail*"
                        onfocus="this.placeholder=''" onblur="this.placeholder = 'E-mail*'" id="name"
                        name="name">
                    <!-- <span class="placeholder" data-placeholder="Username or Email"></span> -->
                </div>
                <div class="col-md-6 form-group p_star">
                    <input type="password" class="form-control" placeholder="Senha*" onfocus="this.placeholder=''"
                        onblur="this.placeholder = 'Senha*'" id="password" name="password">
                    <!-- <span class="placeholder" data-placeholder="Password"></span> -->
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="button button-login">Entrar</button>
                    <div class="creat_account">
                        <input type="checkbox" id="f-option" name="selector">
                        <label for="f-option">salvar login</label>
                    </div>
                    <a class="lost_pass" href="#">Esqueceu a senha?</a>
                </div>
            </form>
        </div>
        <div class="billing_details mt-5">
            <div class="row">
                <div class="col-lg-7">
                    <h3 class="mb-5">Endereço de Entrega</h3>
                    <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="logradouro" name="logradouro"
                                placeholder="Logradouro (rua, Av, etc..)" required autofocus>
                        </div>
                        <div class="col-md-4 form-group p_star">
                            <input type="text" class="form-control" id="numero" name="numero" placeholder="número"
                                required>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" id="complemento" name="complemento"
                                placeholder="Complemnto">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro"
                                required>
                        </div>
                        <div class="col-md-4 form-group p_star">
                            <select class="form-control" id="uf_id" name="uf_id">
                                <option value="">...</option>
                                <option value="ES">Espirito Santo</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="RJ">Rio de Janeiro</option>
                            </select>
                        </div>
                        <div class="col-md-8 form-group p_star">
                            <select class="form-control" id="cidade_id" name="cidade_id">
                                <option value="">...</option>
                                <option value="1">Cataguases</option>
                                <option value="3">Espera Feliz</option>
                                <option value="2">Muriaé</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="cep" name="cep" maxlength="8" required
                                placeholder="CEP">
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="order_box">
                        
                        <h2>Resumo da Compra</h2>

                        <table class="table table-borderless">
                            <thead class="border-bottom">
                                <tr>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Qtde</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Hidratante Facial</td>
                                    <td>x 2</td>
                                    <td class="text-right">R$ 720,00</td>
                                </tr>
                                <tr>
                                    <td>Caixa de som JBL</td>
                                    <td>x 1</td>
                                    <td class="text-right">R$ 720,00</td>
                                </tr>
                                <tr>
                                    <td>Luz Flash para sala</td>
                                    <td>x 3</td>
                                    <td class="text-right">R$ 720,00</td>
                                </tr>
                            </tbody>

                            <tfoot class="border-top">
                                <tr>
                                    <th colspan="2">Subtotal</th>
                                    <td class="text-right">R$ 2.160,00</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Frete <span>SEDEX: R$ 50.00</span></th>
                                    <td class="text-right">R$ 50,00</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Total</th>
                                    <td class="text-right">R$ 2.210,00</td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector">
                                <label for="f-option5">Boleto</label>
                                <div class="check"></div>
                            </div>
                            <p class="text-center"><b>Codigo de barra: </b> 11111 33333 44453 2 2221 100000334</p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selector">
                                <label for="f-option6">Pix </label>
                                <img src="img/product/card.jpg" alt="">
                                <div class="check"></div>
                            </div>
                            <p class="text-center"><b>Chave pix: </b>123.456.789-01</p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector">
                            <label for="f-option4">Li e aceito os </label>
                            <a href="#">Termos e condições*</a>
                        </div>
                        <div class="text-center">
                            <a class="button button-paypal" href="<?= base_url() ?>/carrinhoConfirmacao">Confirmar
                                Pagamento</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>