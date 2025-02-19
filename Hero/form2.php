<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: php/login.php?msg=Login please"); // Correct path to login.php
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Blog - HeroBiz Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="style2.css" rel="stylesheet">

   <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Select2 JS -->
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- =======================================================
  * Template Name: HeroBiz
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<style>

.select2-container {
            width: 100% !important;
        }
.content-container{
    width: 84%;
    left: 8%;
    padding: 70px;
    padding-bottom: 100px; 

}
.word {
    font-family: 'Courier New', Courier, monospace; 
    text-align: center; color: #02a4c1; 
    font-weight: 500;
    margin-bottom: 10px;
}

</style>
</head>


<body class="blog-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">HeroBiz</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.html">Home<br></a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="blog.html" class="active">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="index.html#about">Get Started</a>

    </div>
  </header>

  <main class="main">

  <!-- Page Title -->
<div class="page-title">
  <div class="container text-center">
    <h1 class="mb-2">Blog & News</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="index.html">Home</a></li>
        <li class="current">Blog</li>
      </ol>
    </nav>
  </div>
</div>
<!-- End Page Title -->

<!-- Content Section -->
<div class="content-container">
  <div class="container" >
        <!-- Progress Indicator -->
        <div class="progress-container mb-5">
            <div class="progress-step active">Step 1</div>
            <div class="progress-step">Step 2</div>
            <div class="progress-step">Step 3</div>
        </div>
        
        <!-- Multi-Step Form -->
        <form action="submit.php" method="POST" enctype="multipart/form-data">
            <!-- Step 1 -->
            <div class="step active" id="step-1">
            <h4 class="head">Student Information Form</h4>                                      
                
                <div class="form-group d-flex align-items-center">
                    <div class="ms-5 me-5 col-3 mb-4 mt-4">
                        <label for="student_photo">Upload Student Photo</label>
                        <input type="file" id="student_photo" name="student_photo" accept="image/*">
                    </div>
                    <div>
                        <img id="photo_preview" src="#" alt="Student Photo Preview" style="display: none; max-width: 200px; max-height: 200px; border: 1px solid #ccc; padding: 5px;">
                    </div>
                </div>

                <div class="form-group col-11">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name with Initials">
                </div>
                <div class="form-group col-11">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="full_name" >
                </div>

                <div class="form-group gender-options">
                    <label>Gender:</label>
                    <input type="radio" id="male" name="gender" value="male" >
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female" >
                    <label for="female">Female</label>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="district">District</label>
                            <select id="district" name="district" >
                                <option value="" disabled selected>Select a district</option>
                                <option value="galle">Galle</option>
                                <option value="mathara">Matara</option>
                                <option value="hambanthota">Hambanthota</option>
                            </select>
                        </div>
                
             


                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <input type="date" id="birthday" name="birthday" >
                        </div>

                        <div class="form-group col-6">
                            <label for="nic">NIC</label>
                            <input type="text" id="nic" name="nic" >
                        </div>

                        <div class="form-group col-7">
                            <label for="phone">Telephone Number</label>
                            <input type="tel" id="phone" name="phone"  placeholder="Enter phone number" >
                        </div>

                        
                    <div class="form-group">
                        <label for="school" class="mb-0">School:</label>
                        <input type="text" id="school" name="school" placeholder="Enter the school" >
                    </div>
               
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" >
                        </div>
                    </div>

                    <div class="col-6 ">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" rows="3" ></textarea>
                        </div>
                        <div class="form-group col-11">
                            <label for="Grama_wasama">Grama Niladhari wasama</label>
                            <input type="text" id="Grama_wasama" name="Grama_wasama" >
                        </div> 

                        <div class="form-group col-11">
                            <label for="Divisional">Divisional Secretary</label>
                            <input type="text" id="Divisional" name="Divisional" >
                        </div>                            
                    </div>
                </div>

                 <div class="d-flex justify-content-end">
                    <button type="button" class="next-btn" onclick="nextStep()"> <i class="fa fa-arrow-right"></i></button>
                </div>
            </div>

          <!-- Step 2 -->
            <div class="step" id="step-2">
                <h4 class="head">Step 2: Additional Information</h4>

                <div class="d-flex justify-content-center align-items-center">
                    <div class="row col-4 mb-3">     
                        <!-- Button to trigger the selection -->
                        <button type="button" class="btn btn-primary" id="selectSportsBtn">Select Sports</button>

                        <!-- Display selected sports -->
                        <p id="selectedSportsDisplay"></p>

                        <!-- Hidden input to store selected sports -->
                        <input type="hidden" name="selected_sports" id="selectedSportsInput">

                        <!-- Searchable dropdown -->
                        <select id="sportsDropdown" multiple="multiple" style="width: 100%; display: none;">
                            <!-- Sports options will be dynamically loaded here -->
                        </select>
                    </div>

                    <div class="form-group col-2 d-flex align-items-center" style="margin-left: 60px;">
                        <select id="year" name="year" required>
                        </select>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3 mb-4">
                    <h5 class="mb-4">ඉහලම දක්ශතාවය :</h5>    
                    <input type="text" id="achievement" class="col-4 mt-4" name="achievement" placeholder="" >
                </div>

                <h5 class="mb-4">දක්වන ලද දක්ශතාවයන් හා වසර:</h5>
                <div class="d-flex justify-content-center ">
                    <div class="form-group col-6 d-flex  gap-5">
                        <label for="school_achievement" class="mb-0">School:</label>
                        <input type="text" id="school_achievement" name="school_achievement" placeholder="Enter the Years" >
                    </div>
                </div>
                <div class="d-flex justify-content-center ">
                    <div class="form-group col-6 d-flex  gap-5">
                        <label for="district_achievement" class="mb-0">District:</label>
                        <input type="text" id="district_achievement" name="district_achievement" placeholder="Enter the Years" >
                    </div>
                </div>
                <div class="d-flex justify-content-center ">
                    <div class="form-group col-6 d-flex  gap-4">
                        <label for="provincial_achievement" class="mb-0">Provincial:</label>
                        <input type="text" id="provincial_achievement" name="provincial_achievement" placeholder="Enter the Years" >
                    </div>
                </div>
                <div class="d-flex justify-content-center ">
                    <div class="form-group col-6 d-flex  gap-5">
                        <label for="national_achievement" class="mb-0">National:</label>
                        <input type="text" id="national_achievement" name="national_achievement" placeholder="Enter the Years" >
                    </div>
                </div>
                <div class="d-flex justify-content-center ">
                    <div class="form-group col-6 d-flex  gap-3">
                        <label for="international_achievement" class="mb-0">International:</label>
                        <input type="text" id="international_achievement" name="international_achievement" placeholder="Enter the Years" >
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 mb-5">
                    <h5 class="mb-4">ඉදිරිපත්වන ක්‍රීඩා සමාජයේ තොරතුරු :</h5>    
                    <textarea id="club_info" class="col-6 mt-4" name="club_info" placeholder="උදා: නම , ලිපිනය ,ලියාපදිංචි අංකය"></textarea>
                </div>
                <div class="form-group">
                    <h5> දැනට ක්‍රීඩාවෙහි නිරත වන්නේද යන වග :</h5>
                    <div class="d-flex align-items-center mb-5" style="margin-left: 30%;">
                        <input type="radio" id="is_active_1" name="is_active" value="ඔව්" class="me-1" >
                        <label for="is_active_1" class="me-5">ඔව්</label>                            
                        <input type="radio" id="is_active_2" name="is_active" value="නැත" class="me-1" >
                        <label for="is_active_2">නැත</label>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-5">
                    <button type="button" class="prev-btn" onclick="prevStep()">
                        <i class="fa fa-arrow-left"></i>
                    </button>
                    <button type="button" class="next-btn" onclick="nextStep()"> <i class="fa fa-arrow-right"></i></button>
                </div>

            </div>

           <!-- Step 3 -->
            <div class="step" id="step-3">
                <div class="d-flex justify-content-start mt-5">
                    <button type="button" class="prev-btn" onclick="prevStep()">
                        <i class="fa fa-arrow-left"></i>
                    </button>
                </div>
                <h4 class="head">Coaches Information Form</h4>
                <div style="margin-left: 10%;">
                    <div class="col-11">    
                        <div class="form-group">
                            <label for="coach_name">Coaching Name</label>
                            <input type="text" id="coach_name" name="coach_name" list="coach_suggestions" placeholder="Start typing coach's name...">
                            <datalist id="coach_suggestions">
                                <!-- Coaches will be dynamically loaded here -->
                            </datalist>
                        </div>
                      
                    
                        <div class="form-group">
                            <label for="coach_district">දිස්ත්‍රික්කය :</label>
                            <select id="coach_district" name="coach_district" class="col-4" >
                                <option value="" disabled selected>Select a district</option>
                                <option value="galle">Galle</option>
                                <option value="mathara">Matara</option>
                                <option value="hambanthota">Hambanthota</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="coach_address">ලිපිනය :</label>
                            <textarea id="coach_address" name="coach_address" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label> ක්‍රීඩා අමාත්‍යංශයේ ලියාපදිංචි ද යන වග :</label>
                            <div class="d-flex align-items-center" style="margin-left: 30%;">
                                <input type="radio" id="registered_yes" name="registered" value="ඔව්" class="me-1" >
                                <label for="registered_yes" class="me-5">ඔව්</label>                            
                                <input type="radio" id="registered_no" name="registered" value="නැත" class="me-1" >
                                <label for="registered_no">නැත</label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-5">
                        <label for="coach_nic">NIC</label>
                        <input type="text" id="coach_nic" name="coach_nic" >
                    </div>
                                                
                    <div class="form-group col-5">
                        <label for="coach_phone">Telephone Number</label>
                        <input type="tel" id="coach_phone" name="coach_phone"  placeholder="Enter phone number" >
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button type="submit" class="custom-btn col-3">Submit</button>
                </div>
            </div>
            
        </form>
  </div>
