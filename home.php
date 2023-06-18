<?php
include 'header.php';
?>

<!-- banner start -->
<section class="">

    <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/images/cosulting/cns-1.jpg" class="d-block w-100 carousel-image img-fluid "
                    alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Expert Guidance for Educational Success</h5>
                    <p>Get personalized educational consultation from our experienced team of experts. We offer
                        tailored guidance to help you excel academically and make informed decisions for your
                        future.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/cosulting/cns-2.jpg" class="d-block w-100 carousel-image img-fluid "
                    alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Unlock Your Potential with Professional Advice</h5>
                    <p>Discover your true potential with our educational consultation services. Our team of
                        professionals will provide you with comprehensive guidance, empowering you to choose the
                        right educational path and achieve your goals.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/cosulting/cns-3.jpg" class="d-block w-100 carousel-image img-fluid "
                    alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-white fs-3">Navigate the Educational Landscape with Confidence</h5>
                    <p>Confused about educational options? Let us be your compass. Our educational consultation
                        services will equip you with the knowledge and confidence to navigate the complex
                        educational landscape, ensuring you make informed choices for your academic journey.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</section>
<!-- banner end -->

<!-- about us start -->
<section class="d-lg-flex justify-content-center align-items-center my-5 p-2">

    <div class="col-12 col-lg-6">
        <h2 class="">About Us</h2>
        <p class="">
            Our educational consultation website is dedicated to connecting students with highly skilled
            teachers who have expertise in specific subjects. Our platform allows students to easily search and
            find teachers who are best suited to their individual needs and requirements. <br> <br>

            All of our teachers are qualified and experienced professionals who have a proven track record of
            success in their respective fields. We carefully vet all of our teachers to ensure that they meet
            our high standards for expertise and professionalism. <br> <br>

            Our focus is on providing personalized, high-quality teaching to help students achieve their full
            potential. We are committed to ensuring the safety and security of all students and teachers who use
            our platform and take extensive measures to verify the credentials of all teachers before they are
            listed on our site. <a href="#">Read More</a>
        </p>
    </div>

    <div class="col-12 col-lg-6 p-4 rounded-3">
        <img class="w-full img-fluid rounded-3" src="./assets/images/cosulting/cns-5.jpg" alt="counseling">
    </div>
</section>

<!-- top courses -->
<section class="my-5">
    <h2 class="text-center my-5 font-eb-garamond display-6 fw-bold">Top Courses</h2>

    <div class="row row-cols-1 mb-3 row-cols-md-3 g-4">
        <?php
        $sql = "SELECT * FROM course LIMIT 3"; // Fetch only 3 courses
        $result = mysqli_query($mysqli, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $ID = $row["ID"];
            $course_name = $row["course_name"];
            $course_image = $row["course_image"];
            $teacher_name = $row["teacher_name"];
            $teacher_email = $row["teacher_email"];
            $price = $row["price"];

            // Check if user is logged in
            if (isset($_SESSION['user_id'])) {
                // Check if user role is admin or instructor
                if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'instructor') {
                    $disableButton = 'none';
                } else {
                    $disableButton = 'block';
                }
            } else {
                // User is not logged in, disable the button
                $disableButton = 'none';
            }

            echo '
            <div class="col">
                <div class="card h-100">
                    <div class="h-75">
                        <img src=' . $course_image . ' class="img-fluid h-100 w-100" alt="...">
                    </div>
                    
                    <div class="p-2">
                        <h5 class="card-title"> ' . $course_name . ' </h5>
                        <h6>Teacher Name: ' . $teacher_name . ' </h6>
                        <h6>Course Fee: $' . $price . ' </h6>
                        <div class="d-flex justify-content-end d-' . $disableButton . '">
                            <a class="btn btn-info text-white ms-auto" href="selectClass.php?updateid=' . $ID . '">
                            Select
                            </a>
                        </div>                        
                    </div>
                </div>
            </div>   
                ';
        }

        ?>
    </div>

    <div class="text-center mt-3 mb-5 ">
        <a class="btn btn-warning fw-semibold ms-auto" href="courses.php">View All Courses</a>
    </div>
</section>

<!-- Top blogs -->
<section class="my-5">
    <h2 class="text-center my-5 font-eb-garamond display-6 fw-bold">Top Blogs</h2>

    <div class="row row-cols-1 mb-3 row-cols-md-3 g-4">
        <?php
        $sql = "SELECT * FROM blogs LIMIT 3"; // Fetch only 3 blogs
        $result = mysqli_query($mysqli, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $ID = $row["ID"];
            $blog_title = $row["blog_title"];
            $blog_image = $row["blog_image"];
            $blog_text = $row["blog_text"];
            $author_name = $row["author_name"];
            $author_email = $row["author_email"];

            echo '
            <div class="col">
                <div class="card h-100">
                <div class="h-75">
                    <img src=' . $blog_image . ' class="img-fluid h-100" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title"> ' . $blog_title . ' </h5>
                    <h6>Author Name: ' . $author_name . ' </h6>
                    <p class="card-text">
                        ' . $blog_text . '
                    </p>
                </div>
                </div>
            </div>   
                ';
        }

        ?>
    </div>

    <div class="text-center mt-2 mb-5">
        <a class="btn btn-warning fw-semibold ms-auto" href="blogs.php">View All Blogs</a>
    </div>
</section>


