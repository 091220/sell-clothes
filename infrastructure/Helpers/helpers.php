<?php

if (!function_exists('h_paginate')) {
    function h_paginate($jobs){
        $html = '';
        if ($jobs->hasPages()){
            $html .= '<div class="data-table-toolbar">';
            $html .= '<ul class="pagination">';
            if ($jobs->onFirstPage()){
                $html .= '<li class="disabled"><a>&laquo;</a></li>';
            }else{
                $html .= '<li><a href="'.$jobs->previousPageUrl().'" rel="prev">&laquo;</a></li>';
            }
            for($i = 1; $i <= $jobs->lastPage(); $i++){
                $class = ($jobs->currentPage() == $i) ? ' active' : '';
                $html .= '<li class="'.$class.'">';
                $html .= '<a href="'.$jobs->url($i).'">'.$i.'</a>';
                $html .= '</li>';
            }
            if($jobs->hasMorePages()){
                $html .= '<li><a href="'.$jobs->nextPageUrl().'" rel="next">&raquo;</a></li>';
            }else{
                $html .= '<li class="disabled"><a>&raquo;</a></li>';
            }
            $html .= '</ul>';
            $html .= '</div>';
        }
        return $html;
    }
}
