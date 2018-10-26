<article role="article" style="white-space: nowrap;">
    <header>
        <hgroup>
            <h1 id="h1"><?php echo _( 'Add new post' ); ?></h1>
            <hr class="hr">
        </hgroup>
    </header>
    <?php display_errors(); ?>

<form action="<?php app_info( 'url' ); ?>posts/adding/" class="form" enctype="multipart/form-data" method="post">
    <fieldset class="fieldset">
        <legend class="legend"><?php echo _( 'Post' ); ?></legend>

        <div class="wrapper">
            <label class="label" for="txt-nom"><?php echo _( 'Nom du post' ); ?></label>
            <input class="field" id="txt-nom" name="title" type="text">

        </div>
        <label class="label" for="txt-contenu"><?php echo _( 'Contenu du post' ); ?></label><br/>
        <textarea name="content" id="txt-contenu" rows="10" cols="50"></textarea><br/><br/>

        
        <div class="wrapper">
                <label class="label" for="txt-excerpt"><?php echo _( 'Excerpt' ); ?></label>
                <input class="field" id="txt-excerpt" name="excerpt" type="text">
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
                        echo '>'.$value['denomination'].'</option>';
                    }
                }
                ?>
                </select>
            </div>
            <div class="wrapper">
                <select name="format">
                <?php 
                foreach ($term as $key => $value) {

                    if($value['taxonomy'] == 'post_format' && $value['keyword'] != 'nav_menu') {
                        echo  '<option value="'.$value['keyword'].'" ';
                        echo '>'.$value['denomination'].'</option>';
                    }
                }
                ?>
                </select>
            </div>

        </fieldset>

    <div style="text-align:right;">
        <button class="button add dark" type="submit"><span class="inner"><?php echo _( 'Ajouter une page' ); ?></span></button>
    </div>
</form>
</article>