<?= $this->extend('dashboard/template'); ?>


<?= $this->section('content'); ?>

<p>suara masuk <?= $resultsCount; ?> dari <?= $votersCount; ?> voters = <?= ($resultsCount && $votersCount) ? ($resultsCount / $votersCount) * 100 . '%' : '0%'; ?></p>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div class="lg:flex">
    <div id="myChart" style="width:100%; max-width:600px; height:500px;">
    </div>

    <div id="myChart2" style="width:100%; max-width:600px; height:500px;">
    </div>
</div>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Nama', 'Jumlah'],
            <?php foreach ($ketuaCount as $ketua) : ?>["<?= $ketua->ketua_name; ?>", <?= $ketua->count; ?>], <?php endforeach ?>
        ]);

        var options = {
            title: 'Hasil Suara Ketua'
        };

        var chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Nama', 'Jumlah'],
            <?php foreach ($wakilCount as $wakil) : ?>["<?= $wakil->wakil_name; ?>", <?= $wakil->count; ?>], <?php endforeach ?>
        ]);

        var options = {
            title: 'Hasil Suara Wakil'
        };

        var chart = new google.visualization.PieChart(document.getElementById('myChart2'));
        chart.draw(data, options);
    }
</script>

<?= $this->endSection(); ?>