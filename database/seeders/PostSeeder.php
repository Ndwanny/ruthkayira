<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title'        => 'What If Your Hobby Is the Start of a Million-Dollar Business?',
                'slug'         => 'what-if-your-hobby-is-the-start-of-a-million-dollar-business',
                'excerpt'      => 'Ruth Kayira shares the story behind her TEDx talk and the moment she realised My Perfect Stitch was more than a pastime.',
                'category'     => 'Speaking',
                'cover_image'  => 'https://images.unsplash.com/photo-1759503407457-3683579f080b?fm=jpg&q=60&w=800&auto=format&fit=crop',
                'published'    => true,
                'published_at' => now()->subDays(5),
                'body'         => '<p>When I stood on the TEDx stage in 2022, I had one message: the thing you do on weekends, the skill you have been brushing aside as "just a hobby" — that could be your life\'s work. That could be your business.</p>
<p>My Perfect Stitch started exactly that way. I was a government official with a stable career, and on weekends I was sewing, designing furniture, crafting bags. Friends and family admired the pieces. A few asked if they could buy them. I said yes — and everything changed from there.</p>
<h2>The Leap No One Talks About</h2>
<p>Every entrepreneur story you read online skips the fear part. It skips the moment when you are sitting at your desk, calculating whether you can afford to leave, wondering if anyone will actually pay for what you make.</p>
<p>I sat with that fear for two years before I acted. And when I finally handed in my resignation and told my family I was going full-time with My Perfect Stitch — the ground did not swallow me. The clients came. The word spread. The business grew.</p>
<h2>Start Before You Are Ready</h2>
<p>The most important lesson I share with young entrepreneurs: you will never feel completely ready. The conditions will never be perfect. Start anyway. Start small. Start with what you have, where you are.</p>
<p>My Perfect Stitch began with a second-hand sewing machine in my living room. Today it is a design and manufacturing enterprise. That gap was bridged one order at a time.</p>',
            ],
            [
                'title'        => 'African Craftsmanship in the Modern World: Why It Matters More Than Ever',
                'slug'         => 'african-craftsmanship-in-the-modern-world',
                'excerpt'      => 'Mass production is everywhere. Ruth argues that the answer is not to compete — it is to go deeper into what makes African craft irreplaceable.',
                'category'     => 'Insights',
                'cover_image'  => 'https://images.unsplash.com/photo-1653971858474-4f2dfa7f4dc1?fm=jpg&q=60&w=800&auto=format&fit=crop',
                'published'    => true,
                'published_at' => now()->subDays(14),
                'body'         => '<p>We live in a world flooded with cheap, fast, disposable goods. Furniture assembled from flatpack boxes. Bags made in factories where no single person made the whole thing.</p>
<p>In this world, African craftsmanship is not a quaint tradition. It is a radical act.</p>
<h2>What Makes African Craft Different</h2>
<p>When a craftsperson at My Perfect Stitch builds a chair, they know that chair. They selected the wood. They cut it. They joined it. They finished it. They know its weight and its grain. That level of intimate knowledge is almost entirely absent from mass-produced goods.</p>
<p>And increasingly, people are noticing. They are tired of things that break. They are tired of owning nothing with a story. They are tired of spaces that feel borrowed rather than lived-in.</p>
<h2>The Opportunity for African Designers</h2>
<p>The world is ready for what we have always made. Bold forms. Natural materials. Objects that carry meaning and memory. The question is not whether there is a market — there clearly is. The question is whether we are willing to own our craft without apology.</p>
<p>African designers and makers need to stop underselling themselves. The hand-built side table is not worth less than the factory equivalent — it is worth more. Price accordingly. Tell the story of the hands that made it.</p>',
            ],
            [
                'title'        => 'From Government Office to Workshop Floor: My Entrepreneurship Journey',
                'slug'         => 'from-government-office-to-workshop-floor',
                'excerpt'      => 'The full story of how Ruth Kayira left a stable career in the Zambian public service to build My Perfect Stitch from the ground up.',
                'category'     => 'Press',
                'cover_image'  => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?fm=jpg&q=60&w=800&auto=format&fit=crop',
                'published'    => true,
                'published_at' => now()->subDays(30),
                'body'         => '<p>Leaving a government job in Zambia to start a furniture and fashion business makes no sense on paper. But businesses are not built on paper.</p>
<h2>The Career I Had</h2>
<p>I spent eight years in the Zambian public service. It was a good career — respected, stable, with a clear path forward. But every evening and every weekend, I went home and I made things. The making was not a hobby — it was the most alive I ever felt.</p>
<h2>The Decision</h2>
<p>The decision to leave came in small moments of clarity over several years. A client who paid more for one of my bags than I made in a week at work. A corporate client who asked if I could furnish their entire boardroom. A friend who said, quietly: "Ruth, this is what you are supposed to be doing."</p>
<p>I saved for two years. I built a small client base on evenings and weekends. I drew up a rough business plan. And then, one morning, I handed in my resignation.</p>
<h2>The First Year</h2>
<p>The first year was hard in terms of identity. I had been a government official for almost a decade. The answer turned out to be: furniture maker, fashion designer, and entrepreneur. My Perfect Stitch became the fullest expression of who I am.</p>',
            ],
            [
                'title'        => 'How My Perfect Stitch Designs Furniture That Lasts a Lifetime',
                'slug'         => 'how-my-perfect-stitch-designs-furniture-that-lasts-a-lifetime',
                'excerpt'      => 'Inside the design and production process at My Perfect Stitch — from first sketch to finished piece.',
                'category'     => 'Insights',
                'cover_image'  => 'https://images.unsplash.com/photo-1720247520862-7e4b14176fa8?fm=jpg&q=60&w=800&auto=format&fit=crop',
                'published'    => true,
                'published_at' => now()->subDays(45),
                'body'         => '<p>Every piece of furniture that leaves the My Perfect Stitch workshop has been through a process that most factory-made items never experience: it has been thought about. Deeply, carefully, from every angle.</p>
<h2>It Starts With a Conversation</h2>
<p>Every commission begins with a conversation about the space the piece will live in, the light, and the client — how they move through a room, what they value, what story they want their home to tell. Only after that do we begin sketching.</p>
<h2>Materials That Mean Something</h2>
<p>We source timber from responsible local suppliers in Zambia — mukwa, mahogany, teak — known for durability and beauty. Our upholstery is sourced from African textile mills wherever possible: bold patterns, rich textures, chosen for daily use.</p>
<h2>Built to Be Fixed</h2>
<p>We use traditional joinery — mortise-and-tenon, dovetail, tongue-and-groove — because they produce strong, repairable bonds. A piece built this way is designed to be in your family for fifty years. That is not just good craft. That is good business for the planet.</p>
<h2>The Finish</h2>
<p>We hand-sand every surface through multiple grades and apply oil and wax finishes that protect the wood while letting its natural colour and grain come forward. The finish is the face of the piece. It deserves the time we give it.</p>',
            ],
            [
                'title'        => 'Ruth Kayira Named Among Zambia\'s Top Business Voices of 2024',
                'slug'         => 'ruth-kayira-zambia-top-business-voices-2024',
                'excerpt'      => 'My Perfect Stitch founder Ruth Kayira Mooto was recognised as one of Zambia\'s most influential business voices for her work championing creative entrepreneurship.',
                'category'     => 'Press',
                'cover_image'  => 'https://images.unsplash.com/photo-1590650153855-d9e808231d41?fm=jpg&q=60&w=800&auto=format&fit=crop',
                'published'    => true,
                'published_at' => now()->subDays(60),
                'body'         => '<p>Ruth Kayira Mooto has been recognised as one of Zambia\'s top business voices for 2024 — a milestone that reflects both her entrepreneurial journey and her growing influence as a public advocate for African creative enterprise.</p>
<h2>The Recognition</h2>
<p>The annual list highlights individuals who have made a measurable impact on Zambia\'s commercial and cultural landscape. Ruth was cited for her TEDx work, her contributions to the local crafts manufacturing sector, and her role as a mentor to young entrepreneurs across the country.</p>
<blockquote>"Ruth represents the kind of entrepreneur Zambia needs more of. She is not just building a business — she is building an argument for what African design can be at a global level."</blockquote>
<h2>What Is Next for My Perfect Stitch</h2>
<p>Ruth is currently expanding workshop capacity to take on larger commercial interiors commissions. Plans are also underway for a new accessories collection and a formal mentorship programme for young Zambian designers — a structured pathway from craft skill to business confidence.</p>',
            ],
        ];

        foreach ($posts as $data) {
            Post::create($data);
        }
    }
}
