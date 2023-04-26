<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Scalar\String_;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups("emociones_usuario")
     * @ORM\Column(name="id_tabla", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTabla;

    /**
     * @var \DateTime
     * @Groups("emociones_usuario")
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     * @Groups("emociones_usuario")
     * @ORM\Column(name="hora", type="string", length=45, nullable=false)
     */
    private $hora;

    /**
     * @var Emociones
     * @Groups("emociones_usuario")
     * @ORM\ManyToOne(targetEntity="Emociones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="emociones_id", referencedColumnName="id")
     * })
     */
    private $emociones;

    /**
     * @var Usuario
     * @Groups("emociones_usuario")
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @return int
     */
    public function getIdTabla(): int
    {
        return $this->idTabla;
    }

    /**
     * @param int $idTabla
     */
    public function setIdTabla(int $idTabla): void
    {
        $this->idTabla = $idTabla;
    }

    /**
     * @return \DateTime
     */
    public function getFecha(): \DateTime
    {
        return $this->fecha;
    }

    /**
     * @param \DateTime $fecha
     */
    public function setFecha(\DateTime $fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return string
     */
    public function getHora(): string
    {
        return $this->hora;
    }

    /**
     * @param string $hora
     */
    public function setHora(string $hora): void
    {
        $this->hora = $hora;
    }


    /**
     * @return Emociones
     */
    public function getEmociones(): Emociones
    {
        return $this->emociones;
    }

    /**
     * @param Emociones $emociones
     */
    public function setEmociones(Emociones $emociones): void
    {
        $this->emociones = $emociones;
    }

    /**
     * @return Usuario
     */
    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     */
    public function setUsuario(Usuario $usuario): void
    {
        $this->usuario = $usuario;
    }




}
