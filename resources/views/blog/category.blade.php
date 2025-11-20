@extends('layouts.app')

@section('title', $category->name . ' Articles - Duma Shipping Blog')
@section('meta_description', $category->description ?: 'Browse articles in the ' . $category->name . ' category on Duma Shipping Blog.')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/media/laptop.css') }}" media="(max-width:1660px)">
<link rel="stylesheet" href="{{ asset('css/media/tablet.css') }}" media="(max-width:1024px)">
<link rel="stylesheet" href="{{ asset('css/media/mobile.css') }}" media="(max-width:860px)">
<style>

    /* Category Hero - matching main site style */
    .category-hero {
        position: relative;
        background: linear-gradient(135deg, var(--blue) 0%, #1e40af 100%);
        color: white;
        overflow: hidden;
        min-height: 50vh;
        display: flex;
        align-items: center;
        box-sizing: border-box
    }

    .category-hero::before {
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

    .category-hero .wrapper {
        position: relative;
        z-index: 2;
    }

    .category-hero-content {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .category-badge {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: var(--orange);
        color: white;
        padding: 20px 40px;
        border-radius: 50px;
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 32px;
        box-shadow: 0 12px 40px rgba(239, 121, 26, 0.4);
        font-family: var(--franklin);
    }

    .category-title {
        font-family: var(--franklin);
        font-size: 56px;
        line-height: 1.1;
        color: white;
        margin-bottom: 32px;
        text-transform: uppercase;
        font-weight: normal;
    }

    .category-description {
        font-size: 22px;
        line-height: 1.5;
        color: rgba(255, 255, 255, 0.9);
        max-width: 600px;
        margin: 0 auto 40px;
    }

    /* Content Section */
    .category-content {
        background: #f8fafc;
        position: relative;
    }

    .category-content::before {
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
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 0;
        width: 80px;
        height: 4px;
        background: var(--orange);
        border-radius: 2px;
    }

    /* Post Cards - matching main blog style */
    .posts-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
        margin-bottom: 80px;
    }

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
        background: linear-gradient(90deg, var(--blue), var(--orange));
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
        .category-title {
            font-size: 40px;
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
<!-- Category Hero -->
<section class="category-hero">
    <div class="wrapper section-content">
        <div class="category-hero-content">
            <div class="category-badge">{{ $category->name }}</div>
            <h1 class="category-title">{{ $category->name }} Articles</h1>

            @if($category->description)
                <p class="category-description">{{ $category->description }}</p>
            @endif
        </div>
    </div>
</section>

<!-- Category Content -->
<section class="category-content wrapper section-content">
    <h2 class="section-title">Latest in {{ $category->name }}</h2>

    @if($posts->count() > 0)
        <div class="posts-grid">
            @foreach($posts as $post)
                <article class="post-card animate-fade-in">
                    <a href="{{ route('blog.show', $post->slug) }}" style="text-decoration: none; color: inherit; display: flex; flex-direction: column; height: 100%;">
                        @if($post->featured_image)
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="post-image">
                        @endif
                        <div class="post-content">
                            <span class="post-category">{{ $category->name }}</span>
                            <h3 class="post-title">{{ $post->title }}</h3>
                            <p class="post-excerpt">{{ $post->excerpt }}</p>

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
            <i class="fas fa-folder-open empty-icon"></i>
            <h3 class="empty-title">No Articles in This Category</h3>
            <p class="empty-text">
                This category doesn't have any published articles yet.<br>
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
});
</script>
@endpush
