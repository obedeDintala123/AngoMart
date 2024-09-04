document.addEventListener("DOMContentLoaded", function () {    
    var splide = new Splide('.splide', {
type         : 'loop',
autoplay     : true,
interval     : 4000,   // Intervalo de 5 segundos entre as transições automáticas
pauseOnHover : false,
speed        : 800,    // Velocidade da transição
resetProgress: false,  // Impede o reset do progresso do autoplay após interação
} );

splide.mount();

// Reinicia o autoplay manualmente após interação
splide.on('moved', function () {
splide.Components.Autoplay.play();  // Reinicia o autoplay de forma suave
});

 });