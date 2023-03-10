<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductoRepository::class)
 */
class Producto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descripcion_producto;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $stock;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $precio;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $iva;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $peso;

    /**
     * @ORM\ManyToOne(targetEntity=Proveedor::class, inversedBy="categoria_producto")
     */
    private $proveedor;

    /**
     * @ORM\ManyToOne(targetEntity=Presentacion::class, inversedBy="presentacion_producto")
     */
    private $presentacion;

    /**
     * @ORM\ManyToOne(targetEntity=Marca::class, inversedBy="marca_producto")
     */
    private $marca;

    /**
     * @ORM\ManyToOne(targetEntity=Zona::class, inversedBy="zona_producto")
     */
    private $zona;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function setCodigo(?int $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getDescripcionProducto(): ?string
    {
        return $this->descripcion_producto;
    }

    public function setDescripcionProducto(?string $descripcion_producto): self
    {
        $this->descripcion_producto = $descripcion_producto;

        return $this;
    }

    public function getStock(): ?string
    {
        return $this->stock;
    }

    public function setStock(?string $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(?string $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getIva(): ?string
    {
        return $this->iva;
    }

    public function setIva(?string $iva): self
    {
        $this->iva = $iva;

        return $this;
    }

    public function getPeso(): ?string
    {
        return $this->peso;
    }

    public function setPeso(?string $peso): self
    {
        $this->peso = $peso;

        return $this;
    }

    public function getProveedor(): ?Proveedor
    {
        return $this->proveedor;
    }

    public function setProveedor(?Proveedor $proveedor): self
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    public function getPresentacion(): ?Presentacion
    {
        return $this->presentacion;
    }

    public function setPresentacion(?Presentacion $presentacion): self
    {
        $this->presentacion = $presentacion;

        return $this;
    }

    public function getMarca(): ?Marca
    {
        return $this->marca;
    }

    public function setMarca(?Marca $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getZona(): ?Zona
    {
        return $this->zona;
    }

    public function setZona(?Zona $zona): self
    {
        $this->zona = $zona;

        return $this;
    }
}
