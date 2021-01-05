<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>MarketPlace Blog | Contact</title>
    <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
    <!-- //web fonts -->
    <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('temp/assets/css/style-starter.css')}}">
  </head>
  <body>

<div class="w3l-bootstrap-header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light p-2">
        <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><strong style="color:#2B3483">MarketPlace Blog</strong><strong style="color:#E58225">.</strong></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <div class="form-inline">
            <a href="{{ url('/about')}}" class="help mr-4">About</a>
            </div>

            <div class="form-inline">
            <a href="{{url('/contact/all/contacts/create')}}" class="about mr-4">Contact</a>
            </div>

            <div class="form-inline">
            <a href="{{ route('login') }}" class="btn btn-warning sign" style="border-radius: 90px;"><strong style="color:white;">Sign in</strong></a>
            </div>

        </div>
        </div>
    </nav>
</div>
<section class="w3l-contact mt-5">
  <div class="contacts-9 py-5 mt-5">
    <div class="container py-lg-3">
      <div class="row top-map">
        <div class="cont-details col-md-5">
          <div class="heading mb-lg-4 mb-4">
            <h3 class="head">Contact</h3>
          </div>
          <div class="cont-top">
            <div class="cont-left">
              <span class="fa fa-phone"></span>
            </div>
            <div class="cont-right">
              <p><a href="tel:+44-99-555-42">+255 684 456 287</a></p>

            </div>
          </div>
          <div class="cont-top mt-4">
            <div class="cont-left">
              <span class="fa fa-envelope-o"></span>
            </div>
            <div class="cont-right">
              <p><a href="mailto:mailid@mail.com" class="mail">info@getpesa.co.tz</a></p>
            </div>
          </div>
          <div class="cont-top mt-4">
            <div class="cont-left">
              <span class="fa fa-map-marker"></span>
            </div>
            <div class="cont-right">
              <p>Innovation Hub255
                1st Floor, House 40
                Block 10, Bagamoyo Road
                14107 - Dar es Salaam, Tanzania.</p>
            </div>
          </div>
        </div>

        <div class="map-content-9 col-md-7 mt-5 mt-md-0">
            @include('msgs.success')
          <form action="{{ url('/contact/all/contacts/') }}" method="POST">

            {{ csrf_field() }}

            <div class="form-group row">
              <div class="col-md-6">
                <label class="contact-textfield-label" for="firstname">First Name</label>
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="E.g: Hassan" required="required">
              </div>
              <div class="col-md-6 mt-md-0 mt-3">
                <label class="contact-textfield-label" for="lastname">Last Name</label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="E.g: Omary" required="required">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label class="contact-textfield-label" for="email">Your Email ID</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="E.g: hassan@yahoo.com" required="required">
              </div>
              <div class="col-md-6 mt-md-0 mt-3">
                <label class="contact-textfield-label" for="phone_number">Phone Number</label>
                <input type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="E.g: 255713456789" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="contact-textfield-label" for="message">Message</label>
              <textarea name="message" class="form-control" id="message" placeholder="E.g: Please i need to know about Financial education especially on saving." required=""></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-contact">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7923.876215079791!2d39.24426062419866!3d-6.777387780404493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbd3da43153156e46!2shub255!5e0!3m2!1sen!2stz!4v1593601458271!5m2!1sen!2stz" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
</section>

