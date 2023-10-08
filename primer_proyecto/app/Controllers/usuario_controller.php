<?php
namespace App\Controllers;
Use App\Models\usuario_Model;
use CodeIgniter\Controller;

class usuario_controller extends controller{

    protected $session;
    //helper (permite la utilizacion de bibliotecas)
        public function __construct(){
            helper(['form', 'url']);
            $this->session = \Config\Services::session();
        }

//crea el formulario
    public function create(){
        $dato['titulo']='Registro';
        echo view('front/head_view',$dato);
        echo view('front/navbar_view');
        echo view('back/usuario/registrarse');
        echo view('front/footer_view');
    }


    public function formValidation(){
        $input = $this->campo_validacion();
        $formModel = new usuario_Model();

        if(!$input){
            $data['titulo'] ='registrar_usuario';
            echo view('front/head_view',$data);
            echo view('front/navbar_view');
            echo view('back/usuario/registrarse', ['validation' => $this->validator]);
            echo view('front/footer_view');
        }else{
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email' => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'id_estado' => $this->request->getVar('id_estado')
            ]);

            session()->setFlashdata('success', 'Usuario registrado con exito');
            
            if (!$this->session->has('logged_in')) {
                // Si hay una sesión iniciada, redirige a una página
                return redirect()->to('/login');
            } else {
                // Si no hay sesión iniciada, redirige a otra página
                return redirect()->to('/mostrar_usuarios');
            }
         }
    }   

    public function campo_validacion($updating = false){
        $reglas = [
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario' => 'required|min_length[3]',
        ];
        // Si estás actualizando un usuario, el email no debe estar vacío
        if ($updating) {
            $reglas['email'] = 'required|min_length[4]|max_length[100]|valid_email';
        } else {
            // Si estás creando un usuario nuevo, el email debe ser único
            $reglas['email'] = 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]';
        }
    
        // Agrega una regla de validación específica para la contraseña si es necesario
        if ($updating) {
            // Si estás actualizando, la contraseña no es obligatoria
            $nuevaContrasena = $this->request->getVar('pass');
            if (!empty($nuevaContrasena)) {
                $reglas['pass'] = 'required|min_length[3]|max_length[10]';
            }
        } else {
            // Si estás creando un usuario nuevo, la contraseña debe ser obligatoria
            $reglas['pass'] = 'required|min_length[3]|max_length[10]';
        }
    
        $input = $this->validate($reglas);

        return $input;
    }

    public function mostrarUsuarios() {
        $usuarioModel = new usuario_Model();
        $data['usuarios'] = $usuarioModel->where('id_estado', 1)->findAll();
        
        $data['titulo'] = 'Ver Usuarios'; // Título para la vista
           
        // Carga las vistas y pasa los datos como parte de la vista 'editar_usuario'
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/ver_usuario', $data); // Pasa los datos aquí
        echo view('front/footer_view');
    }  



    public function editarUsuario($id_usuario){
        // Consulta la base de datos para obtener los datos del usuario con el ID proporcionado
        $usuarioModel = new usuario_Model();
        $data['usuario'] = $usuarioModel->find($id_usuario);

        if (empty($data['usuario'])) {
            // Si el usuario no existe, puedes manejar el error aquí o redirigir a una página de error.
            return redirect()->to('/verUsuarios');
        }

        $data['titulo'] = 'Editar Usuario'; // Título para la vista

        // Carga las vistas y pasa los datos como parte de la vista 'editar_usuario'
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/editar_usuario', $data);
        echo view('front/footer_view');
    }

    public function actualizar(){
        $input = $this->campo_validacion(true);
        
        if (!$input) {
            // Si la validación falla, vuelve al formulario de edición con los errores.
            return $this->editarUsuario($this->request->getVar('id_usuario'));
        } else {
            // Obten el ID del usuario a editar desde el formulario
            $id_usuario = $this->request->getVar('id_usuario');

            // Obtén los nuevos datos del formulario
            $nuevosDatos = [
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'email' => $this->request->getVar('email'),
                'usuario' => $this->request->getVar('usuario'),
            ];

            // Actualiza los datos del usuario en la base de datos
            $usuarioModel = new usuario_Model();
            $usuarioModel->update($id_usuario, $nuevosDatos);

            session()->setFlashdata('success', 'Usuario actualizado con éxito');
            
            // Redirige al usuario a la página de visualización de usuarios
            return redirect()->to('/mostrar_usuarios');
        }
    }

    public function eliminarUsuario($id_usuario){
        $usuarioModel = new usuario_Model();
        $data = ["id_usuario" => $id_usuario];
        $response = $usuarioModel->eliminar($data);

        if ($response){
            return redirect()->to('/mostrar_usuarios')->with('Msg', 'Eliminado con exito');
        }else{
            return redirect()->to('/mostrar_usuarios')->with('Msg', 'No se pudo eliminar el registro');
        }
    }
}

  

