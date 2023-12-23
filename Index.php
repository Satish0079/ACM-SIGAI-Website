<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer_files/Exception.php';
require 'phpmailer_files/PHPMailer.php';
require 'phpmailer_files/SMTP.php';

include("connection.php");

$emailSent = false;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $dateFilled = $_POST['dateFilled'];

    $stmt = $conn->prepare("INSERT INTO `dbtable` (`name`, `email`, `phone`, `message`, `dateFilled`) VALUES (?, ?, ?, ?, ?);");
    $stmt->bind_param("ssiss", $name, $email, $phone, $message, $dateFilled);

    if ($stmt->execute()) {
        $mail = new PHPMailer(true);
        try {
// These credentials will change at the end; the once mentioned below are for test purpose only.
            $mail->isSMTP();
            $mail->Host = 'smtp.elasticemail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ravijeetsharma180@gmail.com';
            $mail->Password = 'BE0F6C82083078F49D2B96A33BB0AFDCDFA4';
            $mail->Port = 2525;

 // Email content
            $mail->setFrom('ravijeetsharma180@gmail.com', 'Sender Name');
            $mail->addAddress('ravijeetsharmargra1@gmail.com');   // Recipient email (will have multiple recipients in future)
            $mail->isHTML(true);
            $mail->Subject = 'New Contact Form Enquiry';    // Email's subject
            $mail->Body = "Name: $name <br>Phone: $phone <br> Email: $email<br>Message: $message <br> Date of enquiry: $dateFilled";

            if($mail->send()){
                $emailSent = true;
            }
        } catch (Exception $e) {
            echo "Error sending email: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();


   
    if ($emailSent) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var popupShown = sessionStorage.getItem('popupShown');
                if (!popupShown) {
                    document.querySelector('.popup').classList.add('active');
                    sessionStorage.setItem('popupShown', true);
                }
    
                var dismissPopupHandler = function() {
                    document.getElementById('btn').style.display = 'block';
                    document.querySelector('.popup').classList.remove('active');
                    sessionStorage.removeItem('popupShown');
                };
    
                document.getElementById('dismiss-popup-btn').addEventListener('click', dismissPopupHandler);
            });
        </script>";
    } else {
        echo "<script>alert('Email could not be sent. Please try again.');</script>";
    }

}


?>

<!-- HTML begins from here -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <meta name="description" content="TCET ACM-SIGAI">
    <meta name="keywords" content="ACM-SIGAI, acm, acm-sigai, tcet, TCET">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="icon" type="image/x-icon" href="./Images/logo.png">
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <!-- Font Awesome CDN Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- stylesheet -->
    <link rel="stylesheet" href="footer.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="gallery.css">
    <link rel="stylesheet" href="contact.css" />
    <link rel="stylesheet" href="magazine.css">
    <link rel="stylesheet" href="style4events.css">
    <link rel="stylesheet" href="team.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&
    display=swap" rel="stylesheet">
    <script src="Script.js"></script>
   

   
    <title>ACM-SIGAI TCET</title>
</head>
<body>
  <div class="mob-res-div" id="ResDiv">
  <h2 class="responsive-text">ACM SIG-AI</h2>
  <div class="divider"></div>
  
  </div>
    <nav class="navbar scroll" id="navbar">
        <div class="navbar-brand">
          
            <img src="./Images/SIG_AI.png" class="logo" id="logo" alt="Logo Image">
        </div>
        <div class="navbar-list" id="TopNav">
            <ul>
              <li><a href="#home">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#events">Events</a></li>
              <li><a href="#publications">Publications</a></li>
              <li><button><a href="#contact">Contact Us</a></button></li>
              <li><a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a></li>
            </ul>
        </div>
        
    </nav>
<section id="home"></section>
<section class="home">
  <div class="home-content">
      <h1>Welcome to</h1>
      <h3>TCET ACM-SIGAI</h3>
      <p>Student's Chapter</p>

      <div class="btn-box">
          <a href="#about">Get Started</a>
          <a href="#contact">Let's Talk</a>
      </div>
  </div>

  <div class="home-sci">
      <a href="www.facebook.com"><i class='bx bxl-facebook'></i></a>
      <a href="https://www.instagram.com/tcet_acm.sigai"><i class='bx bxl-instagram' ></i></a>
      <a href="https://www.linkedin.com/company/tcet-acm-sigai"><i class='bx bxl-linkedin' ></i></a>
  </div>

  <span class="home-imgHover"></span>
