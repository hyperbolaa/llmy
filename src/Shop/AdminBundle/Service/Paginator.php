<?php

namespace Shop\AdminBundle\Service;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;



class Paginator extends Controller
{

    public     $first_row;        //起始行数

    public     $list_rows;        //列表每页显示行数

    protected  $total_pages;      //总页数

    protected  $now_page;         //当前页数

    protected  $page_name;        //分页参数的名称

    public     $plus = 3;         //分页偏移量

    protected  $url;             //当前页面链接

    protected  $parameter = "";   //当前页面的参数


    /**
     * @param $totalRows
     * @param int $listRows
     * @param string $pageName
     * @return array
     */
    public function make($totalRows,$listRows=10,$pageName='page')
    {

        $request = Request::createFromGlobals();
        $page    = $request->query->get('page');
        $params  = $request->server->get('QUERY_STRING');


        $this->total_rows       = $totalRows;
        $this->list_rows        = $listRows ?: 10;
        $this->parameter        = $params ?: '';
        $this->page_name        = $pageName ?: 'page';
        $this->total_pages      = ceil($this->total_rows / $this->list_rows);
        $this->now_page         = max($page, 1);
        $this->now_page         = ($this->now_page < $this->total_pages) ? $this->now_page : $this->total_pages;

        $page_str = $this->makestr();

        return array(
            'page_count'   => $this->total_pages,
            'page_str'     => $page_str
        );
    }


    /**
     * 得到第一页
     * @return string
     */
    public function first_page($name = '首页')
    {

        return $this->_get_link('1', $name);

    }


    /**
     * 最后一页
     * @param $name
     * @return string
     */
    public function last_page($name = '末页')
    {

        return $this->_get_link($this->total_pages, $name);

    }

    /**
     * @param string $name
     * @return string
     */
    public function up_page($name = '上一页')
    {
        if($this->now_page > 1)
        {
            return $this->_get_link($this->now_page - 1, $name);
        }
        return '';
    }


    /**
     * @param string $name
     * @return string
     */
    public function down_page($name = '下一页')
    {
        if($this->now_page < $this->total_pages)
        {
            return $this->_get_link($this->now_page + 1, $name);
        }
        return '';
    }

    /**
     * 设置当前页面链接
     */
    protected function _set_url()
    {
        $url = "";
        if(isset($this->parameter)) {
            parse_str($this->parameter,$params);
            unset($params[$this->page_name]);
            if(!empty($params)){
                $url .=  '?'.http_build_query($params)."&";
            }else{
                $url .= '?';
            }
        }
        $this->url = $url;
    }

    /**
     * 得到$page的url
     * @param $page 页面
     * @return string
     */
    protected function _get_link($page,$text)
    {
        if($this->url === NULL)
        {
            $this->_set_url();
        }
        $url = $this->url . $this->page_name . '=' . $page;
        return '<li class="paginate_button"><a href="'.$url.'" >'.$text.'</a></li>';
    }


    /**
     * 展示分页
     * @return string
     */
    public function makestr()
    {
        $plus = $this->plus;
        if( ($plus + $this->now_page) > $this->total_pages){
            $begin = $this->total_pages - $plus * 2;
        }else{
            $begin = $this->now_page - $plus;
        }

        $begin  = max($begin, 1);
        $page_str = '';
        $page_str .= $this->first_page();
        for ($i = $begin; $i <= $begin + $plus * 2;$i++)
        {
            if($i <= $this->total_pages)
            {
                if($i == $this->now_page)
                {
                    $page_str .= '<li class="paginate_button active"><a href="javascript:;" >'.$i.'</a></li>';
                }
                else
                {
                    $page_str .= $this->_get_link($i,$i);
                }
            }else {
                break;
            }
        }
        $page_str .= $this->last_page();
        return $page_str;
    }

}