<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Messages</title>
    
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Green success message */
        #successMessage {
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            font-size: 18px;
            margin: 20px 0;
            animation: slideIn 1s ease-out;
            background-color: #28a745;
            color: white;
        }
        
        .alert-success {
            background-color: #28a745;
            color: white;
        }

        .fas.fa-check-circle {
            margin-right: 10px;
            font-size: 24px;
        }

        @keyframes slideIn {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(0); }
        }

        /* Neumorphism success message */
        .neumorphic-message {
            background: #e0e5ec;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 8px 8px 15px rgba(0, 0, 0, 0.1), -8px -8px 15px rgba(255, 255, 255, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #3f6cb5;
            font-size: 18px;
            font-weight: bold;
        }

        .neumorphic-message i {
            margin-right: 10px;
            color: #28a745;
        }

        /* Toast message */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: none;
            animation: slideInToast 1s ease-out;
        }

        .toast-body i {
            margin-right: 10px;
        }

        @keyframes slideInToast {
            0% { transform: translateX(100%); }
            100% { transform: translateX(0); }
        }
    </style>
</head>
<body>

    <!-- Green Success Message -->
    <div id="successMessage" class="alert alert-success" style="display: none;">
        <i class="fas fa-check-circle"></i> Data successfully submitted! 🎉
    </div>

    <!-- Neumorphism Design Success Message -->
    <div id="neumorphicSuccess" class="neumorphic-message" style="display: none;">
        <p><i class="fas fa-check-circle"></i> Data successfully submitted!</p>
    </div>

    <!-- Toast Notification -->
    <div id="toastMessage" class="toast">
        <div class="toast-body">
            <i class="fas fa-check-circle"></i> Data submitted successfully!
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>

    <script>
        // Store the previous page URL (referer)
        const referer = document.referrer || "index.php";  // Default to 'index.php' if no referer is found

        // Green Success Message - Show after submission
        function showSuccessMessage() {
            document.getElementById('successMessage').style.display = 'flex';
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
                redirectToPreviousPage();  // Redirect after message disappears
            }, 3000);
        }

        // Neumorphism Success Message - Show after submission
        function showNeumorphicSuccess() {
            document.getElementById('neumorphicSuccess').style.display = 'flex';
            setTimeout(function() {
                document.getElementById('neumorphicSuccess').style.display = 'none';
                redirectToPreviousPage();  // Redirect after message disappears
            }, 3000);
        }

        // Toast Notification - Show after submission
        function showToastNotification() {
            document.getElementById('toastMessage').style.display = 'block';
            setTimeout(function() {
                document.getElementById('toastMessage').style.display = 'none';
                redirectToPreviousPage();  // Redirect after message disappears
            }, 3000);
        }

        // SweetAlert2 Popup - Show after submission
        function showSweetAlert() {
            Swal.fire({
                title: 'Success!',
                text: 'Your data has been successfully submitted!',
                icon: 'success',
                confirmButtonText: 'Cool!',
                background: '#f4f7fa',
                timer: 3000
            }).then(() => {
                redirectToPreviousPage();  // Redirect after SweetAlert2 popup disappears
            });
        }

        // Redirect to the previous page
        function redirectToPreviousPage() {
            window.location.href = referer;  // Redirect to the page where the form was submitted
        }

        // Call all functions after submission
        function onSubmitSuccess() {
            showSuccessMessage();       // Green Success Message
            showNeumorphicSuccess();    // Neumorphism Design Success Message
            showToastNotification();    // Toast Notification
            showSweetAlert();           // SweetAlert2 Popup
        }

        // Simulate form submission success
        setTimeout(onSubmitSuccess, 1000);
    </script>
</body>
</html>
