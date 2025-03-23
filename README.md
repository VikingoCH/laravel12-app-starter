# Laravel 12 App starter
## Intro
Laravel Base template based on Laravel 12 livewire starter kit.

Template for a personal App where user must be authenticad to get acces to the application. Only Admin user can add new users. 

Default Flux UI components library used by livewire starter kit is complete replaced by MaryUI, i.e. FluxUI components are not used at all.

## Authorization
Minimalist and simple authorization implementation. Admin role is manage by added column is_admin (Boolean) in users table.

Only one permission "manage_users" is defined and handled by Laravel Gates. 

### roles
- Admin:
  - Manage / Register / Remove users

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
