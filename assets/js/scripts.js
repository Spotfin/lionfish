(function($){

	var project = {};

	project.init = function() {
		project.mobileMenu();
	};

	project.mobileMenu = function() {
		$('.header__hamburger').on('click', function(e) {
			e.preventDefault();

			$(this).addClass('header__hamburger--off');
			$('.header__close').addClass('header__close--on');
			$('.header__wrapper').addClass('header__wrapper--open');
		});

		$('.header__close').on('click', function(e) {
			e.preventDefault();

			$(this).removeClass('header__close--on');
			$('.header__hamburger').removeClass('header__hamburger--off');
			$('.header__wrapper').removeClass('header__wrapper--open');
		});
	};

	$(document).ready(project.init);
})(jQuery);
