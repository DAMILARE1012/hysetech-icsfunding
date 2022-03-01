<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>

    <title>ICS Borrower</title>
    <meta content="" name="description"/>
    <meta content="" name="keywords"/>

    <!-- Favicons -->
    <link href="{{asset('web')}}/img/favicons.png" rel="icon"/>
    <link href="{{asset('web')}}/img/apple-touch-icon.png" rel="apple-touch-icon"/>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet"
    />

    <!-- Packages CSS Files -->
    <link
        href="{{asset('web')}}/vendor/bootstrap/css/bootstrap.min.css"
        rel="stylesheet"
    />
<!-- <link href="{{asset('web')}}/vendor/icofont/icofont.min.css" rel="stylesheet" />
    <link href="{{asset('web')}}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" /> -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link
        href="{{asset('web')}}/vendor/owl.carousel/assets/owl.carousel.min.css"
        rel="stylesheet"
    />
    <link href="{{asset('web')}}/css/main.css" rel="stylesheet"/>
</head>

<body>
<header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">
        <a href="{{route('web.index')}}" class="logo mr-auto">
            <img src="{{asset('web')}}/img/logo.png" alt="" class="img-fluid"/>
        </a>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="#services">Services</a></li>
                <li><a href="#blog">Blog</a></li>
                <li>
                    <a href="#contact">Contact us</a>
                </li>
                <li class="drop-down">
                    <a href="#">Login </a>
                    <ul>
                        <li><a href="{{route('borrower.login')}}">User</a></li>
                        <li><a href="{{route('consultant.login')}}">Consultant</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>
@yield('content')
<footer style="padding-top: 100px;">
    <div class="row mx-0">
        <div
            class="col-lg-4 col-md-6 d-flex flex-column align-items-stretch px-0"
        >
            <div class="footer-box box-1">
                <h3>Opening Hours & Contact</h3>
                <h6>Mon - Fri 9AM - 6PM</h6>
                <div class="email-number">
                    <p class="number">+62 8292 2088</p>
                    <p class="email">hafiz@gmail.com</p>
                </div>
                <div class="address">
                    <p>
                        3 Ang Mo Kio Street 62 <br/>
                        #03-32 Link@AMK <br/>
                        Singapore 569139
                    </p>
                </div>
            </div>
        </div>
        <div
            class="col-lg-4 col-md-6 d-flex flex-column align-items-stretch px-0"
        >
            <div class="footer-box box-2">
                <div class="logo">
                    <img src="{{asset('web')}}/img/logo-2.png" class="fluid" alt=""/>
                </div>
                <p>
                    Make yours a vibrant business. <br/>
                    Discover new opportunities everyday. <br/>
                    Get a finance assistance <br/>
                    Give Active. Give Vibrant. <br/>
                </p>
                <div class="rights">
                    <p>&copy; 2015-2019 ICS Funding</p>
                    <p>All Rights Reserved</p>
                    <p class="policy">Privacy Policy</p>
                </div>
            </div>
        </div>
        <div
            class="col-lg-4 col-md-6 d-flex flex-column align-items-stretch px-0"
        >
            <div class="footer-box box-3">
                <h3>ICS Funding</h3>
                <div class="funding">
                    <p>Business term loan</p>
                    <p>Line of Credit</p>
                    <p>Business Overdraft</p>
                    <p>Equipment Finance</p>
                    <p>Business term loan</p>
                    <p>Line of Credit</p>
                    <p>Business Overdraft</p>
                    <p>Equipment Finance</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bottom Nav -->
