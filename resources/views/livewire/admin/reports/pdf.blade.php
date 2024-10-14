<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan CSR</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .table-container {
            overflow-x: auto;
            margin-bottom: 20px;
        }

        table {
            min-width: 100%;
            background-color: white;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
        }

        thead {
            background-color: #e2e2e2;
            color: #4a4a4a;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.15s ease-in-out;
        }

        .status {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-approved {
            background-color: #d4edda;
            color: #155724;
        }

        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        .action-link {
            color: #007bff;
            text-decoration: none;
        }

        .action-link:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

<h1>Data Laporan CSR</h1>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>JUDUL LAPORAN</th>
                <th>MITRA</th>
                <th>LOKASI</th>
                <th>REALISASI</th>
                <th>TGL REALISASI</th>
                <th>LAPORAN DIKIRIM</th>
                <th>STATUS</th>

            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->title }}</td>
                <td>{{ $report->mitra }}</td>
                <td>{{ $report->lokasi }}</td>
                <td>Rp. {{ number_format($report->realisasi, 2, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($report->tgl_realisasi)->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($report->laporan_dikirim)->format('d-m-Y') }}</td>
                <td>
                    <span class="status 
                        {{ $report->status === 'pending' ? 'status-pending' : ($report->status === 'approved' ? 'status-approved' : 'status-rejected') }}">
                        {{ ucfirst($report->status) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
