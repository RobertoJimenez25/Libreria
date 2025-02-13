let index = 0;
        const carousel = document.getElementById("carousel");
        const images = document.querySelectorAll(".carousel img");
        const total = images.length;

        function moveSlide(step) {
            index += step;
            if (index < 0) index = total - 1;
            if (index >= total) index = 0;
            carousel.style.transform = `translateX(${-index * 100}%)`;
        }

        function autoSlide() {
            moveSlide(1);
        }

        setInterval(autoSlide, 4000);