<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductOrder
 *
 * @ORM\Table(name="product_orders")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductOrderRepository")
 */
class ProductOrder
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
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="products")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    /**
     * @var Box
     *
     * @ORM\ManyToOne(targetEntity="Box", inversedBy="boxes")
     * @ORM\JoinColumn(name="box_id", referencedColumnName="id")
     */
    private $box;

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
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return Box
     */
    public function getBox()
    {
        return $this->box;
    }

    /**
     * @param Box $box
     * @return $this
     */
    public function setBox($box)
    {
        $this->box = $box;
        return $this;
    }
}