</section>

<!-- <section id="about"></section> -->
<div class="about-us" id="about">
  <div class="container">
      <div class="row">
          <div class="flex">
              <h3>About Us</h3>
              <h2>TCET-ACM SIGAI Student's Chapter</h2>
              <h2><h3></h3></h2>
              <p id="about-description" ></p>
              <div class="social-links">
                  <a href="www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                  <a href="www.twitter.com"><i class="fab fa-twitter"></i></a>
                  <a href="https://www.instagram.com/tcet_acm.sigai"><i class="fab fa-instagram"></i></a>
              </div>
              <a href="" class="btn">Learn More</a>
          </div>
          <div class="flex">
              <div class="flex-image">
                   <img class= about-image src='./Images/sigai.JPG'>
              </div>
             
          </div>
      </div>
  </div>
</div>
<script>
  const textToType = "TCET ACM SIGAI is a professional body that was established in January 2023. It is a body that aims to bring together and inculcate research ideologies in people from all over India with a passion in the field of Artificial intelligence and Machine Learning by means of conducting seminars, debates, Kaggle competitions, etc.";

  let index = 0;
  const speed = 15; // typing speed in milliseconds
  const descriptionElement = document.getElementById('about-description');

  function typeWriter() {
    if (index < textToType.length) {
      descriptionElement.innerHTML += textToType.charAt(index);
      index++;
      setTimeout(typeWriter, speed);
    }
  }

  typeWriter();
</script>
</section>
<br>
<div class="hr-team"></div>

