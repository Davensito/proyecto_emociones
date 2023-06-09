<?php

namespace App\Controller;

use App\Entity\Emociones;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class EmocionesController extends AbstractController{

    public function emocion(Request $request,SerializerInterface $serializer) {

        $id = $request->get('id_emocion');

        $emocion = $this->getDoctrine()->getManager()
            ->getRepository(Emociones::class)
            ->findOneBy(['id'=>$id]);

        if ($request->isMethod("PUT")) {

            $nombre = $request->get("emocion");
            $color = $request->get("color");
            $imagen = $request->get("imagen");

            if (!empty($nombre))

                $emocion->setNombre($nombre);

            if (!empty($color))

                $emocion->setColoro($color);

            if (!empty($imagen))

                $emocion->setImagen($imagen);

            $this->getDoctrine()->getManager()->persist($emocion);
            $this->getDoctrine()->getManager()->flush();

        }

        if ($request->isMethod("DELETE")) {

            $this->getDoctrine()->getManager()->remove($emocion);
            $this->getDoctrine()->getManager()->flush();
            return new Response('Borrado');

        }

        $emocion = $serializer->serialize(
            $emocion, 'json', [
            DateTimeNormalizer::FORMAT_KEY=>'H:i',
            'groups' => ['emociones']
        ]);

        return new Response($emocion);

    }

    public function emociones(Request $request, SerializerInterface $serializer) {

        $emociones = $this->getDoctrine()->getManager()->getRepository(Emociones::class)->findAll();

        if ($request->isMethod("POST")) {

            $emocion = $request->get("emocion");
            $color = $request->get("color");
            $imagen = $request->get("imagen");


            $emocionNew = new Emociones();

            $emocionNew->setEmocion($emocion);
            $emocionNew->setColor($color);
            $emocionNew->setImagen($imagen);

            $this->getDoctrine()->getManager()->persist($emocionNew);
            $this->getDoctrine()->getManager()->flush();

        }

        $emociones = $serializer->serialize($emociones, 'json', [DateTimeNormalizer::FORMAT_KEY=>'H:i','groups' => ['emociones']]);


        return new Response($emociones);

    }

}