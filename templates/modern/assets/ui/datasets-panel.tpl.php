<?php $this->addTplJSNameFromContext('vendors/slick/slick.min'); ?>
<?php $this->addTplCSSNameFromContext('slick'); ?>
<?php if(!isset($ds_prefix)){ $ds_prefix = '/'; } ?>
<?php $active_filters_query = $this->controller->getActiveFiltersQuery(); ?>
<div class="content_datasets mb-2">
    <ul class="nav nav-pills pills-menu dataset-pills">
        <?php $ds_counter = 0; ?>
        <?php foreach($datasets as $set){ ?>
            <?php $ds_selected = ($dataset_name == $set['name'] || (!$dataset_name && $ds_counter==0)); ?>
            <li class="nav-item<?php if ($ds_selected){ ?> is-active<?php } ?> <?php echo $set['name'].(!empty($set['target_controller']) ? '_'.$set['target_controller'] : ''); ?>">

                <?php $ds_url = sprintf($base_ds_url, ($ds_counter > 0 ? $ds_prefix.$set['name'] : '')); ?>

                <?php if ($ds_selected){ ?>
                    <span class="nav-link active"><?php echo $set['title']; ?></span>
                <?php } else { ?>
                    <a class="nav-link" href="<?php echo $ds_url.($active_filters_query ? '?'.$active_filters_query : ''); ?>">
                        <?php echo $set['title']; ?>
                    </a>
                <?php } ?>

            </li>
            <?php $ds_counter++; ?>
        <?php } ?>
    </ul>
</div>
<?php if (!empty($current_dataset['description'])){ ?>
    <div class="content_datasets_description">
        <?php echo $current_dataset['description']; ?>
    </div>
<?php } ?>
<?php ob_start(); ?>
<script type="text/javascript">
if(typeof dsslick === 'undefined'){
    var dsslick = $(".dataset-pills").slick({
        initialSlide: $('.dataset-pills > li.is-active').index(),
        infinite: false,
        arrows: false,
        mobileFirst: true,
        responsive: [
            {breakpoint: 1024, settings: "unslick"},
            {breakpoint: 650, settings: {slidesToShow: 3, slidesToScroll: 1}},
            {breakpoint: 320, settings: {slidesToShow: 2, slidesToScroll: 1}}
        ]
    });
}
</script>
<?php $this->addBottom(ob_get_clean()); ?>