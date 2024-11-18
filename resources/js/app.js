import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


    document.addEventListener('DOMContentLoaded', function() {

        // simple browser popup to confirm deletion
        function confirmDelete() {
            return confirm('Are you sure you want to delete this post?');
        }

        // Attach the function to the window object
        window.confirmDelete = confirmDelete;

        // Fade out the success message after 3 seconds
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.transition = 'opacity 1s';
                successMessage.style.opacity = '0';
                setTimeout(() => {
                    successMessage.remove();
                }, 1000); // Wait for the transition to complete before removing the element
            }, 3000); // Wait for 3 seconds before starting the fade-out
        }
    });
