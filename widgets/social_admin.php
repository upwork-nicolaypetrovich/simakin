<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
    	<?php esc_attr_e( 'Заголовок:', 'text_domain' ); ?>	
    </label> 
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
</p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'vk' ) ); ?>">
    	<?php esc_attr_e( 'вКонтакте:', 'text_domain' ); ?>	
    </label> 
    <br>
    <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'vk' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'vk' ) ); ?>" rows="5"><?php echo esc_attr( $vk ); ?></textarea>
</p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'ok' ) ); ?>">
    	<?php esc_attr_e( 'Однокласники:', 'text_domain' ); ?>	
    </label> 
    <br>
    <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'ok' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'ok' ) ); ?>" rows="5"><?php echo esc_attr( $ok ); ?></textarea>
</p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'fb' ) ); ?>">
    	<?php esc_attr_e( 'Facebook:', 'text_domain' ); ?>	
    </label> 
    <br>
    <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'fb' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'fb' ) ); ?>" rows="5"><?php echo esc_attr( $fb ); ?></textarea>
</p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>">
    	<?php esc_attr_e( 'Google+:', 'text_domain' ); ?>	
    </label> 
    <br>
    <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'google' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>" rows="5"><?php echo esc_attr( $google ); ?></textarea>
</p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'tw' ) ); ?>">
    	<?php esc_attr_e( 'Twitter:', 'text_domain' ); ?>	
    </label> 
    <br>
    <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'tw' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'tw' ) ); ?>" rows="5"><?php echo esc_attr( $tw ); ?></textarea>
</p>