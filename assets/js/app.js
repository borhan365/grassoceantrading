// Desktop sidebar
const menuBtn = document.getElementById('menuBtn');
const leftSidebar = document.getElementById('LeftSidebar');

menuBtn.addEventListener('click', () => {
  leftSidebar.classList.add('active');
});

const cross = document.getElementById("cross");
cross.addEventListener('click', () => {
  leftSidebar.classList.remove('active');
});

// Mobile sidebar
const mobileMenuBtn = document.getElementById("mobileMenuBtn");
mobileMenuBtn.addEventListener("click", () => {
  leftSidebar.classList.add('active');
});

// Search modal
const searchBtn = document.getElementById("search");
const searchBody = document.getElementById("searchBody");

searchBtn.addEventListener("click", () => {
  searchBody.classList.add("active");
});

const cancel = document.getElementById("cancel");
cancel.addEventListener("click", () => {
  searchBody.classList.remove("active");
});

// Mobile search
const mobileSearchBtn = document.getElementById("mobileSearch");
mobileSearchBtn.addEventListener("click", () => {
  searchBody.classList.add('active');
});

// Initialize Slick Slider
document.addEventListener('DOMContentLoaded', () => {
  jQuery('.your-slider-class').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true
    // Add more options as needed
  });
});

// Use ES6+ features like arrow functions, const/let, etc.
const menuToggle = document.querySelector('.menu-toggle');
menuToggle.addEventListener('click', () => {
  // Toggle menu logic
});

// Use modern APIs like fetch instead of $.ajax
fetch('/api/products')
  .then(response => response.json())
  .then(data => {
    // Handle data
  })
  .catch(error => console.error('Error:', error));

// Dropdown Menu Handling
document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.menu-item-has-children');
    
    menuItems.forEach(item => {
        const link = item.querySelector('a');
        const dropdown = item.querySelector('.dropdown-menu');
        
        // Desktop behavior
        if (window.matchMedia('(min-width: 768px)').matches) {
            item.addEventListener('mouseenter', () => {
                dropdown.classList.remove('hidden');
            });
            
            item.addEventListener('mouseleave', () => {
                dropdown.classList.add('hidden');
            });
        }
        
        // Mobile behavior
        link.addEventListener('click', (e) => {
            if (window.matchMedia('(max-width: 767px)').matches) {
                e.preventDefault();
                dropdown.classList.toggle('hidden');
                
                // Toggle aria-expanded
                const isExpanded = dropdown.classList.contains('hidden') ? 'false' : 'true';
                link.setAttribute('aria-expanded', isExpanded);
            }
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.menu-item-has-children')) {
            document.querySelectorAll('.dropdown-menu').forEach(dropdown => {
                dropdown.classList.add('hidden');
            });
        }
    });
});

// Keep your existing mobile menu toggle code
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const leftSidebar = document.getElementById('LeftSidebar');
const cross = document.getElementById('cross');

if (mobileMenuBtn && leftSidebar && cross) {
    mobileMenuBtn.addEventListener('click', () => {
        leftSidebar.classList.remove('-translate-x-full');
    });

    cross.addEventListener('click', () => {
        leftSidebar.classList.add('-translate-x-full');
    });
}
