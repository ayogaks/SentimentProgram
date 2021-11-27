<?php

namespace Model;

class Sentiment
{

    public function handleSentiment($review, $isAFile = false)
    {

        $cwd = getcwd();

        $path_to_model = "\\pythonmodel\\test.py";

        // echo "Executing " . $cwd . $path_to_model;

        if ($isAFile) {
            #jalanin script yang bakal handle input text 1 review
            $pyout = exec("python " . $cwd . $path_to_model." $review");
        } else {
            #jalanin script yang bakal handle input file review
            $pyout = exec("python " . $cwd . $path_to_model." -f $review");
        }
    }
}
