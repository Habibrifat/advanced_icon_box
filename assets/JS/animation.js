console.log("Hello");

// Without $(document).ready
// (function ($) {
//     function initializeLottieAnimations($scope) {
//         $scope.find('.lottie-animation:not(.lottie-initialized)').each(function () {
//             const lottieUrl = $(this).data('lottie-url');
//             let loop = $(this).data('lottie-loop'); // This now correctly checks for 'true' string
//
//             console.log("loop",loop);
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
(function ($) {
    function initializeLottieAnimations($scope) {
        $scope.find('.lottie-animation:not(.lottie-initialized)').each(function () {
            const lottieUrl = $(this).data('lottie-url');
            const loop = $(this).data('lottie-loop'); // Explicitly check for string 'true'
            const hoverBehavior = $(this).data('hover-behavior'); // 'none', 'play', 'pause', 'reverse'
            const speed = parseFloat($(this).data('animation-speed')) || 1; // Default speed = 1

            $(this).addClass('lottie-initialized');

            console.log("loop",loop);
            console.log("data('lottie-loop')",$(this).data('lottie-loop'));

            // Load Lottie animation
            const animation = lottie.loadAnimation({
                container: this,
                renderer: 'svg',
                loop: loop,
                autoplay: true,
                path: lottieUrl,
            });

            // Set speed
            animation.setSpeed(speed);

            // Hover behavior control
            $(this).hover(
                function () {
                    // Mouse enter
                    if (hoverBehavior === 'play') {
                        animation.play();
                    } else if (hoverBehavior === 'pause') {
                        animation.pause();
                    } else if (hoverBehavior === 'reverse') {
                        animation.setDirection(-1); // Reverse direction
                        animation.play();
                    }
                },
                function () {
                    // Mouse leave
                    if (hoverBehavior === 'play') {
                        animation.stop(); // Stop animation when hover out (optional)
                    } else if (hoverBehavior === 'pause') {
                        animation.play(); // Resume animation
                    } else if (hoverBehavior === 'reverse') {
                        animation.setDirection(1); // Forward direction
                        animation.play();
                    }
                }
            );
        });
    }

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/advanced_icon_box.default', function ($scope) {
            initializeLottieAnimations($scope);
        });
    });
})(jQuery);


