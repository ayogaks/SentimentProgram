<?php

$title = "Ramen's Sentiment Analysis App";

echo "<b>Ramen's Sentiment Analysis App</b>";

echo "<p>Melakukan analisis terhadap data review ramen dan melakukan klasifikasi emosi terhadap review yang diberikan. Pemahaman makna dan emosi dari data ulasan itu penting untuk mengetahui apakah emosi seorang pelanggan kepada 
produk berupa emosi positif atau negatif.</p>";
?>

<?php
    echo "<p textalign:justify;><b>User's Input</p></b></br>";
?>

<div class="UserInput">
    <form action="/" method="POST" enctype="multipart/form-data">
        <div>
            <label>Multiple Review Analysis</label>
            <input type="file" accept=".csv" name="fileReview" id="fileReview" />
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>

    <form action="/" method="GET">
        <div>
            <label>Single Review Analysis</label>  
            <input type="text" name="singleReview">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

<?php
if (isset($sentiments)) {
    echo "<canvas id=\"myChart\" style=\"width:100%;max-width:600px\"></canvas>";
}
?>

<?php
if (isset($sentiment) && $sentiment != 0) {
    echo "<br> Hasil dari review produk Anda merupakan sentimen <strong>" . ($sentiment > 0 ? "Positif" : "Negatif") . "</strong>.</p></br>";
}
?>

<script>
    var xValues = [-1, 1];
    var yValues =
        <?php
    
        $counts = [0, 0];
        if (isset($sentiments)) {
            foreach ($sentiments as  $val) {
                if ($val == 1) {
                    $counts[1] = $counts[1] + 1;
                } else if ($val == -1) {
                    $counts[0] = $counts[0] + 1;
                }
            }
        }

        echo "[ $counts[0] , $counts[1] ]";
        ?>;

    var barColors = ["aqua", "aqua"];
    var chartTitle = <?php if (isset($fileReview)) {
                            echo "\"Sentiment dari file " . str_replace("app/uploads/", "", $fileReview) . "\"";
                        } else {
                            echo "\"Sentiment dari file\"";
                        } ?>;
    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: chartTitle

            },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        stepSize: 1
                    }
                }]
            }
        }
    });
</script>