<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Breakdown</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets') }}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">

    <style>
        main {
            height: 100vh;
            width: 100vw;
            overflow: hidden;
        }

        #bg-content {
            background-image: url("@yield('bg-img')");
            background-size: @yield('bg-size', 'cover');
            background-position: center;
            background-repeat: no-repeat;
            background-color: @yield('bg-color', 'rgb(0, 0, 0)')
        }

        body {
            overflow: hidden;
        }

        .btn-custom-1 {
            width: 100%;
            padding: 20px;
            max-width: 50vw;
            /* transparent color */
            background-color: rgba(255, 255, 255, 0.15);
            border: 1px dashed;
        }

        .bg-gray-transparent {
            background-color: rgba(255, 255, 255, 0.15);
        }

        .border-color-gold {
            border-color: #FFD700;
        }

        .btn-custom-1.h-80 {
            height: 80vh;
        }


        #sideNavBreakdown {
            /* position: absolute;
                top: 32px;
                left: 32px; */
            /* max-height: 80px; */
            width: 100%;
            min-width: 80px;
            max-width: 80px;
            margin-right: 32px;
            padding-right: 14px;
            padding-left: 14px;
        }

        #sideNavBreakdown img {
            max-width: 50px;
        }

        #sideNavBreakdownItem {
            margin: 1rem 0 1rem 0;
        }

        .circle {
            width: 50px;
            height: 50px;
            background-color: rgba(255, 255, 255, 0.5);
            border: 2px solid #FFD700;
            border-radius: 50%;
            z-index: 55;
        }

        .circle.bg-danger {
            background-color: rgba(255, 123, 100, 0.4) !important;
        }

        .item-engine {
            position: absolute;
            text-align: center
        }

        .item-component {
            position: absolute;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .item-component .item-component-box {
            color: #FFD700;
        }

        .font-kecil {
            font-size: 12px;
            font-weight: 400;
            color: white;
        }

        .component-details-popup {
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.15);
        }

        .component-details-popup .popup-backdrop div:first-child {
            min-width: 250px;
            position: relative;
            z-index: 88;
        }

        .component-details-popup ul.component-details-list {
            width: 100%;
            list-style: none;
            padding: 0;
        }

        .component-details-popup ul.component-details-list li {
            display: flex;
            justify-content: space-between;
            margin: 1px 0;
        }

        .component-details-popup ul.component-details-list li {
            position: relative;
            border-left: 1px solid #FFD700;
            padding-left: 8px;
        }

        .component-details-popup ul.component-details-list li span:last-child {
            word-break: break-all;
            max-width: 5rem;
        }

        .component-details-popup ul.component-details-list li:last-child {
            border: 0px;
            padding-bottom: 0;
        }

        .component-details-popup ul.component-details-list li::before {
            content: '';
            width: 10px;
            height: 10px;
            background: #191C24;
            border: 1px solid #FFD700;
            border-radius: 50%;
            position: absolute;
            left: -5px;
            top: 0px;
        }

        @keyframes animateBeat {
            0% {
                transform: scale(0.8);
            }

            5% {
                transform: scale(0.9);
            }

            10% {
                transform: scale(0.8);
            }

            15% {
                transform: scale(1);
            }

            50% {
                transform: scale(0.8);
            }

            100% {
                transform: scale(0.8);
            }
        }

        .fa-beat {
            animation: animateBeat 1s infinite;
        }
    </style>

    @stack('css-breakdown')
</head>

<body>
    <div class="position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        @isset($Engine)
            @isset($Engine->images)
                @if (count($Engine->images) > 1)
                    <div class="d-flex position-absolute w-100 justify-content-between"
                        style="top:50%;font-size:40px; padding: 0 20px;">
                        <a href="/breakdown3" class="text-dark ml-2">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a href="/breakdown4" class="text-dark">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                @endif
            @endisset
        @endisset


        <main id="bg-content">
            @yield('content')
            @yield('canvas')
        </main>

    </div>
    @include('components.sidebar-breakdown')


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/lib/chart/chart.min.js"></script>
    <script src="{{ asset('assets') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('assets') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('assets') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('assets') }}/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{ asset('assets') }}/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{ asset('assets') }}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets') }}/js/main.js"></script>

    <script>
        const getDetailsKomponen = async (idKomponen) => {
            $.ajax({
                url: '/api/komponen-mesin?id=' + idKomponen,
                type: 'GET',
                data: {
                    id: idKomponen
                },
                success: function(data) {
                    //get xy element
                    const elementItem = document.getElementById('item-' + idKomponen)
                        .getBoundingClientRect();
                        console.log(elementItem);
                    $('#detailsKomponen').html("");
                    $('#detailsKomponen').html(data.html);
                    $('.popup-backdrop').css('top', elementItem.top - 100);
                    $('.popup-backdrop').css('left',elementItem.left+70);
                    $('.popup-backdrop').click(function(e) {
                        e.stopPropagation();
                    });
                    $('#component-details-close').click(function() {
                        $('#detailsKomponen').html("");
                    });
                }
            });
        };

        const repairKomponen = async (idKomponen) => {
            $.ajax({
                url: '/api/komponen-mesin/repair',
                type: 'POST',
                data: {
                    id: idKomponen
                },
                success: function(data) {
                    //get xy element
                    console.log(data);
                }
            }).then(function() {
                getDetailsKomponen(idKomponen);
            });
        };

        $('#detailsKomponen').click(function(e) {
            $(this).html("");
        });
    </script>
    @stack('js-breakdown')
</body>

</html>
