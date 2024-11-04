<?php 

    $this->extend('templates/layoutSite');
    $this->section('conteudo');

?>

<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-left">
                <h2 style="color: #384aeb;">Home Administrativa</h2>

                <?= mensagemSucesso() ?>
                <?= mensagemError() ?>
                
            </div>
        </div>
    </div>
</section>

<section class="section-margin--small">
    <div class="container">
        <p>
            bem vindo a área administrativa - Muriaé Shop
        </p>
    </div>
</section>

<?= $this->endSection() ?>