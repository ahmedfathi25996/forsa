<?php
return array(
    // set your paypal credential

    'client_id' => 'AWLPV5B-7bKzM2HXzJfdbMzWkWHi7XgUpBWlH6NDOJa213123zhyE3AXNwt0Ip0dLkLcb4bP4SqWPLNK',
    'secret' => 'EEiAYW6QkTSZgMi340jlIIngeILSdxnrXNxM8O0V6e0FAtj-gnUPR9SejmwzM2-WaLYSVpZE5qDLDOue',
    'user_email' =>'original@cscs.com',
    'revel_company_price' => 10,
    'time_expire_revel' => 10,

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */

        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 3000,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/payments/paypal_'. date('d-m-y') . '.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);