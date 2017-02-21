<?php
/**
 * Review form
 */
defined( 'ABSPATH' ) || exit; ?>    
<?php 
if(esc_attr(get_post_meta(get_the_ID(),'comment',true)) != false) {
echo('<br><br><h5>Response</h5> '.esc_attr(get_post_meta(get_the_ID(),'comment',true)));
}
elseif($this->settings['review'] == 'yes' && is_user_logged_in() && bp_displayed_user_id() == get_current_user_id()){ ?>


<script>
(function ($) {
    

    $(document).ready(function () {
        $('form.bp-user-reviews-response<?php echo get_the_ID() ?>').submit(function (event) {
                event.preventDefault();
                $('.bp-user-review-message').remove();
                $.post(BP_User_Reviews.ajax_url, $(this).serialize(), function (data) {

                    if(data.result == false){
                        var html = '<div id="message" class="bp-user-review-message error"><p>';
                        $.each(data.errors, function () {
                            html += this+'<br>';
                        });
                        html += '</p></div>';
                        $(html).insertAfter($('form.bp-user-reviews-response<?php echo get_the_ID() ?>'));
                    } else {
                        var html = '<div id="message" class="bp-user-review-message success"><p>'+BP_User_Reviews.messages.success+'</p></div>';
                        $(html).insertAfter($('form.bp-user-reviews-response<?php echo get_the_ID() ?>'));
                        $('form.bp-user-reviews-response<?php echo get_the_ID() ?>').slideUp();
                    }
                });
            }
        );
    });
$(document).ready(function () {
$('form.bp-res-<?php echo get_the_ID() ?>').submit(function (event) {
event.preventDefault();
var html = '<form class="bp-user-reviews-response<?php echo get_the_ID() ?>"><h3>Add Response</h3><textarea name="response"></textarea> <br>       <input type="hidden" name="action" value="bp_user_review_response"><input type="hidden" name="review_id" value="<?php echo get_the_ID() ?>"><input type="hidden" name="user_id" value="<?php echo bp_displayed_user_id() ?>"><?php wp_nonce_field("bp-user-review-new-response-".bp_displayed_user_id()); ?><input type="submit" value="Submit">   </form>';
$('form.bp-res-<?php echo get_the_ID() ?>').before(html);
$('form.bp-res-<?php echo get_the_ID() ?>').slideUp();
 } );
 });


})(jQuery)
</script>
<form class="bp-res-<?php echo get_the_ID() ?>"> <input type="submit" value="Respond"> </form>


<?php } ?>






