<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmoionesUsuario
 *
 * @ORM\Table(name="emoiones_usuario", uniqueConstraints={@ORM\UniqueConstraint(name="usuario_id_UNIQUE", columns={"usuario_id"})}, indexes={@ORM\Index(name="emociones_id_idx", columns={"emociones_id"})})
 * @ORM\Entity
 */
class EmoionesUsuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tabla", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTabla;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var Emociones
     *
     * @ORM\ManyToOne(targetEntity="Emociones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="emociones_id", referencedColumnName="id")
     * })
     */
    private $emociones;

    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;


}
