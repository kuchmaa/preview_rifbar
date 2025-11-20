@extends('layouts.app')

@section('title', 'Blog - Duma Shipping')
@section('meta_description', 'Stay updated with the latest shipping and logistics news, tips, and company updates from Duma Shipping.')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/media/laptop.css') }}" media="(max-width:1660px)">
<link rel="stylesheet" href="{{ asset('css/media/tablet.css') }}" media="(max-width:1024px)">
<link rel="stylesheet" href="{{ asset('css/media/mobile.css') }}" media="(max-width:860px)">
    <style>


    /* CRITICAL - Prevent horizontal scroll
    html, body {
        overflow-x: hidden !important;
        max-width: 100vw !important;
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        box-sizing: border-box !important;
    }

    *, *::before, *::after {
        box-sizing: border-box !important;
        max-width: 100% !important;
    } */

    .blog-container {
        width: 100%;
        max-width: 100vw;
        overflow-x: hidden;
        position: relative;
    }

    /* Blog Hero Section */
        .blog-hero {
        position: relative;
        background: linear-gradient(135deg, var(--blue) 0%, #1e40af 100%);
            color: white;
        overflow: hidden;
        min-height: 60vh;
        display: flex;
        align-items: center;
        box-sizing: border-box
    }

    .blog-hero::before {
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

    .blog-hero .wrapper {
        position: relative;
        z-index: 2;
    }

    .blog-hero-content {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .blog-hero h1 {
        font-family: var(--franklin);
        font-size: 72px;
        line-height: 1.1;
        margin-bottom: 24px;
        text-transform: uppercase;
        color: white;
        font-weight: normal;
    }

    .blog-hero-subtitle {
        font-size: 24px;
        line-height: 1.4;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 48px;
        font-family: var(--main-font);
    }

    /* Search Container */
    .search-container {
        display: flex;
        gap: 8px;
        align-items: center;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 28px;
        padding: 16px;
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        max-width: 600px;
        margin: 0 auto;
    }
    .search-container > div {
        gap: 8px;
    }
    .search-input {
        flex: 1;
        background: transparent;
            border: none;
        color: white;
        font-size: 18px;
        font-family: var(--main-font);
        padding: 16px 24px;
        outline: none;
        width: 100%;
    }

    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .search-btn {
        background: white;
        color: var(--blue);
        border: none;
        padding: 16px 32px;
        border-radius: 50px;
        font-weight: bold;
        font-family: var(--main-font);
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .search-btn:hover {
        background: var(--orange);
        color: white;
        transform: translateY(-2px);
    }

    /* Search Loading Indicator */
    .search-loading {
        position: absolute;
        right: 60px;
        top: 50%;
        transform: translateY(-50%);
        display: none;
    }

    .search-loading::after {
        content: '';
        width: 16px;
        height: 16px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-top: 2px solid white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Search Results Dropdown Styles */
    .search-results-dropdown {
        scrollbar-width: thin;
        scrollbar-color: rgba(0, 0, 0, 0.2) transparent;
    }

    .search-results-dropdown::-webkit-scrollbar {
        width: 6px;
    }

    .search-results-dropdown::-webkit-scrollbar-track {
        background: transparent;
    }

    .search-results-dropdown::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 3px;
    }

    .search-results-dropdown::-webkit-scrollbar-thumb:hover {
        background-color: rgba(0, 0, 0, 0.3);
    }

    /* Main Blog Content */
    .blog-main {
        background: #f8fafc;
        position: relative;
    }

    .blog-main::before {
        content: '';
        position: absolute;
        top: 0;
        left: 60px;
        width: 200px;
        height: 4px;
        background: var(--orange);
        border-radius: 2px;
    }

    /* Section Title */
    .section-title {
        font-family: var(--franklin);
        font-size: 48px;
        color: var(--blue);
        text-transform: uppercase;
        margin-bottom: 60px;
        position: relative;
        font-weight: normal;
    }

    /* Posts Grid */
    .posts-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
        margin-bottom: 80px;
    }

    /* Post Cards */
    .post-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        position: relative;
        border: 2px solid transparent;
        min-height: 420px;
        display: flex;
        flex-direction: column;
    }

    .post-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15);
        border-color: var(--orange);
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

    /* Post Images */
    .post-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .post-card:hover .post-image {
        transform: scale(1.05);
    }

    /* Post Content */
    .post-content {
        padding: 32px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    /* Category Badge */
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
        transition: all 0.3s ease;
        align-self: flex-start;
        font-family: var(--franklin);
    }

    .post-category:hover {
        background: linear-gradient(135deg, var(--orange), var(--light-orange));
            color: white;
        transform: translateY(-2px);
    }

    /* Post Title */
    .post-title {
        font-family: var(--franklin);
        font-size: 24px;
        line-height: 1.2;
        color: #1a202c;
        margin-bottom: 16px;
        text-transform: uppercase;
        font-weight: normal;
    }

    /* Post Excerpt */
    .post-excerpt {
        color: #64748b;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 24px;
        flex: 1;
    }

    /* Post Meta */
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

    .post-meta-left,
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
    }

    .empty-icon {
        font-size: 64px;
        color: #cbd5e1;
        margin-bottom: 32px;
    }

    .empty-title {
        font-family: var(--franklin);
        font-size: 32px;
        color: #1a202c;
        margin-bottom: 16px;
        text-transform: uppercase;
    }

    .empty-text {
        color: #64748b;
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 40px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: linear-gradient(135deg, var(--blue), #1e40af);
            color: white;
        padding: 16px 32px;
            border-radius: 50px;
            text-decoration: none;
        font-weight: bold;
        font-family: var(--main-font);
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, var(--orange), var(--light-orange));
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(239, 121, 26, 0.4);
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

    /* Desktop Responsive */
    @media (min-width: 1201px) {
        .wrapper.section-content {
            max-width: 1660px;
            overflow-x: hidden;
        }

        .posts-grid {
            max-width: 100%;
            overflow: hidden;
        }
    }

    /* Tablet Responsive */
    @media (max-width: 1200px) {
        .wrapper.section-content {
            padding: 40px 30px;
        }

        .blog-hero h1 {
            font-size: 56px;
        }

        .blog-hero-subtitle {
            font-size: 20px;
        }

        .posts-grid {
            gap: 30px;
        }

        .section-title {
            font-size: 40px;
        }
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .wrapper.section-content {
            padding: 30px 20px;
            width: 100%;
            max-width: 100vw;
            overflow-x: hidden;
        }

        /* Hero Section Mobile */
        .blog-hero {
            padding: 60px 0 40px;
            min-height: auto;
        }

        .blog-hero h1 {
            font-size: 42px;
            line-height: 1.1;
            margin-bottom: 16px;
        }

        .blog-hero-subtitle {
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 32px;
        }

        /* Search Mobile */
        .search-container {
            flex-direction: column;
            gap: 12px;
            padding: 16px;
            border-radius: 25px;
            max-width: 100%;
        }

        .search-input {
            text-align: left;
            padding: 14px 20px;
            font-size: 16px;
            border-radius: 20px;
        }

        .search-btn {
            padding: 14px 28px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        /* Posts Grid Mobile */
        .posts-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .post-image {
            height: 200px;
        }

        .post-content {
            padding: 24px;
        }

        .post-title {
            font-size: 20px;
            line-height: 1.3;
            margin-bottom: 12px;
        }

        .post-excerpt {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .post-meta {
            padding-top: 20px;
            font-size: 12px;
        }

        .post-meta-left,
        .post-meta-right {
            gap: 12px;
        }

        .section-title {
            font-size: 32px;
            margin-bottom: 40px;
        }

        .blog-main::before {
            left: 20px;
            width: 120px;
        }
    }

    /* Small Mobile */
    @media (max-width: 480px) {
        .wrapper.section-content {
            padding: 20px 16px;
        }

        .blog-hero h1 {
            font-size: 32px;
        }

        .blog-hero-subtitle {
            font-size: 16px;
        }

        .search-container {
            padding: 12px;
        }

        .search-input {
            padding: 12px 16px;
            font-size: 14px;
        }

        .search-btn {
            padding: 12px 20px;
            font-size: 13px;
        }

        .post-image {
            height: 200px;
        }

        .post-content {
            padding: 20px;
        }

        .post-title {
            font-size: 18px;
        }

        .section-title {
            font-size: 28px;
        }

        .empty-state {
            padding: 80px 20px;
        }

        .empty-icon {
            font-size: 48px;
        }

        .empty-title {
            font-size: 24px;
        }

        .empty-text {
            font-size: 16px;
        }
    }

    /* Landscape Mobile */
    @media (max-width: 768px) and (orientation: landscape) {
        .blog-hero {
            min-height: 50vh;
        }

        .blog-hero h1 {
            font-size: 36px;
        }

        .posts-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .post-image {
            height: 200px;
        }
    }
    /* Additional Responsive Breakpoints - Matching Main Site */

    /* Large Desktop */
    @media (max-width: 1660px) {
        .wrapper.section-content {
            padding: var(--section-content-pd) var(--section-pd);
        }
    }

    /* Laptop */
    @media (max-width: 1300px) {
        :root {
            --section-pd: 60px;
            --section-content-pd: 40px;
        }

        .wrapper.section-content {
            padding: 40px 60px;
        }

        .blog-hero h1 {
            font-size: 60px;
        }

        .blog-hero-subtitle {
            font-size: 22px;
        }

        .section-title {
            font-size: 44px;
        }

        .posts-grid {
            gap: 32px;
        }
    }

    /* Medium Laptop */
    @media (max-width: 1200px) {
        .wrapper.section-content {
            padding: 40px 60px;
        }

        .blog-hero h1 {
            font-size: 52px;
        }

        .blog-hero-subtitle {
            font-size: 20px;
        }

        .section-title {
            font-size: 40px;
        }

        .posts-grid {
            gap: 28px;
        }

        .post-content {
            padding: 28px;
        }
    }

    /* Tablet */
    @media (max-width: 1024px) {
        :root {
            --section-pd: 20px;
        }

        .wrapper.section-content {
            padding: 40px 20px;
        }

        .blog-hero {
            padding: 50px 0 35px;
        }

        .blog-hero h1 {
            font-size: 48px;
        }

        .blog-hero-subtitle {
            font-size: 19px;
            margin-bottom: 36px;
        }

        .search-container {
            max-width: 500px;
        }

        .section-title {
            font-size: 38px;
            margin-bottom: 50px;
        }

        .posts-grid {
            gap: 24px;
        }

        .post-content {
            padding: 26px;
        }

        .post-title {
            font-size: 22px;
        }

        .post-excerpt {
            font-size: 15px;
        }

        /* Footer tablet adjustments */
        .footer-section:first-child {
            align-items: center;
            flex-direction: column-reverse;
        }
    }

    /* Mobile Large */
    @media (max-width: 860px) {
        :root {
            --section-content-pd: 20px;
        }

        .wrapper.section-content {
            padding: 30px 20px;
        }

        .blog-hero {
            padding: 40px 0 30px;
            min-height: auto;
        }

        .blog-hero h1 {
            font-size: 40px;
            line-height: 1.1;
        }

        .blog-hero-subtitle {
            font-size: 17px;
            margin-bottom: 30px;
        }

        .search-container > div {
            flex-direction: column;
            gap: 10px;
            padding: 14px;
            max-width: 100%;
            border-radius: 45px;
        }

        .search-input {
            padding: 12px 18px;
            font-size: 15px;
            text-align: left;
        }

        .search-btn {
            padding: 12px 24px;
            font-size: 14px;
            width: 100%;
        }

        .section-title {
            font-size: 34px;
            margin-bottom: 40px;
        }

        .posts-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .post-card {
            min-height: auto;
        }

        .post-image {
            height: 180px;
        }

        .post-content {
            padding: 22px;
        }

        .post-title {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .post-excerpt {
            font-size: 14px;
            margin-bottom: 18px;
        }

        .post-meta {
            padding-top: 18px;
            font-size: 12px;
        }

        .post-meta-left,
        .post-meta-right {
            gap: 10px;
        }

        .blog-main::before {
            left: 20px;
            width: 100px;
        }
    }

    /* Mobile Medium */
    @media (max-width: 560px) {
        .blog-hero h1 {
            font-size: 36px;
        }

        .blog-hero-subtitle {
            font-size: 16px;
            margin-bottom: 28px;
        }

        .search-container {
            padding: 12px;
        }

        .search-input {
            padding: 10px 16px;
            font-size: 14px;
        }

        .search-btn {
            padding: 10px 20px;
            font-size: 13px;
        }

        .section-title {
            font-size: 30px;
            margin-bottom: 35px;
        }

        .post-image {
            height: 160px;
        }

        .post-content {
            padding: 20px;
        }

        .post-title {
            font-size: 18px;
        }

        .post-excerpt {
            font-size: 13px;
        }

        .empty-state {
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 40px;
        }

        .empty-title {
            font-size: 22px;
        }

        .empty-text {
            font-size: 14px;
        }
    }

    /* Mobile Small */
    @media (max-width: 425px) {
        :root {
            --section-pd: 20px;
        }

        .wrapper.section-content {
            padding: 20px 20px;
        }

        .blog-hero h1 {
            font-size: 32px;
            line-height: 1.1;
        }

        .blog-hero-subtitle {
            font-size: 15px;
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 28px;
            margin-bottom: 30px;
        }

        .post-image {
            height: 150px;
        }

        .post-content {
            padding: 18px;
        }

        .post-title {
            font-size: 17px;
        }

        .post-excerpt {
            font-size: 12px;
        }

        .post-category {
            padding: 8px 16px;
            font-size: 10px;
            margin-bottom: 16px;
        }

        .empty-state {
            padding: 50px 15px;
        }

        .empty-icon {
            font-size: 36px;
        }

        .empty-title {
            font-size: 20px;
        }

        .empty-text {
            font-size: 13px;
        }

        .btn-primary {
            padding: 12px 24px;
            font-size: 13px;
        }
    }

    /* Mobile Extra Small */
    @media (max-width: 380px) {
        .blog-hero h1 {
            font-size: 28px;
        }

        .blog-hero-subtitle {
            font-size: 14px;
        }

        .section-title {
            font-size: 26px;
        }

        .post-image {
            height: 140px;
        }

        .post-content {
            padding: 16px;
        }

        .post-title {
            font-size: 16px;
        }

        .post-excerpt {
            font-size: 11px;
        }

        .search-container {
            padding: 10px;
        }

        .search-input {
            padding: 8px 14px;
            font-size: 13px;
        }

        .search-btn {
            padding: 8px 16px;
            font-size: 12px;
        }
    }

    /* Landscape Mobile */
    @media (max-width: 900px) and (orientation: landscape) {
        .blog-hero {
            min-height: 40vh;
            padding: 30px 0;
        }

        .blog-hero h1 {
            font-size: 36px;
        }

        .blog-hero-subtitle {
            font-size: 16px;
            margin-bottom: 24px;
        }

        .posts-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .post-image {
            height: 140px;
        }

        .post-content {
            padding: 18px;
        }

        .post-title {
            font-size: 18px;
        }

        .post-excerpt {
            font-size: 13px;
        }
    }
    .search-list{
        gap: 8px;

    }
    .search-list > *{
        box-shadow: 0 0 0px 1px rgba(0, 0, 0, 0.2);
        }
    </style>
@endpush

@section('content')
<div class="blog-container">
    <!-- Hero Section -->
    <section class="blog-hero">
        <div class="wrapper section-content">
            <div class="blog-hero-content">
                <h1>Shipping & Logistics Blog</h1>
                <p class="blog-hero-subtitle">
                    Stay updated with the latest industry insights, shipping tips, and company news from Duma Shipping
                </p>
                    
                    <!-- Search Form -->
                <form method="GET" action="{{ route('blog.index') }}">
                    <div class="search-container flex col">
                       <div class="flex row w-full">
                            <input
                                type="text"
                                name="search"
                                class="search-input"
                                placeholder="Search articles, insights, and shipping tips..."
                                value="{{ request('search') }}"
                                autocomplete="off"
                            >
                            <div class="search-loading"></div>
                            <button type="submit" class="search-btn">
                                <i class="fas fa-search"></i>
                                Search
                            </button>
                        </div>
                       <div class="flex col w-full tai_l">
                            {{-- {{ $popularTags }} --}}
                            <span>Tags:</span>
                            <div class="flex row wrap search-list">
                               @for ($i = 0; $i < min(count($popularTags), 12); $i++)
                                    <a href="/blog/tag/{{ $popularTags[$i]['slug'] }}" class="button btn_sm" style="--btn-bg: {{ $popularTags[$i]['color']  }}; --btn-color:white;">{{ $popularTags[$i]['name'] }}</a>
                                @endfor
                </div>
                            <span>Category:</span>
                            <div class="flex row wrap search-list">
                               @for ($i = 0; $i < min(count($categories), 12); $i++)
                                    <a href="/blog/category/{{ $categories[$i]['slug'] }}" class="button btn_sm btn_white">{{ $categories[$i]['name'] }}</a>
                                @endfor
            </div>
        </div>
                                                </div>
                </form>
                                            </div>
                        </div>
                    </section>

    <!-- Main Content -->
    <section class="blog-main wrapper section-content">
        <h2 class="section-title">{{ request('search') ? 'Search Results' : 'Latest Articles' }}</h2>

                    @if($posts->count() > 0)
            <div class="posts-grid">
                             @foreach($posts as $post)
                    <article class="post-card animate-fade-in">
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

                                <div class="post-meta">
                                    <div class="post-meta-left">
                                        <span class="post-meta-item">
                                            <i class="fas fa-calendar"></i>
                                            {{ $post->published_at->format('M j, Y') }}
                                                             </span>
                                                     </div>
                                    <div class="post-meta-right">
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
                <i class="fas fa-search empty-icon"></i>
                <h3 class="empty-title">No Articles Found</h3>
                <p class="empty-text">
                    @if(request('search'))
                        No articles match your search criteria.<br>
                        Try different keywords or browse all articles.
                    @else
                        No articles have been published yet.<br>
                        Check back later for new content.
                    @endif
                </p>
                @if(request('search'))
                    <a href="{{ route('blog.index') }}" class="btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Browse All Articles
                    </a>
                @endif
                        </div>
                    @endif
                </section>

    <!-- Footer -->
    <x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>
            </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // CRITICAL: Prevent horizontal scroll with JavaScript
    // document.body.style.overflowX = 'hidden';
    // document.documentElement.style.overflowX = 'hidden';
    // document.body.style.maxWidth = '100vw';
    // document.documentElement.style.maxWidth = '100vw';

    // Prevent horizontal scroll events
    window.addEventListener('scroll', function(e) {
        if (window.scrollX !== 0) {
            window.scrollTo(0, window.scrollY);
        }
    });

    // // Monitor for any elements that might cause overflow
    // const observer = new MutationObserver(function(mutations) {
    //     document.body.style.overflowX = 'hidden';
    //     document.documentElement.style.overflowX = 'hidden';
    // });

    // observer.observe(document.body, {
    //     attributes: true,
    //     attributeFilter: ['style', 'class']
    // });

    // // Force all containers to respect boundaries
    // const containers = document.querySelectorAll('div, section, article, main');
    // containers.forEach(container => {
    //     container.style.maxWidth = '100%';
    //     container.style.overflowX = 'hidden';
    // });

    // // Animate cards on scroll
    // const observerOptions = {
    //     threshold: 0.1,
    //     rootMargin: '0px 0px -100px 0px'
    // };

    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animate-fade-in');
                }, index * 150);
                cardObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all post cards
    document.querySelectorAll('.post-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(40px)';
        cardObserver.observe(card);
    });

    // Enhanced search functionality with live search
    const searchInput = document.querySelector('.search-input');
    const searchContainer = document.querySelector('.search-container');
    let searchTimeout;
    let searchResults = null;

    if (searchInput && searchContainer) {
        // Create search results dropdown
        const searchResultsContainer = document.createElement('div');
        searchResultsContainer.className = 'search-results-dropdown';
        searchResultsContainer.style.cssText = `
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            max-height: 400px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
            margin-top: 8px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        `;

        // Make search container relative for dropdown positioning
        searchContainer.style.position = 'relative';
        searchContainer.appendChild(searchResultsContainer);

        searchInput.addEventListener('focus', function() {
            searchContainer.style.transform = 'scale(1.02)';
            searchContainer.style.boxShadow = '0 30px 100px rgba(0, 0, 0, 0.2)';
        });

        searchInput.addEventListener('blur', function() {
            // Delay hiding results to allow clicking on them
            setTimeout(() => {
                searchContainer.style.transform = 'scale(1)';
                searchContainer.style.boxShadow = '0 20px 60px rgba(0, 0, 0, 0.15)';
                searchResultsContainer.style.display = 'none';
            }, 200);
        });

        // Live search functionality
        searchInput.addEventListener('input', function() {
            const query = this.value.trim();

            clearTimeout(searchTimeout);

            if (query.length < 2) {
                searchResultsContainer.style.display = 'none';
                return;
            }

            searchTimeout = setTimeout(() => {
                performLiveSearch(query);
            }, 300);
        });

        // Keyboard navigation for search results
        let selectedResultIndex = -1;

        searchInput.addEventListener('keydown', function(e) {
            const resultItems = document.querySelectorAll('.search-result-item');

            if (e.key === 'ArrowDown') {
                e.preventDefault();
                selectedResultIndex = Math.min(selectedResultIndex + 1, resultItems.length - 1);
                updateSelectedResult(resultItems);
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                selectedResultIndex = Math.max(selectedResultIndex - 1, -1);
                updateSelectedResult(resultItems);
            } else if (e.key === 'Enter' && selectedResultIndex >= 0) {
                e.preventDefault();
                if (resultItems[selectedResultIndex]) {
                    resultItems[selectedResultIndex].click();
                }
            } else if (e.key === 'Escape') {
                searchResultsContainer.style.display = 'none';
                selectedResultIndex = -1;
            }
        });

        function updateSelectedResult(resultItems) {
            resultItems.forEach((item, index) => {
                if (index === selectedResultIndex) {
                    item.style.backgroundColor = '#e2e8f0';
                    item.scrollIntoView({ block: 'nearest' });
                } else {
                    item.style.backgroundColor = 'transparent';
                }
            });
        }

        function performLiveSearch(query) {
            const loadingIndicator = document.querySelector('.search-loading');

            // Show loading indicator
            if (loadingIndicator) {
                loadingIndicator.style.display = 'block';
            }

            fetch(`/blog/search?q=${encodeURIComponent(query)}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                displaySearchResults(data);
            })
            .catch(error => {
                console.error('Search error:', error);
                searchResultsContainer.innerHTML = `
                    <div style="padding: 20px; text-align: center; color: #ef4444;">
                        <i class="fas fa-exclamation-triangle" style="font-size: 24px; margin-bottom: 8px; display: block;"></i>
                        Search error occurred. Please try again.
                </div>
                `;
                searchResultsContainer.style.display = 'block';
            })
            .finally(() => {
                // Hide loading indicator
                if (loadingIndicator) {
                    loadingIndicator.style.display = 'none';
                }
            });
        }

        function displaySearchResults(data) {
            // Reset selected result index
            selectedResultIndex = -1;

            if (!data.posts || data.posts.length === 0) {
                searchResultsContainer.innerHTML = `
                    <div style="padding: 20px; text-align: center; color: #64748b;">
                        <i class="fas fa-search" style="font-size: 24px; margin-bottom: 8px; display: block;"></i>
                        No results found for "${data.query}"
                        </div>
                `;
                searchResultsContainer.style.display = 'block';
                return;
            }

            let resultsHTML = `
                <div style="padding: 16px 20px; border-bottom: 1px solid #e2e8f0; background: #f8fafc;">
                    <strong style="color: var(--blue); font-size: 14px;">
                        ${data.total} result${data.total !== 1 ? 's' : ''} for "${data.query}"
                    </strong>
                </div>
            `;

            data.posts.forEach(post => {
                resultsHTML += `
                    <div class="search-result-item" style="
                        padding: 16px 20px;
                        border-bottom: 1px solid #f1f5f9;
                        cursor: pointer;
                        transition: background-color 0.2s ease;
                    " onclick="window.location.href='${post.url}'">
                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            ${post.featured_image ? `
                                <img src="${post.featured_image}" alt="${post.title}" style="
                                    width: 60px;
                                    height: 60px;
                                    object-fit: cover;
                                    border-radius: 8px;
                                    flex-shrink: 0;
                                ">
                            ` : ''}
                            <div style="flex: 1; min-width: 0;">
                                <h4 style="
                                    margin: 0 0 4px 0;
                                    font-size: 14px;
                                    font-weight: 600;
                                    color: #1a202c;
                                    line-height: 1.3;
                                    font-family: var(--franklin);
                                ">${post.title}</h4>
                                <p style="
                                    margin: 0 0 8px 0;
                                    font-size: 12px;
                                    color: #64748b;
                                    line-height: 1.4;
                                ">${post.excerpt}</p>
                                <div style="display: flex; align-items: center; gap: 12px; font-size: 11px; color: #94a3b8;">
                                    ${post.category ? `
                                        <span style="
                                            background: var(--blue);
                                            color: white;
                                            padding: 2px 8px;
                                            border-radius: 12px;
                                            font-weight: 500;
                                        ">${post.category}</span>
                                    ` : ''}
                                    <span>${post.published_at}</span>
                                    ${post.is_featured ? '<span style="color: var(--orange); font-weight: 600;">★ Featured</span>' : ''}
            </div>
        </div>
    </div>
                    </div>
                `;
            });

            resultsHTML += `
                <div style="padding: 12px 20px; text-align: center; background: #f8fafc;">
                    <button onclick="document.querySelector('form').submit()" style="
                        background: var(--blue);
                        color: white;
                        border: none;
                        padding: 8px 16px;
                        border-radius: 20px;
                        font-size: 12px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.2s ease;
                    " onmouseover="this.style.background='var(--orange)'" onmouseout="this.style.background='var(--blue)'">
                        View All Results
                    </button>
                </div>
            `;

            searchResultsContainer.innerHTML = resultsHTML;
            searchResultsContainer.style.display = 'block';

            // Add hover effects to search result items
            document.querySelectorAll('.search-result-item').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = '#f8fafc';
                });
                item.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = 'transparent';
                });
            });
        }
    }

    // Smooth hover effects for cards
    document.querySelectorAll('.post-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-12px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endpush
