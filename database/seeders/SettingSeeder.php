<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'name' => 'Meeting Room Booking',
            'email' => 'chsan1025@gmail.com',
            'phone' => '+92-3080807628',
            'city' => 'Lahore',
            'state' => 'Punjab',
            'zipcode' => '54000',
            'address' => 'Mughalpura Lahore Cantt',
            'about_us' => 'We are a team of designers and developers that create high quality HTML Template & Woocommerce, Shopify Theme.',
            'facebook' => 'https://www.facebook.com',
            'instagram' => 'https://www.instagram.com',
            'whatsapp' => 'https://www.whatsapp.com',
            'tiktok' => 'https://www.tiktok.com',
            'snack' => 'https://www.snack.com',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6802.302759454274!2d74.3199392!3d31.520002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391905407ed24da9%3A0xa339081520e94101!2sNoble%20Hospital!5e0!3m2!1sen!2s!4v1703185936680!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'currency' => 'Rs.',
            'website' => 'https://www.chandjewellersgujrat.com',
            'shipping'=>'500',
            'advance_charges'=>'500',
            'advertising'=>'This is advertising campaign',
            'header_logo'=>'settings/logo.png',
            'footer_logo'=>'settings/logo.png',
            'footer_description'=>'We are a team of designers and developers that create high quality HTML Template & Woocommerce, Shopify Theme.',
        ]);
    }
}