</div>
<script>
    $(document).ready(function() {
        // Fetch and populate the datalist with coach names
        $.ajax({
            url: 'fetch_coaches.php', // Endpoint to get the list of coaches
            method: 'GET',
            success: function(data) {
                const coaches = JSON.parse(data);
                coaches.forEach(function(coach) {
                    $('#coach_suggestions').append(`<option value="${coach.coach_name}">`);
                });
            }
        });

        // When a coach is selected (or typed), fetch and fill in the coach details
        $('#coach_name').on('input', function() {
            const coach_name = $(this).val();
            if (coach_name) {
                $.ajax({
                    url: 'fetch_coach_details.php', // Endpoint to get coach details
                    method: 'GET',
                    data: { coach_name: coach_name },
                    success: function(data) {
                        const coach = JSON.parse(data);
                        if (coach) {
                            console.log(coach);  // Debugging: log the response

                            // Fill in the coach details
                            $('#coach_address').val(coach.coach_address);
                            $('#coach_nic').val(coach.coach_nic);
                            $('#coach_phone').val(coach.coach_phone);
                            $('input[name="registered"][value="' + coach.registered + '"]').prop('checked', true);

                            // Ensure that the district value exists and set it
                            if (coach.coach_district) {
                                // Match the district in lowercase for consistency
                                $('#coach_district').val(coach.coach_district.toLowerCase());
                            } else {
                                console.log('District value is missing');  // Debugging: check if district is missing
                            }
                        }
                    }
                });
            }
        });
    });
