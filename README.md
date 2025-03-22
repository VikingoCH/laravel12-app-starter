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

## Docs
- [Laravel 12] (https://laravel.com/docs/12.x)
- [Livewire 3] (https://livewire.laravel.com/docs/quickstart)
- [Mary-UI 2.0-Beta] (https://v2.mary-ui.com/docs/installation)
