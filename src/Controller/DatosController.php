<?php

namespace App\Controller;

use App\Entity\Datos;
use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class DatosController extends AbstractController{

    public function datos(Request $request, SerializerInterface $serializer) {

        $id = $request->get('id');


        $usuario = $this->getDoctrine()->getManager()->getRepository(Usuario::class)->findOneBy(['id' => $id]);

        if ($request->isMethod("POST")) {

            $emocion = $request->get("emocion");
            $color = $request->get("color");

            $dato = new Datos();

            $dato->setNombre($usuario->getNombre());
            $dato->setApellidos($usuario->getApellidos());
            $dato->setCorreo($usuario->getCorreo());
            $dato->setNumEmpleado($usuario->getCodigo());
            $dato->setEmocion($emocion);
            $dato->setColor($color);
            $dato->setFecha(new \DateTime());


            $this->getDoctrine()->getManager()->persist($dato);
            $this->getDoctrine()->getManager()->flush();

        }

        if ($request->isMethod("DELETE")) {

            $this->getDoctrine()->getManager()->remove($dato);
            $this->getDoctrine()->getManager()->flush();

            return new Response('Borrado');

        }

        $dato = $serializer->serialize($dato, 'json', ['groups' => ['datos']]);

        return new Response($dato);

    }

    public function dato(Request $request, SerializerInterface $serializer) {

        $datos = $this->getDoctrine()->getManager()->getRepository(Datos::class)->findAll();

        $datos = $serializer->serialize($datos, 'json', ['groups' => ['datos']]);

        return new Response($datos);

    }

}