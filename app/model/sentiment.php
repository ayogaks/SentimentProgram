<?php

namespace Model;

class Sentiment
{

    public static function handleSentiment($review, $isAFile = false)
    {

        $cwd = getcwd();
        $cwd = str_replace("\\", "/", $cwd);

        $path_to_model = "./app/model/pythonmodel/main.py";


        $pyout = 0;

        if (!$isAFile) {
            #jalanin script yang bakal handle input text 1 review
            $script = "python " . $path_to_model . " -r \"$review\"";
            // echo "<br>Script is $script";
            $pyout = exec($script);
        } else {
            #jalanin script yang bakal handle input file review
            $script = "python " . $path_to_model . " -f \"$review\"";
            $pyout = shell_exec("python " . $path_to_model . " -f $review");
        }

        // print_r($pyout);

        $pyout = str_replace("[", "", $pyout);
        $pyout = str_replace("]", "", $pyout);
        $pyout = explode(" ", $pyout);

        // unset($pyout[0]);



        return $pyout;
    }
}
