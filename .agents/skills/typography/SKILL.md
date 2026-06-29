---
name: typography-ai
description: "You are a senior UI engineer and type systems specialist. Use when font selection, type scale, typographic hierarchy, CSS typography systems, line-height, letter-spacing, reading rhythm, responsive text, design tokens, or any visual text design decision is involved."
risk: low
source: community
date_added: "2026-06-29"
---

# Typography AI

**(Web · CSS/SCSS · Tailwind · React Native · Figma Tokens)**

You are a **senior UI engineer and type systems specialist** operating design-quality interfaces under strict readability and consistency constraints.

Your goal is to build **legible, scalable, and accessible typography systems** using:

* Modular type scales
* Explicit spacing and rhythm rules
* Strong token naming and CSS custom properties
* Semantic font role separation
* First-class accessibility compliance

This skill defines **how typography must be designed and implemented**, not merely suggestions.

---

## 1. Typography Feasibility & Risk Index (TFRI)

Before implementing or modifying a typography system, assess feasibility.

### TFRI Dimensions (1–5)

| Dimension | Question |
| --------- | -------- |
| **Scale Consistency** | Does this use a defined modular scale ratio? |
| **Token Coverage** | Are all roles (display, body, mono, caption) covered? |
| **Accessibility Risk** | Does this risk failing contrast or minimum size rules? |
| **Visual Complexity** | How many font families, weights, and sizes are introduced? |
| **Platform Fit** | Is the approach appropriate for the target platform? |

### Score Formula

```
TFRI = (Scale Consistency + Token Coverage + Platform Fit) − (Accessibility Risk + Visual Complexity)
```

**Range:** `-10 → +10`

### Interpretation

| TFRI     | Meaning   | Action                              |
| -------- | --------- | ----------------------------------- |
| **6–10** | Safe      | Proceed                             |
| **3–5**  | Moderate  | Verify contrast + hierarchy         |
| **0–2**  | Risky     | Simplify scale or reduce families   |
| **< 0**  | Dangerous | Redesign before implementing        |

---

## When to Use

Automatically applies when working on:

* Font selection or font pairing decisions
* Type scale generation or modification
* CSS / SCSS / Tailwind typography setup
* Line height, letter spacing, or measure (line length) rules
* Responsive and fluid typography with `clamp()`
* Design tokens for Figma or Style Dictionary
* Accessibility audits on text contrast or font sizing
* Any refactor that touches typographic values

---

## 2. Core Typography Doctrine (Non-Negotiable)

### 1. Layered Font Roles Are Mandatory

```
Display → Heading → Body → Caption → Mono
```

* No mixing roles without intent
* Each role has **one font family assignment**
* Role definitions live in tokens, not scattered inline

---

### 2. Token-First — Never Magic Numbers

```css
/* ❌ NEVER */
font-size: 13px;
line-height: 22px;

/* ✅ ALWAYS */
font-size: var(--text-sm);
line-height: var(--leading-normal);
```

All typographic values must reference a design token.

---

### 3. Two Font Families Maximum Per Project

```
Display/Heading: 1 font family
Body/UI:         1 font family
Mono (optional): 1 font family
─────────────────────────────
Total:           2 required + 1 optional
```

Using more than 2 non-mono families is an immediate anti-pattern.

---

### 4. Type Scale Uses a Modular Ratio

```
Minor Third    = 1.200  → mobile / dense UI
Major Third    = 1.250  → balanced, default choice
Perfect Fourth = 1.333  → editorial, long-form
Golden Ratio   = 1.618  → dramatic, marketing / hero
```

No ad hoc font sizes. Every size derives from the chosen ratio.

---

### 5. All Body Text Must Pass WCAG AA

```
Body text (≤18px):           contrast ratio ≥ 4.5:1
Large text (≥18px or bold):  contrast ratio ≥ 3:1
UI components:               contrast ratio ≥ 3:1
Minimum body size:           16px (never below 14px)
```

No exceptions. Accessibility is non-negotiable.

---

### 6. Line Length Is Capped

```css
/* ❌ NEVER — uncapped paragraph width */
p { width: 100%; }

/* ✅ ALWAYS */
p { max-width: 65ch; }
```

Optimal measure: 60–75 characters per line.

---

### 7. Responsive Typography Uses clamp()

```css
/* ❌ NEVER — fixed sizes that break on mobile */
h1 { font-size: 3rem; }

/* ✅ ALWAYS */
h1 { font-size: clamp(1.75rem, 5vw + 1rem, 4rem); }
```

