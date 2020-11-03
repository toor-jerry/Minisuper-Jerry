<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AlmacenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=AlmacenRepository::class)
 * 
 *  @ApiResource(
 *     collectionOperations={"get"={"normalization_context"={"groups"="almacen:list"}}, "post"},
 *     itemOperations={"get"={"normalization_context"={"groups"="almacen:item"}}, "put", "delete"},
 *     order={"codigo"="DESC"},
 *     paginationEnabled=false
 * )
 */
class Almacen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"almacen:list", "conference:item"})
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"almacen:list", "conference:item"})
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity=Producto::class, mappedBy="almacen")
     * 
     * @Groups({"almacen:list", "conference:item"})
     */
    private $productos;

    public function __construct($codigo=null, $descripcion=null)
    {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->productos = new ArrayCollection();
    }
    public function __toString(): string
    {
        return $this->codigo.' - '.$this->descripcion. ' ';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection|Producto[]
     */
    public function getProductos(): Collection
    {
        return $this->productos;
    }

    public function addProducto(Producto $producto): self
    {
        if (!$this->productos->contains($producto)) {
            $this->productos[] = $producto;
            $producto->setAlmacen($this);
        }

        return $this;
    }

    public function removeProducto(Producto $producto): self
    {
        if ($this->productos->removeElement($producto)) {
            // set the owning side to null (unless already changed)
            if ($producto->getAlmacen() === $this) {
                $producto->setAlmacen(null);
            }
        }

        return $this;
    }
}