</script>



<script>
    $(document).ready(function() {
        // Initialize Select2
        $('#sportsDropdown').select2();

        // Fetch sports from the PHP file via AJAX
        $.ajax({
            url: 'get_sports.php', // URL of the PHP file to fetch sports
            method: 'GET',
            success: function(data) {
                const sports = JSON.parse(data); // Parse the JSON response
                sports.forEach(function(sport) {
                    $('#sportsDropdown').append(new Option(sport, sport));
                });
            },
            error: function(error) {
                console.error("Error fetching sports:", error);
            }
        });

        // Show dropdown on button click
        $('#selectSportsBtn').click(function() {
            $('#sportsDropdown').select2('open');
        });

        // Save selected sports
        $('#sportsDropdown').on('change', function() {
            const selectedSports = $(this).val();
            
            // Display selected sports
            $('#selectedSportsDisplay').text("Selected Sports: " + selectedSports.join(", "));

            // Save selected sports to the hidden input
            $('#selectedSportsInput').val(selectedSports.join(", "));
        });
    });
</script>  

<script>
document.getElementById("saveSports").addEventListener("click", function () {
    let selectedSports = [];
    document.querySelectorAll(".sports-option:checked").forEach((checkbox) => {
        selectedSports.push(checkbox.value);
    });

    // Store selected sports in a hidden input
    document.getElementById("selectedSportsInput").value = selectedSports.join(",");
    
    // Display selected sports
    document.getElementById("selectedSportsDisplay").innerText = "Selected: " + selectedSports.join(", ");

    // Close the modal properly
    let modalElement = document.getElementById("gameModal");
    let modalInstance = bootstrap.Modal.getInstance(modalElement);
    if (modalInstance) {
        modalInstance.hide();
    }
});

</script>

<script>
    // Populate the year dropdown and auto-select the current year
    const currentYear = new Date().getFullYear();
    const yearSelect = document.getElementById('year');

    for (let year = currentYear - 50; year <= currentYear + 10; year++) {
        const option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        if (year === currentYear) {
            option.selected = true; // Auto-select the current year
        }
        yearSelect.appendChild(option);
    }
