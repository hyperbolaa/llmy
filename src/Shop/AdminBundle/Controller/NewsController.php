<?php

namespace Shop\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Shop\AdminBundle\Entity\News;
use Shop\AdminBundle\Form\NewsType;


/**
 * News controller.
 *
 * @Route("/admin/news")
 */
class NewsController extends Controller
{

    /**
     * Lists all News entities.
     *
     * @Route("/", name="admin_news")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return $this->make();

        //$return = ImageService::getName();
        //dump($return);exit;

        //$return = $this->get("hyperbolaa_sms")->send('code',13545018901,"448923");
        //dump($return);exit;
        //return new Response($return);
    }



    /**
     * Displays a form to create a new News entity.
     *
     * @Route("/new", name="admin_news_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new News();
        $form = $this->createForm(new NewsType(), $entity, array(
            'action' => $this->generateUrl('admin_news_create'),
            'method' => 'POST',
        ));

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new News entity.
     *
     * @Route("/", name="admin_news_create")
     * @Method("POST")
     * @Template("ShopAdminBundle:News:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new News();
        $form = $this->createForm(new NewsType(), $entity, array(
            'action' => $this->generateUrl('admin_news_create'),
            'method' => 'POST',
        ));
        $form->handleRequest($request);
        if ($form->isValid()) {

            $name = $entity->getName();
            $fileName = $this->get("hyperbolaa_image")->resizeUpload($name);
            $entity->setName($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirectToRoute('admin_news');
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing News entity.
     *
     * @Route("/{id}/edit", name="admin_news_edit")
     * @Method("GET")
     * @Template("ShopAdminBundle:News:new.html.twig")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ShopAdminBundle:News')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find News entity.');
        }

        $editForm = $this->createForm(new NewsType(), $entity, array(
            'action' => $this->generateUrl('admin_news_update', array('id' => $entity->getId())),
            'method' => 'POST',
        ));

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }


    /**
     * Edits an existing News entity.
     *
     * @Route("/{id}", name="admin_news_update")
     * @Method("POST")
     * @Template("ShopAdminBundle:News:new.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ShopAdminBundle:News')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find News entity.');
        }

        $editForm = $this->createForm(new NewsType(), $entity, array(
            'action' => $this->generateUrl('admin_news_update', array('id' => $entity->getId())),
            'method' => 'POST',
        ));

        $formName   = $editForm->getName();
        $fileBag    = $request->files->get($formName);
        if(!isset($fileBag['name'])){
            $originName = $entity->getName();
        }

        $originTime = $entity->getCreateTime();
        $editForm->handleRequest($request);
        if ($editForm->isValid()) {

            //图片处理
            if(isset($originName)){
                $entity->setName($originName);
            }else{
                $name = $entity->getName();
                $path = $this->get('hyperbolaa_image')->normalUpload($name);
                $entity->setName($path);
            }

            $entity->setCreateTime($originTime);
            $em->persist($entity);
            $em->flush();

            return $this->redirectToRoute('admin_news');
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        );
    }


    /**
     * Deletes a News entity.
     *
     * @Route("/{id}", name="admin_news_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        if($request->isXmlHttpRequest()){
            if(intval($id) > 0){
                $entity = $this->getAdminRepository('news')->find($id);
                if (!$entity) {
                    return $this->setAjaxMsg('info', 'Cant find entity:ShopAdminBundle:News')->jsonResponse();
                }
                //逻辑删除
                $entity->setIsDelete(1);
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                $this->setAjaxMsg('success',true);
            }
        }
        return $this->jsonResponse();
    }


    /**
     * @param int $perPage
     * @return array
     */
    private function make($perPage=10){
        $request = Request::createFromGlobals();
        $page    = $request->query->get('page');
        $page    = max($page, 1);

        $repository   = $this->getDoctrine()->getManager()->getRepository("ShopAdminBundle:News");
        $entities     = $repository->getList($page,$perPage);
        $record_count = $repository->getCount();
        $pageArr      = $this->get('paginator')->make($record_count,$perPage);


        return array(
            'entities'      => $entities,
            'record_count'  => $record_count,
            'page_count'    => $pageArr['page_count'],
            'page_str'      => $pageArr['page_str']
        );
    }





}
