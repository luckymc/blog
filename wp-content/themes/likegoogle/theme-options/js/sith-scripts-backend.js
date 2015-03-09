// image Uploader Functions
	function sith_styling_uploader(field) {
		var button = "#upload_"+field+"_button";
		jQuery(button).click(function() {
			window.restore_send_to_editor = window.send_to_editor;
			tb_show('', 'media-upload.php?referer=sith-settings&amp;type=image&amp;TB_iframe=true&amp;post_id=0');
			styling_send_img(field);
			return false;
		});
		jQuery('#'+field).change(function(){
			jQuery('#'+field+'-preview img').attr("src",jQuery('#'+field).val());
		});
	}
	function styling_send_img(field) {
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			
			if(typeof imgurl == 'undefined')
				imgurl = jQuery(html).attr('src');
				
			jQuery('#'+field+'-img').val(imgurl);
			jQuery('#'+field+'-preview').show();
			jQuery('#'+field+'-preview img').attr("src",imgurl);
			tb_remove();
			window.send_to_editor = window.restore_send_to_editor;
		}
	};
	
jQuery(document).ready(function() {
    jQuery('.tooltip').tipsy({fade: true, gravity: 's'});
	
	

		
// image Uploader Functions
	function sith_set_uploader(field) {
		var button = "#upload_"+field+"_button";
		jQuery(button).click(function() {
			window.restore_send_to_editor = window.send_to_editor;
			tb_show('', 'media-upload.php?referer=sith-settings&amp;type=image&amp;TB_iframe=true&amp;post_id=0');
			sith_set_send_img(field);
			return false;
		});
		jQuery('#'+field).change(function(){
			jQuery('#'+field+'-preview').show();
			jQuery('#'+field+'-preview img').attr("src",jQuery('#'+field).val());
		});
	}
	function sith_set_send_img(field) {
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			
			if(typeof imgurl == 'undefined')
				imgurl = jQuery(html).attr('src');
				
			jQuery('#'+field).val(imgurl);
			jQuery('#'+field+'-preview').show();
			jQuery('#'+field+'-preview img').attr("src",imgurl);
			tb_remove();
			window.send_to_editor = window.restore_send_to_editor;
		}
	};
	
	sith_set_uploader("logo");
	sith_set_uploader("favicon");
	sith_set_uploader("banner_top_img");

// Del Preview Image
	jQuery(document).on("click", ".del-img" , function(){
		jQuery(this).parent().fadeOut(function() {
			jQuery(this).hide();
			jQuery(this).parent().find('input[class="img-path"]').attr('value', '' );
		});
	});	

 
// Save Settings Alert
	jQuery(".theme-options-save").click( function() {
		jQuery('#save-alert').fadeIn();
	});
	
 
	
	
	// Home Template
	var selected_home_template = jQuery("input[name='sith_options[home_posts_template]']:checked").val();
	
	jQuery('#hometpl_builder, #hometpl_full-content, #hometpl_loop_full_thumb, #hometpl_simple_list, #hometpl_loop_2grid, #hometpl_loop_3grid, #hometpl_loop_4grid, #hometpl_loop_5grid, #hometpl_loop_6grid, #hometpl_1caption, #hometpl_2caption, #hometpl_3caption, #hometpl_4caption, #hometpl_5caption, #hometpl_loop_excerpt, #hometpl_postformats').hide();
	
	if (selected_home_template == 'loop-excerpt') {jQuery('#hometpl_loop_excerpt').show();}
	if (selected_home_template == 'loop-home-builder') {jQuery('#hometpl_builder').show();}
	if (selected_home_template == 'loop-full-content') {jQuery('#hometpl_full-content').show();}
	if (selected_home_template == 'loop-full-thumb') {jQuery('#hometpl_loop_full_thumb').show();}
	if (selected_home_template == 'loop-simple-list') {jQuery('#hometpl_simple_list').show();}
	if (selected_home_template == 'loop-2grid') {jQuery('#hometpl_loop_2grid').show();}
	if (selected_home_template == 'loop-1caption') {jQuery('#hometpl_1caption').show();}
	if (selected_home_template == 'loop-2caption') {jQuery('#hometpl_2caption').show();}
	
	jQuery("input[name='sith_options[home_posts_template]']").change(function(){
		var selected_home_template = jQuery("input[name='sith_options[home_posts_template]']:checked").val();
		if (selected_home_template == 'loop-excerpt') {
			jQuery('#hometpl_builder, #hometpl_full-content, #hometpl_loop_full_thumb, #hometpl_simple_list, #hometpl_loop_2grid, #hometpl_loop_3grid, #hometpl_loop_4grid, #hometpl_loop_5grid, #hometpl_loop_6grid, #hometpl_1caption, #hometpl_2caption, #hometpl_3caption, #hometpl_4caption, #hometpl_5caption, #hometpl_postformats').hide();
			jQuery('#hometpl_loop_excerpt').fadeIn();
		}
		if (selected_home_template == 'loop-home-builder') {
			jQuery('#hometpl_loop_excerpt, #hometpl_full-content, #hometpl_loop_full_thumb, #hometpl_simple_list, #hometpl_loop_2grid, #hometpl_loop_3grid, #hometpl_loop_4grid, #hometpl_loop_5grid, #hometpl_loop_6grid, #hometpl_1caption, #hometpl_2caption, #hometpl_3caption, #hometpl_4caption, #hometpl_5caption, #hometpl_postformats').hide();
			jQuery('#hometpl_builder').fadeIn();
		}
		if (selected_home_template == 'loop-full-content') {
			jQuery('#hometpl_loop_excerpt, #hometpl_builder, #hometpl_loop_full_thumb, #hometpl_simple_list, #hometpl_loop_2grid, #hometpl_loop_3grid, #hometpl_loop_4grid, #hometpl_loop_5grid, #hometpl_loop_6grid, #hometpl_1caption, #hometpl_2caption, #hometpl_3caption, #hometpl_4caption, #hometpl_5caption, #hometpl_postformats').hide();
			jQuery('#hometpl_full-content').fadeIn();
		}
		if (selected_home_template == 'loop-full-thumb') {
			jQuery('#hometpl_loop_excerpt, #hometpl_full-content, #hometpl_builder, #hometpl_simple_list, #hometpl_loop_2grid, #hometpl_loop_3grid, #hometpl_loop_4grid, #hometpl_loop_5grid, #hometpl_loop_6grid, #hometpl_1caption, #hometpl_2caption, #hometpl_3caption, #hometpl_4caption, #hometpl_5caption, #hometpl_postformats').hide();
			jQuery('#hometpl_loop_full_thumb').fadeIn();
		}
		if (selected_home_template == 'loop-simple-list') {
			jQuery('#hometpl_loop_excerpt, #hometpl_full-content, #hometpl_builder, #hometpl_loop_full_thumb, #hometpl_loop_2grid, #hometpl_loop_3grid, #hometpl_loop_4grid, #hometpl_loop_5grid, #hometpl_loop_6grid, #hometpl_1caption, #hometpl_2caption, #hometpl_3caption, #hometpl_4caption, #hometpl_5caption, #hometpl_postformats').hide();
			jQuery('#hometpl_simple_list').fadeIn();
		}
		if (selected_home_template == 'loop-2grid') {
			jQuery('#hometpl_loop_excerpt, #hometpl_full-content, #hometpl_builder, #hometpl_loop_full_thumb, #hometpl_simple_list, #hometpl_loop_3grid, #hometpl_loop_4grid, #hometpl_loop_5grid, #hometpl_loop_6grid, #hometpl_1caption, #hometpl_2caption, #hometpl_3caption, #hometpl_4caption, #hometpl_5caption, #hometpl_postformats').hide();
			jQuery('#hometpl_loop_2grid').fadeIn();
		}

		
		if (selected_home_template == 'loop-1caption') {
			jQuery('#hometpl_loop_excerpt, #hometpl_full-content, #hometpl_builder, #hometpl_loop_full_thumb, #hometpl_simple_list, #hometpl_loop_2grid, #hometpl_loop_3grid, #hometpl_loop_4grid, #hometpl_loop_5grid, #hometpl_loop_6grid, #hometpl_2caption, #hometpl_3caption, #hometpl_4caption, #hometpl_5caption, #hometpl_postformats').hide();
			jQuery('#hometpl_1caption').fadeIn();
		}
		
		if (selected_home_template == 'loop-2caption') {
			jQuery('#hometpl_loop_excerpt, #hometpl_full-content, #hometpl_builder, #hometpl_loop_full_thumb, #hometpl_simple_list, #hometpl_loop_2grid, #hometpl_loop_3grid, #hometpl_loop_4grid, #hometpl_loop_5grid, #hometpl_loop_6grid, #hometpl_1caption, #hometpl_3caption, #hometpl_4caption, #hometpl_5caption, #hometpl_postformats').hide();
			jQuery('#hometpl_2caption').fadeIn();
		}

		
		
	 });

// Toggle open/Close
	jQuery(document).on("click", ".toggle-open" , function(){
		jQuery(this).parent().parent().find(".widget-content").slideToggle(300);
		jQuery(this).hide();
		jQuery(this).parent().find(".toggle-close").show();
    });
	
	jQuery(document).on("click", ".toggle-close" , function(){
		jQuery(this).parent().parent().find(".widget-content").slideToggle("fast");
		jQuery(this).hide();
		jQuery(this).parent().find(".toggle-open").show();
    });
	
// Expand/collapse all	
	jQuery(document).on("click", "#expand-all" , function(){
		jQuery("#cat_sortable .widget-content").slideDown(300);
		jQuery("#cat_sortable .toggle-close").show();
		jQuery("#cat_sortable .toggle-open").hide();
    });
	jQuery(document).on("click", "#collapse-all" , function(){
		jQuery("#cat_sortable .widget-content").slideUp(300);
		jQuery("#cat_sortable .toggle-close").hide();
		jQuery("#cat_sortable .toggle-open").show();
    });
	
// Del Cats
	jQuery(document).on("click", ".del-cat" , function(){
		jQuery(this).parent().parent().addClass('removered').fadeOut(function() {
			jQuery(this).remove();
		});
	});

// Delete Sidebars Icon
	jQuery(document).on("click", ".del-sidebar" , function(){
		var option = jQuery(this).parent().find('input').val();
		jQuery(this).parent().parent().addClass('removered').fadeOut(function() {
			jQuery(this).remove();
			jQuery('#custom-sidebars select').find('option[value="'+option+'"]').remove();

		});
	});	
	
// Delete Custom Text Icon
	jQuery(document).on("click", ".del-custom-text" , function(){
		var option = jQuery(this).parent().find('input').val();
		jQuery(this).parent().parent().addClass('removered').fadeOut(function() {
			jQuery(this).remove();
		});
	});	
	
// Sidebar Builder
	jQuery("#sidebarAdd").click(function() {
		var SidebarName = jQuery('#sidebarName').val();
		if( SidebarName.length > 0){
			jQuery('#sidebarsList').append('<li><div class="widget-head">'+SidebarName+' <input id="sith_sidebars" name="sith_options[sidebars][]" type="hidden" value="'+SidebarName+'" /><a class="del-sidebar"></a></div></li>');
			jQuery('#custom-sidebars select').append('<option value="'+SidebarName+'">'+SidebarName+'</option>');
		}
		jQuery('#sidebarName').val('');

	});	
	
// Custom Breaking News Text
	jQuery("#TextAdd").click(function() {
		var customlink = jQuery('#custom_link').val();
		var customtext = jQuery('#custom_text').val();
		if( customtext.length > 0 && customlink.length > 0  ){
			jQuery('#customList').append('<li><div class="widget-head"><a href="'+customlink+'" target="_blank">'+customtext+'</a> <input name="sith_options[breaking_custom]['+customnext+'][link]" type="hidden" value="'+customlink+'" /> <input name="sith_options[breaking_custom]['+customnext+'][text]" type="hidden" value="'+customtext+'" /><a class="del-custom-text"></a></div></li>');
		}
		customnext ++ ;
		jQuery('#custom_link , #custom_text').val('');

	});
	

// Panel Tabs
	jQuery(".tabs-wrap").hide();
	jQuery(".themenovum-panel-tabs ul li:first").addClass("active").show();
	jQuery(".tabs-wrap:first").show(); 
	jQuery("li.sith-tabs:not(.sith-not-tab)").click(function() {
		jQuery(".themenovum-panel-tabs ul li").removeClass("active");
		jQuery(this).addClass("active");
		jQuery(".tabs-wrap").hide();
		var activeTab = jQuery(this).find("a").attr("href");
		jQuery(activeTab).fadeIn('fast');
		return false;
	});
	
	
// Sidebar Position	
	jQuery("#sidebar-position-options input:checked").parent().addClass("selected");
	jQuery("#sidebar-position-options .checkbox-select").click(
		function(event) {
			event.preventDefault();
			jQuery("#sidebar-position-options li").removeClass("selected");
			jQuery(this).parent().addClass("selected");
			jQuery(this).parent().find(":radio").attr("checked","checked");			 
		}
	);	

// Footer Widgets	
	jQuery("#footer-widgets-options input:checked").parent().addClass("selected");
	jQuery("#footer-widgets-options .checkbox-select").click(
		function(event) {
			event.preventDefault();
			jQuery("#footer-widgets-options li").removeClass("selected");
			jQuery(this).parent().addClass("selected");
			jQuery(this).parent().find(":radio").attr("checked","checked");			 
		}
	);	

// Ctageories options
	jQuery(".sith-cats-options input:checked").parent().addClass("selected");
	jQuery(document).on("click", ".sith-cats-options .checkbox-select" , function(event){
		event.preventDefault();
		jQuery(this).parent().parent().find("li").removeClass("selected");
		jQuery(this).parent().addClass("selected");
		jQuery(this).parent().find(":radio").attr("checked","checked");			 
		
	});
	
// Ctageories Tabs box	
	jQuery("#tabs_cats input:checked").parent().addClass("selected");
	jQuery("#tabs_cats span").click(
		function(event) {
			event.preventDefault();
			if( jQuery(this).parent().find(":checkbox").is(':checked') ){
				jQuery(this).parent().removeClass("selected");
				jQuery(this).parent().find(":checkbox").removeAttr("checked");			 
			}else{
				jQuery(this).parent().addClass("selected");
				jQuery(this).parent().find(":checkbox").attr("checked","checked");
			}				
		}
	);
	 
  
	var allPanels = jQuery('.sith-accordion > .sith-accordion-contnet').hide();
	jQuery('.sith-accordion > .accordion-head > a').click(function() {
		$this = jQuery(this);
		$target =  $this.parent().next();
		if(!$target.hasClass('active')){
			allPanels.removeClass('active').slideUp();
			$target.addClass('active').slideDown();
		}
		return false;
	});
  

});

