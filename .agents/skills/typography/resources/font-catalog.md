# Font Catalog — Recommendations by Category

## Modern Sans-Serif (Web UI)

| Font | Available Weights | Strengths | Best For |
|---|---|---|---|
| **Inter** | 100–900 | Highly legible on screen, tall x-height | Dashboard, SaaS, admin panel |
| **Plus Jakarta Sans** | 200–800 | Full Latin Extended support, modern | Corporate, local startup |
| **DM Sans** | 100–900 | Friendly, clean, geometric | Body text, mobile app |
| **Figtree** | 300–900 | Rounded, fresh, contemporary | Portfolio, startup |
| **Outfit** | 100–900 | Geometric, minimalist | Landing page, branding |
| **Syne** | 400–800 | Distinctive, editorial | Unique headlines, art direction |
| **Space Grotesk** | 300–700 | Techy, strong character | Tech brand, developer tools |
| **Nunito** | 200–900 | Rounded, very friendly | Education, kids app, onboarding |
| **Poppins** | 100–900 | Popular, geometric, safe choice | General use, widely recognized |

---

## Classic & Editorial Serif

| Font | Available Weights | Strengths | Best For |
|---|---|---|---|
| **Playfair Display** | 400–900 | High contrast, elegant, decorative | Luxury, fashion, editorial |
| **Merriweather** | 300–900 | Highly readable, screen-optimized | Blog, long-form articles, news |
| **Lora** | 400–700 | Calligraphic feel, warm | Narrative content, journals |
| **Source Serif 4** | 200–900 | Classic-to-modern transition | Documents, long-form |
| **Crimson Pro** | 200–900 | Thin, elegant, scholarly | Digital books, magazines |

---

## Monospace (Code)

| Font | Strengths | Available On |
|---|---|---|
| **JetBrains Mono** | Code ligatures, highly legible | Google Fonts |
| **Fira Code** | Popular ligatures | Google Fonts |
| **Source Code Pro** | Adobe, clean, neutral | Google Fonts |
| **Roboto Mono** | Material Design ecosystem | Google Fonts |

---

## Fonts with Full Multilingual / Latin Extended Support

The following fonts have complete Latin Extended character coverage
needed for diacritics (é, ê, è, ü, ñ, etc.):

- Plus Jakarta Sans ✅
- Noto Sans ✅ (widest coverage)
- Inter ✅
- DM Sans ✅
- Poppins ✅
- Source Sans 3 ✅

**Avoid** decorative display fonts that often lack full diacritic support.

---

## System Font Stack (No External Dependencies)

```css
/* Modern System Fonts */
font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI',
             Roboto, Oxygen, Ubuntu, sans-serif;

/* Serif System */
font-family: Georgia, 'Times New Roman', Times, serif;

/* Monospace System */
font-family: 'SF Mono', 'Fira Code', 'Fira Mono',
             'Roboto Mono', monospace;
```
