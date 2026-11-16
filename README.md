# Bernadette Jazmine MDG — healthcare portfolio

A native PHP, HTML, CSS and vanilla JavaScript healthcare adaptation of [bryllim.com](https://bryllim.com/), personalized for **Bernadette Jazmine Mapindan De guzman**, with **Bernadette Jazmine MDG** as the display name. All content is predefined. No Composer, npm, framework, database, API, authentication, or server-side processing is needed.

## Run locally

From this directory:

```powershell
php -S 127.0.0.1:8000 -t .
```

Open http://127.0.0.1:8000. For XAMPP, place this folder in `htdocs`, start Apache, and open `http://localhost/bernie/`. For Laragon, put it in the web root and use its local site URL. All links and asset paths are relative, so installation in a subdirectory works. PHP 8.0+ is recommended.

## Edit content

- `data/content.php`: profile, navigation, journal articles, projects, experience, specialties, credentials, sample quotations, resources, services, and FAQ answers.
- `$sectionVisibility` in `data/content.php` temporarily hides Credentials, Kind words, Affiliations, and the community activity pattern. Their content is retained; set the relevant flag to `true` to restore it. Hidden pages redirect to the homepage.
- `index.php`: homepage composition.
- `includes/`: shared header, navigation, interior page layouts, forms, footer, and dialogs.
- `assets/css/`: base design, motion, responsive rules, measured interior page refinements, and the mint-green/white palette in `theme.css`.
- `assets/css/typography.css`: professional Inter typography for headings, navigation, body text, and controls. The font is served locally with its license in `assets/fonts/`.
- `assets/js/`: local interactions and animations; no network calls.
- `assets/downloads/`: three original, downloadable text templates.

Navigation pages have matching `.php` entry points. `post.php?slug=care-starts-with-listening` renders an article from the static array. Unrecognized article slugs return a real 404.

The “Let’s connect” navigation item opens `contact.php`, which combines professional inquiries and collaborations in one contact page. The previous `collabs.php` and `consulting.php` URLs redirect there.

## Interactions

Desktop sidebar; full-screen mobile menu; system/light/dark themes with circular reveal where supported; optional UI sound; welcome tour; interactive three-card deck (click, arrows, swipe); project and credential dialogs; local FAQ search (`Ctrl/⌘ + K`); 30-second typing test (`Ctrl/⌘ + J`); local resource search; journal pagination, categories and list/grid layouts; expandable FAQs; functional downloads; client-side form validation and demo feedback; local community lounge with movable avatar and predefined replies.

Dialogs support native focus trapping, Escape, close controls, backdrop dismissal, and focus restoration. The menu supports a keyboard focus loop. Reduced-motion preferences suppress transitions, scroll reveals, the guide pointer, and portrait motion. Sound defaults to off.

Only theme/sound preferences use browser local storage. Tour state uses session storage. Form fields and lounge replies are never persisted or transmitted. There are no live visitor counts or real appointments.

The portrait automatically alternates between pixel styling and the original photo every seven seconds, starting with pixel styling. A 0.9-second crossfade blends the two views without moving or changing the crop. The source image is never modified. Cycling pauses when the tab is hidden; reduced-motion preferences keep the pixel view static.

The current default is the light green and white theme. The theme selector also offers a coordinated dark-green variant and system preference. See `docs/green-theme-review.json` and `docs/screenshots/green-*` for the palette review.

## Design documentation and verification

- `docs/reference-inspection.md`: inspection method, design system, page mapping, observed behavior, and limitations.
- `docs/visual-comparison.md`: measured comparison and refinement notes.
- `docs/qa-results.json`: browser checks, responsive dimensions, JavaScript errors and external requests.
- `docs/screenshots/`: desktop/tablet/mobile screenshots and representative interaction states.
- `assets/ASSETS.md`: stock photo sources and font licenses.

The live reference displayed an automated-browser verification screen. Its publicly retrieved markup and original stylesheet were rendered in Chrome for visual inspection. Exact live remote services and the proprietary directional portrait were not reproduced. Healthcare content and licensed stock images intentionally replace the reference's technology content and personal assets.

Bernadette’s supplied name is used in the profile, navigation, page metadata, article bylines, welcome tour, and footer. Her full name remains visible under the main heading and in every page footer. The About me page, homepage introduction, current role, Biology degree with a Zoology major, and six professional strengths use her supplied background. Professional Experience (`professional-experience.php`) highlights her Virtual Safety Companion role, overview, fourteen responsibilities across four areas, and reflections on patient safety. It is also featured in homepage section 03. The Leadership page (`leadership.php`) shares her story of continuous learning, openness to greater responsibility, four ways to contribute to the team, and view on leadership. Other concept projects, credential cards, affiliations, and quotations remain sample content. This site does not provide medical advice or real clinical services.
