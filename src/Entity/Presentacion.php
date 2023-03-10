<?php

namespace App\Entity;

use App\Repository\PresentacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PresentacionRepository::class)
 */
class Presentacion
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
     * @ORM\OneToMany(targetEntity=Producto::class, mappedBy="presentacion")
     */
    private $presentacion_producto;

    public function __construct()
    {
        $this->presentacion_producto = new ArrayCollection();
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
    public function getPresentacionProducto(): Collection
    {
        return $this->presentacion_producto;
    }

    public function addPresentacionProducto(Producto $presentacionProducto): self
    {
        if (!$this->presentacion_producto->contains($presentacionProducto)) {
            $this->presentacion_producto[] = $presentacionProducto;
            $presentacionProducto->setPresentacion($this);
        }

        return $this;
    }

    public function removePresentacionProducto(Producto $presentacionProducto): self
    {
        if ($this->presentacion_producto->removeElement($presentacionProducto)) {
            // set the owning side to null (unless already changed)
            if ($presentacionProducto->getPresentacion() === $this) {
                $presentacionProducto->setPresentacion(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return $this ->descripcion;
    }
}
