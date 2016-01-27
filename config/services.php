<?php
return [
    'bin_time_relevance' => 3600 * 24 * 7,
    /*
     * field "bank" of the model Bin will be replace by preg_replace() function
     * key - regex pattern
     * value - replacement
     */
    'bank_replace_patterns' => [
        'COMMERCIAL BANK PRIVATBANK' => 'CB PrivatBank',
    ],
    /*
     * Additional data for banks.
     * If the name of the Bank in Bin model is equal to some key in 'banks_data' array,
     * matched array will be merged with API response fields
     */
    'banks_data' => [
        'CB PrivatBank' => [
            'phone' => '+380 44 569-47-87',
            'address' => 'Ukraine, Kiev'
        ],
    ],
];
