
# 🥑 Users Crud

## Process

1. Built Models and migrations for Users and countries

2. Tried to fetch countries from an API to seed countries table but didn't worked so I ended up adding a JSON file to use it for the seeding process, after doing so I also built a seeder for the Users

3. Setup the enviorment for views to work with liivewire.
- Downloaded livewire to the project
- manually made Layouts folder and app.blade.php inside it
- added Html:5 base to it including a {{$Slot}} inside the body and the bootstrap links for the stylesheets and the scripts

4. Built All views
Created all contollers and views using the following command:
```bash
php artisan make:livewire ComponentName
```


- **User.index:** Built table using bootstrap 5, and necessary buttons. then configured the controller to populate the info off of all users on db. afterwards modified blade view in order to populate an user for each column along with its respective action buttons. 

- **User.details:** For this view I first took a template from bootstrap and adjusted it to my necessities, proceeded to configure the controller and route for it to populate the specific user info.

- **User.edit:** Same as User details just that I changed the template divs for inputs or selects depending on the case, proceeded to configure the controller and finnaly tested.

- **User.create:** Once again recicled the view, literally the only thing I changed was the wire:submit.prevent xd and configured the controller and tested.

- **User.Delete:** Just added a method to delete into the controller of the UserIndex and configured the button with a wire click to call the method using the id of the user on the table row.