function toggleVisibility(id) {
	var e = document.getElementById(id);
    if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
}

(function($){var i=function(e){if(!e)var e=window.event;e.cancelBubble=true;if(e.stopPropagation)e.stopPropagation()};$.fn.checkbox=function(f){try{document.execCommand('BackgroundImageCache',false,true)}catch(e){}var g={cls:'jquery-checkbox',empty:'empty.png'};g=$.extend(g,f||{});var h=function(a){var b=a.checked;var c=a.disabled;var d=$(a);if(a.stateInterval)clearInterval(a.stateInterval);a.stateInterval=setInterval(function(){if(a.disabled!=c)d.trigger((c=!!a.disabled)?'disable':'enable');if(a.checked!=b)d.trigger((b=!!a.checked)?'check':'uncheck')},10);return d};return this.each(function(){var a=this;var b=h(a);if(a.wrapper)a.wrapper.remove();a.wrapper=$('<span class="'+g.cls+'"><span class="mark"><img src="'+g.empty+'" /></span></span>');a.wrapperInner=a.wrapper.children('span:eq(0)');a.wrapper.hover(function(e){a.wrapperInner.addClass(g.cls+'-hover');i(e)},function(e){a.wrapperInner.removeClass(g.cls+'-hover');i(e)});b.css({position:'absolute',zIndex:-1,visibility:'hidden'}).after(a.wrapper);var c=false;if(b.attr('id')){c=$('label[for='+b.attr('id')+']');if(!c.length)c=false}if(!c){c=b.closest?b.closest('label'):b.parents('label:eq(0)');if(!c.length)c=false}if(c){c.hover(function(e){a.wrapper.trigger('mouseover',[e])},function(e){a.wrapper.trigger('mouseout',[e])});c.click(function(e){b.trigger('click',[e]);i(e);return false})}a.wrapper.click(function(e){b.trigger('click',[e]);i(e);return false});b.click(function(e){i(e)});b.bind('disable',function(){a.wrapperInner.addClass(g.cls+'-disabled')}).bind('enable',function(){a.wrapperInner.removeClass(g.cls+'-disabled')});b.bind('check',function(){a.wrapper.addClass(g.cls+'-checked')}).bind('uncheck',function(){a.wrapper.removeClass(g.cls+'-checked')});$('img',a.wrapper).bind('dragstart',function(){return false}).bind('mousedown',function(){return false});if(window.getSelection)a.wrapper.css('MozUserSelect','none');if(a.checked)a.wrapper.addClass(g.cls+'-checked');if(a.disabled)a.wrapperInner.addClass(g.cls+'-disabled')})}})(jQuery);
// tipsy, version 1.0.0a
(function(a){function b(a,b){return typeof a=="function"?a.call(b):a}function c(a){while(a=a.parentNode){if(a==document)return true}return false}function d(b,c){this.$element=a(b);this.options=c;this.enabled=true;this.fixTitle()}d.prototype={show:function(){var c=this.getTitle();if(c&&this.enabled){var d=this.tip();d.find(".tipsy-inner")[this.options.html?"html":"text"](c);d[0].className="tipsy";d.remove().css({top:0,left:0,visibility:"hidden",display:"block"}).prependTo(document.body);var e=a.extend({},this.$element.offset(),{width:this.$element[0].offsetWidth,height:this.$element[0].offsetHeight});var f=d[0].offsetWidth,g=d[0].offsetHeight,h=b(this.options.gravity,this.$element[0]);var i;switch(h.charAt(0)){case"n":i={top:e.top+e.height+this.options.offset,left:e.left+e.width/2-f/2};break;case"s":i={top:e.top-g-this.options.offset,left:e.left+e.width/2-f/2};break;case"e":i={top:e.top+e.height/2-g/2,left:e.left-f-this.options.offset};break;case"w":i={top:e.top+e.height/2-g/2,left:e.left+e.width+this.options.offset};break}if(h.length==2){if(h.charAt(1)=="w"){i.left=e.left+e.width/2-15}else{i.left=e.left+e.width/2-f+15}}d.css(i).addClass("tipsy-"+h);d.find(".tipsy-arrow")[0].className="tipsy-arrow tipsy-arrow-"+h.charAt(0);if(this.options.className){d.addClass(b(this.options.className,this.$element[0]))}if(this.options.fade){d.stop().css({opacity:0,display:"block",visibility:"visible"}).animate({opacity:this.options.opacity})}else{d.css({visibility:"visible",opacity:this.options.opacity})}}},hide:function(){if(this.options.fade){this.tip().stop().fadeOut(function(){a(this).remove()})}else{this.tip().remove()}},fixTitle:function(){var a=this.$element;if(a.attr("title")||typeof a.attr("original-title")!="string"){a.attr("original-title",a.attr("title")||"").removeAttr("title")}},getTitle:function(){var a,b=this.$element,c=this.options;this.fixTitle();var a,c=this.options;if(typeof c.title=="string"){a=b.attr(c.title=="title"?"original-title":c.title)}else if(typeof c.title=="function"){a=c.title.call(b[0])}a=(""+a).replace(/(^\s*|\s*$)/,"");return a||c.fallback},tip:function(){if(!this.$tip){this.$tip=a('<div class="tipsy"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"></div>');this.$tip.data("tipsy-pointee",this.$element[0])}return this.$tip},validate:function(){if(!this.$element[0].parentNode){this.hide();this.$element=null;this.options=null}},enable:function(){this.enabled=true},disable:function(){this.enabled=false},toggleEnabled:function(){this.enabled=!this.enabled}};a.fn.tipsy=function(b){function e(c){var e=a.data(c,"tipsy");if(!e){e=new d(c,a.fn.tipsy.elementOptions(c,b));a.data(c,"tipsy",e)}return e}function f(){var a=e(this);a.hoverState="in";if(b.delayIn==0){a.show()}else{a.fixTitle();setTimeout(function(){if(a.hoverState=="in")a.show()},b.delayIn)}}function g(){var a=e(this);a.hoverState="out";if(b.delayOut==0){a.hide()}else{setTimeout(function(){if(a.hoverState=="out")a.hide()},b.delayOut)}}if(b===true){return this.data("tipsy")}else if(typeof b=="string"){var c=this.data("tipsy");if(c)c[b]();return this}b=a.extend({},a.fn.tipsy.defaults,b);if(!b.live)this.each(function(){e(this)});if(b.trigger!="manual"){var h=b.live?"live":"bind",i=b.trigger=="hover"?"mouseenter":"focus",j=b.trigger=="hover"?"mouseleave":"blur";this[h](i,f)[h](j,g)}return this};a.fn.tipsy.defaults={className:null,delayIn:0,delayOut:0,fade:false,fallback:"",gravity:"n",html:false,live:false,offset:0,opacity:.8,title:"title",trigger:"hover"};a.fn.tipsy.revalidate=function(){a(".tipsy").each(function(){var b=a.data(this,"tipsy-pointee");if(!b||!c(b)){a(this).remove()}})};a.fn.tipsy.elementOptions=function(b,c){return a.metadata?a.extend({},c,a(b).metadata()):c};a.fn.tipsy.autoNS=function(){return a(this).offset().top>a(document).scrollTop()+a(window).height()/2?"s":"n"};a.fn.tipsy.autoWE=function(){return a(this).offset().left>a(document).scrollLeft()+a(window).width()/2?"e":"w"};a.fn.tipsy.autoBounds=function(b,c){return function(){var d={ns:c[0],ew:c.length>1?c[1]:false},e=a(document).scrollTop()+b,f=a(document).scrollLeft()+b,g=a(this);if(g.offset().top<e)d.ns="n";if(g.offset().left<f)d.ew="w";if(a(window).width()+a(document).scrollLeft()-g.offset().left<b)d.ew="e";if(a(window).height()+a(document).scrollTop()-g.offset().top<b)d.ns="s";return d.ns+(d.ew?d.ew:"")}}})(jQuery)

