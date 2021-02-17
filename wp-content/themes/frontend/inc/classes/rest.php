<?php

require get_template_directory() . '/inc/classes/caldera-helper.php';
// require get_template_directory() . '/inc/classes/email-helper.php';

const EMAIL = 'info@avtolombard78.ru';

class Rest
{

    


    function __construct()
    {
        $this->namespace = 'email/v1';
        $this->register_routes();
        // $this->email_helper = new EmailHelper(EMAIL, EMAIL);
    }

    function register_routes()
    {
        add_action('rest_api_init', function () {

            register_rest_route($this->namespace, 'add', array(
                'methods'  => 'POST',
                'callback' =>   [$this, 'add_post_endpoint'],
                'args'     => array(
                   
                    'type_letter' => array(
                        'type'     => 'string', // значение параметра должно быть строкой
                        'required' => true,     // параметр обязательный
                    ),
                    'title_letter' => array(
                        'type'     => 'string', // значение параметра должно быть строкой
                        'required' => true,     // параметр обязательный
                    ),
                    'data_letter' => array(
                        'type'     => 'string', // значение параметра должно быть строкой
                        'required' => true,     // параметр обязательный
                    )
                ),
            ));
        });
    }

    function add_post_endpoint(WP_REST_Request $request)
    {
        $FORM_ID = 'CF5e82d8a29d77b';

        $rest_helper = new CalderaHelper($FORM_ID);

        $rest_helper->add_value_field('title_letter', $request['title_letter']);

        $rest_helper->add_value_field('type_letter', $request['type_letter']);

        $rest_helper->add_value_field('data_letter', $request['data_letter']);

        $rest_helper->send_entry();

        $this->email_helper->send_letter($request['title_letter'], $request['data_letter']);

        return  "Ok";
    }
}
