# Copilot Cloud Agent Onboarding Instructions

## Repository Reality Check (read first)
- This branch currently contains a **documentation/release scaffold only**.
- Tracked files are: `README.md`, `ROADMAP.MD`, `.releaserc.json`, `.gitignore`, and `.github/workflows/release.yml`.
- The README describes a Laravel app structure, but those Laravel files are not present in this branch snapshot.

## Primary Goal for Agents
- Work with minimal, surgical changes.
- Keep documentation and release automation coherent.
- If asked to modify Laravel app code, first verify those files exist in the current branch.

## Fast Navigation
- Project overview: `/home/runner/work/athena/athena/README.md`
- Development roadmap: `/home/runner/work/athena/athena/ROADMAP.MD`
- Release config: `/home/runner/work/athena/athena/.releaserc.json`
- Release workflow: `/home/runner/work/athena/athena/.github/workflows/release.yml`

## Release & Commit Conventions
- The repo uses **semantic-release** on pushes to `main`.
- Conventional Commit prefixes control version bumps:
  - `fix:` → patch
  - `feat:` → minor
  - `feat!:` (or breaking change footer) → major
- `CHANGELOG.md` is expected to be release-managed by semantic-release tooling.

## Validation Strategy in This Snapshot
- There is currently no runnable Laravel source in this branch, so app-level commands may fail.
- Validate changes with:
  - file consistency checks
  - markdown quality/accuracy
  - workflow/config sanity
- If application code appears later, use the README flow (`composer install`, `.env` setup, migrations, then `php artisan test`).

## Errors Encountered and Workarounds
1. **Error:** Running `php artisan test` returned `Could not open input file: artisan`.
   - **Why:** `artisan` is not present in this branch snapshot.
   - **Workaround used:** Treated this task as docs/release-scaffold onboarding and validated by repository inspection instead of Laravel runtime tests.

## Known Gotchas
- `README.md` references `ROADMAP.md`, but the current file is `ROADMAP.MD` (uppercase extension). Keep filename casing in mind when linking or scripting.
- Do not assume directories listed in README project-structure are present; verify with file search first.

## Agent Operating Guidance
- Before editing, inspect current tracked files to confirm scope.
- Prefer updating existing docs/configs over creating new project structure unless explicitly requested.
- Keep changes aligned with roadmap language: AI is a collaborator for learning and reasoning, not blind code generation.
