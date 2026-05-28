<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestoreAboutPageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pages')->updateOrInsert(
            ['slug' => 'about'],
            [
                'title'            => 'About',
                'body'             => null,
                'hero_image'       => null,
                'meta_description' => 'Ruth Kayira Mooto is the founder of My Perfect Stitch — blending African craftsmanship with bold, functional design and championing purpose-driven entrepreneurship in Zambia and beyond.',
                'show_in_nav'      => 1,
                'content'          => json_encode([
                    'hero_title'         => 'About Ruth',
                    'hero_subtitle'      => 'Zambian entrepreneur, public speaker, and founder of My Perfect Stitch — transforming African craftsmanship into bold, functional design and inspiring a generation of purpose-driven entrepreneurs.',
                    'story_body'         => "<p>Ruth Kayira Mooto began her career in the Zambian public service, building a stable and respected professional life. But beneath the surface, a creative passion was quietly growing — one that would change the course of her life entirely.</p>\n<p>She founded My Perfect Stitch as a way to channel her love for design and craftsmanship. What started as a hobby evolved into a full-scale design and manufacturing enterprise producing custom furniture, branded interiors, and fashion accessories rooted in African heritage.</p>\n<p>Today, Ruth is one of Zambia's boldest entrepreneurial voices. Her TEDx talk, \"What If Your Hobby Is the Start of a Million-Dollar Business?\", has inspired thousands to champion their own small beginnings.</p>",
                    'recognition_1_role' => 'Fashion & Accessories',
                    'recognition_1_org'  => 'TEDx Talk, 2022',
                    'recognition_1_from' => '2022',
                    'recognition_1_to'   => 'Present',
                    'recognition_2_role' => 'Entrepreneur Award',
                    'recognition_2_org'  => 'Zambia Creative Industries',
                    'recognition_2_from' => '2021',
                    'recognition_2_to'   => 'Present',
                    'recognition_3_role' => 'Business Studies',
                    'recognition_3_org'  => 'University of Zambia',
                    'recognition_3_from' => '2005',
                    'recognition_3_to'   => '2009',
                    'journey_intro'      => 'From public service to creative entrepreneurship — a path built on courage, creativity, and community.',
                    'journey_1_org'      => 'My Perfect Stitch',
                    'journey_1_title'    => 'Founder & Creative Director',
                    'journey_1_from'     => '2018',
                    'journey_1_to'       => 'Present',
                    'journey_1_desc'     => 'Founded and scaled My Perfect Stitch into a design and manufacturing enterprise producing custom furniture, branded interiors, and fashion accessories rooted in African craftsmanship.',
                    'journey_2_org'      => 'Zambian Public Service',
                    'journey_2_title'    => 'Government Official',
                    'journey_2_from'     => '2010',
                    'journey_2_to'       => '2018',
                    'journey_2_desc'     => 'Served in the Zambian public service, developing leadership and administrative skills before transitioning to full-time entrepreneurship. This foundation shaped her disciplined approach to business.',
                    'journey_3_org'      => 'TEDx & Public Speaking',
                    'journey_3_title'    => 'Speaker & Mentor',
                    'journey_3_from'     => '2015',
                    'journey_3_to'       => 'Present',
                    'journey_3_desc'     => 'Delivered a TEDx talk on entrepreneurship and purpose-driven business. Mentors young African entrepreneurs, advocating for creativity, community, and the courage to start small.',
                    'service_1_title'    => 'Branded Interiors',
                    'service_1_desc'     => 'Designing custom spaces for corporate and residential clients — bold, identity-driven environments rooted in African aesthetics.',
                    'service_2_title'    => 'Custom Furniture',
                    'service_2_desc'     => 'Bespoke, high-quality furniture pieces incorporating local craftsmanship and modern design.',
                    'service_3_title'    => 'Fashion & Accessories',
                    'service_3_desc'     => 'High-quality bags and textile-based products rooted in African heritage and contemporary style.',
                    'service_4_title'    => 'Manufacturing & Scale',
                    'service_4_desc'     => 'Operating as a design and manufacturing hub — moving beyond handmade to a scalable enterprise model.',
                ]),
                'created_at'       => now(),
                'updated_at'       => now(),
            ]
        );
    }
}
