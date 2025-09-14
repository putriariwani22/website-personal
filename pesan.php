<?php include 'header.php'; ?>
<div class="container mt-4">
    <h2 class="text-center mb-4">Form Pemesanan</h2>
    <form action="proses.php" method="post" class="form-horizontal">
        
        <div class="form-group row mb-3">
            <label for="nokartu" class="col-md-2 col-form-label">Nomor Kartu</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="nokartu" name="nokartu" placeholder="Isikan Nomor kartu langganan jika ada">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="nama" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="nama" placeholder="Isikan Nama Lengkap" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
            <div class="col-md-10">
                <textarea name="alamat" class="form-control" placeholder="Isikan Alamat Lengkap" required></textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="nohp" class="col-md-2 col-form-label">No HP</label>
            <div class="col-md-10">
                <input type="text" name="nohp" class="form-control" placeholder="Isikan nomor handphone anda" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="pesanan" class="col-md-2 col-form-label">Pesanan</label>
            <div class="col-md-10">
                <textarea name="pesanan" class="form-control" placeholder="Isikan pesanan anda" required></textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="jumlah" class="col-md-2 col-form-label">Jumlah Pesanan</label>
            <div class="col-md-10">
                <input type="number" name="jumlah" class="form-control" placeholder="Isikan jumlah pesanan anda" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="catatantambahan" class="col-md-2 col-form-label">Catatan Tambahan</label>
            <div class="col-md-10">
                <textarea name="catatantambahan" class="form-control" placeholder="Tulis Catatan Tambahan Jika ada"></textarea>
            </div>
        </div>

        <!-- Tambahan metode pembayaran -->
        <div class="form-group row mb-3">
            <label class="col-md-2 col-form-label">Metode Pembayaran</label>
            <div class="col-md-10">
                <select name="metode_pembayaran" class="form-control" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="COD">COD (Bayar di tempat)</option>
                    <option value="Transfer">Transfer Bank</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
            </div>
        </div>
    </form>
</div>
