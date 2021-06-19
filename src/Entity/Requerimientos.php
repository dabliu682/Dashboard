<?php

namespace App\Entity;

use App\Repository\RequerimientosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RequerimientosRepository::class)
 *  @ORM\Table(name="requerimientos.requeriminetos")
 */
class Requerimientos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaRegistro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $usuarioCLiente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $solicitud;

    /**
     * @ORM\Column(type="text")
     */
    private $detalle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $usuarioSoporte;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaAsignacion;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaCierre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro(\DateTimeInterface $fechaRegistro): self
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    public function getUsuarioCLiente(): ?string
    {
        return $this->usuarioCLiente;
    }

    public function setUsuarioCLiente(string $usuarioCLiente): self
    {
        $this->usuarioCLiente = $usuarioCLiente;

        return $this;
    }

    public function getModulo(): ?string
    {
        return $this->modulo;
    }

    public function setModulo(string $modulo): self
    {
        $this->modulo = $modulo;

        return $this;
    }

    public function getSolicitud(): ?string
    {
        return $this->solicitud;
    }

    public function setSolicitud(string $solicitud): self
    {
        $this->solicitud = $solicitud;

        return $this;
    }

    public function getDetalle(): ?string
    {
        return $this->detalle;
    }

    public function setDetalle(string $detalle): self
    {
        $this->detalle = $detalle;

        return $this;
    }

    public function getUsuarioSoporte(): ?string
    {
        return $this->usuarioSoporte;
    }

    public function setUsuarioSoporte(?string $usuarioSoporte): self
    {
        $this->usuarioSoporte = $usuarioSoporte;

        return $this;
    }

    public function getFechaAsignacion(): ?\DateTimeInterface
    {
        return $this->fechaAsignacion;
    }

    public function setFechaAsignacion(?\DateTimeInterface $fechaAsignacion): self
    {
        $this->fechaAsignacion = $fechaAsignacion;

        return $this;
    }

    public function getFechaCierre(): ?\DateTimeInterface
    {
        return $this->fechaCierre;
    }

    public function setFechaCierre(?\DateTimeInterface $fechaCierre): self
    {
        $this->fechaCierre = $fechaCierre;

        return $this;
    }
}
