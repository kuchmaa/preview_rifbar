@extends('layouts.app')

@section('title', $tag->name . ' Articles - Duma Shipping Blog')
@section('meta_description', $tag->description ?: 'Browse articles tagged with ' . $tag->name . ' on Duma Shipping Blog.')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/media/laptop.css') }}" media="(max-width:1660px)">
<link rel="stylesheet" href="{{ asset('css/media/tablet.css') }}" media="(max-width:1024px)">
<link rel="stylesheet" href="{{ asset('css/media/mobile.css') }}" media="(max-width:860px)">
<style>

    /* Tag Hero - matching main site style */
    .tag-hero {
        position: relative;
        background: linear-gradient(135deg, var(--blue) 0%, #1e40af 100%);
        color: white;
        overflow: hidden;
        min-height: 50vh;
        display: flex;
        align-items: center;
        box-sizing: border-box;
    }

    .tag-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('/imgs/services-hero.webp') center/cover;
        opacity: 0.1;
        z-index: 1;
    }

    .tag-hero .wrapper {
        position: relative;
        z-index: 2;
    }

    .tag-hero-content {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    /* Tag Badge */
    .tag-badge {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 20px 40px;
        border-radius: 50px;
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 32px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        position: relative;
        overflow: hidden;
        font-family: var(--franklin);
        color: white;
    }

    .tag-badge::before {
        content: '#';
        margin-right: 4px;
        font-size: 20px;
    }

    .tag-badge::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.8s;
    }

    .tag-badge:hover::after {
        left: 100%;
    }

    .tag-title {
        font-family: var(--franklin);
        font-size: 56px;
        line-height: 1.1;
        color: white;
        margin-bottom: 32px;
        text-transform: uppercase;
        font-weight: normal;
    }

    .tag-description {
        font-size: 22px;
        line-height: 1.5;
        color: rgba(255, 255, 255, 0.9);
        max-width: 600px;
        margin: 0 auto 40px;
    }

    .tag-stats {
        display: flex;
        justify-content: center;
        gap: 60px;
        flex-wrap: wrap;
    }

    .stat-item {
        text-align: center;
        background: rgba(255, 255, 255, 0.1);
        padding: 24px 32px;
        border-radius: 24px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        min-width: 120px;
    }

    .stat-number {
        display: block;
        font-size: 36px;
        font-weight: bold;
        color: var(--orange);
        font-family: var(--franklin);
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.8);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-family: var(--main-font);
    }

    /* Content Section */
    .tag-content {
        background: #f8fafc;
        position: relative;
    }

    .tag-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 60px;
        width: 200px;
        height: 4px;
        background: var(--orange);
        border-radius: 2px;
    }

    .section-title {
        font-family: var(--franklin);
        font-size: 40px;
        color: var(--blue);
        text-transform: uppercase;
        margin: 0 0 60px 0;
        position: relative;
        font-weight: normal;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .section-title::after {
        content: '';
        flex: 1;
        height: 4px;
        background: linear-gradient(90deg, var(--orange), transparent);
        border-radius: 2px;
        max-width: 120px;
    }

    .tag-color-indicator {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: inline-block;
        border: 3px solid white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    /* Posts Grid */
    .posts-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
        margin-bottom: 80px;
    }

    /* Post Card - matching main blog style */
    .post-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        border: 2px solid transparent;
        position: relative;
    }

    .post-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        z-index: 2;
    }

    .post-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15);
        border-color: var(--orange);
    }

    .post-image {
        width: 100%;
        height: 280px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .post-card:hover .post-image {
        transform: scale(1.05);
    }

    .post-content {
        padding: 40px;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .post-category {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, var(--blue), #1e40af);
        color: white;
        padding: 12px 24px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 24px;
        text-decoration: none;
        align-self: flex-start;
        font-family: var(--franklin);
    }

    .post-title {
        font-family: var(--franklin);
        font-size: 24px;
        line-height: 1.2;
        color: #1a202c;
        margin-bottom: 16px;
        text-transform: uppercase;
        font-weight: normal;
    }

    .post-excerpt {
        color: #64748b;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 24px;
        flex-grow: 1;
    }

    .post-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 24px;
    }

    .post-tag {
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 11px;
        color: white;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        font-family: var(--main-font);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .post-tag:hover {
        transform: scale(1.05);
        color: white;
    }

    .post-tag.current-tag {
        font-weight: bold;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .post-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 24px;
        border-top: 2px solid #e2e8f0;
        font-size: 14px;
        color: #64748b;
        margin-top: auto;
    }

    .post-meta-left {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .post-meta-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .post-meta-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-family: var(--main-font);
    }

    .post-meta i {
        color: var(--orange);
        font-size: 12px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 120px 40px;
        background: white;
        border-radius: 24px;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.08);
        border: 2px solid #f1f5f9;
    }

    .empty-icon {
        font-size: 120px;
        color: #e2e8f0;
        margin-bottom: 32px;
    }

    .empty-title {
        font-family: var(--franklin);
        font-size: 36px;
        color: #475569;
        margin-bottom: 20px;
        text-transform: uppercase;
        font-weight: normal;
    }

    .empty-text {
        color: #64748b;
        font-size: 18px;
        margin-bottom: 40px;
        line-height: 1.6;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--blue), #1e40af);
        color: white;
        padding: 20px 40px;
        border-radius: 60px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        font-family: var(--franklin);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 16px;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, var(--orange), var(--light-orange));
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(239, 121, 26, 0.4);
        color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .tag-title {
            font-size: 40px;
        }

        .tag-stats {
            gap: 32px;
        }

        .stat-item {
            padding: 20px 24px;
            min-width: 100px;
        }

        .posts-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .post-content {
            padding: 24px;
        }

        .section-title {
            font-size: 32px;
        }
    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeInUp 0.8s ease forwards;
    }

    /* Pagination - matching main blog style */
    .pagination {
        display: inline-flex;
        gap: 12px;
        background: white;
        padding: 20px;
        border-radius: 60px;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.08);
        border: 2px solid #f1f5f9;
        margin: 60px auto;
    }

    .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        color: var(--blue);
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        font-family: var(--franklin);
    }

    .page-link:hover,
    .page-item.active .page-link {
        background: linear-gradient(135deg, var(--blue), #1e40af);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(48, 79, 255, 0.3);
        border-color: var(--blue);
    }
</style>
@endpush

@section('content')
<!-- Tag Hero -->
<section class="tag-hero">
    <div class="wrapper section-content">
        <div class="tag-hero-content">
            <div class="tag-badge" style="background-color: {{ $tag->color }};">
                {{ $tag->name }}
            </div>
            <h1 class="tag-title">{{ $tag->name }} Articles</h1>

            @if($tag->description)
                <p class="tag-description">{{ $tag->description }}</p>
            @endif

            <div class="tag-stats">
                <div class="stat-item">
                    <span class="stat-number">{{ $posts->total() }}</span>
                    <span class="stat-label">Articles</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">{{ $tag->published_posts_count }}</span>
                    <span class="stat-label">Published</span>
                </div>
                <div class="stat-item">
                    <div class="tag-color-indicator" style="background-color: {{ $tag->color }};"></div>
                    <span class="stat-label">Tag Color</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tag Content -->
<section class="tag-content wrapper section-content">
    <h2 class="section-title">
        <span class="tag-color-indicator" style="background-color: {{ $tag->color }};"></span>
        Tagged with {{ $tag->name }}
    </h2>

    @if($posts->count() > 0)
        <div class="posts-grid">
            @foreach($posts as $post)
                <article class="post-card animate-fade-in" style="--tag-color: {{ $tag->color }};">
                    <div style="background-color: {{ $tag->color }}; height: 6px; position: absolute; top: 0; left: 0; right: 0; z-index: 2;"></div>
                    <a href="{{ route('blog.show', $post->slug) }}" style="text-decoration: none; color: inherit; display: flex; flex-direction: column; height: 100%;">
                        @if($post->featured_image)
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="post-image">
                        @endif
                        <div class="post-content">
                            @if($post->category)
                                <span class="post-category">{{ $post->category->name }}</span>
                            @endif

                            <h3 class="post-title">{{ $post->title }}</h3>
                            <p class="post-excerpt">{{ $post->excerpt }}</p>

                            @if($post->tags->count() > 1)
                                <div class="post-tags">
                                    @foreach($post->tags->take(3) as $postTag)
                                        <span class="post-tag {{ $postTag->id === $tag->id ? 'current-tag' : '' }}"
                                              style="background-color: {{ $postTag->color }};">
                                            {{ $postTag->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="post-meta">
                                <div class="post-meta-left">
                                    <span class="post-meta-item">
                                        <i class="fas fa-user"></i>
                                        {{ $post->author->name }}
                                    </span>
                                    <span class="post-meta-item">
                                        <i class="fas fa-calendar"></i>
                                        {{ $post->published_at->format('M j, Y') }}
                                    </span>
                                </div>
                                <div class="post-meta-right">
                                    @if($post->reading_time)
                                        <span class="post-meta-item">
                                            <i class="fas fa-clock"></i>
                                            {{ $post->reading_time }} min
                                        </span>
                                    @endif
                                    <span class="post-meta-item">
                                        <i class="fas fa-eye"></i>
                                        {{ $post->views_count }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div style="text-align: center; margin-top: 80px;">
            {{ $posts->links('vendor.pagination.custom-blog') }}
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-tag empty-icon"></i>
            <h3 class="empty-title">No Articles with This Tag</h3>
            <p class="empty-text">
                This tag doesn't have any published articles yet.<br>
                Check back later for new content.
            </p>
            <a href="{{ route('blog.index') }}" class="btn-primary">
                <i class="fas fa-arrow-left"></i>
                Browse All Articles
            </a>
        </div>
    @endif
</section>

<!-- Footer -->
<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate cards on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animate-fade-in');
                }, index * 150);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all post cards
    document.querySelectorAll('.post-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(40px)';
        observer.observe(card);
    });

    // Tag badge hover effect
    const tagBadge = document.querySelector('.tag-badge');
    if (tagBadge) {
        tagBadge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });

        tagBadge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    }
});
</script>
@endpush
