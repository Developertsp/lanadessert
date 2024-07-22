
AOS.init();
const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                let endValue = counter.textContent;
                let startValue = 0;
                let updating = setInterval(() => {
                    startValue += endValue / 200;
                    counter.textContent = startValue.toFixed(0);
                    if (startValue > endValue) {
                        counter.textContent = endValue;
                        clearInterval(updating);
                        observer.unobserve(counter);
                    }
                }, 10);
            }
        });
    },
    { threshold: 1 }
);
document
    .querySelectorAll(".counter")
    .forEach((counter) => observer.observe(counter));

window.addEventListener('scroll', function () {
    const navbar = document.getElementById('navbar');
    const navTop = document.querySelector('.nav-top');
    const navTopHeight = navTop.offsetHeight;

    if (window.scrollY >= navTopHeight) {
        navbar.classList.add('fixed-top-scroll');
    } else {
        navbar.classList.remove('fixed-top-scroll');
    }
});
