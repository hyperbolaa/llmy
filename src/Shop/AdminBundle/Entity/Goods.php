<?php

namespace Shop\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Goods
 * @ORM\Entity(repositoryClass="Shop\AdminBundle\Entity\GoodsRepository")
 * @ORM\Table(name="goods")
 */
class Goods
{
    /**
     * @var integer
     *
     * @ORM\Column(name="name", type="integer", nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_time", type="datetime", nullable=false)
     */
    private $createTime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_delte", type="boolean", nullable=false)
     */
    private $isDelte;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param integer $name
     *
     * @return Goods
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return integer
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     *
     * @return Goods
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return \DateTime
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Set isDelte
     *
     * @param boolean $isDelte
     *
     * @return Goods
     */
    public function setIsDelte($isDelte)
    {
        $this->isDelte = $isDelte;

        return $this;
    }

    /**
     * Get isDelte
     *
     * @return boolean
     */
    public function getIsDelte()
    {
        return $this->isDelte;
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
}
