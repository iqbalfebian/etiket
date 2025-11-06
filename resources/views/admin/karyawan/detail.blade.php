<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Karyawan - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ time() }}">
</head>
<body class="admin-body admin-purple-theme">
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('admin.karyawan') }}" class="navbar-brand">Detail Karyawan</a>
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
        <div class="card" style="max-width: 800px; margin: 0 auto;">
            <div class="card-header">
                <h2>Detail Karyawan</h2>
            </div>
            <div class="card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">
                    <!-- Info Karyawan -->
                    <div>
                        <h3 style="color: var(--purple-700); margin-bottom: 20px; font-size: 20px;">Informasi Karyawan</h3>
                        <div style="background: var(--purple-50); padding: 20px; border-radius: 12px;">
                            <div style="margin-bottom: 15px;">
                                <strong style="color: var(--purple-700); display: block; margin-bottom: 5px;">Nama Lengkap:</strong>
                                <span style="color: #333;">{{ $karyawan->nama_lengkap }}</span>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="color: var(--purple-700); display: block; margin-bottom: 5px;">NIK:</strong>
                                <span style="color: #333; font-weight: 600; font-size: 18px;">{{ $karyawan->nik }}</span>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="color: var(--purple-700); display: block; margin-bottom: 5px;">Jabatan:</strong>
                                <span style="color: #333;">{{ $karyawan->jabatan ?? '-' }}</span>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="color: var(--purple-700); display: block; margin-bottom: 5px;">Email:</strong>
                                <span style="color: #333;">{{ $karyawan->email ?? '-' }}</span>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="color: var(--purple-700); display: block; margin-bottom: 5px;">No Telp:</strong>
                                <span style="color: #333;">{{ $karyawan->no_telp ?? '-' }}</span>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="color: var(--purple-700); display: block; margin-bottom: 5px;">Departemen:</strong>
                                <span style="color: #333;">{{ $karyawan->departemen->nama ?? '-' }}</span>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <strong style="color: var(--purple-700); display: block; margin-bottom: 5px;">Plant:</strong>
                                <span style="color: #333;">{{ $karyawan->plant->nama ?? '-' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- QR Code -->
                    <div>
                        <h3 style="color: var(--purple-700); margin-bottom: 20px; font-size: 20px;">QR Code</h3>
                        <div style="background: white; padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            <div style="margin-bottom: 20px; display: flex; justify-content: center; align-items: center;">
                                {!! QrCode::size(250)->generate($karyawan->nik) !!}
                            </div>
                            <div style="background: var(--purple-50); padding: 15px; border-radius: 8px; margin-top: 20px;">
                                <p style="margin: 0; color: var(--purple-700); font-weight: 600; font-size: 14px;">
                                    Scan QR Code ini untuk absen
                                </p>
                                <p style="margin: 5px 0 0 0; color: #666; font-size: 12px;">
                                    NIK: {{ $karyawan->nik }}
                                </p>
                            </div>
                            <div style="margin-top: 20px;">
                                <button onclick="window.print()" class="btn-purple" style="padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600;">
                                    🖨️ Print QR Code
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display: flex; gap: 12px; justify-content: center; margin-top: 30px;">
                    <a href="{{ route('admin.karyawan') }}" class="btn-purple" style="text-decoration: none; padding: 10px 20px; border-radius: 8px;">
                        ← Kembali ke Daftar
                    </a>
                    <a href="{{ route('admin.karyawan.edit', $karyawan->id) }}" class="btn-warning" style="text-decoration: none;">
                        ✏️ Edit Karyawan
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

