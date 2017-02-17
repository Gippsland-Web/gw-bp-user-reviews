<?php
/**
 * Review form
 */
defined( 'ABSPATH' ) || exit; ?>    
<?php 
if(get_post_meta(get_the_ID(),'comment',true) != false) {
    echo('<div><p><strong>'.bp_core_get_username(bp_displayed_user_id()).'</strong>: '.get_post_meta(get_the_ID(),'comment',true).'</p></div>');
} elseif($this->settings['review'] == 'yes' && is_user_logged_in() && bp_displayed_user_id() == get_current_user_id()){ ?>
<form class="bp-user-reviews-response">


            <h2><?php _e('Add Response', 'bp-user-reviews-response'); ?></label></h2>
        <textarea name="response"></textarea>
        <input type="hidden" name="action" value="bp_user_review_response">
    <input type="hidden" name="review_id" value="<?php echo get_the_ID() ?>">
    <input type="hidden" name="user_id" value="<?php echo bp_displayed_user_id() ?>">
    <?php wp_nonce_field('bp-user-review-new-response-'.bp_displayed_user_id()); ?>
    <input type="submit" value="Submit">   
</form>
<?php } ?>