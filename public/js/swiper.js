const swiper = new Swiper('.swiper', {
    autoplay: {
        delay: 5000,
    },

    zoom: {
        maxRatio: 1.5, // Limitar el zoom máximo a 1.5x
    },

    loop: true, 
    effect: "fade", // Efecto de transición
    clickable: true, // Habilitar la navegación por click

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true,
    },
});