<div class="wrap">
    <h2>Article and Issue Batch Uploader</h2>
    <?php
        if( !empty( $_GET ) ) {
            if( isset( $_GET[ 'failure' ] ) ) {

                ?>
                <div class="notice notice-error is-dismissable">
                    <p>ERROR: <?= $_GET[ 'fail-why' ] ?></p>
                </div>
                <?php

            } else if( isset( $_GET[ 'success' ] ) ) {

                ?>
                <div class="notice notice-success is-dismissable">
                    <p>Batch Upload successful!</p>
                </div>
                <?php
            }
        }

        /**
         * We're using the admin-post.php method to handle the form on the back-end, because it's just easier to hook into that way. We
         * need to set the form's enctype attribute to "multipart/form-data" or the file upload won't work.
         * 
         * There's also a Nonce field, for an added layer of security.
         * 
         * Right now, I've only designed the plugin to handle Articles and Issues, so those will be the only options that we add here.
         */
    ?>
    <div class="container">
        </p>This page can be used to create entries for Article and Issue stubs <em>en masse</em> from a chosen CSV file in a given format.</p>
        <form name="batch-upload-form" method="post" action="<?= esc_url( admin_url( 'admin-post.php' ) ); ?>" enctype="multipart/form-data">
            <input type="hidden" name="action" value="batch_upload_validate">
            <?php wp_nonce_field( admin_url( 'admin-post.php' ), 'batch-fields' ); ?>
            <p><em>Choose the type of posts you'd like to add (for Book Reviews, choose "Article"):</em></p>
            <label for="select-post-type">Post Type:</label>
            <select id="select-post-type" name="post-type">
                <option value="none"> -- None Selected -- </option>
            <?php
                $p_types = get_post_types( array( 'public' => true, '_builtin' => false ) );

                foreach ( $p_types as $pt ) {

                    if ( $pt == 'article' || $pt == 'issue' )
                        echo '<option value="' . $pt . '">' . ucfirst( $pt ) . '</option>';
                    else
                        continue;
                }
            ?>
            </select>
            <br /><br />
            <label for="csv-input">Choose a CSV file that contains properly-formatted data:</label><br />
            <input type="file" name="csv-name" id="csv-input" accept=".csv">
            <?php
                submit_button('Create Posts');
            ?>
        </form>
    </div>
</div>