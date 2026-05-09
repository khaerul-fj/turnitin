<!DOCTYPE html>
<html>

<head>
    <title>LogicSense AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h3>LogicSense - Deteksi Plagiasi AI</h3>
                <form id="formCek" class="mt-4">
                    <input type="file" name="dokumen" class="form-control mb-3" accept=".pdf" required>
                    <button type="submit" class="btn btn-primary w-100" id="btnCek">Cek Sekarang</button>
                </form>
                <div id="hasil" class="mt-4 d-none alert alert-info"></div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('formCek').onsubmit = async (e) => {
            e.preventDefault();
            const btn = document.getElementById('btnCek');
            const resDiv = document.getElementById('hasil');

            btn.disabled = true;
            btn.innerText = "Sedang Menghitung via AI Lokal...";

            const formData = new FormData(e.target);
            const resp = await fetch('<?= base_url('logicsense/prosesCek') ?>', {
                method: 'POST',
                body: formData
            });
            const data = await resp.json();

            btn.disabled = false;
            btn.innerText = "Cek Sekarang";
            resDiv.classList.remove('d-none');
            resDiv.innerHTML = `Hasil: <b>${data.akurasi}</b> - ${data.keterangan}`;
        };
    </script>
</body>

</html>