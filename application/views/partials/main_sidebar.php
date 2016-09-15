<div class="left-sidebar">
    <?php if (!empty($categories)) { ?>
        <h2>Categories</h2>
        <div class="category-products">
            <?php foreach ($categories as $category) { ?>
                <?php if (!empty($category->products)) { ?>
                    <a href="<?php echo site_url('categorie/' . url_title($category->name) . '-' . $category->id); ?>"
                       class="cp-category <?php echo (!empty($main_category) && $main_category->id == $category->id) ? 'active' : ''; ?>"><span
                            class="pull-right">(<?php echo $category->products; ?>
                            )</span> <?php echo $category->name; ?></a>
                <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>
</div>