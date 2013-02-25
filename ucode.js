/*
 * UCODE JS
 */

(function($) {
	ucode = {
		toggler: function(self) {
			$(self).parent().toggleClass("toggled");
		},

		tabs: function(self, id) {
			var wrapper = $(self).closest(".tabs-wrapper");
			$(".tab, .tab-content", wrapper).removeClass("active");
			$(".tab-"+id+", .tab-content-"+id, wrapper).addClass("active");
		}
	};
})(jQuery);
