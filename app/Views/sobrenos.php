<?= $this->extend("templates/layoutSite"); ?>

<?= $this->section("conteudo") ?>

<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-left">
                <h1 style="color: #6A0DAD;">Sobre nós</h1>
            </div>
        </div>
    </div>
</section>

<main class="site-main">

    <section class="blog_area">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="blog_left_sidebar">

                        <article class="row mt-5">
                            <p class="col-12 text-center">
                                <img class="author_img" src="<?= base_url("assets/img/centro-de-distribuicao.jpg") ?>" alt="">
                            </p>
                            
                            <h4 class="col-12 text-center" style="color: #6A0DAD; font-weight: bold;">InovaTech</h4>
                            <p class="col-12 text-center">Maior distribuidor da Zona da Matta Mineira</p>
                            <p class="col-12 text-center social_icon" style="font-size: 24px;">
                                <a href="#" tile="Facebook" style="color: #6A0DAD;">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" title="Instagram" style="color: #6A0DAD;">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" title="Twitter" style="color: #6A0DAD;">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" title="LinkedIn" style="color: #6A0DAD;">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>

                            </p>
                            <p class="col-12">
                            A InovaTech é uma empresa dedicada à comercialização de produtos e soluções tecnológicas de ponta. Fundada com o objetivo de revolucionar a forma como as pessoas e empresas interagem com a tecnologia, nossa equipe é composta por profissionais apaixonados e experientes que acreditam no poder da inovação.
                            </p>
                            <p class="col-12">
                            Com um portfólio diversificado que abrange desde dispositivos eletrônicos até softwares avançados, buscamos sempre trazer o que há de mais moderno e eficaz para nossos clientes. Valorizamos a transparência, a confiança e o atendimento excepcional, construindo parcerias sólidas que vão além da simples transação comercial.
                            </p>
                            <p class="col-12">
                            Na InovaTech, estamos comprometidos em explorar as últimas tendências e tecnologias, garantindo que nossos clientes tenham acesso às melhores soluções do mercado. Nosso propósito é não apenas atender às necessidades dos nossos clientes, mas também inspirá-los a explorar novas possibilidades e a transformar suas ideias em realidade. Junte-se a nós nessa jornada de inovação e tecnologia!
                            </p>
                            <div class="br"></div>

                        </article>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

<?= $this->endSection() ?>