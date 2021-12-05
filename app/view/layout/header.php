<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/public_html/index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <style>
        body {
            background-color: white !important;
            width: 50%;
            margin-left: 25%;
            margin-right: 25%;
            margin-top: 2rem !important;

            padding: 5%;


            box-sizing: border-box;
            display: flex;
            flex-direction: column;

            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }

        .UserInput {
            display: flex;
            flex-direction: column;
            background-color: white !important;
        }

        #myChart {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 5%;
            margin-left: 5%;
        }

        .singleReviewBox {
            margin-top: 2rem;
        }


        .fileReviewBox {
            margin-top: 2rem;
        }

        #singleSubmit {
            position: relative;
            right: 0%;
            margin-left: 2rem;
        }

        #fileSubmit {
            position: relative;
            right: 0%;
            margin-left: 2rem;
        }

        #singleReview {
            left: 0px;
            margin-right: 2rem;
            width: 50%;
        }


        #fileReview {
            left: 0px;
            margin-right: 2rem;
            width: 50%;
        }

        .singleReviewInputBox {
            display: flex;
            width: 100%;
            flex-direction: row;
            justify-content: start;
            margin: 0;
            padding: 0;
        }

        .fileReviewInputBox {
            display: flex;
            flex-direction: row;
            justify-content: start;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        footer {
<<<<<<< Updated upstream
            position: static;
=======
>>>>>>> Stashed changes
            display: flex;
            margin-top: 5%;
            bottom: 0px;
        }
    </style>
</head>

<body>