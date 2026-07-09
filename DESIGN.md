---
name: Athena Design System
description: Clean, utilitarian, and structured dashboard UI for Athena Laravel Learning Project.
colors:
  primary: "#2563eb" # bg-blue-600
  primary-hover: "#1d4ed8" # bg-blue-700
  neutral-bg: "#f1f5f9" # bg-slate-100
  surface: "#ffffff" # bg-white
  surface-dark: "#0f172a" # bg-slate-900 (header)
  sidebar-bg: "#1e293b" # bg-slate-800 (sidebar)
  text-main: "#1e293b" # text-slate-800
  text-muted: "#475569" # text-slate-600
typography:
  display:
    fontFamily: "Instrument Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "2.25rem" # text-3xl / text-4xl
    fontWeight: 700
    lineHeight: 1.2
  body:
    fontFamily: "Instrument Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "1rem" # text-base
    fontWeight: 400
    lineHeight: 1.5
rounded:
  sm: "4px"
  md: "8px" # rounded-lg
spacing:
  sm: "8px"
  md: "16px"
  lg: "24px"
components:
  button-primary:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.surface}"
    rounded: "{rounded.md}"
    padding: "8px 16px"
  button-primary-hover:
    backgroundColor: "{colors.primary-hover}"
---

## Overview
Athena's design system is clean and utilitarian, built to serve an administrative dashboard context. It prioritizes layout stability, ease of navigation, and clear data visualization.

## Colors
The color palette uses cool slate grays for structural elements and clean blues for primary actions and brand emphasis.
- **Primary Accent**: Blue (`#2563eb`) represents positive action, highlighting branding and submit buttons.
- **Structural Darks**: Deep slates (`#0f172a`, `#1e293b`) for the sidebar and header create a clear navigation shell.
- **Body & Surfaces**: Cool light gray (`#f1f5f9`) for the main content background combined with white surfaces (`#ffffff`) for cards and tables.

## Typography
The typography is driven entirely by the `Instrument Sans` font stack, offering high legibility at all scale ranges.
- **Display & Headings**: Bold, high contrast weights (600, 700) using tight tracking.
- **Body & Label**: Readable, normal weights (400, 500) with line-height set to 1.5 for dense UI readability.

## Elevation
Athena relies on flat visual hierarchy with clean, 1px slate borders (`border-slate-200`) and extremely soft, subtle drop shadows (`shadow-sm`) to define container boundaries. Large or heavy shadows are avoided.

## Components
- **Primary Buttons**: Sized at `text-sm px-4 py-2`, uses `{colors.primary}` with rounded corners.
- **Navigation Links**: Standardized with slate colors, transitioning to `#ffffff` and a darker slate background on active hover states.
- **Shell Layout**: Top header is fixed at `h-14`, sidebar is fixed at `w-64`, content expands to fill remaining space.

## Do's and Don'ts
- **Do** use strict Tailwind CSS classes matching the slate color palette.
- **Do** keep font sizes, weights, and paddings consistent across dashboard screens.
- **Don't** use over-rounded components (`border-radius: 24px+` or more).
- **Don't** use neon, highly saturated gradient text styles.
