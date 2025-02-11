	$(".js-height-full").height($(window).height());
	$(".js-height-parent").each(function() {
	    $(this).height($(this).parent().first().height());
	});


	// Fun Facts
 // Function to animate the counters
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-timer');
            counters.forEach(counter => {
                const updateCounter = () => {
                    const target = +counter.getAttribute('data-count');
                    const count = +counter.innerText;

                    const increment = target / 100;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + increment);
                        setTimeout(updateCounter, 50);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCounter();
            });
        }

        // Initialize counters on page load
        window.addEventListener('load', animateCounters);

	$('.header').affix({
	    offset: {
	        top: 100,
	        bottom: function() {
	            return (this.bottom = $('.footer').outerHeight(true))
	        }
	    }
	})

// Optional: Use preloader for smooth page transition (your existing code)
$(window).load(function() {
    $("#preloader").on(500).fadeOut();
    $(".preloader").on(600).fadeOut("slow");
});
