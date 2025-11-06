<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Karyawan - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ time() }}">
</head>
<body class="admin-body admin-purple-theme">
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('admin.karyawan') }}" class="navbar-brand">Kelola Karyawan</a>
            <ul class="navbar-nav">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.departemen') }}">Departemen</a></li>
                <li><a href="{{ route('admin.plant') }}">Plant</a></li>
                <li><a href="{{ route('admin.karyawan') }}">Karyawan</a></li>
                <li><a href="{{ route('admin.pengguna') }}">Pengguna</a></li>
                <li><a href="{{ route('admin.absen') }}">Absen</a></li>
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-logout">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-admin">
        <div class="card">
            <div class="card-header">
                <h2>Daftar Karyawan</h2>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success" style="margin-bottom: 8px;">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" style="margin-bottom: 8px; background: #ef4444; color: white; padding: 12px 16px; border-radius: 8px;">
                        {{ session('error') }}
                    </div>
                @endif

                @if(request('search'))
                    <div class="alert alert-info" style="margin-bottom: 8px; background: linear-gradient(135deg, #3b82f6, #2563eb); color: white; padding: 12px 16px; border-radius: 8px;">
                        🔍 Hasil pencarian untuk "<strong>{{ request('search') }}</strong>": Ditemukan <strong>{{ $karyawan->total() }}</strong> karyawan
                    </div>
                @endif

                <div style="margin-bottom: 20px; display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                    <form action="{{ route('admin.karyawan') }}" method="GET" style="flex: 1; min-width: 250px; display: flex; gap: 8px;">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control" 
                            placeholder="Cari karyawan (nama, NIK, jabatan, email, no telp, departemen, plant)..." 
                            value="{{ request('search') }}"
                            style="flex: 1; padding: 10px 14px; border: 1px solid var(--gray-200); border-radius: 8px; font-size: 14px;">
                        <button type="submit" class="btn-purple" style="padding: 10px 20px; white-space: nowrap;">
                            🔍 Cari
                        </button>
                        @if(request('search'))
                            <a href="{{ route('admin.karyawan') }}" class="btn-purple" style="padding: 10px 20px; white-space: nowrap; background: linear-gradient(135deg, #6b7280, #4b5563); text-decoration: none;">
                                ✕ Reset
                            </a>
                        @endif
                    </form>
                    <a href="{{ route('admin.karyawan.create') }}" class="btn-purple">
                        + Tambah Karyawan
                    </a>
                    <form action="{{ route('admin.karyawan.import') }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                        @csrf
                        <label for="excel_file" class="btn-purple" style="cursor: pointer; margin: 0;">
                            📥 Import Excel
                            <input type="file" id="excel_file" name="excel_file" accept=".xlsx,.xls,.csv" style="display: none;" onchange="this.form.submit()">
                        </label>
                    </form>
                    <a href="{{ route('admin.karyawan.template') }}" class="btn-purple" style="background: linear-gradient(135deg, #10b981, #059669);">
                        📄 Download Template
                    </a>
                    <form action="{{ route('admin.karyawan.kirimUndangan') }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin mengirim undangan ke semua karyawan yang memiliki email?')">
                        @csrf
                        <button type="submit" class="btn-purple" style="background: linear-gradient(135deg, #3b82f6, #2563eb);">
                            📧 Kirim Undangan ke Semua
                        </button>
                    </form>
                </div>

                <div class="table-wrapper" style="max-height: 600px; overflow-y: auto; border: 1px solid var(--gray-200); border-radius: 8px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Lengkap</th>
                                <th>NIK</th>
                                <th>Jabatan</th>
                                <th>Email</th>
                                <th>No Telp</th>
                                <th>Departemen</th>
                                <th>Plant</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($karyawan as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_lengkap }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->jabatan ?? '-' }}</td>
                                    <td>{{ $item->email ?? '-' }}</td>
                                    <td>{{ $item->no_telp ?? '-' }}</td>
                                    <td>{{ $item->departemen->nama ?? '-' }}</td>
                                    <td>{{ $item->plant->nama ?? '-' }}</td>
                                    <td>
                                        <div style="display: flex; gap: 4px; flex-wrap: wrap;">
                                            <a href="{{ route('admin.karyawan.detail', $item->id) }}" class="btn-purple" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed); text-decoration: none; padding: 4px 8px; border-radius: 4px; font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; min-width: 32px; height: 32px;" title="Detail">
                                                📋
                                            </a>
                                            <a href="{{ route('admin.karyawan.edit', $item->id) }}" class="btn-warning" style="padding: 4px 8px; border-radius: 4px; font-size: 14px; display: inline-flex; align-items: center; justify-content: center; min-width: 32px; height: 32px; text-decoration: none;" title="Edit">
                                                ✏️
                                            </a>
                                            @if($item->email)
                                                <form action="{{ route('admin.karyawan.kirimUndanganSatu', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin mengirim undangan ke {{ $item->nama_lengkap }}?')">
                                                    @csrf
                                                    <button type="submit" class="btn-purple" style="background: linear-gradient(135deg, #3b82f6, #2563eb); padding: 4px 8px; border-radius: 4px; font-size: 14px; display: inline-flex; align-items: center; justify-content: center; min-width: 32px; height: 32px; cursor: pointer;" title="Kirim Email">
                                                        📧
                                                    </button>
                                                </form>
                                            @endif
                                            <form action="{{ route('admin.karyawan.delete', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn-danger" onclick="return confirm('Yakin ingin menghapus?')" style="padding: 4px 8px; border-radius: 4px; font-size: 14px; display: inline-flex; align-items: center; justify-content: center; min-width: 32px; height: 32px;" title="Hapus">
                                                    🗑️
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" style="text-align: center; padding: 20px; color: #6b7280;">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pagination">
                    {{ $karyawan->links('pagination::simple-bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
