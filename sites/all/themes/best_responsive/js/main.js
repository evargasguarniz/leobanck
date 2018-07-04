jQuery(document).ready(function(){
	MyApp.Main.init();

	if (jQuery(".page-node-3").length>0) {
	 	MyApp.constactWebform.init();
	};
	if (jQuery(".front").length>0) {
	 	MyApp.home.init();
	};
	if (jQuery(".page-node").length>0) {
	 	MyApp.internal.init();
	};
});
var MyApp = {
		Main : {
			init : function() {
				jQuery("#custom-menu-movil").on("click",function(){
	            	jQuery("#custom-menu-totaggle").fadeToggle("slow");
	            });
			}
		},
		constactWebform:{
			init : function(){
				jQuery(".page-node-3 #content-wrap .page-title").addClass("text-center");
				jQuery(".page-node-3 .content form > div").addClass("form-group ");
				jQuery(".page-node-3 .content .webform-contact-custom").addClass("form-control");
				jQuery(".page-node-3 .content form .form-actions").addClass("text-center");
				jQuery(".page-node-3 .content form .form-actions input").addClass("btn btn-block btn-lg btn-info");
			}
		},
		home:{
			init : function(){
				
			}
		},
		internal:{
			init : function(){
				jQuery(window).load(function() {
					jQuery('flexslider-internal').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					});
				});
			}
		}
		
	}