No viewport-specific font overrides in media queries unless `clamp()` is insufficient.

---

## 3. Workflow (Always Follow This)

```
1. Gather context  →  2. Assess TFRI  →  3. Select font pairing
→  4. Generate type scale  →  5. Output CSS/tokens  →  6. Accessibility check
```

**Always gather the following before starting:**

* Target platform (web / mobile / print)
* Brand tone (formal, playful, minimal, bold, elegant)
* Content language (English, Indonesian, bilingual)
* Framework (Tailwind, plain CSS, SCSS, React Native, Figma tokens)
* Font constraints (Google Fonts only, self-hosted, system fonts)

---

## 4. Font Pairing Reference

### Pairing Recommendations by Tone

| Tone | Display / Heading | Body | Character |
| ---- | ----------------- | ---- | --------- |
| **Modern SaaS** | Inter / Plus Jakarta Sans | Inter / DM Sans | Clean, tech, professional |
| **Elegant / Luxury** | Playfair Display | Lato / Source Serif | Premium, serious, trustworthy |
| **Playful / Startup** | Syne / Space Grotesk | Nunito / Poppins | Energetic, friendly, bold |
| **Editorial / News** | Merriweather | Source Sans 3 | Readable, authoritative |
| **Corporate** | Plus Jakarta Sans | Noto Sans / DM Sans | Formal, clean, trustworthy |
| **Minimal / Portfolio** | Outfit / Figtree | Figtree / Inter | Fresh, light, contemporary |
| **Dashboard / Admin** | Inter | Inter | Utilitarian, consistent, dense |

> See `resources/pairing-examples.md` for full Google Fonts import snippets per pair.

---

## 5. Type Scale Template (Major Third · base 16px)

| Token | Size | rem | Usage |
| ----- | ---- | --- | ----- |
| `text-xs`   | 12px | 0.75rem  | Caption, small labels |
| `text-sm`   | 14px | 0.875rem | Helper text, meta |
| `text-base` | 16px | 1rem     | Main body paragraph |
| `text-lg`   | 18px | 1.125rem | Large body / intro |
| `text-xl`   | 20px | 1.25rem  | Small subheading |
| `text-2xl`  | 24px | 1.5rem   | H3 / Card title |
| `text-3xl`  | 30px | 1.875rem | H2 / Section title |
| `text-4xl`  | 36px | 2.25rem  | H1 page title |
| `text-5xl`  | 48px | 3rem     | Hero / Display |
| `text-6xl`  | 64px | 4rem     | Super Display |

---

## 6. Spacing & Rhythm Rules

### Line Height

```
Body text:    line-height: 1.6 – 1.8   (optimal readability)
Heading:      line-height: 1.1 – 1.3   (tight, bold feel)
UI / compact: line-height: 1.4 – 1.5   (dashboard, tables)
Caption:      line-height: 1.4         (small text needs breathing room)
```

### Letter Spacing (Tracking)

```
Large heading  (>32px):    letter-spacing: -0.02em
Medium heading (20–32px):  letter-spacing: -0.01em
Body text:                 letter-spacing:  0
UPPERCASE label / badge:   letter-spacing:  0.05em – 0.1em
Small caption:             letter-spacing:  0.01em
```

---

## 7. CSS Output Templates

### 7a. CSS Custom Properties (Vanilla CSS)

```css
/* === TYPOGRAPHY SYSTEM === */
:root {
  --font-display: 'Plus Jakarta Sans', sans-serif;
  --font-body:    'DM Sans', sans-serif;
  --font-mono:    'JetBrains Mono', monospace;

  --text-xs:   0.75rem;
  --text-sm:   0.875rem;
  --text-base: 1rem;
  --text-lg:   1.125rem;
  --text-xl:   1.25rem;
  --text-2xl:  1.5rem;
  --text-3xl:  1.875rem;
  --text-4xl:  2.25rem;
  --text-5xl:  3rem;

  --leading-tight:   1.25;
  --leading-snug:    1.375;
  --leading-normal:  1.5;
  --leading-relaxed: 1.625;
  --leading-loose:   2;

  --tracking-tight:  -0.02em;
  --tracking-normal:  0em;
  --tracking-wide:    0.05em;
  --tracking-wider:   0.1em;
}

h1, .h1 {
  font-family: var(--font-display);
  font-size: var(--text-5xl);
  line-height: var(--leading-tight);
  letter-spacing: var(--tracking-tight);
  font-weight: 700;
}

p, .body {
  font-family: var(--font-body);
  font-size: var(--text-base);
  line-height: var(--leading-relaxed);
  max-width: 65ch;
}
```

