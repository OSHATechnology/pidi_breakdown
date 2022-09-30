<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>DASHMIN - Bootstrap Admin Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
    
        <!-- Favicon -->
        <link href="{{asset('assets')}}/img/favicon.ico" rel="icon">
    
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
        <!-- Libraries Stylesheet -->
        <link href="{{asset('assets')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="{{asset('assets')}}/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('assets')}}/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Template Stylesheet -->
        <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">

        <style>
            #bg-content{
                background-image: url(@yield('bg-img'));
                background-size: @yield('bg-size','cover');
                background-position: center;
                background-repeat: no-repeat;
                background-color: @yield('bg-color','rgb(0, 0, 0)')
            }

            main{
                height: 100vh;
                width: 100vw;
                overflow: hidden;
            }

            .btn-custom-1{
                width: 100%;
                padding: 20px;
                max-width: 50vw;
                /* transparent color */
                background-color: rgba(255, 255, 255, 0.15);
                border: 1px dashed ;
            }

            .border-color-gold{
                border-color: #FFD700;
            }

            .btn-custom-1.h-80{
                height: 80vh;
            }

            
            #sideNavBreakdown{
                position: absolute;
                top: 32px;
                left: 32px;
                max-height: 50vh;
                width: 100%;
                max-width: 50px;
            }
            #sideNavBreakdown img{
                max-width: 50px;
            }

            .circle {
                width: 50px;
                height: 50px;
                background-color: rgba(255, 255, 255, 0.5);
                border: 2px solid #FFD700;
                border-radius: 50%;
            }

            .item-component{
                position: absolute;
                display: flex;
                align-items: center;
                gap: 10px;
            }
            .item-component .item-component-box{
                color:#FFD700;
            }

            .font-kecil {
                font-size:12px;
                font-weight: 400;
                color: white;
            }

            .component-details-popup{
                width: 100%;
                max-width: 300px
            }

            .component-details-popup ul.component-details-list{
               width: 100%;
               list-style:none;
                padding: 0;
            }

            .component-details-popup ul.component-details-list li div:first-child{
                position: relative;
                border-left: 1px solid #FFD700;
            }
            .component-details-popup ul.component-details-list li:last-child{
                border: 0px;
                padding-bottom: 0;
            }
            .component-details-popup ul.component-details-list li::before{
                content: '';
                width: 10px;
                height: 10px;
                background: white;
                border: 1px solid #FFD700;
                box-shadow: 3px 3px 0px #bab5f8;
                box-shadow: 3px 3px 0px #bab5f8;
                border-radius: 50%;
                position: absolute;
                left: -10px;
                top: 0px;
            }
        </style>

        @stack('css-breakdown')
    </head>
<body>
    <div class="position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        
        <main id="bg-content">
            @include('components.sidebar-breakdown')

            {{-- button component --}}
            @yield('content')

        </main>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets')}}/lib/chart/chart.min.js"></script>
    <script src="{{asset('assets')}}/lib/easing/easing.min.js"></script>
    <script src="{{asset('assets')}}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{asset('assets')}}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{asset('assets')}}/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{asset('assets')}}/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{asset('assets')}}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets')}}/js/main.js"></script>
    
    <script>
        $('.item-component .circle').hover(function(){
            $('.item-component .item-component-box').toggleClass('d-none');
        })
        
        var bodyRect = document.body.getBoundingClientRect();
        let screenX = screen.width;
        let screenY = screen.height;
        
        
        console.log(bodyRect);
        $('#item-1').css({
            top: ((100+screenY) - screenY)+'px',
            left: ((600+screenX) - screenX)+'px',
            zIndex: 99
        })
        elemRect = $('#item-1')[0].getBoundingClientRect(),
        offset   = elemRect.top - bodyRect.top;

        console.log(elemRect);
    </script>
</body>
</html>