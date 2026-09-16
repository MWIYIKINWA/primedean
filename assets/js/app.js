    const menuButtons = document.querySelectorAll('.menu-btn');
    const mobileMenus = document.querySelectorAll('.mobile-menu');

    menuButtons.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            mobileMenus[index].classList.toggle('hidden');
        });
    });

  document.addEventListener('DOMContentLoaded', function () {
        // 1. Find all instances of the hero slider on the page
        const heroSwipers = document.querySelectorAll('.heroSwiper');
        
        // 2. Loop through each one and initialize it independently
        heroSwipers.forEach(function(swiperContainer) {
            new Swiper(swiperContainer, {
                loop: true,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                // 3. Scope the pagination and navigation to THIS specific container
                pagination: {
                    el: swiperContainer.querySelector('.swiper-pagination'),
                    clickable: true,
                },
                navigation: {
                    nextEl: swiperContainer.querySelector('.swiper-button-next'),
                    prevEl: swiperContainer.querySelector('.swiper-button-prev'),
                },
            });
        });
    });

    function openModal(imageSrc) {
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        
        // Set the image source
        modalImg.src = imageSrc;
        
        // Show modal (remove hidden class first, then animate opacity and scale)
        modal.classList.remove('hidden');
        
        // Small delay to allow the display:block to apply before triggering CSS transitions
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalImg.classList.remove('scale-95');
            modalImg.classList.add('scale-100');
        }, 10);
        
        // Prevent the background page from scrolling while modal is open
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        
        // Start hide transition
        modal.classList.add('opacity-0');
        modalImg.classList.remove('scale-100');
        modalImg.classList.add('scale-95');
        
        // Wait for the CSS transition to finish before completely hiding the element
        setTimeout(() => {
            modal.classList.add('hidden');
            // Restore background page scrolling
            document.body.style.overflow = 'auto';
            modalImg.src = ''; // Clear image source
        }, 300);
    }

    // Optional: Close modal when clicking on the dark background area
    document.getElementById('imageModal').addEventListener('click', function(e) {
        // Only close if clicking the background, not the image itself
        if (e.target === this) {
            closeModal();
        }
    });
    
    // Optional: Close modal when pressing the 'Escape' key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('imageModal').classList.contains('hidden')) {
            closeModal();
        }
    });
    
    
document.addEventListener('DOMContentLoaded', () => {
    // Prevent right-click context menu on all images
    document.addEventListener('contextmenu', (e) => {
        if (e.target.tagName === 'IMG') {
            e.preventDefault();
        }
    });

    // Prevent drag-and-drop on all images
    document.addEventListener('dragstart', (e) => {
        if (e.target.tagName === 'IMG') {
            e.preventDefault();
        }
    });
});


    // Disable Right-Click Context Menu
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });

    // Disable Keyboard Shortcuts (Ctrl+C, Ctrl+X, Ctrl+S, Ctrl+U, F12, etc.)
    document.addEventListener('keydown', function(e) {
        if (
            e.key === 'F12' || 
            (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'J' || e.key === 'C')) || 
            (e.ctrlKey && (e.key === 'u' || e.key === 's' || e.key === 'c' || e.key === 'x'))
        ) {
            e.preventDefault();
            return false;
        }
    });

    // Disable Dragging of Images and Text
    document.addEventListener('dragstart', function(e) {
        e.preventDefault();
    });

    
