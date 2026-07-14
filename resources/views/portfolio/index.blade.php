@extends('layouts.app')

@section('content')
<section id="home" class="hero">
    <div class="container" style="max-width: 1400px;">
        <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
            <span class="hero-label" data-aos="fade-up" data-aos-delay="100">Web Developer</span>
            <h1 class="hero-title" data-aos="fade-up" data-aos-delay="200">
                Building digital
                <span class="accent">experiences</span>
                that matter
            </h1>
            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="300">
                and I'm a passionate developer specializing in building modern, 
                responsive, and user-friendly web applications.
            </p>
            <div class="hero-buttons" data-aos="fade-up" data-aos-delay="400">
                <a href="#projects" class="btn-primary">
                    View Projects
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="#contact" class="btn-secondary">Contact Me</a>
            </div>
            <div class="hero-stats" data-aos="fade-up" data-aos-delay="500">
                <div class="hero-stat" data-aos="fade-up" data-aos-delay="600">
                    <span class="hero-stat-number">1+</span>
                    <span class="hero-stat-label">Years Experience</span>
                </div>
                <div class="hero-stat" data-aos="fade-up" data-aos-delay="700">
                    <span class="hero-stat-number">{{ $projectCount }}</span>
                    <span class="hero-stat-label">Projects Completed</span>
                </div>
                <div class="hero-stat" data-aos="fade-up" data-aos-delay="800">
                    <span class="hero-stat-number">{{ $clientCount }}+</span>
                    <span class="hero-stat-label">Happy Clients</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="about-section section">
    <div class="container">
        <div class="about-grid">
            <div class="about-image" data-aos="fade-right" data-aos-duration="1000">
                <div class="about-img-wrapper">
                    <img src="{{ asset('img/Naufal.jpeg') }}" alt="Profile Photo" class="about-img">
                </div>
            </div>
            <div class="about-text" data-aos="fade-left" data-aos-duration="1000">
                <span class="section-label">About Me</span>
                <h3>My Name is Muhammad Naufal Alfiyando</h3>
                <p>
                    I'm a dedicated web developer with a passion for creating elegant 
                    and efficient solutions. With over 1 years of experience, I've 
                    worked on a variety of projects ranging from small business websites 
                    to complex web applications.
                </p>
                <div class="about-info">
                    <div class="about-info-item" data-aos="fade-up" data-aos-delay="100">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>Banjarmasin, Kalimantan Selatan</span>
                    </div>
                    <div class="about-info-item" data-aos="fade-up" data-aos-delay="200">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg>
                        <span>+62 817-0295-888</span>
                    </div>
                    <div class="about-info-item" data-aos="fade-up" data-aos-delay="300">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        <span>lrx8422@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="skills" class="skills section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-label">Skills</span>
            <h2 class="section-title">My Expertise</h2>
            <p class="section-subtitle">
                A comprehensive set of modern technologies I use to build 
                exceptional digital products.
            </p>
        </div>
        <div class="skills-progress-grid">
            @forelse($skills as $category => $categorySkills)
            <div class="skill-progress-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <h3 class="skill-progress-category">{{ ucfirst($category) }}</h3>
                <div class="skill-progress-list">
                    @foreach($categorySkills as $skill)
                    <div class="skill-progress-item">
                        <div class="skill-progress-header">
                            @if($skill->icon)
                            <span class="skill-progress-icon">{{ $skill->icon }}</span>
                            @endif
                            <span class="skill-progress-name">{{ $skill->name }}</span>
                            <span class="skill-progress-percent">{{ $skill->level }}%</span>
                        </div>
                        <div class="skill-progress-bar">
                            <div class="skill-progress-fill" style="width: {{ $skill->level }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @empty
            <div class="skill-progress-card" data-aos="fade-up" data-aos-delay="0">
                <h3 class="skill-progress-category">Frontend</h3>
                <div class="skill-progress-list">
                    <div class="skill-progress-item">
                        <div class="skill-progress-header">
                            <span class="skill-progress-name">HTML</span>
                            <span class="skill-progress-percent">95%</span>
                        </div>
                        <div class="skill-progress-bar"><div class="skill-progress-fill" style="width: 95%"></div></div>
                    </div>
                    <div class="skill-progress-item">
                        <div class="skill-progress-header">
                            <span class="skill-progress-name">CSS</span>
                            <span class="skill-progress-percent">90%</span>
                        </div>
                        <div class="skill-progress-bar"><div class="skill-progress-fill" style="width: 90%"></div></div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<section id="projects" class="projects-section section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-label">Projects</span>
            <h2 class="section-title">Featured Work</h2>
            <p class="section-subtitle">
                A selection of projects I've worked on, showcasing my skills 
                and experience across different technologies.
            </p>
        </div>
        <div class="projects-grid">
            @forelse($projects as $project)
            <article class="project-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="project-image">
                    @if($project->image)
                    <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}" loading="lazy">
                    @else
                    <div class="project-placeholder">{{ strtoupper(substr($project->title, 0, 1)) }}</div>
                    @endif
                    <div class="project-overlay">
                        <div class="project-actions">
                            @if($project->live_url)
                            <a href="{{ $project->live_url }}" target="_blank" class="project-link outline">Live Demo</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="project-content">
                    <span class="project-category">{{ $project->category ?? 'Web Development' }}</span>
                    <h3 class="project-title">{{ $project->title }}</h3>
                    <p class="project-desc">{{ $project->description }}</p>
                    @if($project->technologies)
                    <div class="project-tech">
                        @foreach($project->technologies as $tech)
                        <span class="project-tech-tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </article>
            @empty
            <p style="text-align: center; color: var(--text-secondary); grid-column: 1 / -1;">
                No projects yet. Check back soon!
            </p>
            @endforelse
        </div>
    </div>
</section>

<section id="contact" class="contact-section section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info" data-aos="fade-right" data-aos-duration="1000">
                <span class="section-label">Get In Touch</span>
                <h3>Let's work together</h3>
                <p>
                    Have a project in mind or want to collaborate? Feel free 
                    to reach out and let's create something amazing together.
                </p>
                <div class="contact-links">
                    <a href="mailto:lrx8422@gmail.com" class="contact-link" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-link-icon">✉</div>
                        <div class="contact-link-text">
                            <span class="contact-link-label">Email</span>
                            <span class="contact-link-value">lrx8422@gmail.com</span>
                        </div>
                    </a>
                    <a href="https://maps.app.goo.gl/Ut2gwA7nXdauaxDD8" target="_blank" rel="noopener noreferrer" class="contact-link" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-link-icon">📍</div>
                        <div class="contact-link-text">
                            <span class="contact-link-label">Location</span>
                            <span class="contact-link-value">Banjarmasin, Kalimantan Selatan</span>
                        </div>
                    </a>
                    <a href="https://github.com/Niveliz666" target="_blank" rel="noopener noreferrer" class="contact-link" data-aos="fade-up" data-aos-delay="300">
                        <div class="contact-link-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                        </div>
                        <div class="contact-link-text">
                            <span class="contact-link-label">GitHub</span>
                            <span class="contact-link-value">@Niveliz666</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="contact-form" data-aos="fade-left" data-aos-duration="1000">
                @if(session('success'))
                <div style="background: #10b98120; border: 1px solid #10b981; color: #10b981; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;">
                    {{ session('success') }}
                </div>
                @endif
                @if($errors->any())
                <div style="background: #ef444420; border: 1px solid #ef4444; color: #ef4444; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif
                <form action="{{ route('portfolio.sendContact') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Your name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="your@email.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="Project inquiry">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Tell me about your project..." rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn-primary" style="width: 100%;">
                        Send Message
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection