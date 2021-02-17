

<div class="comment-form-container"> 
   
    <?php 


        $comments_args = array(
          
            'comment_notes_before' => '',
            'comment_notes_after'  => '',
            'logged_in_as' => '',
            
            // изменим название кнопки
            'label_submit' => 'Отправить',
            'class_submit' => 'k-button orange',
            // заголовок секции ответа
            'title_reply'=>'',
            // удалим текст, который будет показано после того как коммент отправлен
            'comment_notes_after' => '',
            // переопределим textarea (тело формы)
            'comment_field' => '<p class="comment-form-comment"><label for="comment">Ваш отзыв</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',

            'submit_field'         => '%1$s %2$s',
        );

        comment_form( $comments_args );

    ?> 

   
</div>