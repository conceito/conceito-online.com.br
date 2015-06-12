(function ($) {
	$(document).ready(function () {

		var active = undefined;

		$('.serv-tabs').find('.serv-tabs__body').hide();

		$('.serv-tabs__handler').each(function (idx) {

			var handler = $(this),
				ctx = handler.parent('.serv-tabs__item'),
				body = ctx.find('.serv-tabs__body');

			// set ID
			ctx.data('servId', idx);

			handler.on('click', function (e) {
				e.preventDefault();

				if (getId(ctx) === active) {
					return;
				}
				closeAll(ctx);
				openContext(ctx);
				return false;
			});

		});

		function openContext(context) {
			delay = 300;
			if (active === undefined) {
				delay = 0;
			}
			active = getId(context);

			context.addClass('opened').find('.serv-tabs__body').css({opacity: 1, left: 0}).delay(delay).slideDown();

			if($(window).width() < 768){
				setTimeout(function(){$.scrollTo(context, 1000);}, 400);
			}

		}

		function closeAll(context) {

			if (active === undefined) {
				return;
			}

			$('.serv-tabs__handler').each(function (idx) {
				var handler = $(this),
					ctx = handler.parent('.serv-tabs__item'),
					body = ctx.find('.serv-tabs__body');

				if (ctx.hasClass('opened')) {
					body.animate({opacity: 0, left: '100px'}, {
						duration: 300, done: function () {
							body.css({opacity: 1, left: 0}).hide();
						}
					});
					ctx.removeClass('opened');
				}
			});

		}

		function getId(context) {
			return context.data('servId');
		}


	});
})(jQuery);