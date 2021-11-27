<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [

        'images'    =>  'images',



        /**
         * Questions
         */
        'ar.questions_title' =>  'Arabic Question title',
        'en.questions_title' =>  'English Question title',


        /**
        * clients
        */
        'clients_phone'           => 'Client phone  ',
        'ar.clients_name'         => 'client name in arabic',
        'en.clients_name'         => 'Client name in english',
        'file'                      => 'File' ,
        'clients_name'            => 'Client name',
        'email'                     => 'Email',
        'clients_city'            => 'City',
        'jobs_id'                   => 'Job',
        'clients_phone'           => 'Phone',
        'password'                  => 'Password',
        'clients_points'          => 'Client Points',
        'device_token'              => 'Device Token',
        'clients_status'          => 'Client status',
        'clients_id'              => 'Client',
        'clients_course_assignments_degree'           => 'Assignment degree',
        'clients_course_assignments_status'           => 'Assignment status',
        'clients_course_assignments_answers_answer'   => 'Answer',
        'clients_skill_assignments_degree'            => 'Assignment degree',
        'clients_skill_assignments_status'            => 'Assignment status',
        'clients_skill_assignments_answers_answer'    => 'Answer',
        'clients_video_tests_status'                  => 'Status  ',
        'client_video_tests_answers_answer'           => 'Answer',


        /**
        * courses
        */
        'courses_status'                => 'Course status  ',
        'courses_points'                => 'Course Points',
        'courses_id'                    => 'Course',
        'course_assignments_success_degree'=>'Success degree',
        'course_assignments_status'     => 'Status',
        'ar.course_questions_question'  => 'Question in arabic',
        'ar.course_questions_answer1'   => 'Answer1 in arabic',
        'ar.course_questions_answer2'   => 'Answer2 in arabic',
        'ar.course_questions_answer3'   => 'Answer3 in arabic',
        'ar.course_questions_answer4'   => 'Answer4 in arabic',
        'en.course_questions_question'  => 'Question in english',
        'en.course_questions_answer1'   => 'Answer1 in english',
        'en.course_questions_answer2'   => 'Answer2 in english',
        'en.course_questions_answer3'   => 'Answer3 in english',
        'en.course_questions_answer4'   => 'Answer4 in english',
        'course_assignments_id'         => 'Assignment',
        'course_questions_type'         => 'Question type',
        'course_questions_correct_answer'=>'correct answer',
        'course_questions_correct_answer.0'=>' Correct answer 1',
        'course_questions_correct_answer.1'=>' Correct answer 2',
        'course_questions_correct_answer.2'=>' Correct answer 3',
        'course_questions_correct_answer.3'=>' Correct answer 4',
        'course_questions_status'       => ' Status',
        'ar.courses_title'              => ' title in arabic ',
        'ar.courses_desc'               => ' description in arabic',
        'en.courses_title'              => ' title in english',
        'en.courses_desc'               => ' description in english',
        'ar.course_assignments_title'   => ' title in arabic ',
        'en.course_assignments_title'   => ' title in english',

        /**
        * sections
        */
        'ar.sections_title'             => ' title in arabic ',
        'ar.sections_desc'              => ' description in arabic',
        'en.sections_title'             => ' title in english',
        'en.sections_desc'              => ' description in english',
        'sections_id'                   => 'section',

        /**
        * skills
        */
        'ar.skills_title'               => ' title in arabic ',
        'ar.skills_desc'                => ' description in arabic',
        'en.skills_title'               => ' title in english',
        'en.skills_desc'                => ' description in english',
        'skills_id'                     => 'Skill',
        'skills_status'                 => 'Status  ',
        'skills_points'                 => 'Skill Points  ',
        'skill_assignments_success_degree'=> 'Succes degree  ',
        'skill_assignments_status'      => 'status',
        'ar.skill_questions_question'   => 'Question in arabic',
        'ar.skill_questions_answer1'    => 'Answer1 in arabic',
        'ar.skill_questions_answer2'    => 'Answer2 in arabic',
        'ar.skill_questions_answer3'    => 'Answer3 in arabic',
        'ar.skill_questions_answer4'    => 'Answer4 in arabic',
        'en.skill_questions_question'   => 'Question in english',
        'en.skill_questions_answer1'    => 'Answer1 in english',
        'en.skill_questions_answer2'    => 'Answer2 in english',
        'en.skill_questions_answer3'    => 'Answer3 in english',
        'en.skill_questions_answer4'    => 'Answer4 in english',
        'skill_assignments_id'          => 'Assignment',
        'skill_questions_type'          => 'Question type',
        'skill_questions_correct_answer'=> 'Correct answer',
        'skill_questions_correct_answer.0'=>' Correct answer 1',
        'skill_questions_correct_answer.1'=>' Correct answer 2',
        'skill_questions_correct_answer.2'=>' Correct answer 3',
        'skill_questions_correct_answer.3'=>' Correct answer 4',
        'skill_questions_status'        => 'Status',
        'ar.skill_assignments_title'   => ' title in arabic ',
        'en.skill_assignments_title'   => ' title in english',

        /**
        * videos
        */
        'ar.videos_title'               => ' title in arabic ',
        'ar.videos_desc'                => ' description in arabic',
        'en.videos_title'               => ' title in english',
        'en.videos_desc'                =>  ' description in english',
        'videos_video'                  => 'Video',
        'videos_status'                 => 'Status Video',
        'videos_points'                 => 'Points Video',
        'ar.video_questions_question'   => 'Question in arabic',
        'ar.video_questions_answer1'    => 'Answer1 in arabic',
        'ar.video_questions_answer2'    => 'Answer2 in arabic',
        'ar.video_questions_answer3'    => 'Answer3 in arabic',
        'ar.video_questions_answer4'    => 'Answer4 in arabic',
        'en.video_questions_question'   => 'Question in english',
        'en.video_questions_answer1'    => 'Answer1 in english',
        'en.video_questions_answer2'    => 'Answer2 in english',
        'en.video_questions_answer3'    => 'Answer3 in english',
        'en.video_questions_answer4'    => 'Answer4 in english',
        'video_tests_id'                => 'Test',
        'video_questions_type'          => 'Question type',
        'video_questions_correct_answer'=> 'Correct answer',
        'video_questions_correct_answer'=> 'Correct answer',
        'video_questions_correct_answer.0'=>' Correct answer 1',
        'video_questions_correct_answer.1'=>' Correct answer 2',
        'video_questions_correct_answer.2'=>' Correct answer 3',
        'video_questions_correct_answer.3'=>' Correct answer 4',
        'video_questions_status'        => 'Status ',
        'videos_id'                     => 'Video',
        'video_tests_time'              => 'Test time',
        'video_tests_status'            => 'Status',
        'ar.video_tests_title'   => ' title in arabic ',
        'en.video_tests_title'   => ' title in english',

        /**
        * degrees
        */
        'ar.degrees_title'              => ' title in arabic ',
        'en.degrees_title'              => ' title in english',
        'degrees_status'                => 'Status',
        'degrees_from'                  => 'From',
        'degrees_to'                    => 'To',
        'degrees_id'                    => 'Degree',

        /**
        * diplomas
        */
        'ar.diplomas_title'             => ' title in arabic ',
        'ar.diplomas_desc'              => ' description in arabic',
        'en.diplomas_title'             => ' title in english',
        'en.diplomas_desc'              =>  ' description in english',
        'diplomas_status'               => 'Status ',
        'diplomas_id'                   => 'Diploma',

        	 
        /**
         * blood_types
         */
        'blood_types' 			=> 'Blood Types',
        'blood_types_type' 		=> 'Type',
        'blood_types_amount' 	=> 'Amount',
        'amount' 				=> 'Amount',
        'blood_typeCreated'		=> 'Blood Type Created',
        'blood_typeUpdated'		=> 'Blood Type Updated',
        'blood_typeDeleted'		=> 'Blood Type Deleted',
        

        /**
         * Hospitals
         */
        'hospitals_intensive_care'       =>'Intensive Care',
        'hospitals_recovery_rooms'       =>'Recovery Rooms',
        'hospitals_analysis_laboratories'=>'Analysis Laboratories',
        'hospitals_private_rooms'		 =>'Private Rooms',
        'hospitals_public_rooms'	     =>'Public Rooms',
        'hospitals_rays_centers'		 =>'Rays Centers',

    ],

];
