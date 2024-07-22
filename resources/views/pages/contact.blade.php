@extends('layout.app')
@section('title')
 
@section('content')
<div class="contact-main" data-aos="fade-down" data-aos-duration="1500">
    <div class="container text-center d-flex justify-content-center align-items-center">
        <h2 class="about-title">Contact us</h2>
    </div>
</div>
<div class="any-time my-5 py-5">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6" data-aos="fade-right" data-aos-duration="1500">
                <div class="contact-any mt-5">
                    <h2>Contact Us Anytime!</h2>
                    <p>Got a question or craving? Contact us anytime for a friendly chat or to place an order. We’re
                        here to help, so reach out whenever you need!</p>
                    <ul>
                        <li><strong>+62 868245124</strong><br>
                            <small>Telephone</small>
                        </li>
                        <li><strong>Admin@Lanadessert.Co.Uk</strong><br>
                            <small>Email</small>
                        </li>
                        <li><strong>28 Southwark ST, Nottingham, United Kingdom NG6 0DA</strong>
                            <small>Address</small>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="1500">
                <div class="contact-form text-center">
                    <h2>Contact Form</h2>
                    <form class="mt-5">
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Name" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Email" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Phone" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Subject" id="exampleInputPassword1">
                        </div>
                        <textarea name="" class="form-control" placeholder="Message...." rows="6" id=""></textarea>
                        <button type="submit" class="btn mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="menu-items my-5 py-5" data-aos="fade-down-right" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="dish-menu contact-menu">
                    <h2>Opening Hours</h2>
                    <p><strong>Monday </strong> <span>05:00pm-2.00am</span></p>
                    <p><strong>Tuesday </strong> <span>05:00pm-2.00am</span></p>
                    <p><strong>Wednesday </strong> <span>05:00pm-2.00am</span></p>
                    <p><strong>Thusrsday </strong> <span>05:00pm-2.00am</span></p>
                    <p><strong>Friday </strong> <span>05:00pm-2.00am</span></p>
                    <p><strong>Saturday </strong> <span>05:00pm-2.00am</span></p>
                    <p><strong>Sunday </strong> <span>05:00pm-2.00am</span></p>
                     
                </div>

            </div>
            <div class="col-md-4">
                <div class="dish-img d-grid">
                    <img src="./images/dish-menu1.webp" class="dish-one" width="350px" alt="">
                    <img src="assets/theme/images/dish-menu2.webp" class="mt-4 dish-two" width="350px" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="right-side-dish d-grid">
                    <img src="assets/theme/images/dish-menu3.webp" class="dish-three" width="100%" alt="">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="founder-about cheif-about">
    <div class="container">
        <div class="row">

            <div class="col-md-6" data-aos="fade-right" data-aos-duration="1500">
                <div class="cheif-crew mt-4">
                    <h5>Discover</h5>
                    <h2>Our Chef will Make You  <br>Satisfying</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium, totam rem aperiam, eaque ipsa quae ab illo</p>
                        <button class="btn btn-danger">Order now</button>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="1500">
                <div class="founder-img">
                    <img src="assets/theme/images/cheif-crew.jpg" width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection