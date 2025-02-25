document.querySelectorAll('.feedback-star').forEach(star => {
    star.addEventListener('click', function() {
        let rating = this.getAttribute('data-value');
        
        // Update the hidden input value
        document.getElementById('rating').value = rating;

        // Highlight selected stars
        document.querySelectorAll('.feedback-star').forEach(star => {
            if (star.getAttribute('data-value') <= rating) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    });
});
