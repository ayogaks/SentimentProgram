<?php
#halaman viewnya di sini
#Yang diedit buat ditampilin ke client di bagian ini
$title = "Sentiment Analyzer";
if ($sentiment && $sentiment !== 0) {
    echo "<p>Melakukan analisis terhadap data review ramen dan melakukan klasifikasi emosi terhadap review yang diberikan. Pemahaman makna dan emosi dari data ulasan itu penting untuk mengetahui apakah emosi seorang pelanggan kepada 
    produk berupa emosi positif atau negatif" . ($sentiment > 0 ? " Positif" : " Negatif") . "</strong>.</p></br>";
}
?>

<div class="UserInput">
    <form action="/" method="get">
        <div>
            <label>Single Review Analysis</label>
            <label for="singleReview">Enter single review below: </label>
            <input type="text" name="singleReview">
            <button type="submit">Submit</button>
        </div>
    </form>

    <form action="/" method="post">
        <div>
            <label>Multiple Review Analysis</label>
            <label for="multipleReview">Upload .csv file</label>
            <input type="file" accept=".csv" name="fileReview" />
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

<?php
#Ini yang berubah" sesuai input
echo "<p>-- Masukan input pada User's Input untuk melihat makna ulasan" . ($sentiment > 0 ? " Positif" : " Negatif") . "</strong>.</p></br>";
?>
