<?php
namespace View;
    class RenderFile{

        public static function render($page, $param){
            foreach($param as $key => $value){
                $$key = $value;
            }

            ob_start();
            include "$page";
            $content = ob_get_contents();
            ob_end_clean();


            return  $content;
        } 
    }
?>