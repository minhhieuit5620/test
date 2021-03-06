<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>aranaz</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="../img/favicon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- animate CSS -->
  <link rel="stylesheet" href="../css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <!-- nice select CSS -->
  <link rel="stylesheet" href="../css/nice-select.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="../css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="../css/flaticon.css">
  <link rel="stylesheet" href="../css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="../css/magnific-popup.css">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="../css/slick.css">
  <link rel="stylesheet" href="../css/price_rangs.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/jquery-1.12.1.min.js"></script>
</head>

<body>
  <!--::header part start::-->
  <header class="main_menu home_menu">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/"> <img src="../img/logo.png" alt="logo"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="menu_icon"><i class="fas fa-bars"></i></span>
            </button>

            @include('menu')
          </nav>
        </div>
      </div>
    </div>
    
  </header>
  <!-- Header part end-->


  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Gi??? h??ng c???a b???n</h2>
              <p>Trang ch??? <span>-</span>Gi??? h??ng c???a b???n</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
        <?php
        $content=Cart::content();   
       // echo '<pre>';
       // print_r($content);
        //echo '<pre>';   
        ?>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">S???n ph???m</th>
                <th scope="col">Gi??</th>
                <th scope="col">S??? l?????ng</th>
                <th scope="col">Th??nh ti???n</th>
                <th scope="col">X??a</th>
              </tr>
            </thead>
            <form action="{{URL::to('/update-cart-qty')}}" method="post">
                    {{csrf_field()}}
            <tbody>
              @foreach($content as $v_content)
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="/img/dongho/{{$v_content->options->image}}" width=100; alt="" />
                    </div>
                    <div class="media-body">
                      <p>{{$v_content->name}}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>{{number_format($v_content->price)}} VN??</h5>
                </td>
                <td>
                  <div class="product_count">
                    <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                  
                    <input class="input-number" name="cart_quantity" type="text" value="{{$v_content->qty}}" min="0" max="10">
                    <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                  </div>
                </td>
                <td>
                  <h5>{{number_format($v_content->qty*$v_content->price)}} VN??
                 </h5>
                </td>
                <td ><a style="color: #000;"  href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i style="cursor:pointer;" class="fas fa-trash-alt"></i></a></td>
              </tr>
              <input type="hidden" name="rowId_cart" value="{{$v_content->rowId}}">
              @endforeach
              <tr class="bottom_button">
                <td>
               
                 
                  <button type="submit" style="border:none;" name="update_qty" class="btn_1">Update Cart</button>
               
                </td>
                <td></td>
                <td>
                  <h5>T???ng ti???n </h5>
                </td>
                <td>
                  <h5> {{Cart::subtotal()}} VN??</h5>
                </td>
                <td></td>
              </tr>
              
              <tr class="shipping_area">
                <td></td>
                <td></td>
                <td></td>
                <td>
                <div class="shipping_box">
                   
                   
                   <input type="text" placeholder="Nh???p m?? khuy???n m???i" />
                   <ul class="list">
                     <li>
                       <p>T???m t??nh: {{Cart::subtotal()}} VN??</p>
                     </li>
                     <li>
                       <p>Ph?? v???n chuy???n: Free</p>
                     </li>
                     <li>
                       <p>Thu??? (VAT): {{Cart::tax()}} VN??</p>
                     </li>
                     <li class="active">
                       <p>T???ng ti???n thanh to??n: {{Cart::total()}} VN??</p>
                     </li>
                   </ul>
                  
                 </div>
                </td>
             
                <td>
                 
                </td>
              </tr>
            </tbody>
            </form>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="/">Ti???p t???c mua h??ng</a>
            <?php
                        $customer_id=Session::get('customer_id');
                        if($customer_id!=null){                        
                        ?>
                         <a class="btn_1 checkout_btn_1" href="{{URL::to('Checkout')}}">Thanh to??n</a>
                          <?php
                        }else{?>
                         <a class="btn_1 checkout_btn_1" href="{{URL::to('login-checkout')}}">Thanh to??n</a>
                          <?php
                        }?>
                      

         
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->

  <!--::footer_part start::-->
  <footer class="footer_part">
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-sm-6 col-lg-2">
          <div class="single_footer_part">
            <h4>Top Products</h4>
            <ul class="list-unstyled">
              <li><a href="">Managed Website</a></li>
              <li><a href="">Manage Reputation</a></li>
              <li><a href="">Power Tools</a></li>
              <li><a href="">Marketing Service</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2">
          <div class="single_footer_part">
            <h4>Quick Links</h4>
            <ul class="list-unstyled">
              <li><a href="">Jobs</a></li>
              <li><a href="">Brand Assets</a></li>
              <li><a href="">Investor Relations</a></li>
              <li><a href="">Terms of Service</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2">
          <div class="single_footer_part">
            <h4>Features</h4>
            <ul class="list-unstyled">
              <li><a href="">Jobs</a></li>
              <li><a href="">Brand Assets</a></li>
              <li><a href="">Investor Relations</a></li>
              <li><a href="">Terms of Service</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2">
          <div class="single_footer_part">
            <h4>Resources</h4>
            <ul class="list-unstyled">
              <li><a href="">Guides</a></li>
              <li><a href="">Research</a></li>
              <li><a href="">Experts</a></li>
              <li><a href="">Agencies</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="single_footer_part">
            <h4>Newsletter</h4>
            <p>Heaven fruitful doesn't over lesser in days. Appear creeping
            </p>
            <div id="mc_embed_signup">
              <form target="_blank"
                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                method="get" class="subscribe_form relative mail_part">
                <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                  class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = ' Email Address '">
                <button type="submit" name="submit" id="newsletter-submit"
                  class="email_icon newsletter-submit button-contactForm">subscribe</button>
                <div class="mt-10 info"></div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="copyright_part">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="copyright_text">
              <P>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
                with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                  target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </P>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="footer_icon social_icon">
              <ul class="list-unstyled">
                <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <!-- jquery -->
  <script src="../js/jquery-1.12.1.min.js"></script>
  <!-- popper j../s -->
  <script src="../js/popper.min.js"></script>
  <!-- bootstra../p js -->
  <script src="../js/bootstrap.min.js"></script>
  <!-- easing j../s -->
  <script src="../js/jquery.magnific-popup.js"></script>
  <!-- swiper j../s -->
  <script src="../js/swiper.min.js"></script>
  <!-- swiper j../s -->
  <script src="../js/masonry.pkgd.js"></script>
  <!-- particle../s js -->
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.nice-select.min.js"></script>
  <!-- slick js../ -->
  <script src="../js/slick.min.js"></script>
  <script src="../js/jquery.counterup.min.js"></script>
  <script src="../js/waypoints.min.js"></script>
  <script src="../js/contact.js"></script>
  <script src="../js/jquery.ajaxchimp.min.js"></script>
  <script src="../js/jquery.form.js"></script>
  <script src="../js/jquery.validate.min.js"></script>
  <script src="../js/mail-script.js"></script>
  <script src="../js/stellar.js"></script>
  <script src="../js/price_rangs.js"></script>
  <!-- custom j../s -->
  <script src="../js/custom.js"></script>
</body>

</html>