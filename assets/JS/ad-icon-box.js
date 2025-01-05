// (function ($) {
//     // Function to initialize Lottie animations
//     function initializeLottieAnimations($scope) {
//         $scope.find('.lottie-animation').each(function () {
//             const lottieUrl = $(this).data('lottie-url');
//             const loop = $(this).data('lottie-loop') === 'true';
//
//             // Load Lottie animation
//             lottie.loadAnimation({
//                 container: this, // The container element
//                 renderer: 'svg', // Render as SVG
//                 loop: loop,      // Should it loop
//                 autoplay: true,  // Auto-play the animation
//                 path: lottieUrl, // Lottie JSON file URL
//             });
//         });
//     }
//
//     // Elementor hook for editor mode
//     $(window).on('elementor/frontend/init', function () {
//         // Use the frontend/element_ready hook to initialize Lottie animations
//         elementorFrontend.hooks.addAction('frontend/element_ready/advanced_icon_box.default', function ($scope) {
//             initializeLottieAnimations($scope);
//         });
//     });
//
//     // For frontend (live pages)
//     $(document).ready(function () {
//         initializeLottieAnimations($(document.body));
//     });
// })(jQuery);


// // Without $(document).ready
// (function ($) {
//     function initializeLottieAnimations($scope) {
//         $scope.find('.lottie-animation:not(.lottie-initialized)').each(function () {
//             const lottieUrl = $(this).data('lottie-url');
//             const loop = $(this).data('lottie-loop') === 'true';
//
//             $(this).addClass('lottie-initialized');
//
//             lottie.loadAnimation({
//                 container: this,
//                 renderer: 'svg',
//                 loop: loop,
//                 autoplay: true,
//                 path: lottieUrl,
//             });
//         });
//     }
//
//     $(window).on('elementor/frontend/init', function () {
//         elementorFrontend.hooks.addAction('frontend/element_ready/advanced_icon_box.default', function ($scope) {
//             initializeLottieAnimations($scope);
//         });
//     });
// })(jQuery);
