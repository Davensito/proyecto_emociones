<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Datos
 *
 * @ORM\Table(name="datos")
 * @ORM\Entity
 */
class Datos{

    /**
     * @var int
     * @Groups("datos")
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @Groups("datos")
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     * @Groups("datos")
     * @ORM\Column(name="apellidos", type="string", length=45, nullable=false)
     */
    private $apellidos;

    /**
     * @var string
     * @Groups("datos")
     * @ORM\Column(name="num_empleado", type="string", length=45, nullable=false)
     */
    private $num_empleado;

    /**
     * @var string
     * @Groups("datos")
     * @ORM\Column(name="correo", type="string", length=45, nullable=false)
     */
    private $correo;

    /**
     * @var string
     * @Groups("datos")
     * @ORM\Column(name="emocion", type="string", length=45, nullable=false)
     */
    private $emocion;

    /**
     * @var string
     * @Groups("datos")
     * @ORM\Column(name="color", type="string", length=45, nullable=false)
     */
    private $color;

    /**
     * @var \DateTime
     * @Groups("datos")
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return string
     */
    public function getNumEmpleado(): string
    {
        return $this->num_empleado;
    }

    /**
     * @param string $num_empleado
     */
    public function setNumEmpleado(string $num_empleado): void
    {
        $this->num_empleado = $num_empleado;
    }

    /**
     * @return string
     */
    public function getCorreo(): string
    {
        return $this->correo;
    }

    /**
     * @param string $correo
     */
    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    /**
     * @return string
     */
    public function getEmocion(): string
    {
        return $this->emocion;
    }

    /**
     * @param string $emocion
     */
    public function setEmocion(string $emocion): void
    {
        $this->emocion = $emocion;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
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

}