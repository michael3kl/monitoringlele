<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
		th {
			text-align: center;
			padding: 10px;
		}
		td {
			padding-left: 5px;
			vertical-align: super;
		}
		h3 {
			text-align: center;
		}
		body {
			font-variant: normal;
			font-size: 9pt;
		}
    </style>
</head>
<body>
    <h3>Agenda Monitoring</h3>
    <br>
    <table border="all">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Hari / Tanggal</th>
                <th rowspan="2">Customer</th>
                <th rowspan="2">Bibit</th>
                <th rowspan="2">Ikan mati</th>
                <th rowspan="2">Jadwal Jam</th>
                <th rowspan="2">Jumlah Pakan yang Diberikan</th>
                <th rowspan="2">Tinggi Air</th>
                <th rowspan="2">Diberi Antibiotik</th>
                <th rowspan="2">Keterangan</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($agenda) {
            $no = 1; 
        foreach ($agenda as $value) {
        ?><tr>
        
            <td width="2%" align="center"><?= $no++; ?></td>
            <td width="5%"><?= $value->hari.', <br> '.$value->tg.' - '.$value->bl.' - '.$value->th; ?></td>
            <td width="5%" align="center"><?= $value->nama_customer; ?></td>
            <td width="5%" align="center"><?= $value->bibit ?></td>
            <td width="5%" align="center"><?= $value->status_mati ?></td>
            <td width="5%" align="center">Mulai di jam <?= $value->jam_mulai?></td>
            <td width="5%" align="center"><?= $value->jumlah_pakan ?></td>
            <td width="5%" align="center"><?= $value->tinggi_air ?></td>
            <td width="5%" align="center"><?= $value->antibiotik ?></td>
            <td width="10%"><?= $value->keterangan ?></td>
            </tr>
        <?php
        }
        } else {
           echo "<tr><td style='vertical-align:middle;font-size:12pt' height='30px' colspan='10'>Tidak ada data agenda</td></tr>";
        }
        
       
        ?>
        </tbody>
    </table>
</body>
</html>