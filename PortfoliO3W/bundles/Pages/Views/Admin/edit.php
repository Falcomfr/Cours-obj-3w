<article role="article" style="white-space: nowrap;">
    <header>
        <hgroup>
            <h1 id="h1"><?php echo _( 'Edit page' ); ?></h1>
            <hr class="hr">
            <?php if( $me->can( 'edit_pages' ) ) : ?><a class="link add dark left" href="<?php app_info( 'url' ); ?>pages/add/" title="<?php echo _( 'Add new page' ); ?>"><span class="inner"><?php echo _( 'Add new page' ); ?></span></a><?php endif; ?>
        </hgroup>
    </header>
    
    <?php display_errors();?>
    
    <form action="<?php app_info( 'url' ); ?>pages/updating/<?php echo $page->getId(); ?>/" class="form" enctype="multipart/form-data" method="post">
        <fieldset class="fieldset">
            <legend class="legend"><?php echo _( 'Page' ); ?></legend>

            <div class="wrapper">
                <label class="label required" for="txt-title"><?php echo _( 'Title' ); ?></label>
                <input class="field" id="txt-title" name="title" required="required" type="text" value="<?php echo $page->getTitle(); ?>">
            </div>
            <div class="wrapper">
                <label class="label required" for="txt-content"><?php echo _( 'Content' ); ?></label>
                <input class="field" id="txt-content" name="content" required="required" type="text" value="<?php echo $page->getContent(); ?>">
            </div>
            <div class="wrapper">
                <label class="label" for="txt-excerpt"><?php echo _( 'Excerpt' ); ?></label>
                <input class="field" id="txt-excerpt" name="excerpt" type="text" value="<?php echo $page->getExcerpt(); ?>">
            </div>
        </fieldset>

        <fieldset class="fieldset">
            <legend class="legend"><?php echo _( 'Parameter' ); ?></legend>

            <div class="wrapper">
                <select name="status">
                <?php 
                foreach ($term as $key => $value) {

                    if($value['taxonomy'] == 'post_status') {
                        echo  '<option value="'.$value['keyword'].'" ';
                        if($value['keyword'] == $page->getStatus()) {
                            echo 'selected';
                        }
                        echo '>'.$value['denomination'].'</option>';
                    }
                }
                ?>
                </select>
            </div>

            <div class="wrapper">
                <select name="access">
                <?php 
                foreach ($term as $key => $value) {

                    if($value['taxonomy'] == 'post_access') {
                        echo  '<option value="'.$value['keyword'].'" ';
                        if($value['keyword'] == $page->getAccess()) {
                            echo 'selected';
                        }
                        echo '>'.$value['denomination'].'</option>';
                    }
                }
                ?>
                </select>
            </div>
        </fieldset>



        <div style="text-align:right;">
            <button class="button edit dark" type="submit"><span class="inner"><?php echo _( 'Update page' ); ?></span></button>
            <?php if( $me->can( 'delete_users' ) ) : ?><a class="link trash dark" href="<?php app_info( 'url' ); ?>pages/deleting/<?php echo $page->getId(); ?>" title=""><span class="inner"><?php echo _( 'Delete page' ); ?></span></a><?php endif; ?>
        </div>
    </form>
</article>