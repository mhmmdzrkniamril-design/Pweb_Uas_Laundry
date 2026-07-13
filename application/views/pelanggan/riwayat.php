<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Riwayat Laundry - UAS Laundry</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{--primary:#1a237e;}
*{font-family:'Poppins',sans-serif;}body{background:#f0f4f8;margin:0;}
.d-flex{display:flex;}
.sidebar{width:240px;min-width:240px;min-height:100vh;background:linear-gradient(180deg,#1a237e 0%,#1e88e5 100%);box-shadow:4px 0 15px rgba(0,0,0,.15);display:flex;flex-direction:column;}
.sidebar .brand{padding:20px 15px;border-bottom:1px solid rgba(255,255,255,.15);}
.sidebar .brand h4{color:#fff;font-weight:700;margin:0;font-size:1.1rem;}
.sidebar .brand p{color:rgba(255,255,255,.7);font-size:.75rem;margin:0;}
.sidebar nav{flex:1;padding:10px 0;}
.sidebar .nav-section{color:rgba(255,255,255,.45);font-size:.7rem;text-transform:uppercase;letter-spacing:1.5px;padding:10px 20px 4px;display:block;}
.sidebar .nav-link{color:rgba(255,255,255,.8);padding:11px 20px;border-radius:8px;margin:2px 10px;transition:all .2s;display:flex;align-items:center;gap:10px;text-decoration:none;}
.sidebar .nav-link:hover,.sidebar .nav-link.active{background:rgba(255,255,255,.18);color:#fff;}
.sidebar .user-bottom{padding:15px;border-top:1px solid rgba(255,255,255,.15);}
.main-content{flex:1;display:flex;flex-direction:column;min-width:0;}
.topbar{background:#fff;box-shadow:0 2px 10px rgba(0,0,0,.06);}
.topbar-title{background:#1a237e;color:#fff;text-align:center;padding:10px;font-weight:700;font-size:1rem;letter-spacing:1px;}
.topbar-inner{padding:10px 25px;display:flex;align-items:center;justify-content:space-between;}
.table-card{border:none;border-radius:16px;box-shadow:0 4px 20px rgba(0,0,0,.08);}
.table-card .card-header{background:#fff;border-bottom:1px solid #e8edf2;padding:15px 20px;border-radius:16px 16px 0 0;}
.table thead th{background:#f8fafc;border-bottom:2px solid #e8edf2;color:#64748b;font-size:.78rem;text-transform:uppercase;letter-spacing:1px;font-weight:600;}
.badge-diterima{background:#e3f2fd;color:#1565c0;padding:5px 10px;border-radius:20px;font-size:.78rem;display:inline-block;}
.badge-diproses{background:#fff3e0;color:#e65100;padding:5px 10px;border-radius:20px;font-size:.78rem;display:inline-block;}
.badge-selesai{background:#e3f2fd;color:#2e7d32;padding:5px 10px;border-radius:20px;font-size:.78rem;display:inline-block;}
.badge-diambil{background:#f3e5f5;color:#6a1b9a;padding:5px 10px;border-radius:20px;font-size:.78rem;display:inline-block;}
</style>
</head>
<body>
<div class="d-flex">
  <div class="sidebar">
    <div class="brand">
      <div class="d-flex align-items-center gap-2">
        <div style="background:rgba(255,255,255,.2);border-radius:10px;width:38px;height:38px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-tshirt text-white"></i></div>
        <div><h4 class="mb-0">LAUNDRY APP</h4><p class="mb-0">Pelanggan Portal</p></div>
      </div>
    </div>
    <nav>
      <span class="nav-section">MENU UTAMA</span>
      <a href="<?= site_url('user/dashboard') ?>" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      <span class="nav-section mt-2">LAYANAN SAYA</span>
      <a href="<?= site_url('user/riwayat') ?>" class="nav-link active"><i class="fas fa-history"></i> Riwayat Laundry</a>
      <a href="<?= site_url('user/profil') ?>" class="nav-link"><i class="fas fa-user-circle"></i> Profil Saya</a>
    </nav>
    <div class="user-bottom">
      <div class="d-flex align-items-center gap-2 mb-2">
        <div style="background:rgba(255,255,255,.2);border-radius:8px;width:34px;height:34px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-user text-white fa-sm"></i></div>
        <div class="flex-grow-1">
          <div style="color:#fff;font-size:.82rem;font-weight:600;"><?= $pelanggan['nama_pelanggan'] ?></div>
          <div style="color:rgba(255,255,255,.6);font-size:.72rem;">Pelanggan</div>
        </div>
      </div>
      <button onclick="document.getElementById('modalLogout').style.display='flex'" style="width:100%;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.25);color:#fff;padding:8px 12px;border-radius:8px;font-size:.8rem;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:all .2s;" onmouseover="this.style.background='rgba(239,68,68,.7)'" onmouseout="this.style.background='rgba(255,255,255,.12)'">
        <i class="fas fa-sign-out-alt"></i> Keluar
      </button>
    </div>
  </div>

  <!-- MODAL LOGOUT -->
  <div id="modalLogout" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;padding:32px 28px;width:340px;text-align:center;box-shadow:0 20px 60px rgba(0,0,0,.2);">
      <div style="width:64px;height:64px;background:#fee2e2;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
        <i class="fas fa-sign-out-alt" style="color:#ef4444;font-size:1.6rem;"></i>
      </div>
      <h5 class="fw-bold mb-1" style="color:#1e293b;">Keluar Akun?</h5>
      <p style="color:#64748b;font-size:.87rem;margin-bottom:24px;">Apakah Anda yakin ingin keluar dari akun pelanggan ini?</p>
      <div class="d-flex gap-2 justify-content-center">
        <button onclick="document.getElementById('modalLogout').style.display='none'" style="padding:9px 24px;border-radius:8px;border:1px solid #e2e8f0;background:#fff;color:#64748b;font-size:.85rem;cursor:pointer;font-family:'Poppins',sans-serif;">Batal</button>
        <a href="<?= site_url('user/logout') ?>" style="padding:9px 24px;border-radius:8px;background:#ef4444;color:#fff;font-size:.85rem;text-decoration:none;font-family:'Poppins',sans-serif;display:inline-flex;align-items:center;gap:6px;"><i class="fas fa-sign-out-alt"></i> Ya, Keluar</a>
      </div>
    </div>
  </div>
  <div class="main-content">
    <div class="topbar">
      <div class="topbar-title">RIWAYAT LAUNDRY</div>
      <div class="topbar-inner">
        <h6 class="mb-0 fw-bold" style="color:#2d3748;">Riwayat Laundry</h6>
        <div style="font-size:.82rem;color:#64748b;"><?= date('d M Y') ?></div>
      </div>
    </div>
    <div class="p-4">
      <div class="card table-card">
        <div class="card-header">
          <h6 class="mb-0 fw-bold"><i class="fas fa-history me-2 text-primary"></i>Semua Riwayat Laundry Anda</h6>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
              <thead><tr>
                <th>No</th><th>Invoice</th><th>Tgl Masuk</th><th>Tgl Selesai</th><th>Layanan</th><th>Berat</th><th>Status</th><th>Total</th><th>Aksi</th>
              </tr></thead>
              <tbody>
              <?php $no=1; foreach ($riwayat as $r): ?>
              <tr>
                <td class="text-muted" style="font-size:.8rem;"><?= $no++ ?></td>
                <td><code style="font-size:.78rem;background:#f0f4f8;padding:2px 6px;border-radius:4px;"><?= $r['kode_transaksi'] ?></code></td>
                <td style="font-size:.8rem;"><?= date('d M Y',strtotime($r['tanggal_masuk'])) ?></td>
                <td style="font-size:.8rem;"><?= date('d M Y',strtotime($r['tanggal_selesai'])) ?></td>
                <td style="font-size:.83rem;"><?= $r['nama_layanan'] ?></td>
                <td style="font-size:.83rem;"><?= $r['berat_kg'] ?> kg</td>
                <td><span class="badge-<?= strtolower($r['status']) ?>"><?= $r['status'] ?></span></td>
                <td style="font-size:.83rem;font-weight:600;">Rp <?= number_format($r['total_harga'],0,',','.') ?></td>
                <td><a href="<?= site_url('user/detail/'.$r['id_transaksi']) ?>" class="btn btn-sm btn-outline-secondary rounded" style="font-size:.75rem;padding:3px 10px;">Detail</a></td>
              </tr>
              <?php endforeach; ?>
              <?php if(empty($riwayat)): ?><tr><td colspan="9" class="text-center py-4 text-muted">Belum ada transaksi</td></tr><?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body></html>
