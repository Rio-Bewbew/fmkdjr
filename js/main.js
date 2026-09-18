// Navbar Scroll Effect
window.addEventListener('scroll', () => {
    const nav = document.getElementById('navbar');
    if(nav) {
        if(window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    }
});

// Mobile Menu
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('navLinks');

if(hamburger && navLinks) {
    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        if(navLinks.classList.contains('active')) {
            hamburger.innerHTML = '<i class="ti ti-x"></i>';
        } else {
            hamburger.innerHTML = '<i class="ti ti-menu-2"></i>';
        }
    });

    navLinks.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('active');
            hamburger.innerHTML = '<i class="ti ti-menu-2"></i>';
        });
    });
}

// Intersection Observer for fade-in animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px"
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            
            // Trigger counters if in hero section
            if(entry.target.classList.contains('hero-content')) {
                const counters = document.querySelectorAll('.stat-number');
                counters.forEach(counter => {
                    const target = +counter.getAttribute('data-target');
                    const duration = 2000; // ms
                    const increment = target / (duration / 16); // 60fps
                    let current = 0;
                    
                    const updateCounter = () => {
                        current += increment;
                        if(current < target) {
                            counter.innerText = Math.ceil(current) + "+";
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.innerText = target + (target > 5 ? "+" : "");
                        }
                    };
                    updateCounter();
                });
            }
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

document.querySelectorAll('.fade-in').forEach(element => {
    observer.observe(element);
});

// Hero Canvas Particles
const canvas = document.getElementById('hero-canvas');
if(canvas) {
    const ctx = canvas.getContext('2d');
    
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    let particles = [];
    
    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 2;
            this.speedX = Math.random() * 1 - 0.5;
            this.speedY = Math.random() * 1 - 0.5;
            this.opacity = Math.random() * 0.5;
        }
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            if(this.x > canvas.width) this.x = 0;
            if(this.x < 0) this.x = canvas.width;
            if(this.y > canvas.height) this.y = 0;
            if(this.y < 0) this.y = canvas.height;
        }
        draw() {
            ctx.fillStyle = `rgba(43, 163, 232, ${this.opacity})`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    function initParticles() {
        particles = [];
        for(let i=0; i<100; i++) {
            particles.push(new Particle());
        }
    }

    function animateParticles() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(p => {
            p.update();
            p.draw();
        });
        requestAnimationFrame(animateParticles);
    }

    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        initParticles();
    });

    initParticles();
    animateParticles();
}

// Kepengurusan Table Logic
let currentTab = 'dpd';

function getBadgeClass(jabatan) {
    if(!jabatan) return 'badge-staff';
    const j = jabatan.toLowerCase();
    if (j.includes('ketua')) return 'badge-ketua';
    if (j.includes('kepala')) return 'badge-kepala';
    if (j.includes('sekretaris') || j.includes('bendahara')) return 'badge-sekretaris';
    if (j.includes('anggota')) return 'badge-anggota';
    return 'badge-staff';
}

function renderLeadership() {
    const container = document.getElementById('leadershipContainer');
    if(!container || typeof dpdData === 'undefined') return;

    let data = currentTab === 'dpd' ? dpdData : dewasData;
    let leadersHTML = '';
    
    if(currentTab === 'dpd') {
        const ketua = data.find(item => item.jabatan.toLowerCase() === 'ketua dpd');
        const kepalaDivisi = data.filter(item => item.jabatan.toLowerCase() === 'kepala divisi');
        
        if(ketua) {
            leadersHTML += `
                <div class="leadership-section-title">Ketua DPD</div>
                <div class="leadership-grid" style="grid-template-columns: 1fr; max-width: 350px; margin: 0 auto 3rem;">
                    <div class="profile-card">
                        <div class="profile-img"><i class="ti ti-user"></i></div>
                        <h3 class="profile-name">${ketua.nama}</h3>
                        <p class="profile-title">${ketua.jabatan}</p>
                        <p class="profile-origin">${ketua.asal}</p>
                    </div>
                </div>
            `;
        }
        
        if(kepalaDivisi.length > 0) {
            leadersHTML += `
                <div class="leadership-section-title">Kepala Divisi</div>
                <div class="leadership-grid">
                    ${kepalaDivisi.map(kadiv => `
                        <div class="profile-card">
                            <div class="profile-img"><i class="ti ti-user"></i></div>
                            <h3 class="profile-name">${kadiv.nama}</h3>
                            <p class="profile-title">Kadiv ${kadiv.divisi}</p>
                            <p class="profile-origin">${kadiv.asal}</p>
                        </div>
                    `).join('')}
                </div>
            `;
        }
    } else {
        const ketua = data.find(item => item.jabatan.toLowerCase() === 'ketua dewas');
        const ketuaKomisi = data.filter(item => item.jabatan.toLowerCase().includes('ketua komisi'));
        
        if(ketua) {
            leadersHTML += `
                <div class="leadership-section-title">Ketua Dewan Pengawas</div>
                <div class="leadership-grid" style="grid-template-columns: 1fr; max-width: 350px; margin: 0 auto 3rem;">
                    <div class="profile-card">
                        <div class="profile-img"><i class="ti ti-user"></i></div>
                        <h3 class="profile-name">${ketua.nama}</h3>
                        <p class="profile-title">${ketua.jabatan}</p>
                        <p class="profile-origin">${ketua.asal}</p>
                    </div>
                </div>
            `;
        }
        
        if(ketuaKomisi.length > 0) {
            leadersHTML += `
                <div class="leadership-section-title">Ketua Komisi</div>
                <div class="leadership-grid">
                    ${ketuaKomisi.map(komisi => `
                        <div class="profile-card">
                            <div class="profile-img"><i class="ti ti-user"></i></div>
                            <h3 class="profile-name">${komisi.nama}</h3>
                            <p class="profile-title">${komisi.jabatan}</p>
                            <p class="profile-origin">${komisi.asal}</p>
                        </div>
                    `).join('')}
                </div>
            `;
        }
    }
    
    container.innerHTML = leadersHTML;
}

