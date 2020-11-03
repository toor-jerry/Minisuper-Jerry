<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\ProductoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProductoRepository::class)
 * 
 * @ApiResource(
 *     collectionOperations={"get"={"normalization_context"={"groups"="producto:list"}}, "post"},
 *     itemOperations={"get"={"normalization_context"={"groups"="producto:item"}}, "put", "delete"},
 *     order={"nombre"="DESC"},
 *     paginationEnabled=false
 * )
 *
 * @ApiFilter(SearchFilter::class, properties={"producto": "exact"})
 */
class Producto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"producto:list", "conference:item"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"producto:list", "conference:item"})
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"producto:list", "conference:item"})
     */
    private $descripcion;

    /**
     * @ORM\Column(type="float")
     * 
     * @Groups({"producto:list", "conference:item"})
     */
    private $precio;

    /**
     * @ORM\Column(type="integer")
     * 
     * @Groups({"producto:list", "conference:item"})
     */
    private $stack;

    /**
     * @ORM\Column(type="string", length=80)
     * 
     * @Groups({"producto:list", "conference:item"})
     */
    private $codigo;

    /**
     * @ORM\ManyToOne(targetEntity=Almacen::class, inversedBy="productos", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $almacen;
    
    public function __contruct(
        string $nombre = null, 
        string $descripcion = null,
        float $precio = null,
        int $stack = null,
        string $codigo = null,
        Almacen $almacen = null) {

        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stack = $stack;
        $this->codigo = $codigo;
        $this->almacen = $almacen;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

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

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getStack(): ?int
    {
        return $this->stack;
    }

    public function setStack(int $stack): self
    {
        $this->stack = $stack;

        return $this;
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

    public function getAlmacen(): ?Almacen
    {
        return $this->almacen;
    }

    public function setAlmacen(?Almacen $almacen): self
    {
        $this->almacen = $almacen;

        return $this;
    }
}