<section class="w3l-market-footer">
    <footer class="footer-28">
      <div class="footer-bg-layer">
        <div class="container py-lg-3">
          <div class="row footer-top-28">
            <div class="col-md-6 footer-list-28 mt-5">
              <h6 class="footer-title-28">Contact information</h6>
              <ul>
                <li>
                  <p><strong>Address</strong> : Innovation Hub255
                    1st Floor, House 40
                    Block 10, Bagamoyo Road
                    14107 - Dar es Salaam, Tanzania.</p>
                </li>
                <li>
                  <p><strong>Phone</strong> : <a href="tel:+404-11-22-89">+255 684 456 287</a></p>
                </li>
                <li>
                  <p><strong>Email</strong> : <a href="mailto:example@mail.com">info@getpesa.co.tz</a></p>
                </li>
              </ul>

              <div class="main-social-footer-28 mt-3">
                <ul class="social-icons">
                  <li class="facebook">
                    <a href="https://www.facebook.com/GetPesaTZ/" target="_blank" title="Facebook">
                      <span class="fa fa-facebook" aria-hidden="true"></span>
                    </a>
                  </li>
                  <li class="twitter">
                    <a href="https://twitter.com/GetPesaTZ" target="_blank" title="Twitter">
                      <span class="fa fa-twitter" aria-hidden="true"></span>
                    </a>
                  </li>
                  <li class="linkedin">
                    <a href="https://www.linkedin.com/company/getpesa" target="_blank">
                      <span class="fa fa-linkedin" aria-hidden="true"></span>
                    </a>
                  </li>
                  {{-- <li class="dribbble">
                    <a href="#link" title="Dribbble">
                      <span class="fa fa-dribbble" aria-hidden="true"></span>
                    </a>
                  </li> --}}
                  {{-- <li class="google">
                    <a href="#link" title="Google">
                      <span class="fa fa-google" aria-hidden="true"></span>
                    </a>
                  </li> --}}
                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-4 footer-list-28 mt-5">
                  <h6 class="footer-title-28">Company</h6>
                  <ul>
                  <li><a href="{{ url('/about') }}">About</a></li>
                    <li><a href="{{ url('/contact/all/contacts/create')}}">Contact</a></li>
                    <li><a href="pricing.html#faq">FAQ</a></li>
                    <li><a href="pricing.html">Pricing</a></li>
                  </ul>
                </div>
                <div class="col-md-4 footer-list-28 mt-5">
                  <h6 class="footer-title-28">Quick Links</h6>
                  <ul>
                  <li><a href="#">Blog Posts</a></li>
                  <li><a href="{{ route('login') }}">Sign in</a></li>
                    <li><a href="learn.html">Learning Center</a></li>
                    <li><a href="career.html#team">Team</a></li>
                  </ul>
                </div>
                <div class="col-md-4 footer-list-28 mt-5">
                  <h6 class="footer-title-28">Products</h6>
                  <ul>
                    <li><a href="http://compare.getpesa.co.tz/" target="_blank">MarketPlace</a></li>
                    <li><a href="https://getpesa.co.tz/" target="_blank">GetPesa</a></li>
                    <li><a href="http://3.14.58.137/" target="_blank">Welfare Application</a></li>
                    <li><a href="https://pesa.getpesa.co.tz/client" target="_blank">Pesa GetPesa</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="midd-footer-28 align-center py-lg-4 py-3 mt-5">
          <div class="container">
            <p class="copy-footer-28 text-center"> &copy; {{ date('Y') }} MarketPlace Blog. All Rights Reserved. A Product by <a
              href="https://getpesa.co.tz/" target="_blank">GetPesa Limited</a></p>
          </div>
        </div>
      </div>
    </footer>

    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
      &#10548;
    </button>
    <script>
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function () {
        scrollFunction()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("movetop").style.display = "block";
        } else {
          document.getElementById("movetop").style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
    <!-- /move top -->
</section>

      <!-- jQuery, Bootstrap JS -->
<script src="{{asset('temp/assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('temp/assets/js/bootstrap.min.js')}}"></script>

      <!-- Template JavaScript -->

<script src="{{asset('temp/assets/js/owl.carousel.js')}}"></script>

      <!-- script for owlcarousel -->
      <script>
        $(document).ready(function () {
          $('.owl-one').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            responsiveClass: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
              0: {
                items: 1,
                nav: false
              },
              480: {
                items: 1,
                nav: false
              },
              667: {
                items: 1,
                nav: true
              },
              1000: {
                items: 1,
                nav: true
              }
            }
          })
        })
      </script>
      <!-- //script for owlcarousel -->

      <!-- disable body scroll which navbar is in active -->
      <script>
        $(function () {
          $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
          })
        });
      </script>
      <!-- disable body scroll which navbar is in active -->

    <script src="{{asset('temp/assets/js/jquery.magnific-popup.min.js')}}"></script>
      <script>
        $(document).ready(function () {
          $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
          });

          $('.popup-with-move-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-slide-bottom'
          });
        });
      </script>

</body>
</html>
