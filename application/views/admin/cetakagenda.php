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
                <th rowspan="2">Kelas</th>
                <th rowspan="2">Jam Ke</th>
                <th rowspan="2">Materi</th>
                <th rowspan="2">Selesai / Belum</th>
                <th colspan="3">Absensi</th>
                <th rowspan="2">Keterangan</th>
            </tr>
            <tr>
                <th>Sakit</th>
                <th>Ijin</th>
                <th>T. Keterangan</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($agenda) {
            $no = 1; 
        foreach ($agenda as $value) {
        ?><tr>
        
            <td><?= $no++; ?></td>
            <td style="padding-right: 5px"><?= $value->hari.', <br> '.$value->tg.' - '.$value->bl.' - '.$value->th; ?></td>
            <td><?= $value->kelas; ?></td>
            <td width="3%"><?php if ($value->jam_mulai == $value->jam_selesai) {
                echo $value->jam_mulai;
            } else {
                echo $value->jam_mulai.' - '.$value->jam_selesai;
            }
            ?></td>
            <td width="20%"><?= $value->materi; ?></td>
            <td width="6%"><?php if ($value->selesai == '1') {
                echo "Selesai";
            } else {
                echo "Belum selesai";
            }
            ?></td>
            <td width="12%"><?=substr($value->sakit,0,-2);?></td>
            <td width="12%"><?=substr($value->ijin,0,-2);?></td>
            <td width="12%"><?=substr($value->bolos,0,-2);?></td>
            <td width="10%"><?= $value->keterangan; ?></td>
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