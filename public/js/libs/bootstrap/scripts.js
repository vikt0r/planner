
$(document).ready( function(){$('#sidebar').affix({
      offset: {
        top: 240
      }
    });
    //login,register form
    console.log('rememberme');
    var domCheckbox = jQuery('#login .checkbox');
    console.log(domCheckbox);
    jQuery(domCheckbox).on('click', function(evnt){
        if ( jQuery(this).hasClass('show') )
        {
            jQuery(this).removeClass('show');
            jQuery(this).find('input[name="remember_me"]').val(0);
        }
        else
        {
            jQuery(this).find('input[name="remember_me"]').val(1);
            jQuery(this).addClass('show');
        }
    });

}); //document ready

