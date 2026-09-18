<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\CareerEntry;
use App\Models\Counter;
use App\Models\HeroSection;
use App\Models\Partner;
use App\Models\Project;
use App\Models\SectionSetting;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(['email' => 'admin@portfolio.test'], ['name' => 'Portfolio Admin', 'password' => Hash::make('Admin@12345'), 'is_admin' => true]);

        SiteSetting::query()->updateOrCreate(['id' => 1], [
            'site_name' => 'Reeni Portfolio', 'meta_title' => 'Personal Portfolio',
            'meta_description' => 'A modern personal portfolio for a designer and developer.',
            'logo' => 'assets/images/logo/white-logo-reeni.png', 'dark_logo' => 'assets/images/logo/logo-white.png',
            'email' => 'hello@example.com', 'phone' => '+880 1700-000000', 'address' => 'Dhaka, Bangladesh',
            'sidebar_title' => 'About Me', 'sidebar_description' => 'I create thoughtful, user-focused digital experiences.',
            'footer_text' => 'All rights reserved.',
        ]);

        HeroSection::query()->updateOrCreate(['id' => 1], [
            'eyebrow' => 'Hello', 'name' => 'Jane Cooper',
            'roles' => ['Web Designer.', 'Web Developer.', 'UI/UX Designer.', 'Freelancer.'],
            'description' => 'A personal portfolio is a collection of work, achievements, and skills that highlights professional growth.',
            'image' => 'assets/images/banner/banner-user-image-one.png',
            'primary_button_label' => 'View Portfolio', 'primary_button_url' => '#portfolio', 'is_active' => true,
        ]);

        foreach ([
            ['services', 'Services', 'What I Do', 'Creative services built around your goals.'],
            ['career', 'Education & Experience', 'Empowering Creativity through Experience', 'My education and professional journey.'],
            ['portfolio', 'Latest Portfolio', 'Transforming Ideas into Exceptional', 'A selection of recent work.'],
            ['testimonials', 'Testimonials', 'What Clients Say', 'Feedback from people I have worked with.'],
            ['contact', 'Get In Touch', 'Elevate your brand with Me', 'Tell me about your next project.'],
            ['blog', 'Blog and News', 'Ideas, Process and Inspiration', 'Recent writing and project insights.'],
        ] as [$key, $subtitle, $title, $description]) {
            SectionSetting::query()->updateOrCreate(['section_key' => $key], compact('subtitle', 'title', 'description') + ['is_visible' => true]);
        }

        foreach ([['Web Design', '120 Projects', 'fa-light fa-pen-ruler'], ['UI/UX Design', '241 Projects', 'fa-light fa-bezier-curve'], ['Web Research', '240 Projects', 'fa-light fa-lightbulb'], ['Marketing', '331 Projects', 'fa-light fa-envelope']] as $i => [$title, $description, $icon]) {
            Service::query()->updateOrCreate(['title' => $title], compact('description', 'icon') + ['url' => '#contact', 'sort_order' => $i, 'is_active' => true]);
        }

        foreach ([['Years Of Experience', 25, ''], ['Projects Complete', 20, 'k+'], ['Digital Products', 10, 'k+'], ['Client Reviews', 200, '+'], ['Satisfied Clients', 1000, '+']] as $i => [$label, $value, $suffix]) {
            Counter::query()->updateOrCreate(['label' => $label], compact('value', 'suffix') + ['sort_order' => $i, 'is_active' => true]);
        }

        foreach (['design' => [['Photoshop', 100], ['Figma', 95], ['Adobe XD', 60], ['Adobe Illustrator', 70]], 'development' => [['HTML', 100], ['CSS', 95], ['JavaScript', 60], ['WordPress', 70]]] as $category => $items) {
            foreach ($items as $i => [$name, $percentage]) {
                Skill::query()->updateOrCreate(compact('category', 'name'), compact('percentage') + ['sort_order' => $i, 'is_active' => true]);
            }
        }

        foreach ([
            ['education', 'Trainer Marketing', 'Creative Academy', '2005-2009'], ['education', 'Assistant Director', 'Design Institute', '2010-2014'],
            ['education', 'Design Assistant', 'Arts College', '2008-2012'], ['education', 'Web Development', 'Tech University', '2012-2016'],
            ['experience', 'Web Designer', 'Creative Studio', '2018-2021'], ['experience', 'Senior Product Designer', 'Digital Agency', '2021-Present'],
        ] as $i => [$type, $title, $organization, $period]) {
            CareerEntry::query()->updateOrCreate(compact('type', 'title', 'organization'), compact('period') + ['description' => 'A milestone in my creative and professional journey.', 'sort_order' => $i, 'is_active' => true]);
        }

        for ($i = 1; $i <= 8; $i++) {
            Partner::query()->updateOrCreate(['name' => "Partner $i"], ['logo' => "assets/images/our-supported-company/company-logo-$i.svg", 'url' => '#', 'sort_order' => $i, 'is_active' => true]);
        }

        foreach ([['Digital Transformation Advisors', 'Development Coaches'], ['Thoughtful Product Experience', 'App Development'], ['Curated Design Selection', 'Web Design'], ['Ideas Brought to Life', 'App Development']] as $i => [$title, $category]) {
            Project::query()->updateOrCreate(['title' => $title], ['category' => $category, 'description' => 'A featured portfolio project.', 'image' => 'assets/images/latest-portfolio/portfoli-img-'.($i + 1).'.jpg', 'url' => '#', 'sort_order' => $i, 'is_featured' => true, 'is_active' => true]);
        }

        foreach (['They understood my vision and brought it to life better than I imagined.', 'Incredibly talented and detail-oriented with a thoughtful approach.', 'A reliable creative partner who delivers polished work.'] as $i => $quote) {
            Testimonial::query()->updateOrCreate(['quote' => $quote], ['client_name' => 'Cameron Williamson', 'client_role' => 'UI/UX Designer', 'image' => 'assets/images/testimonial/'.($i === 1 ? 'bg-image-2.png' : 'bg-image-1png.png'), 'rating' => 5, 'sort_order' => $i, 'is_active' => true]);
        }

        foreach ([['Inspiring the World, One Project at a Time', 'inspiring-the-world'], ['Let’s Bring Your Ideas to Life', 'bring-your-ideas-to-life'], ['A Thoughtful Approach to Every Project', 'thoughtful-project-approach']] as $i => [$title, $slug]) {
            BlogPost::query()->updateOrCreate(['slug' => $slug], ['title' => $title, 'excerpt' => 'Ideas about design, development and better digital products.', 'content' => 'Portfolio article content.', 'image' => 'assets/images/blog/blog-img-'.($i + 1).'.jpg', 'author' => 'Admin', 'published_at' => now()->subDays($i), 'is_published' => true]);
        }

        foreach ([['Instagram', 'fab fa-instagram'], ['LinkedIn', 'fab fa-linkedin-in'], ['Twitter', 'fab fa-twitter'], ['Facebook', 'fab fa-facebook-f']] as $i => [$platform, $icon]) {
            SocialLink::query()->updateOrCreate(['platform' => $platform], ['url' => '#', 'icon' => $icon, 'sort_order' => $i, 'is_active' => true]);
        }
    }
}
