<?php

return [
    'signup' => [
        'v1' => [
            'rules' => [
                'user_name' => 'required|min:2',
                'email' => [
                    'required',
                    'unique',
                    'email'
                ],
                'password' => 'required|min:6',
                'dob' => 'required',
                'gender' => 'required|in:male,female',
                'topic' => 'required',
                'zip_code' => 'required'
            ],
            'messages' => [
                'user_name.required' => 'api/master.user_name_is_required',
                'user_name.min' => 'api/master.user_name_is_required_minimum_two_letter',
                'email.required' => 'api/master.email_is_required',
                'email.unique' => 'api/master.email_is_already_register',
                'email.email' => 'api/master.email_is_not_valid',
                'password.required' => 'api/master.password_is_required',
                'password.min' => 'api/master.password_min',
                'dob.required' => 'api/master.date_of_birth_is_required',
                'gender.required' => 'api/master.gender_is_required',
                'gender.in' => 'api/master.gender_not_valid',
                'topic.required' => 'api/master.please_select_atleast_one_topic',
                'zip_code.required' => 'api/master.zipcode_can_not_be_blank',
            ],
        ],
    ],
    'login' => [
        'v1' => [
            'rules' => [
                'email' => 'required',
                'password' => 'required',
            ],
            'messages' => [
                'email.required' => 'api/master.email_is_required',
                'password.required' => 'api/master.password_is_required',
            ],
        ],
    ],
    'forgot_password' => [
        'v1' => [
            'rules' => [
                'email' => [
                    'required',
                    'email'
                ],
            ],
            'messages' => [
                'email.required' => 'api/master.email_is_required',
                'email.email' => 'api/master.email_is_not_valid'
            ],
        ],
    ],
    'change_password' => [
        'v1' => [
            'rules' => [
                'old_password' => 'required',
                'password' => 'required|min:6',
            ],
            'messages' => [
                'old_password.required' => 'api/master.old_password_can_not_be_blank',
                'password.required' => 'api/master.new_password_can_not_be_blank',
                'password.min' => 'api/master.new_password_must_be_minimum_6_character_alphanumeric',
            ],
        ],
    ],
    'change_profile' => [
        'v1' => [
            'rules' => [
                'user_name' => 'required|min:2',
                'marital_status_id' => 'required',
                'race_id' => 'required',
                'religion_id' => 'required',
            ],
            'messages' => [
                'user_name.required' => 'api/master.user_name_is_required',
                'user_name.min' => 'api/master.user_name_is_required_minimum_two_letter',
                'marital_status_id.required' => 'api/master.please_select_marital_status',
                'race_id.required' => 'api/master.please_select_race',
                'religion_id.required' => 'api/master.please_select_religion',
            ],
        ],
    ],
    'add_access_code' => [
        'v1' => [
            'rules' => [
                'access_code' => 'required'
            ],
            'messages' => [
                'access_code.required' => 'api/master.access_code_is_required'
            ],
        ],
    ],
    'update_category' => [
        'v1' => [
            'rules' => [
                'topic' => 'required'
            ],
            'messages' => [
                'topic.required' => 'api/master.please_select_atleast_one_topic'
            ],
        ],
    ],
    'block_unblock' => [
        'v1' => [
            'rules' => [
                'id' => 'required',
                'is_block' => 'required|in:0,1'
            ],
            'messages' => [
                'id.required' => 'api/master.id_required',
                'is_block.required' => 'api/master.please_select_block_status',
                'is_block.in' => 'api/master.please_select_valid_block_status',
            ],
        ],
    ],
    'add_blocked_customer' => [
        'v1' => [
            'rules' => [
                'subscriber_id' => 'required'
            ],
            'messages' => [
                'subscriber_id.required' => 'api/master.subscriber_id_is_required'
            ],
        ],
    ],
    'resend_code' => [
        'v1' => [
            'rules' => [
                'email' => [
                    'required',
                    'email'
                ],
            ],
            'messages' => [
                'email.required' => 'api/master.email_is_required',
                'email.email' => 'api/master.email_is_not_valid'
            ],
        ],
    ],
    'add_comment' => [
        'v1' => [
            'rules' => [
                'survey_id' => 'required',
                'comment' => 'required',
            ],
            'messages' => [
                'survey_id.required' => 'api/master.survey_id_is_required',
                'comment.required' => 'api/master.comment_is_required'
            ],
        ],
    ],
    'delete_comment' => [
        'v1' => [
            'rules' => [
                'id' => 'required',
            ],
            'messages' => [
                'id.required' => 'api/master.comment_id_is_required',
            ],
        ],
    ],
    'survey_comment' => [
        'v1' => [
            'rules' => [
                'survey_id' => 'required'
            ],
            'messages' => [
                'survey_id.required' => 'api/master.survey_id_is_required'
            ],
        ],
    ],
    'add_topic_survey' => [
        'v1' => [
            'rules' => [
                'survey_id' => 'required'
            ],
            'messages' => [
                'survey_id.required' => 'api/master.survey_id_is_required'
            ],
        ],
    ],
    'all_survey' => [
        'v1' => [
            'rules' => [
                'survey_type' => 'required'
            ],
            'messages' => [
                'survey_type.required' => 'api/master.survey_type_is_required'
            ],
        ],
    ],
    'add_survey' => [
        'v1' => [
            'rules' => [
                'survey_id' => 'required',
                'surveyQA' => 'required'
            ],
            'messages' => [
                'survey_id.required' => 'api/master.survey_id_is_required',
                'surveyQA.required' => 'api/master.survey_QA_is_required'
            ],
        ],
    ],
    'sub_category' => [
        'v1' => [
            'rules' => [
                'parent_id' => 'required'
            ],
            'messages' => [
                'parent_id.required' => 'api/master.parent_id_is_required'
            ],
        ],
    ],
    'verify_user' => [
        'v1' => [
            'rules' => [
                'email' => [
                    'required',
                    'email'
                ],
                'verification_code' => 'required'
            ],
            'messages' => [
                'email.required' => 'api/master.email_is_required',
                'email.email' => 'api/master.email_is_not_valid',
                'verification_code.required' => 'api/master.verification_code_can_not_be_blank',
            ],
        ],
    ],
    'device_token' => [
        'v1' => [
            'rules' => [
                'token' => 'required',
                'device_type' => 'required|in:1,2'
            ],
            'messages' => [
                'token.required' => 'api/master.token_is_required',
                'device_type.required' => 'api/master.device_type_is_required',
                'device_type.in' => 'api/master.please_select_valid_device_type',
            ],
        ],
    ],
    'update_notification' => [
        'v1' => [
            'rules' => [
                'is_notify' => 'required|in:0,1'
            ],
            'messages' => [
                'is_notify.required' => 'api/master.is_notify_is_required',
                'is_notify.in' => 'api/master.please_select_valid_is_notify'
            ],
        ],
    ],
    'create_survey' => [
        'v1' => [
            'rules' => [
                'title' => 'required',
                'survey_type' => 'required',
                'start_date' => 'required',
                'end_date' => 'required'
            ],
            'messages' => [
                'title.required' => 'web/master.please_provide_survey_title',
                'survey_type.required' => 'web/master.please_provide_survey_type',
                'start_date.required' => 'web/master.please_provide_survey_start_date_time',
                'end_date.required' => 'web/master.please_provide_survey_end_date_time'
            ],
        ],
    ],

    'edit_survey' => [
        'v1' => [
            'rules' => [
                'id' => 'required',
                'title' => 'required',
                'survey_type' => 'required',
                'start_date' => 'required',
                'end_date' => 'required'
            ],
            'messages' => [
                'id.required' => 'web/master.id_required',
                'title.required' => 'web/master.please_provide_survey_title',
                'survey_type.required' => 'web/master.please_provide_survey_type',
                'start_date.required' => 'web/master.please_provide_survey_start_date_time',
                'end_date.required' => 'web/master.please_provide_survey_end_date_time'
            ],
        ],
    ],
];