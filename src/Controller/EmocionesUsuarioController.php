<?php

namespace App\Controller;

use App\Entity\Emociones;
use App\Entity\EmoionesUsuario;
use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class EmocionesUsuarioController extends AbstractController{

    public function info(Request $request, SerializerInterface $serializer){

        $id_usuario = $request->get("id_usuario");
        $id_emocion = $request->get("id_emocion");

        $emocion = $this->getDoctrine()->getManager()
            ->getRepository(Emociones::class)
            ->findOneBy(['id' => $id_emocion]);

        $usuario = $this->getDoctrine()->getManager()
            ->getRepository(Usuario::class)
            ->findOneBy(['id' => $id_usuario]);

        $info = $this->getDoctrine()->getManager()
            ->getRepository(EmoionesUsuario::class)
            ->findOneBy(['usuario' => $usuario, 'emociones' => $emocion]);

        if ($request->isMethod("POST")) {

            $fecha = $request->get('fecha');

            $info = new EmoionesUsuario();
            $info->setUsuario($usuario);
            $info->setEmociones($emocion);
            $info->setFecha(new \DateTime($fecha));

            $this->getDoctrine()->getManager()->persist($info);
            $this->getDoctrine()->getManager()->flush();

        }

        $info = $serializer->serialize($info, 'json', ['groups' => ['usuario','emociones','emociones_usuario']]);

        return new Response($info);
    }

}