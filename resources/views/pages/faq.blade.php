@extends('layout.app')
@section('title')

@section('content')
<div class="faq-main" data-aos="fade-down" data-aos-duration="1500">
    <div class="container text-center d-flex justify-content-center align-items-center">
        <h2 class="about-title">FAQ</h2>
    </div>
</div>
<div class="vertical-tab-menu  my-5 py-5" data-aos="fade-down-right" data-aos-duration="1500">
    <div class="container">
        <div class="row d-flex align-items-start py-5">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                        aria-selected="true">What is Lezzatos?</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false">How to order food in Lezzatos ?</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false">Which food is the most delicious ?</button>
                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                        aria-selected="false">How to book a table ?</button>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <h2>What is Lezzatos ?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                            quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                            consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                            consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto
                            odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait
                            nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                            doming id quod mazim placerat facer possim assum</p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                            quis nostrud exerci</p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <h2>How to order food in Lezzatos ?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                            quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                            consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                            consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto
                            odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait
                            nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                            doming id quod mazim placerat facer possim assum</p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                            quis nostrud exerci</p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">
                        <h2>Which food is the most delicious ?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                            quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                            consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                            consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto
                            odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait
                            nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                            doming id quod mazim placerat facer possim assum</p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                            quis nostrud exerci</p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        <h2>How to book a table ?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                            quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                            consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                            consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto
                            odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait
                            nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                            doming id quod mazim placerat facer possim assum</p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                            quis nostrud exerci</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="founder-about">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-right" data-aos-duration="1500">
                <div class="founder-img">
                    <img src="assets/theme/images/faq-sec.webp" width="100%" alt="">
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="1500">
                <div class="founder-msg faq-msg px-5">
                    <h5>Discover</h5>
                    <h2>Our Crew Ready to Help You</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                        architecto beatae vitae dicta sunt explicabo. </p>
                        <a href="">Contact us</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection