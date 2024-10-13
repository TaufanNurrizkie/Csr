<!DOCTYPE html>
<html>
<head>
    <title>Projects PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Daftar Proyek</h1>
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
                <td>{{ $project->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
