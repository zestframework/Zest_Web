<?php

/**
 * This file is part of the Zest Framework.
 *
 * @author   Malik Umer Farooq <lablnet01@gmail.com>
 * @author-profile https://www.facebook.com/malikumerfarooq01/
 *
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 * @license MIT
 */

namespace App\Classes;

class Pagination
{
    private $totalItems;
    private $itemPerPage = 6;
    private $current;
    private $baseUrl;
    private $urlAppend;
    public function __construct($total = 10,$perPage = 6,$current = 1 , $urlAppend = '/')
    {
    	$this->setTotalItems($total);
    	$this->setItmPerPage($perPage);
    	$this->setCurrentPage($current);
    	$this->setBaseUrl();
    	$this->setUrlAppend($urlAppend);
    }
    public function setUrlAppend($append)
    {
    	$this->urlAppend = $append;
    }
    public function setCurrentPage($current)
    {
    	return ($items >= 0) ? $this->current = $current : false;
    }
    public function setBaseUrl()
    {
    	$this->baseUrl = site_base_url();
    	return $this;
    }
    public function setItmPerPage($item)
    {
    	return ($item > 0) ? $this->itemPerPage = $item : false;
    }
    public function setTotalItems($items)
    {
    	return ($items > 0) ? $this->totalItems = $items : false;
    }
    public function get()
    {
    	return $this->totalItems;
    }
    public function generateLink($number)
    {
    	return $this->baseUrl.$this->urlAppend.$number . ' ';
    }
    public function pagination()
    {
    	$pageCount = ceil($this->totalItems / $this->itemPerPage);
        $current_range = [($this->current - 2 < 1 ? 1 : $this->current - 2), ($this->current + 2 > $pageCount ? $pageCount : $this->current + 2)];
       $first_page = $this->current > 5 ? '<li><a href="'.$this->baseUrl.$this->urlAppend . '1'.'">'.printl('first:page:pagination').'</a></li>'.($this->current < 5 ? ', ' : ' <li><a href="#!" class="disable" disabled >...</a></li> ') : null;
       $last_page = $this->current < $pageCount - 2 ? ($this->current > $pageCount - 4 ? ', ' : ' <li><a href="#!" class="disable" disabled >...</a></li>  ').'<li><a href="'.$this->baseUrl.$this->urlAppend . $pageCount.'">'.printl('last:page:pagination').'</a></li>' : null;
       $previous_page = $this->current > 1 ? '<li><a href="'.$this->baseUrl.$this->urlAppend . ($this->current - 1) .'">Previous</a></li> | ' : null;
       $next_page = $this->current < $pageCount ? ' | <li><a href="'.$this->baseUrl .$this->urlAppend .($this->current+1).'">Next</a></li>' : null;
       for ($x = $current_range[0]; $x <= $current_range[1]; ++$x)
               $pages[] = '<li><a href="'.$this->baseUrl.$this->urlAppend.$x.'" '.($x == $this->current ? 'class="active"' : '').'>'.$x.'</a></li>';
       if ($pageCount > 1)
               return '<ul class="pagination"> '.$previous_page.$first_page.implode(', ', $pages).$last_page.$next_page.'</ul>';
       
    }
    public function __toString()
    {
        $this->pagination();
    }
}
