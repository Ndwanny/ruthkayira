<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Page;
use App\Models\Project;
use App\Models\Product;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Admin user ────────────────────────────────────────────
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@blog.com',
            'password' => Hash::make('password'),
        ]);

        // ── Sample pages ──────────────────────────────────────────
        Page::create([
            'title'            => 'About',
            'slug'             => 'about',
            'body'             => '<p>Welcome to our blog. We write about technology, design, and ideas that matter.</p><p>This is the about page. You can edit this content from the admin panel.</p>',
            'meta_description' => 'Learn more about us.',
            'show_in_nav'      => true,
        ]);

        Page::create([
            'title'            => 'Contact',
            'slug'             => 'contact',
            'body'             => '<p>Get in touch with us at <a href="mailto:hello@blog.com">hello@blog.com</a></p>',
            'meta_description' => 'Contact us.',
            'show_in_nav'      => true,
        ]);

        // ── Sample posts ──────────────────────────────────────────
        Post::create([
            'title'        => 'Welcome to the Blog',
            'slug'         => 'welcome-to-the-blog',
            'excerpt'      => 'This is the first post on our new blog. Read on to learn more.',
            'body'         => '<p>Welcome! This is your first blog post. Head to the admin panel to create, edit, and manage your posts.</p><p>You can write rich HTML content, upload cover images, and control whether posts are published or saved as drafts.</p>',
            'published'    => true,
            'published_at' => now(),
        ]);

        Post::create([
            'title'        => 'Getting Started with Laravel',
            'slug'         => 'getting-started-with-laravel',
            'excerpt'      => 'Laravel is an elegant PHP framework. Here is how to get started.',
            'body'         => '<p>Laravel makes building web applications a pleasure. With an expressive syntax and powerful tooling, you can go from idea to production quickly.</p><h2>Installation</h2><p>Install via Composer: <code>composer create-project laravel/laravel myapp</code></p>',
            'published'    => true,
            'published_at' => now()->subDays(2),
        ]);

        Post::create([
            'title'        => 'Draft Post: Ideas for Future Articles',
            'slug'         => 'draft-ideas',
            'excerpt'      => 'A collection of ideas saved as a draft.',
            'body'         => '<p>This is a draft post. It will not appear on the public blog until you publish it.</p>',
            'published'    => false,
        ]);

        // ── Projects ──────────────────────────────────────────────
        $imgBase = 'https://images.unsplash.com/photo-';
        $imgParams = '?fm=jpg&q=60&w=800&auto=format&fit=crop';

        Project::create([
            'slug'        => 'custom-furniture',
            'title'       => 'Custom Furniture Collection',
            'tagline'     => 'Bespoke handcrafted furniture pieces rooted in African craftsmanship and bold functional design.',
            'client'      => 'My Perfect Stitch',
            'date_range'  => '2018 – Present',
            'services'    => 'Custom Furniture Design',
            'deliverables'=> 'Bespoke Furniture Pieces',
            'website_url' => null,
            'hero_image'  => $imgBase . '1653971858474-4f2dfa7f4dc1' . $imgParams,
            'image_1'     => $imgBase . '1720247520862-7e4b14176fa8' . $imgParams,
            'image_2'     => $imgBase . '1774709440530-b6916d8c36df' . $imgParams,
            'exec_image'  => $imgBase . '1720247520862-7e4b14176fa8' . $imgParams,
            'about_col1'  => 'The Custom Furniture Collection is at the heart of My Perfect Stitch. Each piece is designed and built to order, incorporating locally sourced materials and the hands of skilled Zambian artisans. No two pieces are exactly alike — every commission starts with a conversation about function, space, and identity.',
            'about_col2'  => "Ruth's design philosophy for furniture is simple: bold, purposeful, and built to last. Influences drawn from African geometric patterns and natural textures are woven into every chair, table, and shelving unit — creating pieces that feel rooted in heritage while fitting perfectly into modern spaces.",
            'exec_col1'   => "Each furniture commission begins with a consultation to understand the client's vision, space dimensions, and material preferences. From there, Ruth's team produces detailed design sketches and material samples before a single cut is made.",
            'exec_col2'   => "Production takes place in-house at the My Perfect Stitch workshop, where traditional joinery techniques meet contemporary finishing. Quality control is hands-on at every stage, ensuring every piece that leaves the studio meets the highest standards of craft and durability.",
            'category'    => 'Furniture',
            'sort_order'  => 1,
            'published'   => true,
        ]);

        Project::create([
            'slug'        => 'branded-interiors',
            'title'       => 'Branded Interiors',
            'tagline'     => 'Custom interior spaces designed for corporate and residential clients — bold, identity-driven environments rooted in African aesthetics.',
            'client'      => 'Corporate & Residential Clients',
            'date_range'  => '2019 – Present',
            'services'    => 'Interior Design & Branding',
            'deliverables'=> 'Fully Designed Spaces',
            'website_url' => null,
            'hero_image'  => $imgBase . '1720247520862-7e4b14176fa8' . $imgParams,
            'image_1'     => $imgBase . '1653971858474-4f2dfa7f4dc1' . $imgParams,
            'image_2'     => $imgBase . '1578509566163-068acd11b8e7' . $imgParams,
            'exec_image'  => $imgBase . '1653971858474-4f2dfa7f4dc1' . $imgParams,
            'about_col1'  => "The Branded Interiors service is My Perfect Stitch's answer to clients who want their physical spaces to reflect who they truly are. Whether it's a corporate boardroom that speaks authority, or a residential living room that feels like home, Ruth brings the same creative rigour to every space.",
            'about_col2'  => "Every interior project begins with a deep-dive into the client's identity — their values, their audience, and the feeling they want people to have when they walk through the door. The result is a space that tells a story without saying a word.",
            'exec_col1'   => "The process combines a thorough brief with mood-boarding, material selection, and 2D layout planning. Ruth works closely with clients throughout, ensuring that every decision — from flooring to furniture placement — aligns with the overall design vision.",
            'exec_col2'   => "Installation is managed end-to-end by the My Perfect Stitch team. Custom furniture pieces, curated décor, and locally sourced finishing materials are brought together on-site to create a cohesive, polished space that exceeds client expectations.",
            'category'    => 'Interiors',
            'sort_order'  => 2,
            'published'   => true,
        ]);

        Project::create([
            'slug'        => 'fashion-bags',
            'title'       => 'Fashion & Bags',
            'tagline'     => 'High-quality bags and textile-based fashion products rooted in African heritage and contemporary style.',
            'client'      => 'My Perfect Stitch – Accessories Line',
            'date_range'  => '2020 – Present',
            'services'    => 'Fashion Design & Manufacturing',
            'deliverables'=> 'Bags, Totes & Accessories',
            'website_url' => null,
            'hero_image'  => $imgBase . '1574365569389-a10d488ca3fb' . $imgParams,
            'image_1'     => $imgBase . '1578509566163-068acd11b8e7' . $imgParams,
            'image_2'     => $imgBase . '1769578683495-88c7c5adbaad' . $imgParams,
            'exec_image'  => $imgBase . '1574365569389-a10d488ca3fb' . $imgParams,
            'about_col1'  => "The Fashion & Bags line grew naturally out of Ruth's love for textiles and wearable design. Each bag in the collection is made from premium materials, selected for both quality and their ability to carry the visual language of African design — bold patterns, rich textures, and confident forms.",
            'about_col2'  => "From structured totes to everyday crossbody bags, every piece in the collection is designed to be functional without sacrificing personality. Ruth's accessories are for women who want to carry something that means something — a product with a story and a soul.",
            'exec_col1'   => "Designs begin on paper — Ruth sketches every bag herself before patterns are cut. Material sourcing prioritises local suppliers and quality leather, with each batch reviewed before production begins to ensure consistency across the line.",
            'exec_col2'   => "The bags are produced in small batches at the My Perfect Stitch workshop, with each piece hand-finished by skilled artisans. This approach ensures quality at every stage and keeps the collection intentionally curated — never mass-produced.",
            'category'    => 'Accessories',
            'sort_order'  => 3,
            'published'   => true,
        ]);

        // ── Products ──────────────────────────────────────────────
        Product::create([
            'slug'        => 'handcrafted-side-table',
            'title'       => 'Handcrafted Side Table',
            'description' => 'A beautifully crafted piece rooted in African design tradition and bold, functional aesthetics.',
            'price'       => 29.00,
            'compare_price' => null,
            'main_image'  => $imgBase . '1653971858474-4f2dfa7f4dc1' . $imgParams,
            'material'    => 'Hardwood',
            'dimensions'  => '50cm × 60cm',
            'lead_time'   => '4–6 weeks',
            'finish'      => 'Natural oil',
            'origin'      => 'Zambia',
            'body'        => '<h2>Crafted for Character</h2><p>This side table is built using traditional joinery techniques and locally sourced hardwood, giving each piece a unique grain and finish that cannot be replicated at scale.</p><ul><li>Solid hardwood construction</li><li>Hand-finished with natural oil</li><li>Custom sizes available on request</li></ul>',
            'published'   => true,
            'sort_order'  => 1,
        ]);

        Product::create([
            'slug'         => 'artisan-dining-chair',
            'title'        => 'Artisan Dining Chair',
            'description'  => 'A statement dining chair that blends structural integrity with bold African-inspired aesthetics. Each chair is handcrafted to order and finished to your specification.',
            'price'        => 49.00,
            'compare_price'=> 59.99,
            'main_image'   => $imgBase . '1720247520862-7e4b14176fa8' . $imgParams,
            'material'     => 'Hardwood & upholstery',
            'dimensions'   => '45cm seat × 90cm height',
            'lead_time'    => '6–8 weeks',
            'finish'       => 'Custom order',
            'origin'       => 'Zambia',
            'body'         => '<h2>Built for Beauty and Durability</h2><p>The Artisan Dining Chair is engineered for the long haul. Its frame is mortise-and-tenon jointed — a traditional technique that produces a stronger bond than nails or screws. The upholstery is sourced from African textile mills and chosen for both texture and longevity.</p><ul><li>Traditional joinery with no metal fasteners in the seat frame</li><li>Upholstery in premium African-woven or solid fabric</li><li>Weight capacity tested to commercial standards</li></ul><h4>A Chair With a Story</h4><p>Every chair that leaves My Perfect Stitch carries with it the hands that made it — craftsmen and women from Lusaka who have refined their skills across decades. When you sit in this chair, you sit in that tradition.</p>',
            'published'    => true,
            'sort_order'   => 2,
        ]);

        Product::create([
            'slug'        => 'signature-tote-bag',
            'title'       => 'Signature Tote Bag',
            'description' => 'A beautifully crafted piece rooted in African design tradition and bold, functional aesthetics.',
            'price'       => 49.00,
            'compare_price' => null,
            'main_image'  => $imgBase . '1574365569389-a10d488ca3fb' . $imgParams,
            'material'    => 'Premium leather & African textile',
            'dimensions'  => '38cm × 42cm',
            'lead_time'   => '3–4 weeks',
            'finish'      => 'Hand-stitched',
            'origin'      => 'Zambia',
            'body'        => '<h2>Carry Something That Means Something</h2><p>The Signature Tote Bag is designed for women who want both function and identity in what they carry. Made from premium leather and finished with African textile accents, it is a statement piece for everyday life.</p><ul><li>Full-grain leather body</li><li>African woven textile accent panels</li><li>Reinforced stitching throughout</li></ul>',
            'published'   => true,
            'sort_order'  => 3,
        ]);

        Product::create([
            'slug'        => 'leather-crossbody-bag',
            'title'       => 'Leather Crossbody Bag',
            'description' => 'A beautifully crafted piece rooted in African design tradition and bold, functional aesthetics.',
            'price'       => 29.00,
            'compare_price' => null,
            'main_image'  => $imgBase . '1574365569389-a10d488ca3fb' . $imgParams,
            'material'    => 'Full-grain leather',
            'dimensions'  => '24cm × 18cm',
            'lead_time'   => '3–4 weeks',
            'finish'      => 'Natural wax finish',
            'origin'      => 'Zambia',
            'body'        => '<h2>Compact. Bold. Everyday.</h2><p>The Leather Crossbody Bag is the everyday carry piece from My Perfect Stitch. Small enough to keep things minimal, strong enough to last a lifetime. Crafted from full-grain leather that develops a rich patina with use.</p><ul><li>Full-grain leather that ages beautifully</li><li>Adjustable shoulder strap</li><li>Interior zip pocket</li></ul>',
            'published'   => true,
            'sort_order'  => 4,
        ]);

        // ── Site Settings ─────────────────────────────────────────
        $settings = [
            'home_hero_title'       => "Hello, I am Ruth.\nFounder & Creative Director.",
            'home_hero_subtitle'    => 'I blend African craftsmanship with bold, functional design — championing small beginnings into great enterprises through My Perfect Stitch.',
            'home_hero_button'      => 'Contact me',
            'home_about_title'      => 'About Ruth',
            'home_about_body'       => "<p>Ruth Kayira Mooto is a Zambian entrepreneur, public speaker, and founder of My Perfect Stitch. She made a bold leap from a stable career as a government official to build a thriving creative enterprise rooted in African craftsmanship.</p>\n<p>Her work champions the belief that a hobby can be the start of a million-dollar business. Through My Perfect Stitch, she designs custom furniture, branded interiors, and fashion accessories that fuse bold aesthetics with functional purpose.</p>",
            'home_about_link_text'  => 'More about Ruth',
            'about_hero_title'      => 'About Ruth',
            'about_hero_subtitle'   => 'Zambian entrepreneur, public speaker, and founder of My Perfect Stitch — transforming African craftsmanship into bold, functional design and inspiring a generation of purpose-driven entrepreneurs.',
            'about_story_title'     => 'My Story',
            'about_story_body'      => "<p>Ruth Kayira Mooto began her career in the Zambian public service, building a stable and respected professional life. But beneath the surface, a creative passion was quietly growing — one that would change the course of her life entirely.</p>\n<p>She founded My Perfect Stitch as a way to channel her love for design and craftsmanship. What started as a hobby evolved into a full-scale design and manufacturing enterprise producing custom furniture, branded interiors, and fashion accessories rooted in African heritage.</p>\n<p>Today, Ruth is one of Zambia's boldest entrepreneurial voices. Her TEDx talk, \"What If Your Hobby Is the Start of a Million-Dollar Business?\", has inspired thousands to champion their own small beginnings.</p>",
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::create(['key' => $key, 'value' => $value]);
        }
    }
}
