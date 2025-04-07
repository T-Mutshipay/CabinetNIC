<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialLink;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialLinks = [
            [
                'avocat_id' => 1,
                'plateforme' => 'linkedIn',
                'url' => 'https://www.linkedin.com/in/ngandu-ilunga-44b12aa4/?originalSubdomain=cd',
            ],
            [
                'avocat_id' => 1,
                'plateforme' => 'Facebook',
                'url' => 'https://www.facebook.com/share/1Anf7uZG8f/?mibextid=wwXIfr',
            ],
            [
                'avocat_id' => 4,
                'plateforme' => 'Facebook',
                'url' => 'https://www.facebook.com/share/1Anf7uZG8f/?mibextid=wwXIfr',
            ],
            [
                'avocat_id' => 3,
                'plateforme' => 'Facebook',
                'url' => 'https://www.facebook.com/gracien.ilwa/',
            ],
            [
                'avocat_id' => 3,
                'plateforme' => 'twitter',
                'url' => 'https://x.com/brams_gracien?t=YvW08JKpexT6Z-3Y_xx-9w&s=09',
            ],
        ];

        foreach ($socialLinks as $link) {
            SocialLink::create($link);
        }
    }
}
