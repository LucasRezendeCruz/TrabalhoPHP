<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// página principal (controller home)

$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('sobrenos', 'Home::sobrenos');
$routes->get('contato', 'Home::contato');
$routes->post('contatoEnviaEmail', 'Home::contatoEnviaEmail');
$routes->get('login', 'Home::login');
$routes->get('criarNovaConta', 'Home::criarNovaConta');
$routes->post('gravarNovaConta', 'Home::gravarNovaConta');
$routes->get('carrinhoCompras', 'Home::carrinhoCompras');
$routes->get('carrinhoPagamento', 'Home::carrinhoPagamento');
$routes->get('carrinhoConfirmacao', 'Home::carrinhoConfirmacao');
$routes->get('produtodetalhe/(:num)', 'Home::produtoDetalhe/$1');
$routes->post('gravarNovaConta', 'Login::gravarNovaConta');
$routes->get('ativarConta', 'Login::ativarConta');

// Login
$routes->group('Login', function ($routes) {
    $routes->post('signIn', 'Login::signIn');
    $routes->get('signOut', 'Login::signOut');
});

// sistema
$routes->group('Sistema', function ($routes) {
    $routes->get('/', 'Sistema::home');
    $routes->get('home', 'Sistema::home');
});

// Crud UF
$routes->group('Uf', function ($routes) {
    $routes->get('/', 'Uf::index');
    $routes->get('lista', 'Uf::index');
    $routes->get('form/(:segment)/(:num)', 'Uf::form/$1/$2');
    $routes->post('store', 'Uf::store');
    $routes->post('delete', 'Uf::delete');
});

// Crud Departamento
$routes->group('Departamento', function ($routes) {
    $routes->get('/', 'Departamento::index');
    $routes->get('lista', 'Departamento::index');
    $routes->get('form/(:segment)/(:num)', 'Departamento::form/$1/$2');
    $routes->post('store', 'Departamento::store');
    $routes->post('delete', 'Departamento::delete');
});

// Crud Produto
$routes->group('Produto', function ($routes) {
    $routes->get('/', 'Produto::index');
    $routes->get('lista', 'Produto::index');
    $routes->get('form/(:segment)/(:num)', 'Produto::form/$1/$2');
    $routes->post('store', 'Produto::store');
    $routes->post('delete', 'Produto::delete');
    $routes->get('excluirImagem/(:num)/(:segment)/(:segment)', 'Produto::excluirImagem/$1/$2/$3');

});