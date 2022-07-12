<link rel="stylesheet" type="text/css" href="/website/assets/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="/website/assets/css/bootstrap.css"/>
@if (Session::get('client_lang'))
    <link rel="stylesheet" type="text/css" href="/website/assets/css/bootstrap-rtl.css"/>
@endif
<link rel="stylesheet" type="text/css" href="/website/assets/css/simplebar.min.css">
<link rel="stylesheet" type="text/css" href="/website/assets/css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/website/assets/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/website/assets/css/fotorama.css">
<link rel="stylesheet" type="text/css" href="/website/assets/css/custom.css">
@if (Session::get('client_lang'))
    <link rel="stylesheet" type="text/css" href="/website/assets/css/custom-rtl.css">
@endif
<link rel="stylesheet" type="text/css" href="/website/assets/css/responsive.css">
@if (Session::get('client_lang'))
    <link rel="stylesheet" type="text/css" href="/website/assets/css/responsive-rtl.css">
@endif




<link rel="shortcut icon" href="/fav-icon.png">
<link rel="apple-touch-icon" href="/website/assets/images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="/website/assets/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="/website/assets/images/apple-touch-icon-114x114.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />

<style>
    .cart-icon{

    }
</style>

@if (Session::get('client_lang'))
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
    <style>
        body {
            font-family: 'DroidArabicKufiRegular', serif !important;
            font-weight: normal;
            font-style: normal;
        }

        @media (max-width: 500px){
            .content-dropdown {
                right: 0!important;
                left: auto;
                top: 35px;
                width: 120px;
            }
        }

    </style>
@endif

<style>

    html *{
        text-transform: none !important;
    }

    .logo-home{
        width: 100px !important;
        height: 100px!important;
    }
    /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
      }

      /* Firefox */
      input[type=number] {
      -moz-appearance: textfield;
      }

    .image-cart-special{

        min-width: 80px;
        min-height:104px;
        max-width: 80px;
        max-height: 104px;

    }

    .image-cart-popup{

        min-width: 100px;
        min-height:130px;
        max-width: 100px;
        max-height: 130px;

    }

    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {

        .image-home{
            min-width:165px;
            min-height:213.69px;
            max-width: 165px;
            max-height: 213.69px;
        }

        .category-home{
            min-width: 90vw;
            min-height:90vw;
            max-width: 90vw;
            max-height: 90vw;

        }


        .image-cart{

            min-width: 70px;
            min-height:90.66px;
            max-width: 70px;
            max-height: 90.66px;

        }

        .image-slider{

            min-width: 100%;
            min-height:144.69px;
            max-width: 100%;
            max-height: 144.69px;

        }

    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {

            .image-home{
                min-width:240px;
                min-height:310.83px;
                max-width: 240px;
                max-height: 310.83px;
            }

            .category-home{
                min-width:250px;
                min-height:250px;
                max-width: 250px;
                max-height: 250px;

            }

            .image-cart{

                min-width: 70px;
                min-height:90.66px;
                max-width: 70px;
                max-height: 90.66px;

            }

            .image-slider{

                min-width: 100%;
                min-height:310.4px;
                max-width: 100%;
                max-height: 310.4px;

            }


    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {

            .image-home{
                min-width:270px;
                min-height:349.68px;
                max-width: 270px;
                max-height: 349.68px;
            }

            .category-home{
                min-width:210px;
                min-height:210px;
                max-width: 210px;
                max-height: 210px;

            }

            .image-cart{

                min-width: 70px;
                min-height:90.66px;
                max-width: 70px;
                max-height: 90.66px;

            }


            .image-slider{

                min-width: 100%;
                min-height:310.4px;
                max-width: 100%;
                max-height: 310.4px;

            }

    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {

            .image-home{
                min-width:270px;
                min-height:349.68px;
                max-width: 270px;
                max-height: 349.68px;
            }

            .category-home{
                min-width:270px;
                min-height:270px;
                max-width: 270px;
                max-height: 270px;
            }

            .image-cart{

                min-width: 70px;
                min-height:90.66px;
                max-width: 70px;
                max-height: 90.66px;

            }

            .image-slider{

                min-width: 100%;
                min-height:613.92px;
                max-width: 100%;
                max-height: 613.92px;

            }

    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {

            .image-home{
                min-width:270px;
                min-height:349.68px;
                max-width: 270px;
                max-height: 349.68px;
            }

            .category-home{
                min-width:270px;
                min-height:270px;
                max-width: 270px;
                max-height: 270px;
            }

            .image-product-details{

                min-width: 344.91px;
                min-height:447px;
                max-width: 344.91px;
                max-height: 447px;

            }


            .image-slider{

                min-width: 100%;
                min-height:613.92px;
                max-width: 100%;
                max-height: 613.92px;

            }


    }


    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1600px) {

        .image-home{
            min-width:270px;
            min-height:349.68px;
            max-width: 270px;
            max-height: 349.68px;
        }

        .category-home{
            min-width:324px;
            min-height:324px;
            max-width: 324px;
            max-height: 324px;
        }


        .image-cart{
            min-width: 153.23px;
            min-height:198.45px;
            max-width: 153.23px;
            max-height: 198.45px;

        }

        .image-product-details{

            min-width: 344.91px;
            min-height:447px;
            max-width: 344.91px;
            max-height: 447px;

        }

        .image-slider{

            min-width: 100%;
            min-height:769.13px;
            max-width: 100%;
            max-height: 769.13px;

        }

    }


</style>
