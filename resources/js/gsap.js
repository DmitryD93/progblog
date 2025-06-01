import { gsap } from "gsap";


document.addEventListener('DOMContentLoaded', () => {
    const cube = document.querySelector('.mini-cube');

    // Инициализация
    gsap.set(cube, {
        rotationX: 15,
        rotationY: 15,
        rotationZ: 0,
        transformStyle: "preserve-3d"
    });

    gsap.to(cube, {
        duration: 12,
        rotationY: "+=360",
        rotationX: "+=360",
        ease: "none",
        repeat: -1
    });

    gsap.to(cube, {
        duration: 4,
        rotationZ: "+=5",
        yoyo: true,
        repeat: -1,
        ease: "sine.inOut"
    });
});
