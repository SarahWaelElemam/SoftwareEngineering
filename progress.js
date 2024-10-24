document.addEventListener('DOMContentLoaded', function() {
    const circles = document.querySelectorAll('.circle');
    const progressBars = document.querySelectorAll('.progress-bar .indicator');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    
    let currentActive = 1;
    const totalSteps = circles.length;

    function updateStepper() {
        // Update circles
        circles.forEach((circle, index) => {
            if (index < currentActive) {
                circle.classList.add('active');
            } else {
                circle.classList.remove('active');
            }
        });

        // Update progress bars
        progressBars.forEach((bar, index) => {
            if (index < currentActive - 1) {
                bar.style.height = '100%';
            } else {
                bar.style.height = '0%';
            }
        });

        // Update buttons
        prevButton.disabled = currentActive === 1;
        nextButton.disabled = currentActive === totalSteps;
    }

    nextButton.addEventListener('click', () => {
        if (currentActive < totalSteps) {
            currentActive++;
            updateStepper();
        }
    });

    prevButton.addEventListener('click', () => {
        if (currentActive > 1) {
            currentActive--;
            updateStepper();
        }
    });
});