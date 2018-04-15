<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'add' ) ); ?>">
    	<?php esc_attr_e( 'Код партнерки:', 'text_domain' ); ?>	
    </label> 
    <br>
    <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'add' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'add' ) ); ?>" rows="5"><?php echo esc_attr( $add ); ?></textarea>
</p>