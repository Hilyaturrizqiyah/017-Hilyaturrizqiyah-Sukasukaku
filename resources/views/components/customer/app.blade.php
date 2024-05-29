<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SukaSukaKu</title>
  <link rel="icon" href="img/sukasukaku2-icon.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <link rel="stylesheet" href="public/css/style.css">
</head>
<body class="bg-white">
  <!-- Header -->
  <x-customer.header></x-customer.header>

  <div class="h-32"></div>
  
  {{ $slot }}

  <x-customer.footer></x-customer.footer>

  <!-- Include Font Awesome for icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="./node_modules/preline/dist/preline.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 5, // Display 5 slides at a time
      spaceBetween: 10, // Adjust the space between slides
      autoplay: {
        delay: 3000, // Delay between slides in milliseconds
        disableOnInteraction: false, // Continue autoplay after user interaction
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 10,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 10,
        },
      }
    });

    function scrollToSection() {
      document.getElementById('shop-section').scrollIntoView({ behavior: 'smooth' });
    }

    document.getElementById('profile-menu-button').addEventListener('click', function() {
        var menu = document.getElementById('profile-menu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
        }
    });

    // Close the dropdown if clicked outside
    window.addEventListener('click', function(e) {
        var menuButton = document.getElementById('profile-menu-button');
        if (!menuButton.contains(e.target)) {
            var menu = document.getElementById('profile-menu');
            if (!menu.classList.contains('hidden')) {
                menu.classList.add('hidden');
            }
        }
    });

  </script>
</body>
</html>
