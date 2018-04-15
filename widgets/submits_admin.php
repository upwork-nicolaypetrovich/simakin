<p><h3>Зона ссылок на сети</h3></p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
    	<?php esc_attr_e( 'Заголовок:', 'text_domain' ); ?>	
    </label> 
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
</p>

<p>Ссылки на сети собираются автоматом из настроек системы.</p>


<hr>


<p><h3>Зона подписки на рассылку</h3></p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'title2' ) ); ?>">
    	<?php esc_attr_e( 'Заголовок:', 'text_domain' ); ?>	
    </label> 
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title2' ) ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>">
</p>

<p>Виджет автоматом подтягивает настройки формы из плагина Sendpulse.</p>


<hr>


<p><h3>Зона Push уведомлений</h3></p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'title3' ) ); ?>">
    	<?php esc_attr_e( 'Заголовок:', 'text_domain' ); ?>	
    </label> 
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title3' ) ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>">
</p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'push' ) ); ?>">
    	<?php esc_attr_e( 'Подсказка:', 'text_domain' ); ?>	
    </label> 
    <br>
    <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'push' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'push' ) ); ?>" rows="5"><?php echo esc_attr( $push ); ?></textarea>
</p>