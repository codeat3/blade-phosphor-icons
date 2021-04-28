# Upgrade Guide

General steps for every update:

- Run `php artisan view:clear`

## Upgrading from Blade Icons

If you're upgrading from the original Blade Icons package there's very little steps you would need to take. The syntax for the Blade components has remained the same.

### Raw Icons

If you were using the raw exported icons you'll need to re-publish them with:

```bash
php artisan vendor:publish --tag=blade-phosphor-icons --force
```

The new way to reference them is:

```blade
<img src="{{ asset('vendor/blade-phosphor-icons/alarm.svg') }}" width="10" height="10"/>
```
