# Roadmap — Athena

This roadmap documents the learning and development journey of the Athena project.
It serves as a guide for the developer and a context source for AI assistants working in this repository.

---

## Purpose of This Repository

Athena is a personal learning project built with Laravel. The goal is not just to ship working code — it is to **understand every layer of a professional Laravel application**, from the very first route to a fully functional, industry-grade system.

This repository is designed so that:

- A developer can **build, understand, learn, implement, troubleshoot, and maintain** the application with confidence
- A developer can follow a clear progression **from zero to a real, functional web application** that meets genuine industry needs
- Every decision made in this codebase has a reason — nothing is cargo-culted or copy-pasted blindly
- An AI assistant (such as Claude Code or GitHub Copilot) can act as a **thoughtful collaborator** — offering suggestions, flagging issues, proposing revisions, and providing rational, logical explanations for every action it recommends

---

## Guiding Principles

**Learn by doing, not by reading alone.**
Each phase introduces a concept through implementation, not just theory.

**Understand before moving on.**
A feature is not "done" when it works — it is done when the developer understands *why* it works.

**Professional habits from day one.**
Naming conventions, folder structure, validation, testing, and documentation are practiced from the start — not added later.

**AI as a collaborator, not a replacement.**
AI assistants are used to accelerate understanding, suggest improvements, and challenge assumptions — not to generate code that the developer does not understand.

---

## Phase 1 — Foundation (Current)

> *Goal: Build a secure, working web application from scratch using Laravel core features only.*

### What will be built
- User login and logout (session-based authentication)
- Protected dashboard accessible only after login
- Full product CRUD: Create, Read, Update, Delete
- Soft delete for products (recoverable data)
- Input validation with clear error messages
- Database seeder with a default admin user

### What will be learned
- Laravel project structure and how each folder relates to the request lifecycle
- Routing: resource routes, named routes, and middleware
- MVC pattern: how Model, View, and Controller responsibilities are separated
- Eloquent ORM: defining models, migrations, relationships, and soft deletes
- Blade templating: layouts, components, directives, and form handling
- Authentication: how `Auth::attempt()`, session, and middleware work under the hood
- Validation: Form Requests and why they exist
- Feature testing with PHPUnit: writing tests that verify behavior, not just code

### Completion criteria
- [ ] Login and logout work correctly
- [ ] All product routes are protected by `auth` middleware
- [ ] Product CRUD is fully functional with proper validation
- [ ] All feature tests pass (`php artisan test`)
- [ ] No hardcoded credentials or unvalidated inputs exist in the codebase

---

## Phase 2 — Solidifying the Backend

> *Goal: Move from "it works" to "it is well-structured and maintainable."*

### What will be built
- Service layer to move business logic out of controllers
- Repository pattern (optional, introduced for understanding — not dogma)
- Custom exception handling and user-friendly error pages (404, 500)
- Pagination for product listing
- Search and filter on the product index
- Proper use of Eloquent scopes and accessors

### What will be learned
- When and why to use a Service class
- How Laravel handles exceptions and how to customize it
- Query optimization: understanding N+1 problems and eager loading
- Practical difference between thin controllers and fat models vs service layer
- How scopes and accessors make models more expressive

---

## Phase 3 — Real-World Features

> *Goal: Add features that reflect what real applications actually need.*

### What will be built
- User management: create, edit, deactivate users (admin only)
- Role-based access control (admin vs staff)
- Activity logging: who did what and when
- Image upload for products (with validation and storage)
- Simple transaction module: record a sale, reduce stock

### What will be learned
- Authorization: Gates and Policies
- File storage in Laravel: public disk, symbolic links, and file validation
- Database design for audit trails
- How to keep controllers clean as features grow

---

## Phase 4 — Quality and Professionalism

> *Goal: Bring the codebase to a standard where it could be handed to another developer without explanation.*

### What will be built
- Complete test coverage: unit tests, feature tests, and edge cases
- API layer with Laravel Sanctum (JSON responses for all product and auth endpoints)
- CI pipeline (GitHub Actions): run tests on every push
- Comprehensive documentation: inline comments, updated README, ADR (Architecture Decision Records)

### What will be learned
- How to write meaningful tests, not just tests that pass
- REST API design with Laravel
- Token-based authentication vs session-based
- How CI/CD works and why it matters
- How to document decisions so future-you (and AI) understands the reasoning

---

## Phase 5 — Scale and Maintenance

> *Goal: Understand what happens when a real system grows.*

### What will be built
- Queue system for background tasks (email sending, report generation)
- Caching layer for frequently read data
- Export to CSV/PDF
- Multi-tenancy consideration (structure only, not necessarily full implementation)
- Deployment setup: production environment configuration checklist

### What will be learned
- Laravel queues, jobs, and workers
- Cache strategies and when to use them
- How environment configuration works across local, staging, and production
- What "production-ready" actually means

---

## Out of Scope (For Now)

These are intentionally excluded to keep the learning focused:

- Frontend JavaScript frameworks (Vue, React, Livewire) — Blade only for now
- Microservices architecture
- Docker/containerization (may be added in Phase 4–5)
- Third-party payment integration

---

## AI Collaboration Guidelines

AI assistants working in this repository are expected to:

- **Explain** what they are doing and why before generating code
- **Flag** when a simpler approach exists, even if the developer asked for something more complex
- **Refuse** to generate code that violates the conventions in `CLAUDE.md` or `.github/copilot-instructions.md` without stating a clear reason
- **Suggest** tests alongside any new feature implementation
- **Challenge** assumptions when something seems incorrect or inconsistent — with a rational, evidence-based explanation

AI assistants should treat the developer as someone who **wants to understand**, not just someone who wants results.

---

## Progress Log

| Date | Milestone |
|---|---|
| 2026-05 | Repository initialized, documentation scaffolded |
| — | Phase 1: Login and product CRUD |
| — | Phase 1: Feature tests complete |
| — | Phase 2: Service layer introduced |
