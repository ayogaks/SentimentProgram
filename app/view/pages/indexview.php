<?php
#halaman viewnya di sini
#Yang diedit buat ditampilin ke client di bagian ini
$title = "Sentiment Analyzer";
if ($sentiment && $sentiment !== 0) {
    echo "<p>Sentimen merupakan sentimen <strong>" . ($sentiment > 0 ? " Positif" : " Negatif") . "</strong>.</p></br>";
}

echo '
<div class="sidenav">
<form action="/" method="get">
    <div>
        <label>Single Review Analysis</label>
        <label for="singleReview">Enter single review below: </label>
        <input type="text" name="singleReview">
        <button type="submit" >Submit</button>
    </div>
</form>

    <form action="/" method="post">
    <div>
        <label>Multiple Review Analysis</label>
        <label for="multipleReview">Upload .csv file</label>
        <input type="file" accept=".csv" name="fileReview"/>
        <button type="submit" >Submit</button>
    </div>
</form>
    
</div>
';
