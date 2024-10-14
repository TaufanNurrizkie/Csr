<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Project</title>
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
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
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            color: #4a4a4a;
            font-weight: bold;
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

        .status-terbit {
            background-color: #d4edda;
            color: #155724;
        }

        .status-lain {
            background-color: #fff3cd;
            color: #856404;
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

<h1>Data Project</h1>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Lokasi</th>
                <th>Jumlah Mitra</th>
                <th>Tgl Mulai</th>
                <th>Tgl Akhir</th>
                <th>Tgl Diterbitkan</th>
                <th>Status</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->judul }}</td>
                <td>{{ $project->lokasi }}</td>
                <td>{{ $project->jumlah_mitra > 0 ? $project->jumlah_mitra : '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($project->tgl_mulai)->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($project->tgl_akhir)->format('d M Y') }}</td>
                <td>{{ $project->tgl_diterbitkai ? \Carbon\Carbon::parse($project->tgl_diterbitkai)->format('d M Y') : '-' }}</td>
                <td>
                    <span class="status {{ $project->status === 'Terbit' ? 'status-terbit' : 'status-lain' }}">
                        {{ $project->status }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
