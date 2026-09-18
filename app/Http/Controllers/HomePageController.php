<?php

namespace App\Http\Controllers;

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
use Illuminate\View\View;

class HomePageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        return view('home', [
            'siteSetting' => SiteSetting::query()->first(),
            'sectionSettings' => SectionSetting::query()->where('is_visible', true)->get()->keyBy('section_key'),
            'hero' => HeroSection::query()->where('is_active', true)->latest()->first(),
            'services' => Service::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'counters' => Counter::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'skills' => Skill::query()->where('is_active', true)->orderBy('sort_order')->get()->groupBy('category'),
            'careerEntries' => CareerEntry::query()->where('is_active', true)->orderBy('sort_order')->get()->groupBy('type'),
            'partners' => Partner::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'projects' => Project::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'testimonials' => Testimonial::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'blogPosts' => BlogPost::query()->where('is_published', true)->where('published_at', '<=', now())->latest('published_at')->take(3)->get(),
            'socialLinks' => SocialLink::query()->where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }
}
