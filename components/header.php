<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi Forum Mahasiswa Kedinasan Daerah (FMKD) Jakarta Raya">
    <title><?= isset($pageTitle) ? $pageTitle . ' | FMKD Jakarta Raya' : 'FMKD Jakarta Raya' ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        navy: {
                            light: '#1e3a8a',
                            DEFAULT: '#0a192f',
                            dark: '#020c1b',
                        },
                        accent: {
                            light: '#f3f4f6',
                            DEFAULT: '#e5e7eb',
                            dark: '#9ca3af',
                        }
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'fade-in': 'fadeIn 1s ease-out both',
                        'slide-up': 'slideUp 0.8s ease-out both',
                        'slide-left': 'slideLeft 0.8s ease-out both',
                        'slide-right': 'slideRight 0.8s ease-out both',
                        'scale-in': 'scaleIn 0.6s ease-out both',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideLeft: {
                            '0%': { opacity: '0', transform: 'translateX(40px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        slideRight: {
                            '0%': { opacity: '0', transform: 'translateX(-40px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        scaleIn: {
                            '0%': { opacity: '0', transform: 'scale(0.9)' },
                            '100%': { opacity: '1', transform: 'scale(1)' },
                        },
                    }
                }
            }
        }
    </script>
    
    <style>
        /* ===== CUSTOM SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0a192f; }
        ::-webkit-scrollbar-thumb { background: linear-gradient(to bottom, #3b82f6, #06b6d4); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #60a5fa; }

        /* ===== GLASSMORPHISM ===== */
        .glass {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .glass-dark {
            background: rgba(10,25,47,0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        /* ===== CURSOR GLOW ===== */
        #cursor-glow {
            pointer-events: none;
            position: fixed;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(59,130,246,0.07) 0%, transparent 70%);
            transform: translate(-50%, -50%);
            transition: left 0.15s ease, top 0.15s ease;
            z-index: 1;
        }

        /* ===== SCROLL REVEAL ===== */
        .reveal {
            opacity: 0;
            transform: translateY(32px);
            transition: opacity 0.75s cubic-bezier(0.16,1,0.3,1), transform 0.75s cubic-bezier(0.16,1,0.3,1);
        }
        .reveal.reveal-left  { transform: translateX(-40px); }
        .reveal.reveal-right { transform: translateX(40px); }
        .reveal.reveal-scale { transform: scale(0.92); }
        .reveal.visible { opacity: 1; transform: none !important; }

        /* ===== STAGGER CHILDREN ===== */
        .stagger-children > * {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity 0.55s ease, transform 0.55s ease;
        }
        .stagger-children.visible > *:nth-child(1) { transition-delay: 0.00s; }
        .stagger-children.visible > *:nth-child(2) { transition-delay: 0.08s; }
        .stagger-children.visible > *:nth-child(3) { transition-delay: 0.16s; }
        .stagger-children.visible > *:nth-child(4) { transition-delay: 0.24s; }
        .stagger-children.visible > *:nth-child(5) { transition-delay: 0.32s; }
        .stagger-children.visible > *:nth-child(6) { transition-delay: 0.40s; }
        .stagger-children.visible > *:nth-child(7) { transition-delay: 0.48s; }
        .stagger-children.visible > *:nth-child(8) { transition-delay: 0.56s; }
        .stagger-children.visible > *  { opacity: 1; transform: none; }

        /* ===== BUTTON SHIMMER ===== */
        .btn-ripple {
            position: relative;
            overflow: hidden;
        }
        .btn-ripple::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255,255,255,0.12);
            transform: scale(0);
            border-radius: inherit;
            transition: transform 0.45s ease, opacity 0.45s ease;
            opacity: 0;
        }
        .btn-ripple:hover::after { transform: scale(1); opacity: 1; }

        /* ===== LINK UNDERLINE ===== */
        .link-hover { position: relative; }
        .link-hover::after {
            content: '';
            position: absolute;
            bottom: -2px; left: 0;
            width: 0; height: 2px;
            background: #3b82f6;
            transition: width 0.3s ease;
        }
        .link-hover:hover::after { width: 100%; }

        /* ===== SELECTION ===== */
        ::selection { background: rgba(59,130,246,0.3); color: #fff; }

        /* ===== IMG SMOOTH LOAD ===== */
        img { transition: opacity 0.5s ease; }

        /* ===== SECTION DIVIDER WAVE ===== */
        .wave-divider svg { display: block; }
    </style>
</head>
<body class="bg-navy text-slate-100 font-sans antialiased overflow-x-hidden">
    <!-- Global Background -->
    <div class="fixed inset-0 z-[-1]">
        <img src="assets/img/kegiatan/foto1.jpg" class="w-full h-full object-cover scale-105 animate-[pulse-slow_10s_ease-in-out_infinite]" alt="Global Background">
        <div class="absolute inset-0 bg-gradient-to-b from-navy/95 via-navy/90 to-navy backdrop-blur-md"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMSIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjE1KSIvPjwvc3ZnPg==')] opacity-40"></div>
    </div>

<!-- ===== CURSOR GLOW ===== -->
<div id="cursor-glow"></div>

<script>
    // CURSOR GLOW
    if (window.innerWidth > 768) {
        const glow = document.getElementById('cursor-glow');
        document.addEventListener('mousemove', e => {
            glow.style.left = e.clientX + 'px';
            glow.style.top  = e.clientY + 'px';
        });
    } else {
        document.getElementById('cursor-glow').style.display = 'none';
    }

    // SCROLL REVEAL
    const revealObs = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const delay = parseInt(entry.target.dataset.delay || 0);
            setTimeout(() => entry.target.classList.add('visible'), delay);
            revealObs.unobserve(entry.target);
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    const staggerObs = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('visible');
            staggerObs.unobserve(entry.target);
        });
    }, { threshold: 0.08 });

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));
        document.querySelectorAll('.stagger-children').forEach(el => staggerObs.observe(el));

        // COUNTER ANIMATION
        const counterObs = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                const target = parseInt(el.dataset.target || el.textContent.replace(/\D/g, ''));
                const suffix = el.dataset.suffix || '';
                const duration = 2000;
                const start = performance.now();
                const run = now => {
                    const p = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - p, 3);
                    el.textContent = Math.round(eased * target) + suffix;
                    if (p < 1) requestAnimationFrame(run);
                };
                requestAnimationFrame(run);
                counterObs.unobserve(el);
            });
        }, { threshold: 0.5 });
        document.querySelectorAll('.count-up').forEach(el => counterObs.observe(el));

        // SMOOTH IMAGE LOAD
        document.querySelectorAll('img').forEach(img => {
            img.style.opacity = img.complete ? '1' : '0';
            img.addEventListener('load', () => img.style.opacity = '1');
        });
    });
</script>