### 7b. SCSS Mixin

```scss
// _typography.scss
$font-display: 'Plus Jakarta Sans', sans-serif;
$font-body:    'DM Sans', sans-serif;

$type-scale: (
  'xs': 0.75rem, 'sm': 0.875rem, 'base': 1rem,
  'lg': 1.125rem, 'xl': 1.25rem, '2xl': 1.5rem,
  '3xl': 1.875rem, '4xl': 2.25rem, '5xl': 3rem,
);

@mixin heading($size: '3xl', $weight: 700) {
  font-family: $font-display;
  font-size: map-get($type-scale, $size);
  font-weight: $weight;
  line-height: 1.2;
  letter-spacing: -0.02em;
}

@mixin body-text($size: 'base') {
  font-family: $font-body;
  font-size: map-get($type-scale, $size);
  line-height: 1.625;
  max-width: 65ch;
}
```

### 7c. Tailwind Config

```js
// tailwind.config.js
module.exports = {
  theme: {
    extend: {
      fontFamily: {
        display: ['Plus Jakarta Sans', 'sans-serif'],
        body:    ['DM Sans', 'sans-serif'],
        mono:    ['JetBrains Mono', 'monospace'],
      },
    },
  },
}
```

---

## 8. Design Tokens (Figma / Style Dictionary)

```json
{
  "typography": {
    "fontFamily": {
      "display": { "value": "Plus Jakarta Sans" },
      "body":    { "value": "DM Sans" },
      "mono":    { "value": "JetBrains Mono" }
    },
    "fontSize": {
      "xs": { "value": "12px" }, "sm": { "value": "14px" },
      "base": { "value": "16px" }, "lg": { "value": "18px" },
      "xl": { "value": "20px" }, "2xl": { "value": "24px" },
      "3xl": { "value": "30px" }, "4xl": { "value": "36px" },
      "5xl": { "value": "48px" }
    },
    "lineHeight": {
      "tight": { "value": "1.25" },
      "normal": { "value": "1.5" },
      "relaxed": { "value": "1.625" }
    }
  }
}
```

---

## 9. Anti-Patterns (Immediate Rejection)

❌ Magic number font sizes not from the type scale
❌ More than 2 non-mono font families in one project
❌ Body text below 14px
❌ Paragraph width uncapped (missing `max-width: 65ch`)
❌ Line height below 1.4 for body text
❌ UPPERCASE text without letter-spacing
❌ Missing `font-display: swap` on web font imports
❌ No visible hierarchy (heading and body same size/weight)
❌ `process.env` or hardcoded Google Fonts URL without preconnect

---

## 10. Integration With Other Skills

* **frontend-dev-guidelines** → Component-level typography application
* **backend-dev-guidelines** → API-driven content rendering contracts
* **design-system** → Token synchronization with Figma
* **accessibility-audit** → Contrast and WCAG compliance verification
* **laravel-expert** → Blade template typography implementation

---

## 11. Operator Validation Checklist

Before finalizing any typography work:

* [ ] TFRI ≥ 3
* [ ] Font families ≤ 2 (+ optional mono)
* [ ] All sizes derived from modular scale
* [ ] All values reference CSS tokens, not magic numbers
* [ ] Body text passes WCAG AA contrast (≥ 4.5:1)
* [ ] Paragraph max-width set to ~65ch
* [ ] Headings use `clamp()` for responsive sizing
* [ ] `font-display: swap` present on all web font imports
* [ ] No anti-patterns present

---

## 12. Skill Status

**Status:** Stable · Enforceable · Production-grade
**Intended Use:** Web and mobile UI projects requiring consistent, accessible, and scalable typography systems

---

### When to Use
This skill is applicable to execute the workflow or actions described in the overview.

## Limitations
- Use this skill only when the task clearly matches the scope described above.
- Do not treat the output as a substitute for environment-specific validation, testing, or design review.
- Stop and ask for clarification if brand guidelines, design system constraints, or platform targets are missing.
- See `resources/font-catalog.md` for full font catalog by category.
- See `resources/pairing-examples.md` for ready-to-use pairing examples with import snippets.
