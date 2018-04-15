<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>">
    	<?php esc_attr_e( 'Ссылка при клике:', 'text_domain' ); ?>	
    </label> 
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">
</p>


   <p>
      <label for="<?php echo $this->get_field_id( 'add' ); ?>"><?php _e( 'Изображение:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'add' ); ?>" name="<?php echo $this->get_field_name( 'add' ); ?>" type="text" value="<?php echo esc_url( $add ); ?>" />
      <button class="upload_image_button button button-primary" style="margin-top: 10px;">Выбрать</button>
   </p>