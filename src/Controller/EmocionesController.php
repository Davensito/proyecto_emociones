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

        $emocion = $serializer->serialize(
            $emocion, 'json', [
            DateTimeNormalizer::FORMAT_KEY=>'H:i',
            'groups' => ['emociones']
        ]);


        return new Response($emocion);

    }

    public function emociones(SerializerInterface $serializer) {

        $emociones = $this->getDoctrine()->getManager()->getRepository(Emociones::class)->findAll();

        $emociones = $serializer->serialize($emociones, 'json', [DateTimeNormalizer::FORMAT_KEY=>'H:i','groups' => ['emociones']]);


        return new Response($emociones);

    }

}