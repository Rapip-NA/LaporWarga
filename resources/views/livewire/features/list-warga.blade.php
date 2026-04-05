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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No WhatsApp</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                </thead>
                <tbody>
                    @forelse ($listWarga as $warga)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $warga->name }}</td>
                            <td>{{ $warga->email }}</td>
                            <td>{{ $warga->no_whatsapp }}</td>
                            <td>{{ $warga->alamat }}</td>
                            <td>
                                <img src="{{ Storage::url($warga->foto) }}" alt="Foto" class="img-fluid w-25">
                            </td>
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
