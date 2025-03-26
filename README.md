# Laravel 12 App starter
## Intro
Laravel Base template based on Laravel 12 livewire starter kit.

Template for a personal App where user must be authenticad to get acces to the application. Only Admin user can add new users. 

Default Flux UI components library used by livewire starter kit is complete replaced by MaryUI.

___
**Disclamer:** 

I'm a self-learning hobbyist coder, that code in my free time. I love coding! so I create small web-apps for my personal use just for fun and learning.

I created this repository as a base for my web-apps.

You're free to use this repository but most likely you'll find some typical amateur mistakes or not so good coding practices.... :wink:

So, any feedback for improvement is more than welcome since will help me on my learning path... Thanks!!
___


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
**"Laravel Translation UI" package on first translations:import command is not reading any translation done in lang files, i.e. only reads complete en-files and the keys in another language. Therefore translations have to be done through package interface and copied back to lang folder.**

So following procedure is recomended before running first import:
1. Import en-translations from `Laravel Lang` package
2. Use `Extract untranslated strings` package to read and clean en-translations files before importing them to Laravel `Translation UI` package.
3. Import en-translations to `Laravel Translation UI` package and create needed trasnlations through UI.
4. Export translations files back to he APP from `Laravel Translation UI` package.

