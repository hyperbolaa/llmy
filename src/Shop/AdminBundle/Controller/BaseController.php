<?php

namespace Shop\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityRepository;

use XBB\Pagination\Paginator;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use XBB\Uploader\FileUploader;


class BaseController extends Controller
{
    protected $bundleName;
    protected $ajaxMsg;

    public function __construct(){
        $this->bundleName='ShopAdminBundle';

        $this->ajaxMsg=[
            'success'=> false,
            'result'=> array(),
            'info'=> ''
        ];
    }

    /**
     * paginator wrapper
     *
     * @param EntityRepository $repo
     *
     * @return array
     */
    public function paginate(EntityRepository $repo){
        return Paginator::make($repo);
    }


    /**
     * @param $file
     * @return string|\XBB\Uploader\fileName
     */
    public function handleUpload($file){
        if(!$file instanceof UploadedFile){
            return $file;
        }

        $uploader=new FileUploader();
        $fileName= $uploader->handle($file);
        return $fileName ? $fileName : '';
    }



    /**
     * @param array $opt
     * @return $this
     */
    public function setAjaxMsg($opt=array()){
        $args=func_get_args();
        if(count($args) == 1 && is_array($opt) && !empty($opt)){
            foreach($opt as $name=> $val){
                if(array_key_exists($name, $this->ajaxMsg)){
                    $this->ajaxMsg[$name]=$val;
                }
            }
        }
        elseif (count($args)==2 && is_string($args[0])){
            $key=$args[0];
            if(array_key_exists($key, $this->ajaxMsg)){
                $this->ajaxMsg[$key]=$args[1];
            }
        }
        return $this;
    }

    /**
     * @param array $data
     * @return Response
     */
    public function jsonResponse($data=array()){
        $response= new Response();

        $this->setAjaxMsg($data);

        $response->setContent(json_encode($this->ajaxMsg))
            ->headers->set('Content-Type','application/json');

        return $response;
    }


    /**
     * @param $entityName
     * @param Request $request
     * @param $id
     * @return Response
     */
    protected function deleteRow($entityName, Request $request, $id){
        if($request->isXmlHttpRequest()){

            if(intval($id) > 0){
                $em = $this->getDoctrine()->getManager();
                $entity=$this->getRepo($entityName)->find($id);

                if (!$entity) {
                    return $this->setAjaxMsg('info', 'Cant find entity:'. ucfirst($entityName))
                        ->jsonResponse();
                }

                //逻辑删除
                $entity->setIsDelete(1);
                $em->persist($entity);
                $em->flush();
                $this->setAjaxMsg('success',true);
            }

        }
        return $this->jsonResponse();
    }

    /**
     * 给表单实体设置可以忽略的字段
     *
     * @param $entity
     * @param $optional
     */
    public function setOptional($entity, $optional){
        if(is_array($optional) && !empty($optional)){
            foreach($optional as $item){
                $propName=ucfirst($item);

                if(! $entity->{"get".$propName}() ){
                    $entity->{"set".$propName}(null);
                }
            }
        }
        return;
    }

    /**
     * 根据repository名称获取可用数据列表
     *
     * @param string $repo_name
     *
     * @return array
     */
    protected function getAvailableList($repo_name=''){
        if(empty($repo_name)){
            return [];
        }
        $repo = $this->getRepo($repo_name);
        if(method_exists($repo, 'getAvailableList')){
            return $repo->getAvailableList();
        }else{
            throw $this->createNotFoundException('repository '. $repo_name.' does not hava method getAvailableList');
        }
    }

    /**
     * 获取IndexBundle数据仓储
     * @param $repo_name
     * @return mixed
     */
    protected function getIndexRepository($repo_name){
        $em=$this->getDoctrine()->getManager();
        return $em->getRepository('ShopIndexBundle:' . ucfirst($repo_name));
    }


    /**
     *获取AdminBundle数据仓储
     * @param $repo_name
     * @return mixed
     */
    protected function getAdminRepository($repo_name){
        $em=$this->getDoctrine()->getManager();
        return $em->getRepository('ShopAdminBundle:' . ucfirst($repo_name));
    }



    /**
     *  获取后台用户名称
     *  return string
     */
    protected function getSessionName(){
        $session = $this->get('session');
        $userInfo = $session->get('user');
        return $userInfo ? $userInfo['name'] : '';
    }


}
