<?php

// 1. Array multidimensi
$matkul = [
    ["nama" => "Pemrograman Web", "sks" => 3, "nilai" => 85],
    ["nama" => "Basis Data", "sks" => 3, "nilai" => 72],
    ["nama" => "Algoritma", "sks" => 4, "nilai" => 65],
    ["nama" => "Jaringan Komputer", "sks" => 2, "nilai" => 45],
    ["nama" => "Sistem Operasi", "sks" => 3, "nilai" => 90],
];

// 2. Fungsi helper
function hitungBobot($nilai)
{
    if ($nilai >= 80) {
        return ["huruf" => "A", "bobot" => 4.0];
    } elseif ($nilai >= 70) {
        return ["huruf" => "B", "bobot" => 3.0];
    } elseif ($nilai >= 60) {
        return ["huruf" => "C", "bobot" => 2.0];
    } elseif ($nilai >= 50) {
        return ["huruf" => "D", "bobot" => 1.0];
    } else {
        return ["huruf" => "E", "bobot" => 0.0];
    }
}

$totalSks = 0;
$totalBobotSks = 0;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Latihan PHP IPS</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            margin:20px;
        }
        table{
            border-collapse: collapse;
            width: 80%;
        }
        th, td{
            border:1px solid black;
            padding:8px;
            text-align:center;
        }
        th{
            background:#ddd;
        }
        .mengulang{
            background-color:#ffb3b3;
        }
    </style>
</head>
<body>

<h2>Data Nilai Mahasiswa</h2>

<table>
    <tr>
        <th>Mata Kuliah</th>
        <th>SKS</th>
        <th>Nilai</th>
        <th>Huruf</th>
        <th>Status</th>
    </tr>

    <?php foreach($matkul as $m): ?>

        <?php
        $hasil = hitungBobot($m["nilai"]);

        $status = ($hasil["bobot"] >= 2.0)
            ? "LULUS"
            : "MENGULANG";

        $totalSks += $m["sks"];
        $totalBobotSks += $m["sks"] * $hasil["bobot"];
        ?>

        <tr class="<?= ($status == 'MENGULANG') ? 'mengulang' : '' ?>">
            <td><?= $m["nama"] ?></td>
            <td><?= $m["sks"] ?></td>
            <td><?= $m["nilai"] ?></td>
            <td><?= $hasil["huruf"] ?></td>
            <td><?= $status ?></td>
        </tr>

    <?php endforeach; ?>

</table>

<?php
$ips = $totalBobotSks / $totalSks;

if ($ips >= 3.00) {
    $maksSks = 24;
} else {
    $maksSks = 20;
}
?>

<h3>Ringkasan</h3>

<p><b>Total SKS:</b> <?= $totalSks ?></p>
<p><b>IPS:</b> <?= number_format($ips, 2) ?></p>
<p><b>Maksimal SKS Semester Depan:</b> <?= $maksSks ?> SKS</p>

</body>
</html>