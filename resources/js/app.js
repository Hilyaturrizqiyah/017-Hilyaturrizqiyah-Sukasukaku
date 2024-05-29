import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener('DOMContentLoaded', function () {
    // Tambahkan skrip JavaScript Anda di sini
    var dropdownButton = document.getElementById('hs-dropdown-with-header');
    var dropdownMenu = document.getElementById('dropdown-menu');

    dropdownButton.addEventListener('click', function (event) {
        event.stopPropagation();
        if (dropdownMenu.classList.contains('opacity-0')) {
            dropdownMenu.classList.remove('opacity-0', 'invisible');
            dropdownMenu.classList.add('opacity-100', 'visible');
        } else {
            dropdownMenu.classList.add('opacity-0', 'invisible');
            dropdownMenu.classList.remove('opacity-100', 'visible');
        }
    });

    // Close the dropdown if clicked outside
    document.addEventListener('click', function (event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('opacity-0', 'invisible');
            dropdownMenu.classList.remove('opacity-100', 'visible');
        }
    });

    document.getElementById('logout-button').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    });

    // Ambil semua tombol toggle accordion
    const accordionToggles = document.querySelectorAll('.hs-accordion-toggle');

    // Iterasi melalui setiap tombol toggle
    accordionToggles.forEach(toggle => {
        // Tambahkan event listener untuk setiap tombol
        toggle.addEventListener('click', function() {
        // Toggle kelas 'hidden' pada konten accordion
        const content = this.nextElementSibling;
        content.classList.toggle('hidden');
        
        // Ubah ikon panah atas-bawah
        const arrowUp = this.querySelector('.hs-accordion-active\\:block');
        const arrowDown = this.querySelector('.hs-accordion-active\\:hidden');
        arrowUp.classList.toggle('hidden');
        arrowDown.classList.toggle('hidden');
        });
    });
});

Alpine.start();
