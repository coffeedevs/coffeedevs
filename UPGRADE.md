# Laravel 13 / PHP 8.5 upgrade

This branch targets Laravel 13.38.0 and PHP 8.5.12. It has not been deployed. Existing database schemas, application keys, uploaded files, URLs and public layouts are preserved unless an intentional correction is listed below.

Run `composer install` and `vendor/bin/phpunit` using PHP 8.5. Tests use an isolated in-memory SQLite database and create their own fixtures. Do not point tests at production. Additional parity checks were run against a private MariaDB 10.11 production snapshot.

Before deploying, reconcile the Forge deployment script, PHP selection and QuickDeploy settings; install PHP 8.5 FPM and the required extensions; preserve the existing APP_KEY, DB settings and mutable public/storage files. Use explicit PHP 8.5 for Composer scripts, scheduled commands and workers. Validate effective FPM limits, permissions, HTTPS/proxy behavior, config/route/view caches and public routes. Do not run historical database migrations blindly.

Keep an off-server code/config/database backup and a verified code/runtime rollback. Rollback must preserve uploads and database writes made after cutover. Invalidate only this application's sessions/cache, preserving other sites. All three applications currently use synchronous queues and file sessions/cache. Production PHP security patches remain installed; this branch does not replace those patches.

## Behavior and checks

Authentication uses maintained Laravel UI traits with the existing login/admin URLs and disabled registration. Password recovery is split into request/reset controllers and tested through a fake notification and token reset. The logout link now submits POST with CSRF rather than the previously broken GET link. Projects retain their image paths, 400x300 previews, year field and CRUD views. Intervention Image 4 and Spatie's optimizer replace obsolete integrations.

SparkPost remains the configured mail driver, including the legacy MAIL_DRIVER and SPARKPOST_SECRET environment keys. Transport tests send through a fake PSR-18 client and assert the recipient, message, endpoint and authorization header. SMTP preserves explicit null, TLS and SSL settings and defaults to required TLS. No real mail was sent; actual delivery remains to be verified before cutover.

The blog retains the configured 3600-second cache. Tests cover two visits sharing one fetch, failed/empty/unavailable feeds and missing image markup. DomCrawler and CSS Selector are runtime dependencies because the blog template uses them. Existing contact and Turnstile tests retain token replay, hostname/action and network-failure checks.

## Verified lock

Composer lock SHA-256: `28c714993cae869f547131e3e4a3bd57d478afd3879ffbed3607e9fbac6215bc`. Composer strict validation, audit, platform requirements on local PHP 8.5.10 and route caching pass. Clean production-only dependency installation and config/route/view cache builds pass locally. Production PHP 8.5.12/FPM checks remain pending.
