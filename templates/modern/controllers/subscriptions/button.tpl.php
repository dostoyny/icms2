<?php $this->addTplJSName('subscriptions'); ?>
<div class="subscribe_wrap float-right position-relative ml-2 d-flex">
    <a href="#" class="btn subscriber" data-hash="<?php echo $hash; ?>" data-link0="<?php echo $this->href_to('subscribe'); ?>" data-link1="<?php echo $this->href_to('unsubscribe'); ?>" data-text0="<?php echo LANG_USERS_SUBSCRIBE; ?>" data-text1="<?php echo LANG_USERS_UNSUBSCRIBE; ?>" data-issubscribe="<?php echo (int)$user_is_subscribed; ?>" data-target="<?php html(json_encode($target)); ?>">
        <b class="icon-bell">
            <?php html_svg_icon('solid', 'bell'); ?>
        </b>
        <b class="icon-bell-slash">
            <?php html_svg_icon('solid', 'bell-slash'); ?>
        </b>
        <span class="d-none d-sm-inline-block"></span>
    </a>
    <span title="<?php echo LANG_SBSCR_SUBSCRIBERS; ?>" class="count-subscribers btn btn-outline-secondary position-relative ml-2" data-list_link="<?php echo $this->href_to('list_subscribers', $hash); ?>">
        <?php echo $subscribers_count; ?>
    </span>
</div>