<!-- Team Section -->
<section class="team">
      <div class="cont">
      <h2 class="teamheading">Meet our Team</h2>
          <br>
          <br>
      <div class="team__container">
          <article class="team__member">
              <div class="img">
                  <div class="team__member-image">
                      <img src="./Images/alisha.png" width="200px" height="200px">
                  </div>
                  <div class="team__member-info">
                      <h4>Alisha Joseph</h4>
                      <p>Chairperson</p>
                  </div>
                  <div class="team__member-socials">
                      <a href="#" target="_blank"><i class='bx bxl-instagram' ></i></a>
                      <a href="#" target="_blank"><i class='bx bxl-linkedin' ></i></a>
                  </div>
              </div>
          </article>
          <article class="team__member">
              <div class="team__member-image">
                  <img src="./Images/vivek.png" width="200px" height="200px">
              </div>
              <div class="team__member-info">
                  <h4>Vivek Pandey</h4>
                  <p>Vice-Chairperson</p>
              </div>
              <div class="team__member-socials">
                  <a href="#" target="_blank"><i class='bx bxl-instagram' ></i></a>
                  <a href="#" target="_blank"><i class='bx bxl-linkedin' ></i></a>
              </div>
          </article>
          <article class="team__member">
              <div class="team__member-image">
                  <img src="./Images/hamza.png" width="200px" height="200px">
              </div>
              <div class="team__member-info">
                  <h4>Hamza Khan</h4>
                  <p>Secretary</p>
              </div>
              <div class="team__member-socials">
                  <a href="#" target="_blank"><i class='bx bxl-instagram' ></i></a>
                  <a href="#" target="_blank"><i class='bx bxl-linkedin' ></i></a>
              </div>
          </article>
          <article class="team__member">
              <div class="team__member-image">
                  <img src="../Images/anushka.png" width="200px" height="200px">
              </div>
              <div class="team__member-info">
                  <h4>Anushka Patil</h4>
                  <p>Event Manager</p>
              </div>
              <div class="team__member-socials">
                  <a href="#" target="_blank"><i class='bx bxl-instagram' ></i></a>
                  <a href="#" target="_blank"><i class='bx bxl-linkedin' ></i></a>
              </div>
          </article>
          <article class="team__member">
              <div class="team__member-image">
                  <img src="./Images/ietisha.png" width="200px" height="200px" >
              </div>
              <div class="team__member-info">
                  <h4>Ietisha Rathod</h4>
                  <p>Treasurer</p>
              </div>
              <div class="team__member-socials">
                  <a href="#" target="_blank"><i class='bx bxl-instagram' ></i></a>
                  <a href="#" target="_blank"><i class='bx bxl-linkedin' ></i></a>
              </div>
          </article>
          <article class="team__member">
              <div class="team__member-image">
                  <img src="./Images/vaishnavi.png" width="200px" height="200px">
              </div>
              <div class="team__member-info">
                  <h4>Vaishnavi Sirimalla</h4>
                  <p>Web Master</p>
              </div>
              <div class="team__member-socials">
                  <a href="#" target="_blank"><i class='bx bxl-instagram' ></i></a>
                  <a href="#" target="_blank"><i class='bx bxl-linkedin' ></i></a>
              </div>
          </article>
          <article class="team__member">
              <div class="team__member-image">
                  <img src="./Images/zaheer.png" width="200px" height="200px">
              </div>
              <div class="team__member-info">
                  <h4>Zaheer Khan</h4>
                  <p>Sponsorship Head</p>
              </div>
              <div class="team__member-socials">
                  <a href="#" target="_blank"><i class='bx bxl-instagram' ></i></a>
                  <a href="#" target="_blank"><i class='bx bxl-linkedin' ></i></a>
              </div>
          </article>
          <article class="team__member">
              <div class="team__member-image">
                  <img src="./Images/jayant.png" width="200px" height="200px">
              </div>
              <div class="team__member-info">
                  <h4>Jayant Nag Sai Vasa</h4>
                  <p>Publication Head</p>
              </div>
              <div class="team__member-socials">
                  <a href="#" target="_blank"><i class='bx bxl-instagram' ></i></a>
                  <a href="#" target="_blank"><i class='bx bxl-linkedin' ></i></a>
              </div>
          </article>
          <article class="fake-1 team__member">
              <div class=" team__member-image">
                  <img src="" width="200px" height="200px">
              </div>
              <div class="team__member-info">
              </div>
              <div class="team__member-socials">
                  <a href="" target=""><i class='' ></i></a>
                  <a href="" target=""><i class='' ></i></a>
              </div>
          </article>
          <article class="team__member">
              <div class="team__member-image">
                  <img src="./Images/tej.png" width="200px" height="200px">
              </div>
              <div class="team__member-info">
                  <h4>Tej Parmar</h4>
                  <p>Public Relation Head</p>
              </div>
              <div class="team__member-socials">
                  <a href="#" target="_blank"><i class='bx bxl-instagram' ></i></a>
                  <a href="#" target="_blank"><i class='bx bxl-linkedin' ></i></a>
              </div>
          </article>
          <article class="team__member">
              <div class="team__member-image">
                  <img src="./Images/dhruv.png" width="200px" height="200px">
              </div>
              <div class="team__member-info">
                  <h4>Dhruv Singh</h4>
                  <p>Technical Head</p>
              </div>
              <div class="team__member-socials">
                  <a href="#" target="_blank"><i class='bx bxl-instagram' ></i></a>
                  <a href="#" target="_blank"><i class='bx bxl-linkedin' ></i></a>
              </div>
          </article>
          <article class="fake-2 team__member">
              <div class=" team__member-image">
                  <img src="" width="200px" height="200px">
              </div>
              <div class="team__member-info">
              </div>
              <div class="team__member-socials">
                  <a href="" target=""><i class='' ></i></a>
                  <a href="" target=""><i class='' ></i></a>
              </div>
          </article>
      </div>
  </div>
  </section>


    <!-- ----------------------------Gallery section------------------------- -->
    <section class="gallery">
    <div class="wrapper">
      <h1 class="gallery-heading">Gallery</h1>
      <div class="carousel">
        <img src="./Images/1.jpg" alt="img" draggable="false">
        <img src="./Images/2.png" alt="img" draggable="false">
        <img src="./Images/3.jpg" alt="img" draggable="false">
        <img src="./Images/4.jpg" alt="img" draggable="false">
        <img src="./Images/5.jpg" alt="img" draggable="false">
        <img src="./Images/6.jpg" alt="img" draggable="false">
        <img src="./Images/7.JPG" alt="img" draggable="false">
      </div>
      <div class="arrow-buttons">
        <i id="left" class="fas fa-angle-left"></i>
        <i id="right" class="fas fa-angle-right"></i>
      </div>
    </div>
    <script src="Gallery.js"></script>
    </section>


    <br>


       <!-- Events Section -->