<div class="fixed-bottom d-flex align-items-center d-md-none">
    <div class="container">
        <div class="row">
            <ul>
                <li>
                    <a href="" class="active">
                <span class="icon">
                  <svg
                      width="20"
                      height="20"
                      viewBox="0 0 20 20"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                        d="M10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18ZM4.5 15.5L12.01 12.01L15.5 4.5L7.99 7.99L4.5 15.5ZM10 8.9C10.61 8.9 11.1 9.39 11.1 10C11.1 10.61 10.61 11.1 10 11.1C9.39 11.1 8.9 10.61 8.9 10C8.9 9.39 9.39 8.9 10 8.9Z"
                        fill="#CCE7F3"
                    />
                  </svg>
                </span>
                        <span class="text"> Home </span>
                    </a>
                    <a href="">
                <span class="icon">
                  <svg
                      width="18"
                      height="19"
                      viewBox="0 0 18 19"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                  >
                    <path d="M0 17.2952H18V18.8675H0V17.2952Z" fill="#CCE7F3"/>
                    <path d="M0 11.7922H18V13.3645H0V11.7922Z" fill="#CCE7F3"/>
                    <path
                        d="M6 1.57229V6.28916H1.5V1.57229H6ZM6 0H1.5C1.10218 0 0.720644 0.165651 0.43934 0.460513C0.158035 0.755374 0 1.15529 0 1.57229V6.28916C0 6.70615 0.158035 7.10607 0.43934 7.40093C0.720644 7.69579 1.10218 7.86145 1.5 7.86145H6C6.39782 7.86145 6.77936 7.69579 7.06066 7.40093C7.34196 7.10607 7.5 6.70615 7.5 6.28916V1.57229C7.5 1.15529 7.34196 0.755374 7.06066 0.460513C6.77936 0.165651 6.39782 0 6 0Z"
                        fill="#CCE7F3"
                    />
                    <path
                        d="M16.5 1.57229V6.28916H12V1.57229H16.5ZM16.5 0H12C11.6022 0 11.2206 0.165651 10.9393 0.460513C10.658 0.755374 10.5 1.15529 10.5 1.57229V6.28916C10.5 6.70615 10.658 7.10607 10.9393 7.40093C11.2206 7.69579 11.6022 7.86145 12 7.86145H16.5C16.8978 7.86145 17.2794 7.69579 17.5607 7.40093C17.842 7.10607 18 6.70615 18 6.28916V1.57229C18 1.15529 17.842 0.755374 17.5607 0.460513C17.2794 0.165651 16.8978 0 16.5 0Z"
                        fill="#CCE7F3"
                    />
                  </svg>
                </span>
                        <span class="text"> Overview </span>
                    </a>
                    <a href="">
                <span class="icon">
                  <svg
                      width="20"
                      height="21"
                      viewBox="0 0 20 21"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                        d="M19 13.5783C19 14.1343 18.7893 14.6675 18.4142 15.0607C18.0391 15.4538 17.5304 15.6747 17 15.6747H5L1 19.8675V3.09639C1 2.54039 1.21071 2.00717 1.58579 1.61402C1.96086 1.22087 2.46957 1 3 1H17C17.5304 1 18.0391 1.22087 18.4142 1.61402C18.7893 2.00717 19 2.54039 19 3.09639V13.5783Z"
                        stroke="#CCE7F3"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                  </svg>
                </span>
                        <span class="text"> Notification </span>
                    </a>
                    <a href="">
                <span class="icon">
                  <svg
                      width="18"
                      height="22"
                      viewBox="0 0 18 22"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                        d="M17 20.0121V17.9157C17 16.8037 16.5786 15.7372 15.8284 14.9509C15.0783 14.1646 14.0609 13.7229 13 13.7229H5C3.93913 13.7229 2.92172 14.1646 2.17157 14.9509C1.42143 15.7372 1 16.8037 1 17.9157V20.0121"
                        stroke="#CCE7F3"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M9 9.53007C11.2091 9.53007 13 7.65291 13 5.3373C13 3.0217 11.2091 1.14453 9 1.14453C6.79086 1.14453 5 3.0217 5 5.3373C5 7.65291 6.79086 9.53007 9 9.53007Z"
                        stroke="#CCE7F3"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                  </svg>
                </span>
                        <span class="text"> Profile </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script src="{{asset('web')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('web')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('web')}}/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="{{asset('web')}}/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="{{asset('web')}}/vendor/owl.carousel/owl.carousel.min.js"></script>

<!-- Template Main JS File -->
<script src="{{asset('web')}}/js/main.js"></script>
</body>
</html>
