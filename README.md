Inmode Multi-Market Themes

This repository manages a shared base WordPress theme and child themes per market (UK, FR, DE, TH, AR, IN, IT).

- Parent theme: `themes/client-theme` (shared across markets)
- Child themes (overrides only): `themes/client-theme-uk`, `themes/client-theme-fr`, ...

Local Development

1. Upload both parent and child to the target WordPress install (WP Engine).
2. Activate the child theme for the target market.
3. Keep all shared changes in the parent theme; add market-specific overrides in the child.

Structure

themes/
  client-theme         # base shared theme
  client-theme-uk      # UK child theme
    languages          # .mo/.po files
    assets             # images, fonts, etc.

Deployment

- Use SFTP/FTP via WP Engine to upload `client-theme` and the target child theme.
- Activate the child theme in wp-admin > Appearance > Themes.
- ACF: if needed, import ACF JSON via ACF Pro importer or ship via PHP registration.

Roadmap

- Add additional child themes (FR/DE/TH/AR/IN/IT).
- Set up GitHub Actions for automated deploys to staging.

