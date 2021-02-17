<?php

use Illuminate\Database\Seeder;

class settings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('settings')->insert([
            [
                'setting_group'         => 'app',
                'setting_key'           => 'name',
                'setting_type'          => 'text',
                'setting_value'         => 'Flavor'
            ],
            [
                'setting_group'         => 'app',
                'setting_key'           => 'type',
                'setting_type'          => 'text',
                'setting_value'         => 'restaurants' // restaurants or clothes or markets or ...etc
            ],
            [
                'setting_group'         => 'app',
                'setting_key'           => 'version',
                'setting_type'          => 'text',
                'setting_value'         => '1.0.0'
            ],
            [
                'setting_group'         => 'app',
                'setting_key'           => 'logo',
                'setting_type'          => 'image',
                'setting_value'         => ''
            ],
            [
                'setting_group'         => 'app',
                'setting_key'           => 'icon',
                'setting_type'          => 'image',
                'setting_value'         => ''

            ],
            [
                'setting_group'         => 'app',
                'setting_key'           => 'timezone',
                'setting_type'          => 'text',
                'setting_value'         => 'Asia/Riyadh'

            ],
            [
                'setting_group'         => 'app',
                'setting_key'           => 'currency',
                'setting_type'          => 'text',
                'setting_value'         => 'SAR' // SAR or AED or USD

            ],
            [
                'setting_group'         => 'app',
                'setting_key'           => 'currency_rate',
                'setting_type'          => 'decimal',
                'setting_value'         => '0.2723'

            ],
            [
                'setting_group'         => 'app',
                'setting_key'           => 'active_stock',
                'setting_type'          => 'bool',
                'setting_value'         => '1' // 1 or 0

            ],
            [
                'setting_group'         => 'app',
                'setting_key'           => 'products_include_tax',
                'setting_type'          => 'bool',
                'setting_value'         => '0' // 1 or 0

            ],
            [
                'setting_group'         => 'app',
                'setting_key'           => 'shipping_type',
                'setting_type'          => 'text',
                'setting_value'         => 'none' // ['none','static','dynamic','range_in_km','outsource','store']

            ],
            [
                'setting_group'         => 'app',
                'setting_key'           => 'order_taxes',
                'setting_type'          => 'decimal',
                'setting_value'         => '0'

            ],
            [
                'setting_group'         => 'app',
                'setting_key'           => 'allowed_countries',
                'setting_type'          => 'text',
                'setting_value'         => json_encode(["SA","EG"])

            ],
            [
                'setting_group'         => 'system',
                'setting_key'           => 'verification_type',
                'setting_type'          => 'text',
                'setting_value'         => 'email' // email or sms

            ],
            [
                'setting_group'         => 'system',
                'setting_key'           => 'sms_username',
                'setting_type'          => 'text',
                'setting_value'         => ''

            ],
            [
                'setting_group'         => 'system',
                'setting_key'           => 'sms_sender_name',
                'setting_type'          => 'text',
                'setting_value'         => ''

            ],
            [
                'setting_group'         => 'system',
                'setting_key'           => 'sms_password',
                'setting_type'          => 'text',
                'setting_value'         => ''

            ],
            [
                'setting_group'         => 'system',
                'setting_key'           => 'mail_type',
                'setting_type'          => 'text',
                'setting_value'         => 'mail' // mail or smtp

            ],
            [
                'setting_group'         => 'system',
                'setting_key'           => 'smtp_port',
                'setting_type'          => 'text',
                'setting_value'         => ''

            ],
            [
                'setting_group'         => 'system',
                'setting_key'           => 'smtp_host',
                'setting_type'          => 'text',
                'setting_value'         => ''

            ],
            [
                'setting_group'         => 'system',
                'setting_key'           => 'smtp_user',
                'setting_type'          => 'text',
                'setting_value'         => ''

            ],
            [
                'setting_group'         => 'system',
                'setting_key'           => 'smtp_pass',
                'setting_type'          => 'text',
                'setting_value'         => ''

            ],
            [
                'setting_group'         => 'system',
                'setting_key'           => 'smtp_ssl',
                'setting_type'          => 'text',
                'setting_value'         => ''

            ],
            [
                'setting_group'         => 'system',
                'setting_key'           => 'email',
                'setting_type'          => 'text',
                'setting_value'         => 'from@example.com'

            ],
            [
                'setting_group'         => 'push_notification',
                'setting_key'           => 'dry_run',
                'setting_type'          => 'bool',
                'setting_value'         => '1'

            ],
            [
                'setting_group'         => 'push_notification',
                'setting_key'           => 'android_key',
                'setting_type'          => 'text',
                'setting_value'         => ''

            ],
            [
                'setting_group'         => 'push_notification',
                'setting_key'           => 'pem_file',
                'setting_type'          => 'file',
                'setting_value'         => ''

            ],
        ]);
    }
}
