<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scan Your Barcode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="scan-area">Scan your barcode...</div>

    <?php if (isset($_GET['message'])): ?>
        <div class="result">
            <?php echo urldecode($_GET['message']); ?>
        </div>
    <?php endif; ?>

    <form id="barcode-form" action="proses.php" method="POST">
        <input type="text" name="barcode" id="barcode-input" autofocus autocomplete="off">
    </form>

    <script>
        const input = document.getElementById("barcode-input");

        // Fokus otomatis
        window.onload = () => input.focus();

        // Submit form saat enter ditekan
        input.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                e.preventDefault();
                document.getElementById("barcode-form").submit();
            }
        });
    </script>
</body>
</html>
