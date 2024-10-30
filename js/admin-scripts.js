/*
	Coothemes ICON PLUGIN SCRIPTS
	Compiled by Coothemes - www.coothemes.com
*/
jQuery(document).ready( function() {

	// select default icon element wrapper on initial page load
	// iconWrapperClick( jQuery( this ) , localized_data.default_icon_element );
	var interval = null;
	var x = 0;
	function check_thick() {
		interval = setInterval(function() {
			if( jQuery( '#TB_ajaxContent' ).is( ':visible' ) ) {
				x = 0;
				if( jQuery( '.icon-wrapper' ).hasClass( 'selected-element-wrap' ) ) {
					return;
				}
				jQuery( '.custom-pack-tab' ).removeAttr( 'style' );
				jQuery( '.element_selection_container' ).find( jQuery( '.icon-wrapper[alt="' + localized_data.default_icon_element + '"]' ) ).addClass( 'selected-element-wrap' );
			} else {
				x = 1;
			}
		}, 50);
	};
	// run our check thickbox function
	// on initial page load
	check_thick();


	// when a user clicks on an icon,
	// load'er up to the preview box
	function buttonClick() {
		var glyphUnicode =  jQuery( 'input[type=text].glyph_unicode', this ).val();
		var iconClass = jQuery( this ).find( 'span.mls' ).text();
		var selectedIconWrapper = jQuery( '.selected-element-wrap' ).attr( 'alt' );
		
		var is_pro = jQuery( this ).hasClass('ctp-gray');

		
		//clear select and add seclected to $this
		jQuery('.glyph').removeClass('selected');
		jQuery(this).addClass('selected');

		if(is_pro){
			
			jQuery('.copy_paste_input').text('[ctic-icons icon="'+iconClass.trim()+'" wrap="'+selectedIconWrapper+'" is="1" ]');
			
		}else{
			
			jQuery('.copy_paste_input').text('[ctic-icons icon="'+iconClass.trim()+'" wrap="'+selectedIconWrapper+'"]');
			
		}

	
		jQuery('input[type=text].glyph_unicode').css('background-color','#eee');
		jQuery('input[type=text].glyph_unicode', this).css('background-color','#FF8000', 'font-color', '#000');
		
		if(is_pro){
			
			jQuery('.ctic-icon-preview').html('<i class="coothemes-iconset1-preview ctp ct-'+iconClass+'" data-icon="'+glyphUnicode+'" style="display:none;"></i>');
			
		}else{
			
			jQuery('.ctic-icon-preview').html('<i class="coothemes-iconset1-preview ct ct-'+iconClass+'" data-icon="'+glyphUnicode+'" style="display:none;"></i>');
			
		}

		
		jQuery( '.coothemes-iconset1-preview' ).fadeIn( 'fast' );

		// Fade in the insert icon button
		if( jQuery( '#TB_ajaxContent' ).is( ':visible' ) ) {
			jQuery( '.insert-ctic-icon' ).fadeIn();
			jQuery('#TB_ajaxContent').animate({ scrollTop: 0 }, 'slow'); // scroll thickbox back up
		} else {
			jQuery('html, body').animate({ scrollTop: 0 }, 'slow'); // scroll html body
		}

	};


	function iconWrapperClick( button, element ) {
		var iconClass = jQuery( '.coothemes-iconset1-all-glyphs' ).find( '.glyph.selected' ).find( 'span.mls' ).text();


		if ( ! button.hasClass( 'glyph' ) ) {

			jQuery( '.icon-wrapper' ).removeClass( 'selected-element-wrap' );

			jQuery( button ).addClass( 'selected-element-wrap' );

		}

		var selectedIconWrapper = ( element === undefined ) ? 'undefined-here' : element;
		

		if( iconClass ) {

			var str = jQuery( '.copy_paste_input' ).text();
			var arr = str.split("wrap=");
			var arr1 = arr[1].split("\"");
					
			str = str.replace('wrap="'+arr1[1]+'"', 'wrap="'+selectedIconWrapper+'"' );
		
			jQuery( '.copy_paste_input' ).text(str);
			
		} else {
			// no icon was selected yet...but we can still add our wrap
			// swap out the example container for the new element
			jQuery( '.copy_paste_input' ).text('[ctic-icons icon="" wrap=""]');
		}
	};
	
			
	function attrClick() {
			jQuery('#ctic-icon-container').hide();
			jQuery('#ctic-icon-container-toggle').removeClass('yes-adv-attr');			
			
			jQuery('#advanced-shortcode-attr-list').slideToggle();
			jQuery(this).toggleClass('yes-adv-attr');

			if ( jQuery(".glyph").hasClass( 'ctic-icon-attr' ) ) {
				jQuery(".glyph").removeClass('ctic-icon-attr');
						
				if ( jQuery(".glyph").hasClass( 'glyph-demo' ) ) {}else{ jQuery(".glyph").addClass('glyph-demo');	   }
				if ( jQuery(".glyph").hasClass( 'ctic-icon-container' ) ) { jQuery(".glyph").removeClass('ctic-icon-container');	   }
			
			}else{
				
				jQuery(".glyph").addClass('ctic-icon-attr');
				jQuery(".glyph").removeClass('glyph-demo');
				jQuery(".glyph").removeClass('ctic-icon-container');
			}
			
			var iconClass = '';
			var selectedIconWrapper = jQuery( '.selected-element-wrap' ).attr( 'alt' );			

			var IconSize = jQuery(" input[ name='IconSize' ] ").val();
			var IocnLink = jQuery(" input[ name='IocnLink' ] ").val();			
			var OpenNew = jQuery("input[name='OpenNew']:checked").val();			
			var IconColor = jQuery(" input[ name='IconColor' ] ").val();
			var RepeatIcon = jQuery(" input[ name='RepeatIcon' ] ").val();			
			var HoverIconColor = jQuery(" input[ name='HoverIconColor' ] ").val();
			var ClassNames = jQuery(" input[ name='ClassNames' ] ").val();	
			
			var AnimateIcon =   jQuery("#AnimateIcon").find("option:selected").text();						
			var AnimateEvent = jQuery("#AnimateEvent").find("option:selected").text();
				
			jQuery('.copy_paste_input').text('[ctic-attr-icons icon="'+iconClass.trim()+'" wrap="'+selectedIconWrapper+'"   size="'+IconSize+'"   link="'+IocnLink+'"  opennew="'+OpenNew+'"  color="'+IconColor+'"  hovercolor="'+HoverIconColor+'"  class="'+ClassNames+'"  animate="'+AnimateIcon+'"  aevent="'+AnimateEvent+'" ]');
			
			return false;
		};
		
	function AttrIconClick() {

		var glyphUnicode =  jQuery( 'input[type=text].glyph_unicode', this ).val();
		
		var iconClass = jQuery( this ).find( 'span.mls' ).text();
		var selectedIconWrapper = jQuery( '.selected-element-wrap' ).attr( 'alt' );
		
		//clear select and add seclected to $this
		jQuery('.glyph').removeClass('selected');
		jQuery(this).addClass('selected');
		
			

		var IconSize = jQuery(" input[ name='IconSize' ] ").val();
		var IocnLink = jQuery(" input[ name='IocnLink' ] ").val();			
		var OpenNew = jQuery("input[name='OpenNew']:checked").val();			
		var IconColor = jQuery(" input[ name='IconColor' ] ").val();
		var RepeatIcon = jQuery(" input[ name='RepeatIcon' ] ").val();			
		var HoverIconColor = jQuery(" input[ name='HoverIconColor' ] ").val();
		var ClassNames = jQuery(" input[ name='ClassNames' ] ").val();	
		
		var AnimateIcon =   jQuery("#AnimateIcon").find("option:selected").text();						
		var AnimateEvent = jQuery("#AnimateEvent").find("option:selected").text();
						
		if(OpenNew != 1){ OpenNew = ''; }	
		
		var is_pro = jQuery( this ).hasClass('ctp-gray');
						
		if(is_pro){

			jQuery('.copy_paste_input').text('[ctic-attr-icons icon="'+iconClass.trim()+'" wrap="'+selectedIconWrapper+'"   size="'+IconSize+'"   link="'+IocnLink+'"  opennew="'+OpenNew+'"  color="'+IconColor+'"  hovercolor="'+HoverIconColor+'"  class="'+ClassNames+'"  animate="'+AnimateIcon+'"  aevent="'+AnimateEvent+'" is="1"]');				
						
		}else{
			jQuery('.copy_paste_input').text('[ctic-attr-icons icon="'+iconClass.trim()+'" wrap="'+selectedIconWrapper+'"   size="'+IconSize+'"   link="'+IocnLink+'"  opennew="'+OpenNew+'"  color="'+IconColor+'"  hovercolor="'+HoverIconColor+'"  class="'+ClassNames+'"  animate="'+AnimateIcon+'"  aevent="'+AnimateEvent+'" ]');				
		}

		
		
		var  target = '';
		if(OpenNew == 1){ target = 'target="_blank"';}

		jQuery('input[type=text].glyph_unicode').css('background-color','#eee');
		jQuery('input[type=text].glyph_unicode', this).css('background-color','#FF8000', 'font-color', '#000');
		

		if(is_pro){

			jQuery('.ctic-icon-preview').html('<a href="'+IocnLink+'" '+target+' class="ctic-public ctic-a-'+iconClass+'" ><i class="coothemes-iconset1-preview animated-icon ctp ct-'+iconClass+' ' +ClassNames+'" data-icon="'+glyphUnicode+'" style="display:none;font-size:'+IconSize+';" onmouseover="this.style.color=\''+HoverIconColor+'\'" onmouseleave="this.style.color=\''+IconColor+'\'"  data-animate-on="hover" data-animation-stagger="0" data-animation="'+AnimateIcon+'"></i></a>');				
						
		}else{
			jQuery('.ctic-icon-preview').html('<a href="'+IocnLink+'" '+target+' class="ctic-public ctic-a-'+iconClass+'" ><i class="coothemes-iconset1-preview animated-icon ct ct-'+iconClass+' ' +ClassNames+'" data-icon="'+glyphUnicode+'" style="display:none;font-size:'+IconSize+';" onmouseover="this.style.color=\''+HoverIconColor+'\'" onmouseleave="this.style.color=\''+IconColor+'\'"  data-animate-on="hover" data-animation-stagger="0" data-animation="'+AnimateIcon+'"></i></a>');			
		}
		
		
		jQuery( '.coothemes-iconset1-preview' ).fadeIn( 'fast' );

		// Fade in the insert icon button
		if( jQuery( '#TB_ajaxContent' ).is( ':visible' ) ) {
			jQuery( '.insert-ctic-icon' ).fadeIn();
			jQuery('#TB_ajaxContent').animate({ scrollTop: 0 }, 'slow'); // scroll thickbox back up
		} else {
			jQuery('html, body').animate({ scrollTop: 0 }, 'slow'); // scroll html body
		}

	};		
		
		
	function containerClick() {
			jQuery('#advanced-shortcode-attr-list').hide();
			jQuery('#advanced-shortcode-attr-toggle').removeClass('yes-adv-attr');
						
			jQuery('#ctic-icon-container').slideToggle();

			jQuery(this).toggleClass('yes-adv-attr');
			
			
			if ( jQuery(".glyph").hasClass( 'ctic-icon-container' ) ) {
				jQuery(".glyph").removeClass('ctic-icon-container');	
				if ( jQuery(".glyph").hasClass( 'glyph-demo' ) ) {}else{ jQuery(".glyph").addClass('glyph-demo'); }
				if ( jQuery(".glyph").hasClass( 'ctic-icon-attr' ) ) { jQuery(".glyph").removeClass('ctic-icon-attr'); }
			}else{
				jQuery(".glyph").addClass('ctic-icon-container');
				jQuery(".glyph").removeClass('glyph-demo');
				jQuery(".glyph").removeClass('ctic-icon-attr');
			}			
			

			var iconClass = '';
			var selectedIconWrapper = jQuery( '.selected-element-wrap' ).attr( 'alt' );			

			var ContainerIconStyle =   jQuery("#ContainerIconStyle").find("option:selected").text();
			var ContainerIconSize = jQuery(" input[ name='ContainerIconSize' ] ").val();
			
			var ContainerIconLink = jQuery(" input[ name='ContainerIconLink' ] ").val();			
			var ContainerOpenNew = jQuery("input[name='ContainerOpenNew']:checked").val();	
			var ContainerClassNames = jQuery(" input[ name='ContainerClassNames' ] ").val();				
					
			var ContainerIconColor = jQuery(" input[ name='ContainerIconColor' ] ").val();
			var ContainerHoverIconColor = jQuery(" input[ name='ContainerHoverIconColor' ] ").val();			
			
			var ContainerBackgroundColor = jQuery(" input[ name='ContainerBackgroundColor' ] ").val();	
			var ContainerHoverBackgroundColor = jQuery(" input[ name='ContainerHoverBackgroundColor' ] ").val();					

			
			var ContainerAnimateIcon =   jQuery("#ContainerAnimateIcon").find("option:selected").text();						
			var ContainerAnimateEvent = jQuery("#ContainerAnimateEvent").find("option:selected").text();
							
			
			jQuery('.copy_paste_input').text('[ctic-container-icons icon="'+iconClass.trim()+'" wrap="'+selectedIconWrapper+'" style="'+ContainerIconStyle+'"   size="'+ContainerIconSize+'"   link="'+ContainerIconLink+'"  opennew="'+ContainerOpenNew+'"  color="'+ContainerIconColor+'"  hovercolor="'+ContainerHoverIconColor+'" bgcolor="'+ContainerBackgroundColor+'"  hoverbgcolor="'+ContainerHoverBackgroundColor+'"  class="'+ContainerClassNames+'"  animate="'+ContainerAnimateIcon+'"  aevent="'+ContainerAnimateEvent+'" ]');			
			
			
			
			return false;	
		};
		
		
	function ContainerIconClick() {

		var glyphUnicode =  jQuery( 'input[type=text].glyph_unicode', this ).val();
		var iconClass = jQuery( this ).find( 'span.mls' ).text();
		var selectedIconWrapper = jQuery( '.selected-element-wrap' ).attr( 'alt' );
		
		//clear select and add seclected to $this
		jQuery('.glyph').removeClass('selected');
		jQuery(this).addClass('selected');
		
		
		var ContainerIconStyle =   jQuery("#ContainerIconStyle").find("option:selected").text();
		var ContainerIconSize = jQuery(" input[ name='ContainerIconSize' ] ").val();
		
		var ContainerIconLink = jQuery(" input[ name='ContainerIconLink' ] ").val();			
		var ContainerOpenNew = jQuery("input[name='ContainerOpenNew']:checked").val();	
		var ContainerClassNames = jQuery(" input[ name='ContainerClassNames' ] ").val();				
				
		var ContainerIconColor = jQuery(" input[ name='ContainerIconColor' ] ").val();
		var ContainerHoverIconColor = jQuery(" input[ name='ContainerHoverIconColor' ] ").val();			
		
		var ContainerBackgroundColor = jQuery(" input[ name='ContainerBackgroundColor' ] ").val();	
		var ContainerHoverBackgroundColor = jQuery(" input[ name='ContainerHoverBackgroundColor' ] ").val();					

		
		var ContainerAnimateIcon =   jQuery("#ContainerAnimateIcon").find("option:selected").text();						
		var ContainerAnimateEvent = jQuery("#ContainerAnimateEvent").find("option:selected").text();
						
		if(ContainerOpenNew != 1 ){ ContainerOpenNew = ''; }
		
		
		var is_pro = jQuery( this ).hasClass('ctp-gray');
						
		if(is_pro){
			
			jQuery('.copy_paste_input').text('[ctic-container-icons icon="'+iconClass.trim()+'" wrap="'+selectedIconWrapper+'" style="'+ContainerIconStyle+'"   size="'+ContainerIconSize+'"   link="'+ContainerIconLink+'"  opennew="'+ContainerOpenNew+'"  color="'+ContainerIconColor+'"  hovercolor="'+ContainerHoverIconColor+'" bgcolor="'+ContainerBackgroundColor+'"  hoverbgcolor="'+ContainerHoverBackgroundColor+'"  class="'+ContainerClassNames+'"  animate="'+ContainerAnimateIcon+'"  aevent="'+ContainerAnimateEvent+'" is="1" ]');							
		}else{
			jQuery('.copy_paste_input').text('[ctic-container-icons icon="'+iconClass.trim()+'" wrap="'+selectedIconWrapper+'" style="'+ContainerIconStyle+'"   size="'+ContainerIconSize+'"   link="'+ContainerIconLink+'"  opennew="'+ContainerOpenNew+'"  color="'+ContainerIconColor+'"  hovercolor="'+ContainerHoverIconColor+'" bgcolor="'+ContainerBackgroundColor+'"  hoverbgcolor="'+ContainerHoverBackgroundColor+'"  class="'+ContainerClassNames+'"  animate="'+ContainerAnimateIcon+'"  aevent="'+ContainerAnimateEvent+'" ]');					
		}
		
		
		jQuery('input[type=text].glyph_unicode').css('background-color','#eee');
		jQuery('input[type=text].glyph_unicode', this).css('background-color','#FF8000', 'font-color', '#000');
		
		var  target = '';
		if(ContainerOpenNew == 1){ target = 'target="_blank"';}	
		
		if(is_pro){
			
			jQuery('.ctic-icon-preview').html('<a href="'+ContainerIconLink+'" '+target+' id="ctic-circle" class="ctic-public ctic-a-'+iconClass+'"  onmouseleave="this.style.backgroundColor=\''+ContainerBackgroundColor+'\'" onmouseover="this.style.backgroundColor=\''+ContainerHoverBackgroundColor+'\'" style="background-color: '+ContainerBackgroundColor+';" ><i class=" animated-icon ctp ct-'+iconClass+' ' +ContainerClassNames+' coothemes-iconset1-preview" data-icon="'+glyphUnicode+'" style="display:none;font-size:'+ContainerIconSize+';" onmouseover="this.style.color=\''+ContainerHoverIconColor+'\'" onmouseleave="this.style.color=\''+ContainerIconColor+'\'"  data-animate-on="hover" data-animation-stagger="0" data-animation="'+ContainerAnimateIcon+'"></i></a>');						
		}else{
			jQuery('.ctic-icon-preview').html('<a href="'+ContainerIconLink+'" '+target+' id="ctic-circle" class="ctic-public ctic-a-'+iconClass+'"  onmouseleave="this.style.backgroundColor=\''+ContainerBackgroundColor+'\'" onmouseover="this.style.backgroundColor=\''+ContainerHoverBackgroundColor+'\'" style="background-color: '+ContainerBackgroundColor+';" ><i class=" animated-icon ct ct-'+iconClass+' ' +ContainerClassNames+' coothemes-iconset1-preview" data-icon="'+glyphUnicode+'" style="display:none;font-size:'+ContainerIconSize+';" onmouseover="this.style.color=\''+ContainerHoverIconColor+'\'" onmouseleave="this.style.color=\''+ContainerIconColor+'\'"  data-animate-on="hover" data-animation-stagger="0" data-animation="'+ContainerAnimateIcon+'"></i></a>');				
		}
				
			
		jQuery( '.coothemes-iconset1-preview' ).fadeIn( 'fast' );

		// Fade in the insert icon button
		if( jQuery( '#TB_ajaxContent' ).is( ':visible' ) ) {
			jQuery( '.insert-ctic-icon' ).fadeIn();
			jQuery('#TB_ajaxContent').animate({ scrollTop: 0 }, 'slow'); // scroll thickbox back up
		} else {
			jQuery('html, body').animate({ scrollTop: 0 }, 'slow'); // scroll html body
		}

	};			
		
		
		
		
		
		
		
	jQuery( 'body' ).on( 'click' , '#advanced-shortcode-attr-toggle' , attrClick );		
	jQuery( 'body' ).on( 'click' , '#ctic-icon-container-toggle' , containerClick );			

	/* Change selected icon wrapper   i b h1 h2.... */
	jQuery( 'body' ).on( 'click' , '.icon-wrapper ' , function() {
		iconWrapperClick( jQuery( this ) , jQuery( this ).attr( 'alt' ) );
	});

	/* Change the icon */
	jQuery( 'body' ).on( 'click' , '.glyph-demo' , buttonClick );
	jQuery( 'body' ).on( 'click' , '.glyph', function() {
		if ( jQuery( this ).hasClass( 'glyph-demo' ) ) {
			return;
		}
	} );
	
	
	/* Change the icon for attr icon */
	jQuery( 'body' ).on( 'click' , '.ctic-icon-attr' , AttrIconClick );
	jQuery( 'body' ).on( 'click' , '.glyph', function() {
		if ( jQuery( this ).hasClass( 'ctic-icon-attr' ) ) {
			return;
		}
	} );
	
	/* Change the icon for container icon */
	jQuery( 'body' ).on( 'click' , '.ctic-icon-container' , ContainerIconClick );
	jQuery( 'body' ).on( 'click' , '.glyph', function() {
		if ( jQuery( this ).hasClass( 'ctic-icon-container' ) ) {
			return;
		}
	} );	
		
	
	//close TB
	jQuery( 'body' ).on( 'click' , '#TB_closeWindowButton', function() {
		jQuery( this ).parents().find(".thickbox-loading").css('visibility','hidden');
		jQuery( this ).parents().find(".TB_overlayBG").css('visibility','hidden');
	} );

	jQuery( 'body' ).on( 'click' , '.admin-icon', function() {
			jQuery(".TB_overlayBG").css('visibility','visible');
	} );
	//close TB end	
	
	
	// set up a timer...
	var delay = (function(){
	  var timer = 0;
	  return function(callback, ms){
		clearTimeout (timer);
		timer = setTimeout(callback, ms);
	  };
	})();


});




// insert our icon into the editor
function insert_ctic_icon_to_editor() {
		var icon_code = jQuery( '.copy_paste_input' ).text();
		tb_remove();
		window.send_to_editor( icon_code );
		event.preventDefault();
	}


