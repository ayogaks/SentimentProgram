<?php
#halaman viewnya di sini
#Yang diedit buat ditampilin ke client di bagian ini
$title = "Sentiment Analyzer";
echo "<p>Sentimen merupakan sentimen <strong>" . ($sentiment > 0 ? " Positif" : " Negatif") . "</strong>.</p></br>";



<div class="sidenav">
    <div>
        <label>Single Review Analysis</label>
        <label for="singleReview">Enter single review below: </label>
        <input type="text">
    </div>

    <div>
        <label>Multiple Review Analysis</label>
        <label for="multipleReview">Upload .csv file</label>
        <<input type="file" accept=".csv" />>
    </div>
</div>