<section class="events" id="events">
  <div class="events-div" id="events-div">


  <section class="featured">
        <div class="container featured__container">
            <div class="post__thumbnail">
                <img src="./Images/99.jpg">
            </div>
            <div class="post__info">
                <a class="category__button">Events</a>
                <h2 class="post__title"><a href="post.html">Zephyr 2023</a></h2>
                <p class="post__body">
                    The three-day fun activity event held at TCET was a resounding success,
                    showcasing the vibrant spirit and creativity of the student community. 
                    Organized by various student committees, the event aimed to provide an entertaining platform
                    for students to unwind, engage in diverse activities, and foster a sense of camaraderie.
                </p>
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="./Images_Events/tcet.jpg"alt="Club image">
                    </div>
                    <div class="post__author-info">
                        <h5>By:TCET</h5>
                        <small>2023 October 4th - 6th</small>
                        <small>10AM - 6PM</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========================== END OF FEATURED ==================== -->
      




    <section class="posts">
        <div class="container post__container">
            <article class="post">
                <div class="post__thumbnail">
                    <img src="./Images_Events/1.1.jpg" alt="">
                </div>
                <div class="post__info">
                    <a href="" class="category__button">Competitions</a>
                    <h3 class="post__title">
                        <a href="post.html">ACM & SIG-AI National Level Coding Competition</a>
                    </h3>
                    <p class="post__body">
                        The coding competition, organized by SuperAI Community Stakeholder in collaboration with TCET ACM-SIGAI,
                        demonstrated successful execution and a collaborative effort. The use of the HackerRank platform ensured
                        objective evaluation of participants' solutions.
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="./Images_Events/SIG_AI.png" alt="icon">
                        </div>
                        <div class="post__author-info">
                            <h5>By:ACM & SIG-AI</h5>
                            <small>13th October, 2023</small><br>
                            <small>2:30 PM to 5:30 PM</small>
                        </div>
                    </div>
                </div>
            </article>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="./Images_Events/3.1.png" alt="">
                </div>
                <div class="post__info">
                    <a href="" class="category__button">IV Visits</a>
                    <h3 class="post__title">
                        <a href="post.html">ACM & SIG-AI Local Industrial Visit</a>
                    </h3>
                    <p class="post__body">
                        On August 25, 2023, the Thakur College of Engineering & Technology's Artificial Intelligence
                        & Machine Learning Department organized a local industrial visit for its AI&ML students at
                        Vervali Systems pvt ltd in Vasai West, Mumbai.
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="./Images_Events/SIG_AI.png" alt="icon">
                        </div>
                        <div class="post__author-info">
                            <h5>By:ACM & SIG-AI</h5>
                            <small>August 25th, 2023</small>
                        </div>
                    </div>
                </div>
            </article>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="./Images_Events/4.1.jpg" alt="">
                </div>
                <div class="post__info">
                    <a href="" class="category__button">Talks</a>
                    <h3 class="post__title">
                        <a href="post.html">ACM & SIG-AI National Level Expert Talk</a>
                    </h3>
                    <p class="post__body">
                        A national level workshop on 'Intellectual Property Rights and IP Management for startups'
                        was conducted by TCET ACM-SIGAI.  
                        By attending this webinar, students now have a better understanding of what intellectual
                        property entails, including patents, trademarks, copyrights, and trade secrets.
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="./Images_Events/SIG_AI.png" alt="icon">
                        </div>
                        <div class="post__author-info">
                            <h5>By:ACM & SIG-AI</h5>
                            <small>August 4th, 2023</small>
                        </div>
                    </div>
                </div>
            </article>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="./Images_Events/5.1.jpg" alt="">
                </div>
                <div class="post__info">
                    <a href="" class="category__button">Seminars</a>
                    <h3 class="post__title">
                        <a href="post.html">ACM & SIG-AI National Level Online Seminar</a>
                    </h3>
                    <p class="post__body">
                        A national level online seminar on 'Innovation and Start-up Ecosystem Enablers'
                        was conducted by TCET ACM-SIGAI.  
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="./Images_Events/SIG_AI.png" alt="icon">
                        </div>
                        <div class="post__author-info">
                            <h5>By:ACM & SIG-AI</h5>
                            <small>August 21st, 2023</small>
                        </div>
                    </div>
                </div>
            </article>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="./Images_Events/6.1.jpg" alt="">
                </div>
                <div class="post__info">
                    <a href="" class="category__button">Seminars</a>
                    <h3 class="post__title">
                        <a href="post.html">Seminar on Higher Studies</a>
                    </h3>
                    <p class="post__body">
                        A seminar on Higher Studies was conducted by TCET ACM-SIGAI in 
                        collaboration with CareerLabs Technologies Pvt Ltd.
                        Participants gained a deeper understanding of the importance
                        and benefits of pursuing higher studies. They now have a clearer
                        perspective on how advanced education can contribute to their personal
                        and professional development.
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="./Images_Events/SIG_AI.png" alt="icon">
                        </div>
                        <div class="post__author-info">
                            <h5>By:ACM & SIG-AI</h5>
                            <small>1st November, 2023</small><br>
                            <small>12 pm - 1 pm</small>
                        </div>
                    </div>
                </div>
            </article>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="./Images_Events/1.1.jpg" alt="">
                </div>
                <div class="post__info">
                    <a href="" class="category__button">Wild Life</a>
                    <h3 class="post__title">
                        <a href="post.html">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit!</a>
                    </h3>
                    <p class="post__body">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente tenetur incidunt quam 
                        explicabo esse aperiam nesciunt asperiores. Ea, facere 
                        doloribus.
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="./Images_Events/SIG_AI.png" alt="icon">
                        </div>
                        <div class="post__author-info">
                            <h5>By:ACM</h5>
                            <small>August 24, 2023</small>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <!-- =========================== END OF POSTS ==================== -->



    <section class="category__buttons">
    <div class="category__buttons-container">
        <a href="" class="category__button">Fiestas</a>
        <a href="" class="category__button">IV Visits</a>
        <a href="" class="category__button">Seminars</a>
        <a href="" class="category__button">Interaction</a>
        <a href="" class="category__button">Competitions</a>
        <a href="" class="category__button">Talks</a>
      </div>
    </section> 
    <!-- =========================== END OF CATEGORIES ==================== -->

  </div>
  <!-- End of events section -->
