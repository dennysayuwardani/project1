<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <!-- Link FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Animasi kedut depan belakang */
        @keyframes shake {
            0% { transform: translateZ(0); }
            25% { transform: translateZ(-10px); }
            50% { transform: translateZ(10px); }
            75% { transform: translateZ(-10px); }
            100% { transform: translateZ(0); }
        }

        /* Form tambah pelanggan */
        #formTambah {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        /* Form di dalam */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            transform-origin: center;
        }
    </style>
</head>
<body>
    <div style="width: 100%; max-width: 1200px; margin: 0 auto;">
        <!-- Judul -->
        <div style="text-align: center; margin-bottom: 20px;">
            <h1 style="font-size: 36px; margin: 0;">Data Pelanggan</h1>
        </div>
        <!-- Tombol -->
        <div style="margin-bottom: 20px; text-align: right;">
            <a href="javascript:void(0);" onclick="openForm()" style="display: inline-flex; align-items: center; background-color: green; color: #fff; padding: 10px 15px; border: none; border-radius: 5px; text-decoration: none; font-size: 16px;">
                <i class="fas fa-shopping-cart" style="margin-right: 5px;"></i> Tambah Data
            </a>
        </div>
        
        <!-- Tabel -->
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ddd; padding: 8px; background-color: #f4f4f4; text-align: left;">ID</th>
                    <th style="border: 1px solid #ddd; padding: 8px; background-color: #f4f4f4; text-align: left;">Nama Pelanggan</th>
                    <th style="border: 1px solid #ddd; padding: 8px; background-color: #f4f4f4; text-align: left;">Alamat</th>
                    <th style="border: 1px solid #ddd; padding: 8px; background-color: #f4f4f4; text-align: left;">Nomor Telepon</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mengecek apakah data pelanggan ada -->
                <?php if (!empty($pelanggan)) : ?>
                    <?php foreach ($pelanggan as $row) : ?>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= $row['id_pelanggan'] ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= $row['nama_pelanggan'] ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= $row['alamat_pelanggan'] ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= $row['no_telp'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <!-- Menampilkan pesan jika tidak ada data pelanggan -->
                    <tr>
                        <td colspan="4" style="border: 1px solid #ddd; padding: 15px; text-align: center; color: #888; font-size: 18px;">
                            Tidak ada data pelanggan
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Form Tambah Pelanggan -->
    <div id="formTambah" onclick="handleOutsideClick(event)">
        <div class="form-container">
            <!-- Tombol Close (X) di dalam Form -->
            <span class="close-btn" onclick="closeForm()" style="position: absolute; top: 20px; right: 20px; font-size: 20px; cursor: pointer; color: black;">X</span>
            
            <h2>Tambah Data Pelanggan Baru</h2>
            <form action="/pelanggan/save" method="POST">
                <div style="margin-bottom: 10px;">
                    <label for="nama_pelanggan" style="display: block;">Nama Pelanggan:</label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" required style="width: 98%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <div style="margin-bottom: 10px;">
                    <label for="alamat_pelanggan" style="display: block;">Alamat:</label>
                    <input type="text" id="alamat_pelanggan" name="alamat_pelanggan" required style="width: 98%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <div style="margin-bottom: 10px;">
                    <label for="no_telp" style="display: block;">Nomor Telepon:</label>
                    <input type="text" id="no_telp" name="no_telp" required style="width: 98%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <button type="submit" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        // Fungsi untuk membuka form
        function openForm() {
            document.getElementById("formTambah").style.display = "flex";
        }

        // Fungsi untuk menutup form
        function closeForm() {
            document.getElementById("formTambah").style.display = "none";
        }

        // Fungsi untuk menangani klik di luar form
        function handleOutsideClick(event) {
            const formContainer = document.querySelector('.form-container');
            if (!formContainer.contains(event.target)) {
                formContainer.style.animation = 'shake 0.3s';
                setTimeout(() => {
                    formContainer.style.animation = '';
                }, 300);
            }
        }
    </script>
</body>
</html>
