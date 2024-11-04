<?= $this->extend("templates/layoutSite"); ?>

<?= $this->section("conteudo") ?>

<main class="site-main">

    <section class="section-margin calc-60px">
        <div class="container">
            <?php 
                if (count($this->data) > 0 ) {

                    foreach ($this->data as $aDepartamento) {

                        if (count($aDepartamento['aProduto']) > 0) {
                            ?>

                            <div class="section-intro pb-60px">
                                <h2><span class="section-intro__style"><?= $aDepartamento['descricao'] ?></span></h2>
                            </div>

                            <div class="row">

                                <?php foreach ($aDepartamento['aProduto'] as $aProduto): ?>

                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="card text-center card-product">
                                            <div class="card-product__img">
                                                <img class="card-img" src="<?= base_url("uploads/produto/". $aProduto['aImagem'][0]['nomeArquivo'] ) ?>" alt="" width="210" height="210">
                                                <ul class="card-product__imgOverlay">
                                                    <li><button title="Adicionar ao carrinho"><i class="ti-shopping-cart"></i></button></li>
                                                    <li><button title="Curtir"><i class="ti-heart"></i></button></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-product__title"><a href="<?= base_url() ?>/produtodetalhe/<?= $aProduto['id'] ?>"><?= $aProduto['descricao'] ?></a></h4>
                                                <p class="card-product__price">R$ <?= formatValor($aProduto['precoVenda']) ?></p>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </div>

                            <?php
                        }
                    }
                    
                } else {
                    ?>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h5 class="text-danger">Não há Categorias/produtos para exibir</h5>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </section>

    <section class="subscribe-position">
        <div class="container">
            <div class="subscribe text-center">
                <h3 class="subscribe__title">Fique por dentro de nossas novidades</h3>
                <p>
                    Cadastre-se e receba de forma exclusiva nossas novidades e promoções.
                </p>
                <div id="mc_embed_signup">
                    <form target="_blank" action="#" method="get" class="subscribe-form form-inline mt-5 pt-1">
                        <div class="form-group ml-sm-auto">
                            <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Seu melhor e-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Seu melhor e-mail '" >
                            <div class="info"></div>
                        </div>
                        <button class="button button-subscribe mr-auto mb-1" type="submit">Inscreva-se agora</button>
                        <div style="position: absolute; left: -5000px;">
                            <input name="emailNewsletter" tabindex="-1" value="" type="text">
                        </div>
                    </form>
                </div>
            
            </div>
        </div>
    </section>

</main>

<?= $this->endSection() ?>