// DARK MODE
const darkBtn = document.getElementById('darkModeBtn');
const body = document.body;

// Sayfa açılırken kaydedilmiş tercihi uygula
if (localStorage.getItem('theme') === 'light') {
    body.classList.add('light');
    darkBtn.textContent = '☀️';
}

darkBtn.addEventListener('click', () => {
    body.classList.toggle('light');
    const isLight = body.classList.contains('light');
    darkBtn.textContent = isLight ? '☀️' : '🌙';
    localStorage.setItem('theme', isLight ? 'light' : 'dark');
});

// FORM VALIDATION
const contactForm = document.getElementById('contactForm');
const formMsg = document.getElementById('formMsg');

contactForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const message = document.getElementById('message').value.trim();

    // Validation
    if (name === '') {
        showMsg('Please enter your name.', 'error');
        return;
    }
    if (email === '' || !email.includes('@')) {
        showMsg('Please enter a valid email.', 'error');
        return;
    }
    if (message === '') {
        showMsg('Please enter your message.', 'error');
        return;
    }

    // AJAX ile PHP'ye gönder
    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('message', message);

    fetch('php/contact.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            showMsg('Message sent successfully!', 'success');
            contactForm.reset();
        } else {
            showMsg('Something went wrong. Try again.', 'error');
        }
    })
    .catch(() => {
        showMsg('Connection error. Try again.', 'error');
    });
});

function showMsg(msg, type) {
    formMsg.textContent = msg;
    formMsg.style.color = type === 'success' ? '#6c63ff' : '#ff4444';
}

// PROJECTS - AJAX ile yükle
function loadProjects() {
    fetch('php/get_projects.php')
    .then(res => res.json())
    .then(data => {
        const container = document.getElementById('projects-container');
        container.innerHTML = '';

        if (data.length === 0) {
            container.innerHTML = '<p>No projects yet.</p>';
            return;
        }

        data.forEach(project => {
            const tags = project.tags ? project.tags.split(',').map(t =>
                `<span class="tag">${t.trim()}</span>`).join('') : '';

            const linkHTML = project.link 
    ? `<a href="${project.link}" target="_blank" class="btn" style="margin-top:1rem;font-size:0.85rem;padding:0.5rem 1rem;">View Project</a>` 
    : '';

    container.innerHTML += `
        <div class="project-card">
            <h3>${project.title}</h3>
            <p>${project.description}</p>
            <div class="tags">${tags}</div>
            ${linkHTML}
        </div>
    `;
        });
    })
    .catch(() => {
        document.getElementById('projects-container').innerHTML = '<p>Could not load projects.</p>';
    });
}

loadProjects();