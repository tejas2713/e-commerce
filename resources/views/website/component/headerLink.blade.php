<meta charset="UTF-8">
<meta name="description" content="Male_Fashion Template">
<meta name="keywords" content="Male_Fashion, unica, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Male-Fashion | Template</title>
<!-- Google Font -->
<link
    href="{{ asset('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap') }}"
    rel="stylesheet">

<!-- Css Styles -->
<link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('website/css/font-awesome.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('website/css/elegant-icons.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('website/css/magnific-popup.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('website/css/nice-select.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('website/css/owl.carousel.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('website/css/slicknav.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('website/css/style.css') }}" type="text/css">



<style>
    .product__item__pic {
        height: 190px;
        border-radius: 10px;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-color: #f8f8f8;
    }

    .product__item:hover .product__item__pic {
        background-size: cover !important;
    }

    .fav-icon {
        font-size: 22px;
        color: #333;
    }

    .fav-icon i:hover {
        color: red;
    }

    .product__item__pic {
        position: relative;
    }

    .product__hover {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 10;
    }


    .add-cart-btn {
        background: #111;
        color: #fff;
        border: none;
        padding: 8px 14px;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .add-cart-btn:hover {
        background: #e53637;
        transform: translateY(-2px);
    }

    .add-cart-btn {
        width: 100%;
        background: #111;
        color: #fff;
        border: none;
        padding: 10px 0;
        font-size: 14px;
        font-weight: 600;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .add-cart-btn:hover {
        background: #e53637;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(229, 54, 55, 0.4);
    }

    .product__item {
        background: #fff;
        border-radius: 12px;
        padding: 15px;
        transition: all 0.3s ease;
    }

    .product__item:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    .product__item__pic {
        overflow: hidden;
        background: #f7f7f7;
    }

    .product__item__pic img {
        transition: transform 0.4s ease;
    }

    .product__item:hover .product__item__pic {
        transform: scale(1.05);
    }

    .product__item__text h5 {
        font-size: 18px;
        font-weight: 700;
        margin-top: 6px;
    }

    .product__item__pic {
        width: 100%;
        height: 190px;
    }
</style>