<div class="wrap">
    <h1><?php _e( 'Editar Obtuario', 'wedeves' ); ?></h1>

    <?php $item = wd_get_funeraria( $id ); ?>

    <form action="" method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-funeraria-name">
                    <th scope="row">
                        <label for="funeraria_name"><?php _e( 'Nome', 'wedeves' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="funeraria_name" id="funeraria_name" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedeves' ); ?>" value="<?php echo esc_attr( $item->funeraria_name ); ?>" />
                    </td>
                </tr>
                <tr class="row-funeraria-last-name">
                    <th scope="row">
                        <label for="funeraria_last_name"><?php _e( 'sobrenome', 'wedeves' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="funeraria_last_name" id="funeraria_last_name" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedeves' ); ?>" value="<?php echo esc_attr( $item->funeraria_last_name ); ?>" />
                    </td>
                </tr>
                <tr class="row-funeraria-birth">
                    <th scope="row">
                        <label for="funeraria_birth"><?php _e( 'Nascimento', 'wedeves' ); ?></label>
                    </th>
                    <td>
                        <input type="date" name="funeraria_birth" id="funeraria_birth" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedeves' ); ?>" value="<?php echo esc_attr( $item->funeraria_birth ); ?>" />
                    </td>
                </tr>
                <tr class="row-funeraria-death">
                    <th scope="row">
                        <label for="funeraria_death"><?php _e( 'Obto', 'wedeves' ); ?></label>
                    </th>
                    <td>
                        <input type="date" name="funeraria_death" id="funeraria_death" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedeves' ); ?>" value="<?php echo esc_attr( $item->funeraria_death ); ?>" />
                    </td>
                </tr>
                <tr class="row-funeraria-biograpik">
                    <th scope="row">
                        <label for="funeraria_biograpik"><?php _e( 'Biografia', 'wedeves' ); ?></label>
                    </th>
                    <td>
                        <input type="textarea" name="funeraria_biograpik" id="funeraria_biograpik" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedeves' ); ?>" value="<?php echo esc_attr( $item->funeraria_biograpik ); ?>" />
                    </td>
                </tr>
                <tr class="row-funeraria-photo">
                    <th scope="row">
                        <label for="funeraria_photo"><?php _e( 'Foto', 'wedeves' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="funeraria_photo" id="funeraria_photo" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedeves' ); ?>" value="<?php echo esc_attr( $item->funeraria_photo ); ?>" />
                    </td>
                </tr>
             </tbody>
        </table>

        <input type="hidden" name="field_id" value="<?php echo $item->id; ?>">

        <?php wp_nonce_field( 'funeraria-new' ); ?>
        <?php submit_button( __( 'Atualizar Obtuario', 'wedeves' ), 'primary', 'submit_funeraria' ); ?>

    </form>
</div>