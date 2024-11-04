<?= $this->extend("templates/layoutSite"); ?>

<?= $this->section("conteudo") ?>

<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-left">
                <h1 style="color: #384aeb;">Detalhes do Produto</h1>
            </div>
        </div>
    </div>
</section>

<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="owl-carousel owl-theme s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="<?= base_url("uploads/produto/" . $this->data['imagem'][0]['nomeArquivo']) ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3><?= $this->data['descricao'] ?></h3>
                    <h2>R$ <?= formatValor($this->data['precoVenda']) ?></h2>
                    <ul class="list">
                        <li><a class="active" href="#"><span>Categoria</span> : Acessórios</a></li>
                    </ul>
                    <p>
                        <?= $this->data['detalhamento'] ?> 
                    </p>
                    <div class="product_count">
                        <label for="qty">Quantidade:</label>
                        <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                                        class="input-text qty" style="height: 40px !important">
                                    <button
                                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                        class="increase items-count" type="button"><i
                                            class="ti ti-angle-up"></i></button>
                                    <button
                                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) result.value--;return false;"
                                        class="reduced items-count" type="button"><i
                                            class="ti ti-angle-down"></i></button>
                        
                    </div>
                    <a class="button primary-btn" href="#">Comprar</a>
                    <div class="card_area d-flex align-items-center">
                        <a class="icon_btn" href="#"><i class="ti ti-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Descrição</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Especificação</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Comentários</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p><?= $this->data['detalhamento'] ?></p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Largura</h5>
                                </td>
                                <td>
                                    <h5><?= $this->data['largura'] ?>  cm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Altura</h5>
                                </td>
                                <td>
                                    <h5><?= $this->data['altura'] ?>  cm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Profundidade</h5>
                                </td>
                                <td>
                                    <h5><?= $this->data['profundidade'] ?>  cm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Peso</h5>
                                </td>
                                <td>
                                    <h5><?= formatValor($this->data['pesoBruto'], 3) ?>  kg</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="comment_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/usuario/usuario-1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>José Rubens</h4>
                                        <h5>12 agosto, 2021 às 22:12</h5>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            </p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/usuario/usuario-2.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Beatriz Silva</h4>
                                        <h5>15 agosto, 2021 às 14:45</h5>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Enviar comentário</h4>
                            <form class="row contact_form" action="contact_process.php" method="post" id="contactForm"
                                novalidate="novalidate">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="mensagem" id="mensagem" rows="4"
                                            placeholder="Mensagem"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="btn primary-btn">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</section>

<?= $this->endSection() ?>