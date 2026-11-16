# Reference inspection — 16 November 2026

Reference: https://bryllim.com/. This project is a healthcare adaptation of the reference's personal portfolio, not a hospital template.

## Inspection method and limits

Retrieved the publicly available HTML and compiled stylesheet. Direct automated Chrome visits received a browser-verification interstitial. Rendered the retrieved homepage markup with its original stylesheet in Chrome at 1440, 1024, 768 and 375 pixels. Inspected source and rendered snapshots of the public navigation pages. The live multi-user presence, chat service, external store purchases, remote forms, and genuine AI/network responses cannot be reproduced or verified in a static project. Their healthcare equivalents use explicitly local demonstrations or predefined content. No original personal photographs, logos, commercial product assets, articles or testimonials are redistributed.

## Verified design system

- White background (#fff), almost black text (#0a0a0a), secondary #525252/#737373, muted #a3a3a3, hairlines #e9e9e9. Dark theme uses #0c0c0f and inverted neutral tokens.
- Geist body text, Geist Mono navigation/metadata, Geist Pixel Square display headings; serif quotations.
- Desktop sidebar: fixed left, 224px wide, 28px horizontal padding, 32px top padding, right border. Navigation is grouped with thin separators. Bottom controls include keyboard shortcuts, presence/chat, theme and sound.
- Content: 672px maximum outer width including 24px side padding (624px content), centered in the area to the right of the sidebar.
- Desktop hero starts 112px from top, uses 288px image + 40px gap + remaining text. Heading approximately 41.6px; body 15px with 2.15 line height. Rounded inline icon labels and overlapping small icon tiles.
- Three-column affiliation strip and statistics strip, bordered/divided. Halftone dot dividers and fixed corner dot gradients. Numbered section headings, uppercase 11px monospace links, 56px section padding.
- Journal rows: divider, title/excerpt on left, month on right. Project deck: three overlapping cards, 328px desktop / 288px mobile; rear cards rotated ±16deg, scaled .88, front shadow and lift on hover.
- Experience: compact year/role/organization rows; wrapping outlined skill chips. Credentials: three framed, softly shaded cards. Recommendations: three serif quotation cards. Affiliations: compact logo/label units. Final contribution pattern is adapted into an illustrative community-care activity pattern.

## Responsive observations

| Width | Observed layout |
| --- | --- |
| 1440 | Fixed 224px sidebar; main inner left edge at 520px; 624px content; two-column hero. |
| 1024 | Sidebar remains visible; centered 624px content; same hero and card grids. |
| 768 | Sidebar replaced with sticky approximately 53px top bar and fullscreen navigation; hero remains two columns; max-width unchanged. |
| 375 | 24px content gutters; hero image centered at 288px, then 36px gap and text; 30px heading; affiliation items stack their icons; experience organization wraps below; credentials and quotations become one column; project rear cards clip at viewport edges. |

## Page inventory and healthcare mapping

| Reference page | Local page | Healthcare adaptation |
| --- | --- | --- |
| / | index.php | Fictional clinician profile and portfolio overview |
| /shop | shop.php | Downloadable, original visit-preparation templates |
| /blog, article pages, pagination | blog.php, post.php | Healthcare communication journal and complete local articles |
| /gear | gear.php | Illustrative everyday clinical kit |
| /resources | resources.php | Locally searchable patient-resource collection |
| /collabs | collabs.php | Community collaboration examples and demo inquiry |
| /consulting | consulting.php | Care services, FAQ and demo consultation inquiry |
| /projects | projects.php | Three care initiatives with detail dialogs and additional project grid |
| /experience | experience.php | Sample clinical timeline and expandable skills |
| /stack | stack.php | Grouped areas of care |
| /certifications | certifications.php | Clearly illustrative credential collection, detail dialogs |
| /recommendations | recommendations.php | Clearly labeled sample testimonial cards |
| /affiliations | affiliations.php | Fictional community organizations |

All original top-level navigation pages were publicly retrievable. External affiliated websites, checkout destinations and every historical blog post are outside the reconstruction scope; complete original healthcare articles replace the blog content.

## Observable interactions and implementation choices

- Hover color transitions around 200ms; entrance fade/12px rise around 700ms with 70ms stagger; scroll section reveal; page transition; reduced motion support.
- Theme selector (system/light/dark), circular reveal where supported and transition fallback. Optional synthesized UI sound, off by default.
- Fullscreen mobile navigation fades in and staggers its groups; closes by link, close button or Escape.
- Ask overlay and keyboard shortcut: adapted to a local FAQ/site search. No AI or private-data inspection.
- Typing overlay and keyboard shortcut: a real local typing test with medical-context vocabulary, elapsed time, WPM, accuracy, restart and keyboard visualization.
- Community overlay: adapted to a labeled local visitor lounge, keyboard-controlled avatar and predefined replies. No simulated live viewer counts.
- Statistic dialogs, credential dialogs and project detail dialogs support Escape, backdrop dismissal and keyboard focus management.
- Deck rear-card click/keyboard activation and arrow navigation; front-card links open working detail dialogs.
- Desktop welcome tour is implemented with an animated guide pointer and replay/dismiss controls. The stock portrait has a subtle pointer response rather than the reference's proprietary directional portrait images.
- Reference shop has a digital template and empty collection area; adaptation supplies usable original text templates. Resource links become static local detail cards; no runtime API.
- Inquiry UI validates locally and reports that nothing was sent or saved. No real appointment booking, medical advice or data processing.

## Asset policy

Self-host open-licensed Geist/Geist Mono/Geist Pixel fonts and their license notices. Use licensed Unsplash stock photography, credited in assets/ASSETS.md. Icons and dot patterns are original SVG/CSS. Alex Morgan, all organizations, experience, credentials and quotations are fictional illustrative content; a persistent footer and relevant page notes identify this.
