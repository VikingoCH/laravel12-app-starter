# Laravel 12 App starter
## Intro
Laravel Base template based on Laravel 12 livewire starter kit.

Template for a personal App where user must be authenticad to get acces to the application. Only Admin user can add new users. 

Default Flux UI components library used by livewire starter kit is complete replaced by MaryUI.

## Authorization
Minimalist and simple authorizaiton implementation. 

### roles
- Admin:
  - Manage App setting
  - Add / Delete users
  - View / Add / Edit / Delete all records in DB
- User:
  - View all records
  - Add / Edit records in DB

### Default users
___
**Admin:** admin@app.com  
**Password:** 12345678
___
**User:** user@app.com  
**Password:** 12345678
___

## Packages
- [Laravel 12] (https://laravel.com/docs/12.x)
- [Livewire 3] (https://livewire.laravel.com/docs/quickstart)
- [Mary-UI 2.0-Beta] (https://v2.mary-ui.com/docs/installation)
- [language flags] (https://github.com/MohmmedAshraf/blade-flags)
- [Laravel Lang] (https://github.com/Laravel-Lang/common) -> Import default en-files language
- [Extract untranslated strings] (https://github.com/amiranagram/localizator) -> Used to get all english strings into en.json
- [Laravel Translations UI ] (https://github.com/MohmmedAshraf/laravel-translations) -> To be used just before release to translate into diferent languages

## Notes on Localization
**"Laravel Translation UI" package doesn't work fine when reading other languages than base language (en) from Lang-files**
1. Import en-translations from "Laravel Lang" package
2. Use "Extract untranslated strings" package to read and clean en-translations files before importing them to "Laravel Translation UI" package.
3. Import en-translations to "Laravel Translation UI" package and crete needed trasnaltion through UI.
4. Export translations files back to he APP from "Laravel Translation UI" package.

