<?php
namespace View;
    class RenderView{

        public static function render($page, $param){
            foreach($param as $key => $value){
                $$key = $value;
            }

            ob_start();
            include "$page";
            $content = ob_get_contents();
            ob_end_clean();

            ob_start();
            include "layout/layout.php";
            $include = ob_get_contents();
            ob_end_clean();

            return  $include;
        } 
    }
?>