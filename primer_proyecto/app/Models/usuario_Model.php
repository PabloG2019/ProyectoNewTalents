<?php

namespace App\Models;
use CodeIgniter\Model;

class usuario_Model extends Model{

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nombre', 'apellido', 'usuario', 'email', 'pass', 'perfil_id', 'baja', 'created_at'];
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function eliminar($id){
        $usuarios = $this->db->table('usuarios');
        $usuarios->set('id_estado', 2);
        return $usuarios->where('id_usuario', $id)->update();
    }

}