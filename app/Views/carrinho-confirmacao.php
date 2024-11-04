<?= $this->extend("templates/layoutSite"); ?>

<?= $this->section("conteudo") ?>

<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-left">
                <h1 style="color: #384aeb;">Confirmação da Compra</h1>
            </div>
        </div>
    </div>
</section>
<section class="order_details section-margin--small">
    <div class="container">
        <p class="text-center billing-alert">Obrigado. Seu pedido foi recebido.</p>
        <div class="row mb-5">
            <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                <div class="confirmation-card">
                    <h3 class="billing-title">Informações do Pedido</h3>
                    <table class="order-rable">
                        <tr>
                            <td>Número do Pedido</td>
                            <td>: 60235</td>
                        </tr>
                        <tr>
                            <td>Data</td>
                            <td>: 15/08/2021 23:44</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>: R$ 2.210,00</td>
                        </tr>
                        <tr>
                            <td>Forma de Pagamento</td>
                            <td>: Cartão de crédito</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                <div class="confirmation-card">
                    <h3 class="billing-title">Endereço de Cobrança</h3>
                    <table class="order-rable">
                        <tr>
                            <td>Logradouro</td>
                            <td>: Av. Monteiro de Castro, 600-Barra</td>
                        </tr>
                        <tr>
                            <td>Cidade</td>
                            <td>: Muriaé</td>
                        </tr>
                        <tr>
                            <td>UF</td>
                            <td>: MG</td>
                        </tr>
                        <tr>
                            <td>CEP</td>
                            <td>: 36880-048</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                <div class="confirmation-card">
                    <h3 class="billing-title">Endereço de Entrega</h3>
                    <table class="order-rable">
                        <tr>
                            <td>Logradouro</td>
                            <td>: Av. Monteiro de Castro, 600-Barra</td>
                        </tr>
                        <tr>
                            <td>Cidade</td>
                            <td>: Muriaé</td>
                        </tr>
                        <tr>
                            <td>UF</td>
                            <td>: MG</td>
                        </tr>
                        <tr>
                            <td>CEP</td>
                            <td>: 36880-048</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Detalhes do Pedido</h2>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead class="border-bottom">
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Qtde</th>
                            <th scope="col" class="text-right">Total</th>
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
                    <tfoot>
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
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>