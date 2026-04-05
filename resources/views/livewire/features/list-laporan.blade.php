<div class="card">
    <div class="card-header">
        <h4 class="card-title">List Laporan</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Pelapor</th>
                        <th>Aksi</th>
                </thead>
                <tbody>
                    @forelse ($listLaporan as $laporan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $laporan->judul }}</td>
                        <td>{{ $laporan->tanggal }}</td>
                        <td>
                            @if ($laporan->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                            @elseif ($laporan->status == 'proses')
                            <span class="badge bg-info">Proses</span>
                            @else
                            <span class="badge bg-success">Selesai</span>
                            @endif

                        </td>
                        <td>{{ $laporan->pelapor->name }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
