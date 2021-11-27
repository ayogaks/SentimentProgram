<?php

$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === "GET") {
    echo "Bagian pertama yg nampilin form input si sentimen. Kalo ada parameter review berarti inputnya sentimen dalam bentuk teks";
} else if ($request_method === "GET") {

    echo "Bagian handle request yang ada input sentimen dalam bentuk file";

    #Pura2nya bagian ini ngejalanin si script Random Forest
    # Outputnya dari si script (-1 atau +1) disimpan di $pyout 
    $cwd = getcwd();
    // echo $cwd;
    $path_to_model = "\\model\\test.py";

    echo "Executing " . $cwd . $path_to_model;

    $pyout = exec("python " . $cwd . $path_to_model);

    echo $pyout;
}
