<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if ((bool)session()->getTempData("isLoggedIn") != true) {
            return redirect()->to('/home');
        }

        if ((bool)session()->getTempData("userNivel") == 2) {

            $segments = $request->getUri()->getSegments(0);

            if (count($segments) > 0) {
                if (in_array($segments[0], ['Departamento', 'Produto', 'Uf'])) {
                    return redirect()->to('/Sistema')->with("msgError", "Você não tem permissão para acessar está funcionalidade");
                }
            }
        }
    }

    //

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

