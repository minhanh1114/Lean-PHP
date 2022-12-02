<?php
class AuthMiddleware extends Middlewares {
    public function handle(){

        if (Session::data('loginAdmin')==null){
            $response = new Response();
            $response->redirect('admin/login');
        }
    }
}