# Athena Project

A personal Laravel learning project — built from scratch, one layer at a time.

Athena is not just a CRUD app. It is a structured journey through professional Laravel development: from the first migration to a fully functional, maintainable, industry-standard web application.

**Default development branch:** `dev`

---

## What This Project Is

This repository is a learning ground with real standards. Every feature is built to be understood, not just to work. The codebase evolves through deliberate phases — each one introducing new Laravel concepts, patterns, and best practices.

**Current phase:** Phase 1 — user authentication (login/logout) and product management (CRUD).

---

## 🚀 Project Highlights

- **Framework:** Built using the [Laravel](https://laravel.com/) framework
- **CI/CD Automation:** Powered by **GitHub Actions** for seamless integration and release workflows
- **Automated Versioning:** Utilizes **Semantic Versioning (SemVer)** to automatically calculate and manage release version numbers
- **Auto-generated Changelog:** Integrated with `@semantic-release/changelog` and `@semantic-release/git` to dynamically write and commit updates to `CHANGELOG.md` upon every release
- **Standardized Commits:** Enforces the **Conventional Commits** specification to trigger the release pipeline

---

## Tech Stack

| Layer | Technology |
|---|---|
| Language | PHP 8.3+ |
| Framework | Laravel 13 |
| Database | SQLite (dev), MySQL-compatible |
| Templating | Blade |
| Testing | PHPUnit via `php artisan test` |
| Auth | Laravel built-in session authentication |
| CI/CD | GitHub Actions + semantic-release |

---

## Features (Phase 1)

- **Login & Logout** — session-based authentication using `Auth::attempt()`
- **Protected routes** — all product pages require authentication via `auth` middleware
- **Product list** — view all active products in a table
- **Add product** — create a new product with name, price, and stock
- **Edit product** — update an existing product's details
- **Delete product** — soft delete (data retained in the database, not permanently removed)
- **Input validation** — all forms validated via Laravel Form Requests with clear error messages
- **Default admin user** — seeded automatically for development

---

## Getting Started

### Requirements

- PHP 8.3+
- Composer
- SQLite (included with PHP) or MySQL

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/akhromi-ahmad/athena.git
cd athena
git switch -c dev --track origin/dev

# 2. Install dependencies
composer install

# 3. Set up environment
cp .env.example .env
php artisan key:generate

# 4. Run migrations and seed default data
php artisan migrate --seed

# 5. Start the development server
php artisan serve
```

Open `http://localhost:8000` in your browser.

### Default Login

```
Email    : admin@athena.test
Password : password
```

---

## Running Tests

```bash
php artisan test
```

All feature tests use an in-memory SQLite database and reset between runs. No setup required beyond the installation steps above.

---

## 🛠️ Development Workflow

This repository uses full release automation. You do not need to manually create Git tags, write release notes, or update the changelog — GitHub Actions handles everything based on your commit messages.

### Commit Message Convention

Use the **Conventional Commits** format to tell the release pipeline what kind of change you are making:

**Bug fix** — triggers a PATCH release (e.g. `v1.0.0` → `v1.0.1`):
```bash
git commit -m "fix: resolve validation error on product edit form"
```

**New feature** — triggers a MINOR release (e.g. `v1.0.1` → `v1.1.0`):
```bash
git commit -m "feat: add soft delete with restore option for products"
```

**Breaking change** — triggers a MAJOR release (e.g. `v1.1.0` → `v2.0.0`):
```bash
git commit -m "feat!: restructure authentication to support multi-user roles"
```

### Pushing and Triggering a Release

Once committed, push to `dev`:

```bash
git push origin dev
```

The GitHub Actions runner will automatically:
1. Analyze the commit prefix
2. Bump the version number (SemVer)
3. Update `CHANGELOG.md`
4. Create a Git tag
5. Publish an official GitHub Release

### Deploying to Server

When pulling to a production server, always include `--tags` so the server recognizes the latest version:

```bash
git pull origin dev --tags
```

---

## Project Structure

```
athena/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/               ← LoginController
│   │   │   └── ProductController.php
│   │   └── Requests/               ← Form Request validation classes
│   └── Models/
│       ├── User.php
│       └── Product.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/views/
│   ├── auth/                       ← login.blade.php
│   ├── layouts/                    ← app.blade.php (main layout)
│   └── products/                   ← index, create, edit views
├── routes/
│   └── web.php
├── tests/Feature/
│   ├── Auth/
│   └── Product/
├── .github/
│   ├── workflows/                  ← GitHub Actions CI/CD pipelines
│   └── copilot-instructions.md     ← AI agent global instructions
├── ROADMAP.md                      ← development phases and learning goals
├── CHANGELOG.md                    ← auto-generated by semantic-release
└── docs/
    ├── srs.md                      ← Software Requirements Specification
    └── brd.md                      ← Business Requirements Document
```

---

## Documentation

| File | Purpose |
|---|---|
| [`ROADMAP.md`](./ROADMAP.md) | Development phases, learning goals, and progress tracking |
| [`CHANGELOG.md`](./CHANGELOG.md) | Auto-generated release history |
| [`.github/copilot-instructions.md`](./.github/copilot-instructions.md) | Instructions for AI agents working in this repo |
| [`docs/srs.md`](./docs/srs.md) | Full technical specification: routes, validation rules, DB schema |
| [`docs/brd.md`](./docs/brd.md) | Business requirements, scope, risks, and definition of done |

---

## How AI Is Used in This Project

This project uses AI (GitHub Copilot / Claude Code) as a **learning collaborator**, not a code generator. The AI is expected to:

- Explain decisions with rational reasoning before writing code
- Suggest improvements and flag potential issues
- Write code that the developer can read, understand, and maintain
- Challenge assumptions when something does not align with best practices

See [`.github/copilot-instructions.md`](./.github/copilot-instructions.md) for the full rules governing AI behavior in this repository.

---

## License

MIT
