# Visual comparison and verification

Completed on 16 November 2026 in local Chrome, using PHP 8.4's development server.

## Measured comparison

The public reference homepage markup and stylesheet were rendered at the same viewport dimensions as the local implementation. The live reference's browser-verification interstitial prevented a direct live screenshot comparison. These coordinates come from the rendered public markup, not from the interstitial.

| Viewport | Reference content left / width | Local content left / width | Reference heading x / y | Local heading x / y |
| --- | --- | --- | --- | --- |
| 1440 | 520 / 624px | 520 / 624px | 848 / 112px | 848 / 112px |
| 1024 | 312 / 624px | 312 / 624px | 640 / 112px | 640 / 112px |
| 768 | 72 / 624px | 72 / 624px | 400 / 165px | 400 / 165px |
| 375 | 24 / 327px | 24 / 327px | 24 / 457px | 24 / 457px |

Both versions use the 224px desktop sidebar, 288px portrait, 40px desktop hero gap, 36px mobile hero gap, 41.6px desktop heading and 30px mobile heading. Both measured heroes are 537.47px tall on desktop and 785.63px on mobile after the final line-height adjustment. Text lengths, actual images, sample organization names, and added demo disclosures necessarily differ.

## Refinements after screenshot review

- Matched homepage content and heading coordinates at all four requested widths.
- Restored wider interior containers: 896px for journal/resources/kit/guides/credentials/kind words, 768px for consultations/collabs/specialties, and 672px for initiatives/experience/affiliations.
- Matched 24px interior headings, image-plus-text journal rows, list/grid controls, grouped resource lists, and compact framed credentials.
- Replaced initial consultation artwork with the reference's rectangular cards, faded corner dot textures, low-opacity icon watermarks, and checklist rows. Matched the bordered inquiry panel and its shaded introduction.
- Matched card-deck rotations, scaling, card widths, hover lift, shadows, and mobile viewport clipping. Added accessible selection buttons without nesting interactive controls.
- Shortened homepage specialty labels to restore the compact chip layout.
- Increased muted text contrast beyond the reference's very light grays to meet the requested accessibility requirement. This is an intentional visual departure.
- Used an original fictional care-activity dot pattern in place of live GitHub statistics, a licensed stock portrait in place of proprietary gaze images, and explicit local demonstrations in place of remote services.

## Validation

See `qa-results.json`, `additional-checks.json`, and `accessibility-results.json` for machine-readable results. The main browser suite passed 71 checks and the additional suite passed 29 checks. Browser coverage includes all 12 navigation pages, complete article rendering, unknown-article 404 behavior, all internal page links and downloads, menu open/close and focus wrapping, deck click/arrow navigation, dialogs and Escape, focus restoration, FAQ/resource search and empty states, journal categories/pagination/list-grid layouts, theme switching, typing accuracy/restart/time limit, lounge movement/replies, form validity/demo feedback, and reduced motion. A final focused pass also verified native FAQ expansion, automatic welcome-tour start, tour replay, sound-control state, and a dark-theme accessibility scan (zero violations).

No horizontal overflow was found on the homepage at 1440, 1024, 768 or 375px, or on interior pages at desktop and mobile widths. No JavaScript errors or external runtime requests were observed. PHP files pass `php -l`; both JavaScript files pass `node --check`.

Automated axe-core WCAG 2 A/AA and 2.1 AA scans found no violations on the homepage, journal, consultations, resources and credentials in desktop Chrome, plus the mobile homepage and open FAQ search dialog. This is automated coverage, not a claim of a complete accessibility audit or cross-browser certification.

## Deliberate limits

This is an independent healthcare adaptation. Content, photographs, icons and project imagery intentionally differ from the technology portfolio. The reference's remote multi-user chat, live viewer counts, backend inquiry submission, purchases and externally generated responses are replaced with transparent static alternatives. Its portrait direction changes are approximated with a subtle pointer response. No original social accounts, endorsements, credentials or medical claims are copied.
