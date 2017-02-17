<?php
    global $post;
    $criterions = get_post_meta($post->ID, 'criterions', true);
    $user_id = get_post_meta($post->ID, 'user_id', true);
    $user = get_userdata($user_id);
    wp_nonce_field('bp-user-reviews-edit-'.$post->ID, 'bp-user-reviews-edit');
?>
<table class="form-table drone-group review-form">
    <tbody>
    <tr class="drone-row" valign="top">
        <th class="drone-label" scope="row"><label><?php _e('User', 'bp-user-reviews'); ?></label></th>
        <td class="user">
            <?php echo get_avatar($user->ID, 25); ?>
            <?php echo bp_core_get_userlink( $user->ID ); ?>
        </td>
    </tr>
    <tr class="drone-row" valign="top">
        <th class="drone-label" scope="row"><label><?php _e('Author', 'bp-user-reviews'); ?></label></th>
        <td class="user">
            <?php echo $this->author(); ?>
        </td>
    </tr>
    <tr class="drone-row" valign="top">
        <th class="drone-label" scope="row"><label><?php _e('Marks', 'bp-user-reviews'); ?></label></th>
        <td class="marks">
            <p>
                <b><?php _e('Total:', 'bp-user-reviews'); ?></b>
                <span>
                    <?php echo $this->calc_stars($post->average, $post->stars); ?> <?php _e('of', 'bp-user-reviews'); ?> <?php echo $post->stars; ?>
                </span>
                <span>
                    <?php $this->print_stars_admin($post->average, $post->stars); ?>
                </span>
            </p>
            <?php foreach ($criterions as $name => $value){ ?>
                <p>
                    <b><?php echo $name; ?>:</b>
                    <span>
                        <?php echo $this->calc_stars($value, $post->stars); ?> <?php _e('of', 'bp-user-reviews'); ?> <?php echo $post->stars; ?>
                    </span>
                    <span>
                        <?php $this->print_stars_admin($value, $post->stars); ?>
                    </span>
                </p>
            <?php } ?>

        </td>
    </tr>
    <tr class="drone-row" valign="top">
        <th class="drone-label" scope="row"><label><?php _e('Review', 'bp-user-reviews'); ?></label></th>
        <td>
            <textarea name="review" style="width: 100%;height: 100px"><?php echo esc_attr($post->review); ?></textarea>
        </td>
    </tr>
    </tbody>
</table>