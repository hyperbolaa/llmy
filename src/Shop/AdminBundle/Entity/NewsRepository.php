<?php

namespace Shop\AdminBundle\Entity;

/**
 * NewsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NewsRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * 列表数据
     * @return array
     */
    public function getList($page, $perPage){
        return $this->createQueryBuilder('p')
            ->where('p.isDelete is null')
            ->setFirstResult(($page-1)* ($perPage))
            ->setMaxResults($perPage)
            ->orderBy('p.id','desc')
            ->getQuery()
            ->getResult();
    }

    /**
     * 数量
     * @return array
     */
    public function getCount(){
        return $this->createQueryBuilder('p')
            ->select('count(p.id)')
            ->where('p.isDelete is null')
            ->getQuery()
            ->getSingleScalarResult();
    }



}
