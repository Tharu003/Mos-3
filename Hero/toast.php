<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Notification</title>

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>

    <script>
        // Store the previous page URL
        const referer = document.referrer || "index.php";

        // SweetAlert2 Popup
        function showSweetAlert() {
            Swal.fire({
                title: 'Success!',
                text: 'Your data has been successfully submitted!',
                icon: 'success',
                confirmButtonText: 'OK',
                background: '#f4f7fa',
                timer: 7000 // Display for 7 seconds
            }).then(() => {
                redirectToPreviousPage();
            });
        }

        // Redirect to previous page
        function redirectToPreviousPage() {
            window.location.href = referer;
        }

        // Simulate form submission success
        setTimeout(showSweetAlert, 500); // Show alert after 0.5 seconds
    </script>
</body>
</html>