</script>

<script>
// Initialize variables
let currentStep = 0;
const steps = document.querySelectorAll('.step');
const progressSteps = document.querySelectorAll('.progress-step');
const submitButton = document.querySelector('.custom-btn'); // Submit button
const studentPhotoInput = document.getElementById("student_photo");
const photoPreview = document.getElementById("photo_preview");

// Function to scroll the iframe
function scrollToStepInIframe(step) {
    const iframe = document.getElementById("yourIframeId"); // Use the ID of your iframe
    const iframeDocument = iframe.contentWindow.document;
    const stepElement = iframeDocument.querySelectorAll('.step')[step];
    
    // Ensure the iframe is fully loaded before trying to access its content
    if (iframeDocument && stepElement) {
        const topPosition = stepElement.getBoundingClientRect().top + iframe.contentWindow.pageYOffset;
        iframe.contentWindow.scrollTo({
            top: topPosition - 50, // Offset to scroll just above the step
            behavior: 'smooth'
        });
    }
}

// Function to scroll the parent window to top
function scrollToParentTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Show step function
function showStep(step) {
    // Hide all steps and reset progress
    steps.forEach((el, index) => {
        el.classList.toggle('active', index === step);
    });

    // Update the progress steps
    progressSteps.forEach((el, index) => {
        el.classList.toggle('active', index <= step); // Highlight progress steps up to current
    });

    // Show submit button only on the 3rd step
    if (step === 2) {
        submitButton.style.display = 'block';
    } else {
        submitButton.style.display = 'none';
    }

    // Scroll the iframe or the parent page
    if (window.location !== window.parent.location) {
        // In iframe, scroll to step inside iframe
        scrollToStepInIframe(step);
    } else {
        // If it's not inside an iframe, scroll the parent to top
        scrollToParentTop();
    }
}

// Handle the 'Next' button click
document.querySelectorAll('.next-btn').forEach((btn) => {
    btn.addEventListener('click', () => {
        if (currentStep < steps.length - 1) {
            steps[currentStep].classList.remove('active');
            progressSteps[currentStep].classList.remove('active');
            currentStep++;
            steps[currentStep].classList.add('active');
            progressSteps[currentStep].classList.add('active');
            showStep(currentStep); // Ensure step is updated properly
        }
    });
});

// Handle the 'Previous' button click
document.querySelectorAll('.prev-btn').forEach((btn) => {
    btn.addEventListener('click', () => {
        if (currentStep > 0) {
            steps[currentStep].classList.remove('active');
            progressSteps[currentStep].classList.remove('active');
            currentStep--;
            steps[currentStep].classList.add('active');
            progressSteps[currentStep].classList.add('active');
            showStep(currentStep); // Ensure step is updated properly
        }
    });
});

// Photo preview for student photo input
studentPhotoInput.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            photoPreview.src = e.target.result;
            photoPreview.style.display = "block";
        };
        reader.readAsDataURL(file);
    } else {
        photoPreview.style.display = "none";
    }
});

// Initialize by showing the first step
showStep(currentStep);

</script>

  <footer id="footer" class="footer dark-background">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
              <span class="sitename">HeroBiz</span>
            </a>
            <div class="footer-contact pt-3">
              <p>A108 Adam Street</p>
              <p>New York, NY 535022</p>
              <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
              <p><strong>Email:</strong> <span>info@example.com</span></p>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Web Development</a></li>
              <li><a href="#">Product Management</a></li>
              <li><a href="#">Marketing</a></li>
              <li><a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Hic solutasetp</h4>
            <ul>
              <li><a href="#">Molestiae accusamus iure</a></li>
              <li><a href="#">Excepturi dignissimos</a></li>
              <li><a href="#">Suscipit distinctio</a></li>
              <li><a href="#">Dilecta</a></li>
              <li><a href="#">Sit quas consectetur</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Nobis illum</h4>
            <ul>
              <li><a href="#">Ipsam</a></li>
              <li><a href="#">Laudantium dolorum</a></li>
              <li><a href="#">Dinera</a></li>
              <li><a href="#">Trodelas</a></li>
              <li><a href="#">Flexo</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="copyright text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
          <div>
            © Copyright <strong><span>MyWebsite</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
          </div>
        </div>

        <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
          <a href=""><i class="bi bi-twitter-x"></i></a>
          <a href=""><i class="bi bi-facebook"></i></a>
          <a href=""><i class="bi bi-instagram"></i></a>
          <a href=""><i class="bi bi-linkedin"></i></a>
        </div>

      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>