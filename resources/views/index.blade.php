@extends('partials.app')
@section('title', 'Dashboard')
@section('style')
   
@endsection

@section('content')

<section class="pt-3 pb-4" id="count-stats">
            <div class="container">
                <div class="row">
                    <div class="py-3 mx-auto col-lg-9">
                        <div class="row">
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-dark"><span id="state1" countTo="70">0</span>+
                                    </h1>
                                    <h5 class="mt-3">Coded Elements</h5>
                                    <p class="text-sm font-weight-normal">From buttons, to inputs, navbars, alerts or
                                        cards, you are covered</p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-dark"> <span id="state2"
                                            countTo="15">0</span>+</h1>
                                    <h5 class="mt-3">Design Blocks</h5>
                                    <p class="text-sm font-weight-normal">Mix the sections, change the colors and
                                        unleash your creativity</p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-dark" id="state3" countTo="4">0</h1>
                                    <h5 class="mt-3">Pages</h5>
                                    <p class="text-sm font-weight-normal">Save 3-4 weeks of work when you use our
                                        pre-made pages for your website</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="py-5 my-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="mt-4 col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0">
                        <div class="rotating-card-container">
                            <div
                                class="mt-5 card card-rotate card-background card-background-mask-primary shadow-dark mt-md-0">
                                <div class="front front-background"
                                    style="background-image: url(https://asset.kompas.com/crops/MUiHPEJKwJknhjbHQTINeA3BkTI=/0x0:0x0/1200x800/data/photo/2021/05/08/60961de48b31a.jpg); background-size: cover;">
                                    <div class="text-center card-body py-7">
                                        <i class="my-3 text-4xl text-white material-symbols-rounded">touch_app</i>
                                        <h3 class="text-white">Cari Gym <br /> di Kotamu</h3>
                                        <p class="text-white opacity-8">Gymloc memudahkan anda mencari gym dengan beberapa fasilitas</p>
                                    </div>
                                </div>
                                <div class="back back-background"
                                    style="background-image: url(https://asset.kompas.com/crops/fg6z7bDQSPNA625RFOFP1ndlKac=/0x0:3000x2000/1200x800/data/photo/2024/03/26/66023bbbb5ce3.jpg); background-size: cover;">
                                    <div class="text-center card-body pt-7">
                                        <h3 class="text-white">Explore More</h3>
                                        <p class="text-white opacity-8"> Kamu akan di berikan list.
                                        </p>
                                        <a href="(menuju ke location/list gym)" target="_blank"
                                            class="mx-auto mt-3 btn btn-white btn-sm w-50">Start with Gymloc</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ms-auto">
                        <div class="row justify-content-start">
                            <div class="col-md-6">
                                <div class="info">
                                    <i
                                        class="text-3xl material-symbols-rounded text-gradient text-success">content_copy</i>
                                    <h5 class="mt-3 font-weight-bolder">Full Documentation</h5>
                                    <p class="pe-5">Built by developers for developers. Check the foundation and you
                                        will find everything inside our documentation.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <i
                                        class="text-3xl material-symbols-rounded text-gradient text-success">flip_to_front</i>
                                    <h5 class="mt-3 font-weight-bolder">Bootstrap 5 Ready</h5>
                                    <p class="pe-3">The world’s most popular front-end open source toolkit, featuring
                                        Sass variables and mixins.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 row justify-content-start">
                            <div class="mt-3 col-md-6">
                                <i
                                    class="text-3xl material-symbols-rounded text-gradient text-success">price_change</i>
                                <h5 class="mt-3 font-weight-bolder">Save Time & Money</h5>
                                <p class="pe-5">Creating your design from scratch with dedicated designers can be
                                    very expensive. Start with our Design System.</p>
                            </div>
                            <div class="mt-3 col-md-6">
                                <div class="info">
                                    <i class="text-3xl material-symbols-rounded text-gradient text-success">devices</i>
                                    <h5 class="mt-3 font-weight-bolder">Fully Responsive</h5>
                                    <p class="pe-3">Regardless of the screen size, the website content will naturally
                                        fit the given resolution.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="mt-5 text-center row my-sm-5">
                        <div class="mx-auto col-lg-6">
                            <span class="mb-3 badge bg-success">Boost creativity</span>
                            <h2 class="">With our coded pages</h2>
                            <p class="lead">The easiest way to get started is to use one of our <br /> pre-built
                                example pages. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mt-4 row">
                            <div class="col-md-6">
                                <a href="./pages/about-us.html">
                                    <div class="card move-on-hover">
                                        <img class="w-100"
                                            src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/material-design-system/assets/img/about-us.jpg"
                                            alt="aboutus">
                                    </div>
                                    <div class="mt-2 ms-2">
                                        <h6 class="mb-0">About Us Page</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="mt-5 col-md-6 mt-md-0">
                                <a href="./pages/contact-us.html">
                                    <div class="card move-on-hover">
                                        <img class="w-100"
                                            src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/material-design-system/assets/img/contact-us.jpg"
                                            alt="contacus">
                                    </div>
                                    <div class="mt-2 ms-2">
                                        <h6 class="mb-0">Contact Us Page</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto mt-5 col-md-3 mt-md-0">
                        <div class="position-sticky" style="top:100px !important">
                            <h4 class="">Presentation Pages for Company, Sign In Page, Author and Contact</h4>
                            <h6 class="text-secondary font-weight-normal">These is just a small selection of the
                                multiple possibitilies you have. Focus on the business, not on the design.</h6>
                        </div>
                    </div>
                </div>
        </section>


        <!-- -------- START Content Presentation Docs ------- -->
        <div class="container mt-sm-5">
            <div class="py-6 mb-3 page-header py-md-5 my-sm-3 border-radius-xl"
                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/desktop.jpg');"
                loading="lazy">
                <span class="mask bg-gradient-dark"></span>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 ms-lg-5">
                            <h4 class="text-white">Built by developers</h4>
                            <h1 class="text-white">Complex Documentation</h1>
                            <p class="text-white lead opacity-8">From colors, cards, typography to complex elements,
                                you will find the full documentation. Play with the utility classes and you will create
                                unlimited combinations for our components.</p>
                            <a href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-kit"
                                class="text-white icon-move-right">
                                Read docs
                                <i class="text-sm fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="p-4 info-horizontal bg-gradient-dark border-radius-xl d-block d-md-flex">
                        <i class="text-3xl text-white material-symbols-rounded">flag</i>
                        <div class="mt-3 ps-0 ps-md-3 mt-md-0">
                            <h5 class="text-white">Getting Started</h5>
                            <p class="text-white">Check the possible ways of working with our product and the necessary
                                files for building your own project.</p>
                            <a href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-kit"
                                class="text-white icon-move-right">
                                Let's start
                                <i class="text-sm fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-4 col-lg-4 px-lg-1 mt-lg-0">
                    <div class="p-4 bg-gray-100 info-horizontal border-radius-xl d-block d-md-flex h-100">
                        <i
                            class="text-3xl material-symbols-rounded text-gradient text-primary">precision_manufacturing</i>
                        <div class="mt-3 ps-0 ps-md-3 mt-md-0">
                            <h5>Plugins</h5>
                            <p>Get inspiration and have an overview about the plugins that we used to create the
                                Material Kit.</p>
                            <a href="https://www.creative-tim.com/learning-lab/bootstrap/datepicker/material-kit"
                                class="text-primary icon-move-right">
                                Read more
                                <i class="text-sm fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-4 col-lg-4 mt-lg-0">
                    <div class="p-4 bg-gray-100 info-horizontal border-radius-xl d-block d-md-flex">
                        <i class="text-3xl material-symbols-rounded text-gradient text-primary">receipt_long</i>
                        <div class="mt-3 ps-0 ps-md-3 mt-md-0">
                            <h5>Utility Classes</h5>
                            <p>Material Kit is giving you a lot of pre-made elements. For those who want flexibility, we
                                included many utility classes.</p>
                            <a href="https://www.creative-tim.com/learning-lab/bootstrap/utilities/material-kit"
                                class="text-primary icon-move-right">
                                Read more
                                <i class="text-sm fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------- END Content Presentation Docs ------- -->


        <section class="py-7">
            <div class="container">
                <div class="row">
                    <div class="mx-auto text-center col-lg-6">
                        <h2 class="mb-0 font-weight-bolder">Trusted by over</h2>
                        <h2 class="mb-3 text-gradient font-weight-bolder text-success">2,603,000+ web developers</h2>
                        <p class="lead">Many Fortune 500 companies, startups, universities and governmental
                            institutions love Creative Tim's products. </p>
                    </div>
                </div>
                <div class="mt-6 row">
                    <div class="col-lg-4 col-md-8">
                        <div class="card card-plain">
                            <div class="card-body">
                                <div class="author">
                                    <div class="name">
                                        <h6 class="mb-0 font-weight-bolder">Nick Willever</h6>
                                        <div class="stats">
                                            <i class="far fa-clock"></i> 1 day ago
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4">"This is an excellent product, the documentation is excellent and
                                    helped me get things done more efficiently."</p>
                                <div class="mt-3 rating">
                                    <i class="fas fa-star text-success"></i>
                                    <i class="fas fa-star text-success"></i>
                                    <i class="fas fa-star text-success"></i>
                                    <i class="fas fa-star text-success"></i>
                                    <i class="fas fa-star text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-8 ms-md-auto">
                        <div class="card bg-dark">
                            <div class="card-body">
                                <div class="author align-items-center">
                                    <div class="name">
                                        <h6 class="mb-0 text-white font-weight-bolder">Shailesh Kushwaha</h6>
                                        <div class="text-white stats">
                                            <i class="far fa-clock"></i> 1 week ago
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4 text-white">"I found solution to all my design needs from Creative Tim.
                                    I use them as a freelancer in my hobby projects for fun! And its really affordable,
                                    very humble guys !!!"</p>
                                <div class="mt-3 rating">
                                    <i class="text-white fas fa-star"></i>
                                    <i class="text-white fas fa-star"></i>
                                    <i class="text-white fas fa-star"></i>
                                    <i class="text-white fas fa-star"></i>
                                    <i class="text-white fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-8">
                        <div class="card card-plain">
                            <div class="card-body">
                                <div class="author">
                                    <div class="name">
                                        <h6 class="mb-0 font-weight-bolder">Samuel Kamuli</h6>
                                        <div class="stats">
                                            <i class="far fa-clock"></i> 3 weeks ago
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4">"Great product. Helped me cut the time to set up a site. I used the
                                    components within instead of starting from scratch. I highly recommend for
                                    developers who want to spend more time on the backend!."</p>
                                <div class="mt-3 rating">
                                    <i class="fas fa-star text-success"></i>
                                    <i class="fas fa-star text-success"></i>
                                    <i class="fas fa-star text-success"></i>
                                    <i class="fas fa-star text-success"></i>
                                    <i class="fas fa-star text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr class="my-5 horizontal dark">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-6 ms-auto">
                        <img class="w-100 opacity-6" src="./assets/img/logos/gray-logos/logo-apple.svg"
                            alt="Logo">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <img class="w-100 opacity-6" src="./assets/img/logos/gray-logos/logo-facebook.svg"
                            alt="Logo">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <img class="w-100 opacity-6" src="./assets/img/logos/gray-logos/logo-nasa.svg"
                            alt="Logo">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 ms-lg-0 ms-md-auto">
                        <img class="w-100 opacity-6" src="./assets/img/logos/gray-logos/logo-vodafone.svg"
                            alt="Logo">
                    </div>
                    <div class="mx-auto col-lg-2 col-md-4 col-6 me-md-auto mx-md-0">
                        <img class="w-100 opacity-6" src="./assets/img/logos/gray-logos/logo-digitalocean.svg"
                            alt="Logo">
                    </div>
                </div>
            </div>
        </section>


        <section class="py-sm-7" id="download-soft-ui">
            <div class="m-3 overflow-hidden bg-gradient-dark position-relative border-radius-xl">
                <img src="./assets/img/shapes/waves-white.svg" alt="pattern-lines"
                    class="position-absolute start-0 top-md-0 w-100 opacity-2">
                <div class="container py-7 postion-relative z-index-2 position-relative">
                    <div class="row">
                        <div class="mx-auto text-center col-md-7">
                            <h3 class="mb-0 text-white h4">Do you love this awesome</h3>
                            <h3 class="text-white">UI Kit for Bootstrap 5?</h3>
                            <p class="mb-5 text-white">Cause if you do, it can be yours for FREE. Hit the button below
                                to navigate to Creative Tim where you can find the Design System in HTML. Start a new
                                project or give an old Bootstrap project a new look!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

@section('scripts')
@endsection