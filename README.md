# 🤖 AI Now — The Future of AI, Delivered Daily

![AI Now Landing Page Mockup](/home/yasir-jalal/.gemini/antigravity/brain/49efe31c-43e8-4761-9a41-4986ae2b366f/ai_now_landing_page_mockup_1774517462907.png)

**AI Now** is a modern, high-performance news platform built with Laravel 11 and Filament PHP. It provides a sleek, glassmorphic interface for consuming the latest artificial intelligence news, research, and product updates.

---

## 🚀 System Architecture

```mermaid
graph TD
    User((User)) -->|HTTPS| Cloud[Laravel Cloud / Edge Network]
    Cloud -->|Routes| App[Laravel 11 App]
    App -->|Eloquent ORM| DB[(MySQL 8.4 DB)]
    App -->|Auth/Management| Filament[Filament Admin Panel]
    App -->|Styles| Tailwind[Tailwind CSS / Vite]
```

## 📊 Database Schema (ERD)

```mermaid
erDiagram
    USER ||--o{ ARTICLE : creates
    USER {
        string name
        string email
        string password
        boolean is_admin
    }
    ARTICLE {
        string title
        string slug
        string excerpt
        text body
        string category
        string image_url
        string source_url
        string source_name
        boolean is_published
        datetime published_at
    }
```

---

## ✨ Key Features

- **💎 Premium UI/UX**: Dark mode by default with glassmorphism effects and modern typography (Inter/Outfit).
- **🛠️ Filament Admin**: A full-featured dashboard to manage articles, categories, and users at `/admin`.
- **📦 Production Ready**: Optimized for Laravel Cloud with shared database support and automated build commands.
- **⚡ Performance First**: Integrated caching for routes, config, and views, using database-driven sessions for stability.
- **🏷️ Smart Categorization**: Articles are grouped into AI News, Models, Research, and Tools.

---

## 🛠️ Local Setup & Running

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL

### Installation Steps

1. **Clone the repository**:
   ```bash
   git clone <your-repo-url>
   cd Laravel-proj
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Environment Configuration**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Edit `.env` and set your `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`.*

4. **Run Migrations & Seeders**:
   ```bash
   php artisan migrate --seed
   ```

5. **Link Storage & Build Assets**:
   ```bash
   php artisan storage:link
   npm run dev
   ```

6. **Serve the Application**:
   ```bash
   php artisan serve
   ```
   Visit `http://localhost:8000` to see the site. Access the admin at `/admin` (Default: `admin@example.com` / `password`).

---

## ☁️ Laravel Cloud Deployment Flow

```mermaid
sequenceDiagram
    participant Dev as Developer
    participant GH as GitHub
    participant LC as Laravel Cloud
    participant DB as MySQL DB

    Dev->>GH: git push origin main
    GH->>LC: Trigger Webhook
    LC->>LC: Build (composer install)
    LC->>DB: php artisan migrate --force
    LC->>DB: php artisan db:seed --force
    LC->>LC: Cache Routes & Config
    LC->>Dev: Deployment Live! 🚀
```

### Steps to Deploy
1. **Push to GitHub**: Initialize git and push to a new repo.
2. **Import Project**: Select the repo in Laravel Cloud.
3. **Provision Database**: Add a MySQL resource (Free Tier/Dev).
4. **Configure Build Command**:
   ```bash
   php artisan migrate --force && php artisan db:seed --force && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan storage:link
   ```
5. **Set Environment Variables**: Add `APP_NAME`, `APP_ENV=production`, and your `NEWS_API_KEY`.
6. **Deploy**: Click the blue **Deploy** button and watch the magic happen!

---

## 📜 License
The AI Now platform is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