function initTable() {
    renderLeadership();

    const select = document.getElementById('filterSelect');
    const thead = document.getElementById('tableHeader');
    
    if(!select || !thead || typeof dpdData === 'undefined') return;

    select.innerHTML = '<option value="all">Semua Divisi / Komisi</option>';
    
    let categories = new Set();
    let data = currentTab === 'dpd' ? dpdData : dewasData;
    
    data.forEach(item => {
        categories.add(currentTab === 'dpd' ? item.divisi : item.komisi);
    });

    categories.forEach(cat => {
        const opt = document.createElement('option');
        opt.value = cat;
        opt.textContent = cat;
        select.appendChild(opt);
    });

    if(currentTab === 'dpd') {
        thead.innerHTML = `
            <th>Nama Pengurus</th>
            <th>Asal Perguruan Tinggi</th>
            <th>Jabatan</th>
            <th>Divisi</th>
        `;
    } else {
        thead.innerHTML = `
            <th>No</th>
            <th>Nama Pengawas</th>
            <th>Asal Perguruan Tinggi</th>
            <th>Jabatan</th>
            <th>Komisi</th>
        `;
    }

    renderTable(data);
}

function renderTable(data) {
    const tbody = document.getElementById('tableBody');
    if(!tbody) return;

    tbody.innerHTML = '';
    
    data.forEach((item, index) => {
        const tr = document.createElement('tr');
        if(currentTab === 'dpd') {
            tr.innerHTML = `
                <td style="font-weight: 600;">${item.nama}</td>
                <td class="mono" style="font-size: 0.9rem;">${item.asal}</td>
                <td><span class="badge ${getBadgeClass(item.jabatan)}">${item.jabatan}</span></td>
                <td>${item.divisi}</td>
            `;
        } else {
            tr.innerHTML = `
                <td class="mono">${item.no || index + 1}</td>
                <td style="font-weight: 600;">${item.nama}</td>
                <td class="mono" style="font-size: 0.9rem;">${item.asal}</td>
                <td><span class="badge ${getBadgeClass(item.jabatan)}">${item.jabatan}</span></td>
                <td>${item.komisi}</td>
            `;
        }
        tbody.appendChild(tr);
    });

    const totalEl = document.getElementById('totalPengurus');
    if(totalEl) totalEl.textContent = data.length;
}

// Global functions for HTML onclick
window.filterTable = function() {
    const search = document.getElementById('searchInput').value.toLowerCase();
    const filter = document.getElementById('filterSelect').value;
    let data = currentTab === 'dpd' ? dpdData : dewasData;

    let filtered = data.filter(item => {
        const matchSearch = item.nama.toLowerCase().includes(search) || item.asal.toLowerCase().includes(search);
        const category = currentTab === 'dpd' ? item.divisi : item.komisi;
        const matchFilter = filter === 'all' || category === filter;
        return matchSearch && matchFilter;
    });

    renderTable(filtered);
}

window.switchTab = function(tab) {
    currentTab = tab;
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    if(event && event.target) {
        event.target.classList.add('active');
    }
    const searchInput = document.getElementById('searchInput');
    if(searchInput) searchInput.value = '';
    initTable();
}

// Initialize table on load if present
document.addEventListener('DOMContentLoaded', () => {
    initTable();
});
