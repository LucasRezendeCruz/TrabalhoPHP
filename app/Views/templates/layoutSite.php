<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <title>InovaTech</title>

        <link rel="icon" href="<?= base_url("assets/img/Fevicon.png") ?>" type="image/png">
        <link rel="stylesheet" href="<?= base_url("assets/vendors/bootstrap/bootstrap.min.css") ?>">
        <link rel="stylesheet" href="<?= base_url("assets/vendors/fontawesome/css/all.min.css") ?>">
        <link rel="stylesheet" href="<?= base_url("assets/vendors/themify-icons/themify-icons.css") ?>">
        <link rel="stylesheet" href="<?= base_url("assets/vendors/nice-select/nice-select.css") ?>">
        <link rel="stylesheet" href="<?= base_url("assets/vendors/owl-carousel/owl.theme.default.min.css") ?>">
        <link rel="stylesheet" href="<?= base_url("assets/vendors/owl-carousel/owl.carousel.min.css") ?>">

        <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">
        <link rel="stylesheet" href="<?= base_url("assets/css/customizado.css") ?>">

        <script src="<?= base_url("assets/vendors/jquery/jquery-3.3.1.js") ?>"></script>
        <script src="<?= base_url("assets/js/jqueryMask.js") ?>" type="text/Javascript"></script>

    </head>

    <body>
        <header class="header_area">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                    <a class="navbar-brand logo_h" href="<?= base_url() ?>"><img src="<?= base_url("assets/img/logo.png") ?>" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                                <li class="nav-item active"><a class="nav-link" style="font-weight: bold" href="<?= base_url() ?>">Home</a></li>
                                
                                <?php if (isset(session()->aMenuDepartamento)): ?>
                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" style="font-weight: bold" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departamentos</a>
                                        <ul class="dropdown-menu">
                                            <?php foreach(session()->aMenuDepartamento AS $valueMenuDepartamento): ?>
                                                <li class="nav-item"><a class="nav-link" href="#"><?= $valueMenuDepartamento['descricao'] ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>                                  
                                <?php endif; ?>
                                
                                <li class="nav-item"><a class="nav-link" style="font-weight: bold" href="<?= base_url() ?>/sobrenos">Sobre nós</a></li>
                                <li class="nav-item"><a class="nav-link" style="font-weight: bold" href="<?= base_url() ?>/contato">Contato</a></li>

                                <?php

                                if (session()->getTempdata('isLoggedIn') != true) {
                                    ?>
                                    <li class="nav-item"><a class="nav-link" style="font-weight: bold" href="<?= base_url() ?>/login">Entre ou cadastre-se</a></li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" style="font-weight: bold" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= substr(session()->getTempdata('userNome'), 0 , 15) ?></a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a class="nav-link" href="#">Perfil</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#">Meus pedidos</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#">Trocar Senha</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>/Departamento">Departamento</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>Produto">Produto</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>/Uf">UF</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>/Login/signOut">Sair</a></li>
                                        </ul>
                                    </li>                            
                                    <?php
                                }
                                ?>
                            </ul>

                            <div class="shop_right_sidebar nav-item">

                                <form class="form-inline my-2 my-lg-0 search_nav">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Procurar" aria-label="Search">
                                    </div>
                                        <a href="#" class="btn" style="font-size: 24px; color: #6A0DAD;" >
                                            <i class="ti-search"></i>
                                        </a>
                                </form>

                            </div>

                            <ul class="nav-shop">
                            <?php
                                if (session()->getTempdata('isLoggedIn') != true) {
                            ?>
                                <a href="#">
                                    <li class="nav-item"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle"></span></button> </li>
                                </a>

                            <?php
                            } else {
                            ?>
                                <a href="<?= base_url() ?>/carrinhoCompras">
                                    <li class="nav-item"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">3</span></button> </li>
                                </a>
                            <?php
                            }
                            ?>
                            </ul>                    

                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <main class="container">
            <section>
                <?= $this->renderSection('conteudo') ?>
            </section>
        </main>
        
        <footer class="footer mt-5">
            <div class="footer-area">
                <div class="container">
                    <div class="row section_gap">
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <div class="single-footer-widget tp_widgets">
                                <h4 class="footer_title large_title">Nossa missão</h4>
                                <p>
                                A InovaTech se dedica a tornar a tecnologia acessível e transformadora, conectando clientes a soluções e produtos inovadores que impulsionam a produtividade e a criatividade. Buscamos excelência e qualidade, estabelecendo-nos como uma referência em confiança e atendimento no mercado.
                                </p>
                                <h4 class="footer_title large_title">Nossa visão</h4>
                                <p>Nossa visão é ser reconhecida como uma referência em tecnologia, promovendo uma experiência de compra inovadora e de alta qualidade. A InovaTech almeja antecipar as necessidades do futuro, crescer de maneira responsável e impactar positivamente a vida das pessoas e das empresas por meio da tecnologia. </p>
                            </div>
                        </div>
                        <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                            <div class="single-footer-widget tp_widgets">
                                <h4 class="footer_title">Links rápidos</h4>
                                <ul class="list">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="index.php?view=sobre-o-autor">Sobre nós</a></li>
                                    <li><a href="index.php?view=contato">Contato</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                            <div class="single-footer-widget tp_widgets">
                                <h4 class="footer_title">Contato</h4>
                                <div class="ml-40">
                                    <p class="sm-head">
                                        <span class="fa fa-location-arrow"></span> Endereço:
                                    </p>
                                    <p>Praça Aninna Bisegna, 40 - Centro <br /> Muriaé-MG</p>

                                    <p class="sm-head">
                                        <span class="fa fa-phone"></span> Telefone:
                                    </p>
                                    <p>
                                        +55 (32) 3561-2369
                                    </p>

                                    <p class="sm-head">
                                        <span class="fa fa-envelope"></span> Email
                                    </p>
                                    <p>
                                         <br> <a href="https://www.santamarcelina.edu.br/faculdade/muriae/" target="_blank" title="FASM">fasm.online</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row d-flex">
                        <p class="col-lg-12 footer-text text-center">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Todos os direitos reservados | InovaTech | <a href="https://www.fasm.online/" target="_blank">FASM</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <script src="<?= base_url("assets/vendors/bootstrap/bootstrap.bundle.min.js") ?>"></script>
        <script src="<?= base_url("assets/vendors/skrollr.min.js") ?>"></script>
        <script src="<?= base_url("assets/vendors/owl-carousel/owl.carousel.min.js") ?>"></script>
        <script src="<?= base_url("assets/vendors/jquery.ajaxchimp.min.js") ?>"></script>
        <script src="<?= base_url("assets/vendors/mail-script.js") ?>"></script>
        <script src="<?= base_url("assets/js/main.js") ?>"></script>
    </body>

</html>