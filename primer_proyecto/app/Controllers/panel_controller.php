<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class panel_controller extends controller{
    public function index()
    {
        $session = session();
        $nombre=$session->get('usuario');
        $perfil=$session->get('perfil_id');

        $data['perfil_id']=$perfil;
        $dato['titulo']='panel del usuario';
        echo view('front/head_view', $dato);
        echo view('front/navbar_view');
        echo view('back/usuario/nav_panel');
        echo view('back/usuario/usuario_logueado');
        echo view('front/footer_view');
    }
} 
