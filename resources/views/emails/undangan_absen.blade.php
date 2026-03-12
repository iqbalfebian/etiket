<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Undangan Iftar Gathering Ramadhan</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      line-height: 1.6;
      color: #333;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f0f7f3;
    }

    .container {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
    }

    /* Banner atas */
    .banner {
      background: linear-gradient(135deg, #0d4a24 0%, #1a7a40 50%, #0d4a24 100%);
      padding: 28px 30px 20px;
      text-align: center;
      position: relative;
      border-bottom: 3px solid #d4af37;
    }

    .banner-subtitle {
      color: #a8d8b8;
      font-size: 12px;
      letter-spacing: 3px;
      text-transform: uppercase;
      margin: 0 0 6px;
    }

    .banner h1 {
      color: #f5d97e;
      margin: 0 0 4px;
      font-size: 28px;
      font-weight: 800;
      font-style: italic;
      text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .banner h2 {
      color: #ffffff;
      margin: 0 0 10px;
      font-size: 18px;
      font-weight: 700;
      letter-spacing: 1px;
    }

    .banner-year {
      display: inline-block;
      color: #d4af37;
      font-size: 13px;
      font-weight: 600;
      border: 1px solid #d4af37;
      border-radius: 4px;
      padding: 2px 10px;
    }

    .banner-divider {
      width: 80px;
      height: 2px;
      background: linear-gradient(90deg, transparent, #d4af37, transparent);
      margin: 12px auto;
    }

    .banner-company {
      color: #c8e6d4;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 1px;
      margin: 0;
    }

    /* Body content */
    .body-content {
      padding: 28px 30px;
    }

    .greeting {
      font-size: 15px;
      margin-bottom: 16px;
      color: #444;
    }

    .content {
      margin-bottom: 24px;
      color: #555;
      font-size: 14px;
    }

    /* Info box */
    .info-box {
      background: linear-gradient(135deg, #f0f9f4 0%, #e8f5ee 100%);
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 22px;
      border-left: 4px solid #1a7a40;
      border: 1px solid #c8e6d4;
      border-left: 4px solid #1a7a40;
    }

    .info-box-title {
      color: #0d4a24;
      font-weight: 700;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 14px;
    }

    .info-row {
      display: flex;
      justify-content: space-between;
      padding: 7px 0;
      border-bottom: 1px solid #d4edd9;
    }

    .info-row:last-child {
      border-bottom: none;
    }

    .info-label {
      font-weight: 600;
      color: #2d6a3f;
      font-size: 13px;
    }

    .info-value {
      color: #333;
      font-size: 13px;
      text-align: right;
    }

    .no-peserta-value {
      font-weight: 800;
      color: #b8860b;
      font-size: 16px;
      word-break: break-all;
    }

    /* QR Code section */
    .qrcode-section {
      text-align: center;
      margin: 24px 0;
      padding: 22px 20px;
      background: linear-gradient(135deg, #f8fdf9 0%, #f0f9f4 100%);
      border-radius: 10px;
      border: 1px solid #c8e6d4;
    }

    .qrcode-section h3 {
      color: #0d4a24;
      margin-bottom: 6px;
      font-size: 16px;
      font-weight: 700;
      letter-spacing: 1px;
    }

    .qrcode-image {
      margin: 18px 0;
    }

    /* Instruction box */
    .instruction {
      background: linear-gradient(135deg, #f0f9f4 0%, #e8f5ee 100%);
      padding: 16px 20px;
      border-radius: 10px;
      margin-top: 18px;
      border-left: 4px solid #28a745;
      border: 1px solid #c8e6d4;
      border-left: 4px solid #1a7a40;
    }

    .instruction h4 {
      color: #0d4a24;
      margin-top: 0;
      margin-bottom: 10px;
      font-size: 14px;
    }

    /* Agenda box */
    .agenda-box {
      background: linear-gradient(135deg, #fffbf0 0%, #fff8e1 100%);
      border: 1px solid #f0c040;
      border-left: 4px solid #d4af37;
      border-radius: 10px;
      padding: 16px 20px;
      margin: 20px 0;
    }

    .agenda-box-title {
      color: #856404;
      font-weight: 700;
      font-size: 13px;
      margin-bottom: 8px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .agenda-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
      margin-top: 6px;
    }

    .agenda-tag {
      background: #fff3cd;
      color: #856404;
      border: 1px solid #ffc107;
      border-radius: 20px;
      padding: 3px 10px;
      font-size: 12px;
      font-weight: 500;
    }

    /* Footer */
    .footer {
      background: linear-gradient(135deg, #0d4a24 0%, #1a7a40 100%);
      padding: 20px 30px;
      text-align: center;
      border-top: 2px solid #d4af37;
    }

    .footer p {
      color: #c8e6d4;
      margin: 4px 0;
      font-size: 13px;
    }

    .footer strong {
      color: #f5d97e;
    }

    /* Mobile Responsive */
    @media only screen and (max-width: 600px) {
      body {
        padding: 10px !important;
      }

      .container {
        border-radius: 8px !important;
      }

      .banner {
        padding: 20px 15px 16px !important;
      }

      .banner h1 {
        font-size: 22px !important;
      }

      .banner h2 {
        font-size: 15px !important;
      }

      .body-content {
        padding: 20px 15px !important;
      }

      .info-row {
        flex-direction: column !important;
        padding: 6px 0 !important;
      }

      .info-value {
        text-align: left !important;
      }

      .footer {
        padding: 16px 15px !important;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- Banner Header -->
    <div class="banner">
      <p class="banner-subtitle">PT. Mada Wikri Tunggal</p>
      <h1>Iftar Gathering</h1>
      <h2>Ramadhan</h2>
      <span class="banner-year">1447 Hijriah</span>
      <div class="banner-divider"></div>
      <p class="banner-company">📍 Nuanza Hotel, Cikarang &nbsp;|&nbsp; 12 Maret 2026</p>
    </div>

    <!-- Body -->
    <div class="body-content">
      <div class="greeting">
        <p>Assalamu'alaikum Wr. Wb.</p>
        <p>Yth. <strong>{{ $peserta->nama_lengkap }}</strong>,</p>
      </div>

      <div class="content">
        <p>Dengan penuh rasa syukur, kami mengundang Bapak/Ibu untuk hadir dalam acara <strong>Iftar Gathering
            Ramadhan 1447 Hijriah</strong> PT. Mada Wikri Tunggal yang akan diselenggarakan pada:</p>
      </div>

      <!-- Info Event -->
      <div class="info-box">
        <div class="info-box-title">📋 Detail Acara</div>
        <div class="info-row">
          <span class="info-label">📅 Hari/Tanggal:</span>
          <span class="info-value">Kamis, 12 Maret 2026</span>
        </div>
        <div class="info-row">
          <span class="info-label">⏰ Waktu:</span>
          <span class="info-value">15:00 WIB – Selesai</span>
        </div>
        <div class="info-row">
          <span class="info-label">📍 Tempat:</span>
          <span class="info-value">Nuanza Hotel, Cikarang</span>
        </div>
        <div class="info-row">
          <span class="info-label">🎤 Penceramah:</span>
          <span class="info-value">Ust. Muhammad Akbar Satrio SE.Sy., M.SI</span>
        </div>
        <div class="info-row">
          <span class="info-label">🆔 No. Peserta Anda:</span>
          <span class="info-value no-peserta-value">{{ $peserta->no_peserta }}</span>
        </div>
      </div>

      <!-- Agenda -->
      <div class="agenda-box">
        <div class="agenda-box-title">✨ Rangkaian Acara</div>
        <div class="agenda-tags">
          <span class="agenda-tag">🌅 Ngabuburit</span>
          <span class="agenda-tag">🎵 Live Music</span>
          <span class="agenda-tag">🕌 Tausiyah</span>
          <span class="agenda-tag">🤲 Santunan Anak Yatim</span>
          <span class="agenda-tag">🏛️ Peresmian Madani</span>
          <span class="agenda-tag">🍽️ Buka Puasa Bersama</span>
          <span class="agenda-tag">🎮 Game & Doorprize</span>
        </div>
      </div>

      <!-- QR Code -->
      <div class="qrcode-section">
        <h3>QR CODE ABSENSI ANDA</h3>
        <p style="color: #555; font-size: 13px; margin-bottom: 5px;">Screenshot atau simpan QR Code di bawah ini untuk
          absensi:</p>
        <div class="qrcode-image"
          style="background: white; padding: 12px; border-radius: 8px; display: inline-block; box-shadow: 0 2px 10px rgba(0,0,0,0.1); max-width: calc(100% - 20px); border: 2px solid #c8e6d4;">
          <img alt="QR Code Absensi {{ $peserta->no_peserta }}" src="{{ $message->embed($qrcodePath) }}"
            style="max-width: 100%; width: 200px; height: auto; display: block; margin: 0 auto;" />
        </div>
        <p style="color: #b8860b; font-size: 17px; font-weight: 800; margin-top: 14px; margin-bottom: 10px;">No.
          Peserta: {{ $peserta->no_peserta }}</p>
        <div
          style="background: #fff3cd; border: 1px solid #ffc107; border-radius: 8px; padding: 10px 14px; margin: 0 auto; max-width: 100%;">
          <p style="margin: 0; color: #856404; font-size: 13px; line-height: 1.5;">
            💡 <strong>Tips:</strong> Screenshot QR Code di atas dan simpan di HP Anda. QR Code juga dilampirkan
            sebagai attachment email untuk backup.
          </p>
        </div>
      </div>

      <!-- Instruksi -->
      <div class="instruction">
        <h4>📌 Cara Menggunakan QR Code:</h4>
        <ol style="margin: 6px 0; padding-left: 18px; font-size: 13px; color: #444;">
          <li><strong>Screenshot</strong> QR Code di atas dan simpan ke HP Anda</li>
          <li>Tunjukkan QR Code saat tiba di lokasi acara</li>
          <li>Petugas akan scan QR Code Anda untuk absensi</li>
          <li>Jika QR Code tidak bisa di-scan, input No. Peserta <strong>{{ $peserta->no_peserta }}</strong> di mesin
            absen</li>
        </ol>
      </div>

      <p style="margin-top: 20px; font-size: 14px; color: #555; text-align: center; font-style: italic;">
        "Bersama dalam iman, Bertumbuh dalam kepemimpinan"
      </p>
    </div>

    <!-- Footer -->
    <div class="footer">
      <p><strong>PT. Mada Wikri Tunggal</strong></p>
      <p>Metal and Plastic Industries</p>
      <p style="margin-top: 8px; color: #a8d8b8; font-size: 11px;">
        Email ini dikirim secara otomatis. Mohon untuk tidak membalas email ini.
      </p>
    </div>
  </div>
</body>

</html>