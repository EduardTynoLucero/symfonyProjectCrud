<?php

namespace App\Entity;

use App\Repository\MarcaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarcaRepository::class)
 */
class Marca
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
     * @ORM\OneToMany(targetEntity=Producto::class, mappedBy="marca")
     */
    private $marca_producto;

    public function __construct()
    {
        $this->marca_producto = new ArrayCollection();
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
    public function getMarcaProducto(): Collection
    {
        return $this->marca_producto;
    }

    public function addMarcaProducto(Producto $marcaProducto): self
    {
        if (!$this->marca_producto->contains($marcaProducto)) {
            $this->marca_producto[] = $marcaProducto;
            $marcaProducto->setMarca($this);
        }

        return $this;
    }

    public function removeMarcaProducto(Producto $marcaProducto): self
    {
        if ($this->marca_producto->removeElement($marcaProducto)) {
            // set the owning side to null (unless already changed)
            if ($marcaProducto->getMarca() === $this) {
                $marcaProducto->setMarca(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this ->descripcion;
    }
}
