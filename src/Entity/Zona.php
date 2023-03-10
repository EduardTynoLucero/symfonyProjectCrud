<?php

namespace App\Entity;

use App\Repository\ZonaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZonaRepository::class)
 */
class Zona
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity=Producto::class, mappedBy="zona")
     */
    private $zona_producto;

    public function __construct()
    {
        $this->zona_producto = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection<int, Producto>
     */
    public function getZonaProducto(): Collection
    {
        return $this->zona_producto;
    }

    public function addZonaProducto(Producto $zonaProducto): self
    {
        if (!$this->zona_producto->contains($zonaProducto)) {
            $this->zona_producto[] = $zonaProducto;
            $zonaProducto->setZona($this);
        }

        return $this;
    }

    public function removeZonaProducto(Producto $zonaProducto): self
    {
        if ($this->zona_producto->removeElement($zonaProducto)) {
            // set the owning side to null (unless already changed)
            if ($zonaProducto->getZona() === $this) {
                $zonaProducto->setZona(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this ->descripcion;
    }
}
