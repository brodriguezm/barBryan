<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categoria
 *
 * @ORM\Table(name="categoria")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoriaRepository")
 */
class Categoria
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=150)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255)
     */
    private $foto;

    /**
     * @ORM\OneToMany(targetEntity="Platillo", mappedBy="categoria")
     */
    private $platillos;


    public function __construct() {
        $this->platillos = new ArrayCollection();
    }


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Categoria
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Categoria
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Categoria
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Add platillo
     *
     * @param \AppBundle\Entity\Platillo $platillo
     *
     * @return Categoria
     */
    public function addPlatillo(\AppBundle\Entity\Platillo $platillo)
    {
        $this->platillos[] = $platillo;

        return $this;
    }

    /**
     * Remove platillo
     *
     * @param \AppBundle\Entity\Platillo $platillo
     */
    public function removePlatillo(\AppBundle\Entity\Platillo $platillo)
    {
        $this->platillos->removeElement($platillo);
    }

    /**
     * Get platillos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlatillos()
    {
        return $this->platillos;
    }

    //Funcion

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->nombre;
    }
}
