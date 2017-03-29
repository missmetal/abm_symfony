<?php

namespace EmpresasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empresas
 *
 * @ORM\Table(name="empresas")
 * @ORM\Entity(repositoryClass="EmpresasBundle\Repository\EmpresasRepository")
 */
class Empresas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="cuit", type="integer", unique=true)
     */
    private $cuit;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="cantEmpleados", type="integer", nullable=true)
     */
    private $cantEmpleados;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cuit
     *
     * @param integer $cuit
     *
     * @return Empresas
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;

        return $this;
    }

    /**
     * Get cuit
     *
     * @return int
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Empresas
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set cantEmpleados
     *
     * @param integer $cantEmpleados
     *
     * @return Empresas
     */
    public function setCantEmpleados($cantEmpleados)
    {
        $this->cantEmpleados = $cantEmpleados;

        return $this;
    }

    /**
     * Get cantEmpleados
     *
     * @return int
     */
    public function getCantEmpleados()
    {
        return $this->cantEmpleados;
    }
}

