<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AlreadyLoggedInFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        
        // panel usuario
        if(session()->has('loggedUser') && session('type') == 'regular'){
            return redirect()->route('app_user_dashboard');
        }

        // panel administrador
        else if(session()->has('loggedUser') && session('type') == 'admin'){
            return redirect()->route('app_admin_dashboard');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