</section>

   <!-- ----------------------------------publication section Begins Here ------------------------------------- -->

    <section id="publications" class="publications">
        
    </section>
 <div class="magazine-section">
        <div class="section-title">Our Publications</div>
      
        <div class="magazine-items">
          <div class="magazine-item" onclick="window.location.href='https://online.pubhtml5.com/hiwar/abef/'">
            <img src="./Images/volume1.jpg" alt="Magazine Image 1">
            <div class="magazine-item-title">Tejas Volume 1</div>
          </div>
      
          <div class="magazine-item" onclick="window.location.href='https://pubhtml5.com/hiwar/uqpn/'">
            <img src="./Images/volume 2.jpg" alt="Magazine Image 2">
            <div class="magazine-item-title">Tejas Volume 2</div>
          </div>
      
          <div class="magazine-item" onclick="window.location.href='https://pubhtml5.com/hiwar/vfrp/'">
            <img src="./Images/volume3.jpg" alt="Magazine Image 3">
            <div class="magazine-item-title">Tejas Volume 3.1</div>
          </div>
        </div>
     </div>
  
  

<!-- ----------------------------------Contact section Begins Here ------------------------------------- -->


    <section id="contact">
       
       
        <div class="container">
            <!-- <span class="big-circle"></span> -->
            <!-- <img src="img/shape.png" class="square" alt="" /> -->
            <div class="form">
              <div class="contact-info">
                <h3 class="title">Let's get in touch</h3>
                <p class="text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                  dolorum adipisci recusandae praesentium dicta!
                </p>
      
                <div class="info">
                  <div class="information">
                    <img src="./Images/location.jpg" class="icon" alt="" />
                    <p>Thakur Village, Kandivali[East], Mumbai-400101 </p>
                  </div>
                  <div class="information">
                    <img src="./Images/email.png" class="icon" alt="" />
                    <p>acmsigai10@gmail.com</p>
                  </div>
                  <div class="information">
                    <img src="./Images/phone.jpg" class="icon" alt="" />
                    <p>9967142376</p>
                  </div>
                </div>
      
                <div class="social-media">
                  <p>Connect with us :</p>
                  <div class="social-icons">
                    <a href="www.facebook.com">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="www.twitter.com">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                      <i class="https://www.instagram.com/tcet_acm.sigai"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/tcet-acm-sigai">
                      <i class="fab fa-linkedin-in"></i>
                    </a>
                  </div>
                </div>
              </div>
      
              <div class="contact-form">
                <!-- <span class="circle one"></span>
                <span class="circle two"></span> -->
      
               <form method="post" action="index.php" id="contactForm" onsubmit="submitForm(event)">

                <h3 class="title">Contact us</h3>

                  <div class="input-container">
                    <input type="text" name="name" class="input" required/>
                    <label for="name">Username</label>
                    <span>Username</span>
                  </div>

                  <div class="input-container">
                    <input type="email" name="email" class="input" required/>
                    <label for="email">Email</label>
                    <span>Email</span>
                  </div>

                  <div class="input-container">
                    <input type="tel" name="phone" class="input" required/>
                    <label for="phone">Phone</label>
                    <span>Phone</span>
                  </div>

                 <input type="hidden" id="dateFilled" name="dateFilled" />

                  <div class="input-container textarea">
                    <textarea name="message" class="input"></textarea>
                    <label for="message">Message</label>
                    <span>Message</span>
                  </div>
                  <input type="submit" id="btn" value="Submit" name="submit" class="btn" />


                </form>
              </div>
            </div>
          </div>

          <!-- FOOTER -->
          
          <section class="footer">
          <footer>
      <div class="container-footer">
        <div class="wrapper-footer">
          <div class="footer-widget">
            <div class="footer-logo">
            <a href="#">
              <img src="./Images/SIG_AI.png" width="100px" height="100px" class="logo" />
            </a>
            </div>
            <p class="desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos
              deserunt magni recusandae ut! Natus?
            </p>
            <ul class="socials">
              <li>
                <a href="www.facebook.com">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li>
                <a href="www.twitter.com">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/tcet_acm.sigai">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/company/tcet-acm-sigai">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="footer-widget quicklinks">
            <h6>Quick Link</h6>
            <ul class="links">
              <li><a href="#home">S</a></li>
              <li><a href="#about">I</a></li>
              <li><a href="#events">G</a></li>
              <li><a href="#contact">A</a></li>
              <li><a href="#contact">I</a></li>
            </ul>
          </div>
         
          <div class="map-section">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.66489986486!2d72.87099646149932!3d19.209833197681018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b0e57647569d%3A0xc0aec329c82d3555!2sThakur%20College%20of%20Engineering%20and%20Technology!5e0!3m2!1sen!2sin!4v1703237073948!5m2!1sen!2sin" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
        </div>
        <div class="copyright-wrapper">
          <p>© 2023 TCET ACM SIG-AI</p>
        </div>
      </div>
    </footer>
          </section>

          <!-- POP UP -->

          <div class="popup center">
            <div class="icon">
                <i class="fa fa-check"></i>
            </div>
            <div class="title">
               Mail Sent
            </div>
            <div class="description">
              We have received your message successfully.
            </div>
            <div class="dismiss-btn">
              <button id="dismiss-popup-btn">Dismiss</button>
            </div>
            </div>

             <!-- POP UP -->
             
      
          <script src="contact.js"></script>
          <script src="https://smtpjs.com/v3/smtp.js"></script>   
          <script>document.getElementById('dateFilled').value = new Date().toISOString();</script>
          </section>

    <script src="Gallery.js"></script>    
</body>
</html>
