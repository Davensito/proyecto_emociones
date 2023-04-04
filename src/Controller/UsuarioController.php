<?php

namespace App\Controller;


use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class UsuarioController extends AbstractController{

    public function logearUsuario(Request $request, SerializerInterface $serializer) {

        $username = $request->get('username');
        $password = $request->get('password');

        $usuario = $this->getDoctrine()->getManager()
            ->getRepository(Usuario::class)
            ->findOneBy(['nombreUsuario' => $username,'contrasenya' =>$password]);

        $usuario = $serializer->serialize($usuario, 'json', ['groups' => ['usuario']]);

        return new Response($usuario);

    }

    public function usuarios(Request $request, SerializerInterface $serializer) {

        $usuarios = $this->getDoctrine()->getManager()->getRepository(Usuario::class)->findAll();

        if ($request->isMethod("POST")) {

            $nombre = $request->get("nombre");
            $apellidos = $request->get("apellidos");
            $nombreUsuario = $request->get("nombre_usuario");
            $contrasenya = $request->get("contrasenya");
            $imagen = $request->get("imagen");
            $codigo = $request->get("codigo");
            $correo = $request->get("correo");

            $usuario = new Usuario();

            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setNombreUsuario($nombreUsuario);
            $usuario->setContrasenya($contrasenya);
            $usuario->setImagen($imagen);
            $usuario->setCodigo($codigo);
            $usuario->setCorreo($correo);

            $this->getDoctrine()->getManager()->persist($usuario);
            $this->getDoctrine()->getManager()->flush();

        }


        $usuarios = $serializer->serialize($usuarios, 'json', ['groups' => ['usuario']]);


        return new Response($usuarios);

    }

    public function usuario(Request $request, SerializerInterface $serializer) {

        $id = $request->get('id');

        $usuario = $this->getDoctrine()->getManager()->getRepository(Usuario::class)->findOneBy(['id' => $id]);

        if ($request->isMethod("PUT")) {

            $nombre = $request->get("nombre");
            $apellido = $request->get("apellido");
            $nombreUsuario = $request->get("nombreUsuario");
            $contrasenya = $request->get("contrasenya");
            $codigo = $request->get("codigo");
            $correo = $request->get("correo");

            if (!empty($nombre))

                $usuario->setNombre($nombre);

            if (!empty($apellido))

                $usuario->setApellido($apellido);

            if (!empty($nombreUsuario))

                $usuario->setNombreUsuario($nombreUsuario);

            if (!empty($contrasenya))

                $usuario->setContrasenya($contrasenya);

            if (!empty($correo))

                $usuario->setCorreo($correo);

            if (!empty($codigo))

                $usuario->setCodigo($codigo);


            $this->getDoctrine()->getManager()->persist($usuario);
            $this->getDoctrine()->getManager()->flush();

        }

        if ($request->isMethod("DELETE")) {

            $this->getDoctrine()->getManager()->remove($usuario);
            $this->getDoctrine()->getManager()->flush();

            return new Response('Borrado');

        }

        $usuario = $serializer->serialize($usuario, 'json', ['groups' => ['usuario']]);

        return new Response($usuario);

    }

}