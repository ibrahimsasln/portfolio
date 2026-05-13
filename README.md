# İbrahim Salih Aslan | Full-Stack Web Portfolio

**Live Demo:** http://ibrahimsalihaslan.gt.tc/portfolio  
**GitHub:** https://github.com/ibrahimsasln/portfolio

---

## Project Overview

This project is a full-stack web portfolio developed as a final project for the Web Technologies course at Haliç University. It serves as both an academic submission and a professional asset to showcase my skills to potential employers.

The portfolio is a dynamic, database-driven web application built with HTML5, CSS3, JavaScript, PHP, and MySQL — integrating all technologies covered throughout the semester.

---

## Technologies Used

| Technology | Purpose |
|------------|---------|
| HTML5 | Semantic structure and layout |
| CSS3 | Responsive design, Flexbox, Grid, CSS Variables |
| JavaScript | DOM manipulation, form validation, AJAX/Fetch API |
| PHP 8 | Server-side logic, session management |
| MySQL | Relational database for projects and contacts |

---

## Features

### Frontend
- Fully responsive design (mobile, tablet, desktop)
- Dark / Light mode toggle with localStorage persistence
- Smooth hover animations on project cards

### Contact Form
- Client-side validation with JavaScript
- Server-side validation with PHP (double-layer security)
- AJAX submission using Fetch API — no page refresh
- Messages saved to MySQL database

### Projects Section
- Projects fetched dynamically from MySQL via AJAX
- Rendered as cards with title, description, tags and links

### Admin Dashboard
- Secure login with PHP Sessions
- Password hashing with bcrypt
- Add and delete projects from dashboard
- View and delete contact messages
- Protected routes — unauthenticated users redirected to login

---

## How It Was Built

1. Local development environment set up with XAMPP (Apache + MySQL + PHP)
2. HTML structure and CSS styling built with responsive design
3. JavaScript interactivity added (dark mode, form validation, AJAX)
4. MySQL database schema designed (projects, contacts, admin_users)
5. PHP backend endpoints built for contact form and project fetching
6. Admin dashboard implemented with session-based authentication
7. Deployed to InfinityFree hosting (ibrahimsalihaslan.gt.tc)
8. Production MySQL database configured on InfinityFree servers

---

## Database Schema

- **projects** — id, title, description, tags, link, created_at  
- **contacts** — id, name, email, message, created_at  
- **admin_users** — id, username, password (bcrypt hashed)

---

## Deployment

- **Hosting:** InfinityFree (free tier)
- **Domain:** ibrahimsalihaslan.gt.tc
- **Database Server:** sql311.infinityfree.com
- **SQL Export:** Included in `/sql/portfolio_db.sql`

---

## Developer

**İbrahim Salih Aslan**  
3rd Year Software Engineering — Haliç University  
github.com/ibrahimsasln