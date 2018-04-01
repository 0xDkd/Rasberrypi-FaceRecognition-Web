<?php
namespace framework\tools;
/**
 * Page num control
 * Class Page
 * @package framework\tools
 */
class Page
{

    private $total_pages = 100;     //数据库总的记录数
    private $pagesize = 6;          //每页显示多少条数据
    private $now_page = 5;          //当前是第几页
    private $url  = '';             //跳转的页面地址（不同的项目跳转时的地址不一样的）
    private $keyword;               //额外的参数
    
    //提供set、get该方法赋值、读取值
    public function __set($p,$v)
    {
        if(property_exists($this, $p)){
            $this->$p = $v;
        }
    }
    public function __get($p)
    {
        if(property_exists($this, $p)){
            return $this->$p;
        }
    }
    
    //开始动态创建分页导航

    /**
     * @desc
     * @return string
     */
    public function create()
    {
        //定义首页的导航按钮
        $first = 1;
        $first_active = $this->now_page == 1 ? 'active':'';
        $url = $this->url.'?page=';
        
        $keyword = '';
        if($this->keyword !=''){
            $keyword = '&keyword='.$this->keyword;
        }

        
        $page = <<<HTML
          <ul class="pagination">
            
			 <li class="$first_active"><a href="$url$first$keyword">首页</a></li>
HTML;
        //中间是动态生成的导航按钮
        //先计算出有多少页（假设100/6==16.xx）,为了让内容都显示宁可多创建一页，也不能少创建
        $page_count = ceil($this->total_pages / $this->pagesize);
        for($i=$this->now_page-3;$i<=$this->now_page+3;$i++){
            if($i<2 || $i>$page_count-1){
                continue;
            }
            $active = $this->now_page == $i ? 'active' :'';
            $page .= <<<HTML
                <li class="$active"><a href="$url$i$keyword">$i</a></li>
HTML;
        }        
        //定义尾页的导航按钮
        $last_active = $this->now_page == $page_count ? 'active':'';
        $page .= <<<HTML
            <li class="$last_active"><a href="$url$page_count$keyword">尾页</a></li>
		</ul>
HTML;
        return $page;
    }
}