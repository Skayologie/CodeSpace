const sectionHeaders = document.querySelectorAll('.section-header');

sectionHeaders.forEach(header => {
    header.addEventListener('click', function() {
        const sectionId = this.getAttribute('data-section');
        const contentElement = document.getElementById(`${sectionId}-content`);
        const iconElement = this.querySelector('.section-icon');

        // Toggle the section visibility
        if (contentElement.style.display === 'none') {
            contentElement.style.display = 'block';
            iconElement.classList.remove('fa-chevron-down');
            iconElement.classList.add('fa-chevron-up');
        } else {
            contentElement.style.display = 'none';
            iconElement.classList.remove('fa-chevron-up');
            iconElement.classList.add('fa-chevron-down');
        }
    });
});
