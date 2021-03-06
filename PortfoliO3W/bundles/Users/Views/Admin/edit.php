<article role="article" style="white-space: nowrap;">
    <header>
        <hgroup>
            <h1 id="h1"><?php echo _( 'Edit user' ); ?></h1>
            <hr class="hr">
            <?php if( $me->can( 'create_users' ) ) : ?><a class="link add dark left" href="<?php app_info( 'url' ); ?>users/add/" title="<?php echo _( 'Add new user' ); ?>"><span class="inner"><?php echo _( 'Add new user' ); ?></span></a><?php endif; ?>
        </hgroup>
    </header>

    <?php display_errors(); ?>

    <form action="<?php app_info( 'url' ); ?>users/updating/<?php echo $user->getEmail(); ?>/" class="form" enctype="multipart/form-data" method="post">
        <fieldset class="fieldset">
            <legend class="legend"><?php echo _( 'Name' ); ?></legend>

            <div class="wrapper">
                <label class="label" for="txt-login"><?php echo _( 'Username' ); ?></label>
                <input class="field" id="txt-login" name="login" type="text" value="<?php echo $user->getLogin(); ?>">
            </div>
            <div class="wrapper">
                <label class="label required" for="txt-firstname"><?php echo _( 'First name' ); ?></label>
                <input class="field" id="txt-firstname" name="firstname" required="required" style="text-transform:capitalize;" type="text" value="<?php echo $user->getFirstname(); ?>">
            </div>
            <div class="wrapper">
                <label class="label required" for="txt-lastname"><?php echo _( 'Last name' ); ?></label>
                <input class="field" id="txt-lastname" name="lastname" required="required" style="text-transform:uppercase;" type="text" value="<?php echo $user->getLastname(); ?>">
            </div>
        </fieldset>

        <fieldset class="fieldset">
            <legend class="legend"><?php echo _( 'Contact info' ); ?></legend>

            <div class="wrapper">
                <label class="label required" for="txt-email"><?php echo _( 'E-mail address' ); ?></label>
                <input class="field" id="txt-email" name="email" required="required" type="email" style="text-transform:lowercase;" value="<?php echo $user->getEmail(); ?>">
            </div>
        </fieldset>

        <fieldset class="fieldset">
            <legend class="legend"><?php echo _( 'Manage options' ); ?></legend>

            <div class="wrapper">
                <?php echo $roles; ?>
            </div>
            <div class="wrapper">
                <label class="label" for="txt-password"><?php echo _( 'New password' ); ?></label>
                <input class="field" id="txt-password" name="password" type="password">
            </div>
            <div class="wrapper">
                <label class="label" for="txt-passwordconfirm"><?php echo _( 'Repeat new password' ); ?></label>
                <input class="field" id="txt-passwordconfirm" name="passwordconfirm" type="password">
            </div>
        </fieldset>

        <fieldset class="fieldset">
            <legend class="legend"><?php echo _( 'Avatar' ); ?></legend>

            <div class="wrapper">
                <?php $user->avatar( 'display' ); ?>

                <?php if( $me->can( 'upload_files' ) ) : ?>
                <label class="label" for="txt-avatar"><?php echo _( 'Image' ); ?></label>
                <input class="field" id="txt-avatar" name="avatar" type="file">
                <?php endif; ?>
            </div>
        </fieldset>

        <div style="text-align:right;">
            <button class="button edit dark" type="submit"><span class="inner"><?php echo _( 'Update user' ); ?></span></button>
            <?php if( $me->can( 'delete_users' ) ) : ?><a class="link trash dark" href="<?php app_info( 'url' ); ?>users/deleting/<?php echo $user->getEmail(); ?>" title=""><span class="inner"><?php echo _( 'Delete user' ); ?></span></a><?php endif; ?>
        </div>
    </form>
</article>