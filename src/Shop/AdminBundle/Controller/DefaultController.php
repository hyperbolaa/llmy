<?php

namespace Shop\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $return = ['entities'=>[['a'=>1,'b'=>2,'c'=>3,'d'=>4],['a'=>1,'b'=>2,'c'=>3,'d'=>4],['a'=>1,'b'=>2,'c'=>3,'d'=>4],['a'=>1,'b'=>2,'c'=>3,'d'=>4]]];
        return $return;
    }


    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction()
    {
        return [];
    }







}
