<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2015 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */


namespace Eccube\Entity;

/**
 * ProductPrice
 */
class ProductPrice extends \Eccube\Entity\AbstractEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $price;

     /**
     * @var \Eccube\Entity\Product
     */
    private $Product;

    public function __clone()
    {
        $this->id = null;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *@return ProductPrice
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    private $product_id;

    /**
     * Get id
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     *@return ProductID
     */
    public function setProductId($id)
    {
        $this->product_id = $id;

        return $this;
    }

    /**
     * Set price01
     *
     * @param  string       $price01
     * @return ProductPrice
     */
    public function setPrice($price01)
    {
        $this->price = $price01;

        return $this;
    }

    /**
     * Get price01
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set Product
     *
     * @param  \Eccube\Entity\Product $product
     * @return ProductPrice
     */
    public function setProduct(\Eccube\Entity\Product $product)
    {
        $this->Product = $product;

        return $this;
    }

    /**
     * Get Product
     *
     * @return \Eccube\Entity\Product
     */
    public function getProduct()
    {
        return $this->Product;
    }

    private $from;

    /**
     * Get id
     *
     * @return integer
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     *@return ProductPrice
     */
    public function setFrom($From)
    {
        $this->from = $From;

        return $this;
    }

    private $to;
    /**
     * Get id
     *
     * @return integer
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     *@return ProductPrice
     */
    public function setTo($To)
    {
        $this->to = $To;

        return $this;
    }
}
