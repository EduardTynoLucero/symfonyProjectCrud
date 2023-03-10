<?php

namespace App\Entity;

use App\Repository\ProveedorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProveedorRepository::class)
 */
class Proveedor
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
     * @ORM\OneToMany(targetEntity=Producto::class, mappedBy="proveedor")
     */
    private $categoria_producto;

    public function __construct()
    {
        $this->categoria_producto = new ArrayCollection();
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
    public function getCategoriaProducto(): Collection
    {
        return $this->categoria_producto;
    }

    public function addCategoriaProducto(Producto $categoriaProducto): self
    {
        if (!$this->categoria_producto->contains($categoriaProducto)) {
            $this->categoria_producto[] = $categoriaProducto;
            $categoriaProducto->setProveedor($this);
        }

        return $this;
    }

    public function removeCategoriaProducto(Producto $categoriaProducto): self
    {
        if ($this->categoria_producto->removeElement($categoriaProducto)) {
            // set the owning side to null (unless already changed)
            if ($categoriaProducto->getProveedor() === $this) {
                $categoriaProducto->setProveedor(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this ->descripcion;
    }
}
