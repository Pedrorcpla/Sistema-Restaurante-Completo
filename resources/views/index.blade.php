<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('./css/style.css') }}">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo"></div>
            <button class="cartIcon">
            <svg id="Layer_1" x="0px" y="0px" viewBox="0 0 4000 4000">
                <style type="text/css">
                    .st1{fill:#FFF3E5;}
                </style>
                <g>
                    <path class="st1" d="M1257.19,2968.63c46.19,115.13,60.41,129.34,67.51,132.19c20.61,19.19,47.62,31.27,77.46,31.27h142.14h109.44
                        c-103.05,39.8-175.54,139.29-175.54,255.84c0,151.37,122.24,273.61,273.61,273.61s273.61-122.24,273.61-273.61
                        c0-116.55-72.49-216.04-175.54-255.84h54.01h85.99h43.35h98.78h43.35h88.12h228.13h359.6h42.64h34.82
                        c-103.05,39.8-175.54,139.29-175.54,255.84c0,151.37,122.95,273.61,273.61,273.61c151.37,0,273.61-122.24,273.61-273.61
                        c0-116.55-72.49-216.04-174.83-255.84h356.05c61.12,0,110.87-49.75,110.87-110.87l0,0c0-60.41-49.75-110.15-110.87-110.15H3122
                        h-228.13h-42.64h-359.6H2263.5h-88.12h-43.35h-98.78h-43.35h-85.99h-359.6h-68.22l-69.65-241.63l1949.39,0.71
                        c61.12,0,103.76-2.84,115.13-5.69c73.2-16.35,83.86-88.83,104.47-150.66l193.3-579.91c41.93-128.63,86.7-255.84,129.34-389.45
                        l93.1-289.24c19.9-54.72,12.79-129.34-90.97-129.34l-3016.11,3.55L683.67,538.83c-9.24-19.19-19.9-32.69-31.98-43.35
                        c-21.32-21.32-50.46-34.11-82.44-34.11H415.03H266.5H116.55C52.59,461.37,0,513.96,0,577.92l0,0
                        c0,64.67,52.59,116.55,116.55,116.55H266.5h227.42L1257.19,2968.63z"/>                    
                </g>
                </svg>
            </button>
        </div>
    </header>

    <section class="content">
        @yield('content') 
    </section>

    <script src="{{ asset('./js/script.js') }}"></script>
</body>
</html>