<!-- Top reviews -->
<section class="my-5">
    <h2 class="text-center my-5 font-eb-garamond display-6 fw-bold">What Our Students Say!!</h2>

    <div class="row row-cols-1 mb-3 row-cols-md-3 g-4">
        <?php
        $sql = "SELECT * FROM reviews LIMIT 3"; // Fetch only 3 reviews
        $result = mysqli_query($mysqli, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $ID = $row["ID"];
            $name = $row["name"];
            $email = $row["email"];
            $image = $row["image"];
            $message = $row["message"];

            echo '
            <div class="col">
                    <div class="card w-100 h-100">
                        <div class="h-50 w-50 mx-auto p-2">
                            <img src=' . $image . ' class="rounded rounded-circle w-100  h-100" alt="...">
                        </div>
                        <div class="p-4">
                            <div class="d-flex gap-2 my-2 justify-content-center fs-3">
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-regular fa-star text-warning"></i>
                            </div>
                            <h5>' . $name . ' </h5>
                            <p class="">
                                ' . $message . '
                            </p>
                        </div>
                    </div>
            </div>   
                ';
        }

        ?>
    </div>

</section>


<!-- why us section -->
<section class="container-fluid my-5 ">
    <h2 class="text-center mb-2 font-eb-garamond display-6 fw-bold"> Why Choose Us!! </h2>

    <div class="row row-cols-1 row-cols-md-2 g-2 mt-5 align-items-center">

        <div class="col">

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Experience and Expertise
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Our team of educational consultants brings years of experience and expertise in the field of
                            education. With a deep understanding of the educational landscape, we are well-equipped to
                            provide valuable insights and guidance to students and parents alike. Our track record of
                            successful consultations and positive outcomes speaks for itself.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Personalized Approach:
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            We believe in the power of personalization when it comes to education. We understand that
                            every student is unique, with their own strengths, weaknesses, and aspirations. Our
                            consultation services are tailored to meet the individual needs of each student, ensuring
                            that they receive personalized advice and support throughout their educational journey.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Comprehensive Support
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Our consultation services go beyond just providing advice. We offer comprehensive support to
                            students and parents at every step of the way. From selecting the right educational
                            institution or program to assisting with the application process, we are committed to
                            guiding our clients through the entire educational decision-making process.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Holistic Approach to Education
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            We believe in taking a holistic approach to education, focusing not only on academic success
                            but also on personal growth and development. Our consultation services encompass a wide
                            range of areas, including academic planning, career counseling, extracurricular activities,
                            and personal well-being. We understand that education is not just about grades and test
                            scores; it's about nurturing well-rounded individuals who are prepared for the challenges of
                            the real world.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <img class="w-full img-fluid  rounded-3"
                src="https://img.freepik.com/free-vector/people-ask-question_102902-2341.jpg?w=740&t=st=1687034831~exp=1687035431~hmac=acb4b9c25651fda85ccc42b081ec9c9cff6b6dba4ec7f2f09bbe9b6e87ac6732"
                alt="counseling">
        </div>

    </div>

</section>

<!-- contact us -->
<!-- <section class="container-fluid my-5 p-2">
    <h2 class="text-center mb-2 font-eb-garamond display-6 fw-bold"> Contact With Us </h2>
    <p class="text-center px-md-5 mb-3 font-poppins text-black-50">
        if you have any issues or if you want to give us feedback contact with us. We will be greatfull to talk to you.
    </p>

    <div class="row row-cols-1 row-cols-md-2 g-2 mt-5 align-items-center">

        <div class="col">

            <div class="row row-cols-1 row-cols-md-2 g-0">

                <div class="col">
                    <div class="card h-100 py-3 px-1">
                        <img class="w-auto mx-auto" src="./assets/address.png" class="card-img-top" alt="...">
                        <div class="card-body text-center">

                            <h3 class="card-title font-eb-garamond fw-bold">Address</h3>
                            <p class="card-text font-poppins text-black-50">
                                Mohakhali, Dhaka-1212 <br>
                                Dhaka, Bangladesh
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 py-3 px-1 bg-gradient">
                        <img class="w-auto mx-auto" src="./assets/call.png" class="card-img-top" alt="...">
                        <div class="card-body text-center">

                            <h3 class="card-title font-eb-garamond fw-bold">Call Us</h3>
                            <p class="card-text font-poppins text-black-50">
                                +88 01750 00 00 00 <br>
                                +88 01750 00 00 00
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 py-3 px-1">
                        <img class="w-auto mx-auto" src="./assets/email.png" class="card-img-top" alt="...">
                        <div class="card-body text-center">

                            <h3 class="card-title font-eb-garamond fw-bold">Email Us</h3>
                            <p class="card-text font-poppins text-black-50">
                                educonsultant@gmail.com <br>
                                educonsultant@gmail.com
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 py-3 px-1">
                        <img class="w-auto mx-auto" src="./assets/call.png" class="card-img-top" alt="...">
                        <div class="card-body text-center">

                            <h3 class="card-title font-eb-garamond fw-bold">Working Hours</h3>
                            <p class="card-text font-poppins text-black-50">
                                Mon-Fri: 9AM to 5PM <br>
                                Sunday: 9AM to 1 PM
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <form class="d-flex flex-column fs-5">
                <input class="py-2 ps-3 my-1 rounded" type="text" placeholder="Your Name">
                <input class="py-2 ps-3 my-1 rounded" type="email" placeholder="Your Email" required>
                <textarea class="py-3 my-1 rounded" name="" id="" cols="60" rows="5">

                        </textarea>
                <button class="btn btn-warning my-1 py-2 fs-5">
                    Send Message
                </button>
            </form>
        </div>

    </div>

</section> -->
<!-- contact us -->

<?php
// Include the footer file
include 'footer.php';
?>