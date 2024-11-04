<?= $this->extend("templates/layoutSite"); ?>

<?= $this->section("conteudo") ?>

<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-left">
                <h1 style="color: #384aeb;">Contato</h1>
            </div>
        </div>
        <?= mensagemError() . mensagemSucesso() ?>
    </div>
</section>

<section class="section-margin--small">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
            <div id="map" style="height: 420px;"></div>
            <script>
                function initMap() {
                var uluru = {lat: -21.1324524, lng: -42.3678246};
                var grayStyles = [
                    {
                    featureType: "all",
                    stylers: [
                        { saturation: -90 },
                        { lightness: 50 }
                    ]
                    },
                    {elementType: 'labels.text.fill', stylers: [{color: '#A3A3A3'}]}
                ];
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: -21.1324524, lng: -42.3678246},
                    zoom: 17,
                    styles: grayStyles,
                    scrollwheel:  false
                });
                }
                
            </script>
            
        </div>


        <div class="row">

            <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-home"></i></span>
                <div class="media-body">
                    <h3>Muriaé-MG</h3>
                    <p>Praça Aninna Bisegna, 40 - Centro</p>
                </div>
                </div>
                <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                <div class="media-body">
                    <h3><a href="tel:+553237211026">+55 (32) 3721-1026</a></h3>
                    <p>De segunda a sexta das 8 às 18 horas</p>
                </div>
                </div>
                <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-email"></i></span>
                <div class="media-body">
                    <h3><a href="mailto:aldecirfonseca@ghotmail.com">aldecirfonseca@hotmail.com</a></h3>
                    <p>Envie-nos uma mensagem a qualquer momento!</p>
                </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9">
                <form action="<?= base_url() ?>/contatoEnviaEmail" class="form-contact contact_form" action="contact_process.php" method="POST" id="contactForm" novalidate="novalidate">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="nome" id="nome" type="text" 
                                    placeholder="Seu nome"
                                    required maxlength="60"
                                    value="<?= set_value("nome") ?>">
                                <?= setaMsgErrorCampo("nome", $errors) ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="celular" id="celular" type="text" 
                                    placeholder="Seu telefone para contato"
                                    required value="<?= set_value("celular") ?>">
                                <?= setaMsgErrorCampo("celular", $errors) ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Seu e-mail"
                                    required value="<?= set_value("email") ?>">
                                <?= setaMsgErrorCampo("email", $errors) ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="assunto" id="assunto" type="text" 
                                    placeholder="Resumo do assunto"
                                    required value="<?= set_value("assunto") ?>">
                                <?= setaMsgErrorCampo("assunto", $errors) ?>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control different-control w-100" name="mensagem" id="mensagem" cols="30" rows="5" 
                                    placeholder="Descreva de forma detalha o motivo do seu contato" required><?= set_value("mensagem") ?></textarea>
                                <?= setaMsgErrorCampo("mensagem", $errors) ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center text-md-right mt-3">
                        <button type="submit" class="button button--active button-contactForm">Enviar Mensagem</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="<?= base_url("assets/ckeditor5/ckeditor.js") ?>" type="text/Javascript"></script>

<script type="text/javascript">

    ClassicEditor
        .create(document.querySelector('#mensagem'))
        .catch(error => {
            console.error(error);
        });

</script>

<?= $this->endSection() ?>