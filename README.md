
# 🥑 Login - Register - SearchBar - Logout - DiscordNotifications

## Process

### 1. 🚨 Login and Register:
Built the custom register and login views and controllers with livewire. instaled Jetstream to the project and used their methods to auth the users, configured register to create the new user and to redirect to the login afterwards. and about the login I've created a new migration to add a new column to the user model called profile_incomplete setting it up true as default. and placed a condition that when logging in based on the state of the user decides if they should go to the users.index or to the edit page of their own account in order to complete the necessary information.

### 2. 🔍 SearchBar:
For the search bar I had to modify my User index controller adding a new function called search. added a variable called searchTerm allowing me to assing the search Term to the input field and the search action to the lens button. so when I click it the controller takes the information from the search bar to make a custom search to the database using the text entered. is great to note that it searched tought all of the fields. I finnally added a clear button that empties the text entered in the search bar

### 3. ⛔ Logout: 
For the logout button I generated a livewire component by entering the follwowing line on the terminal:
```bash
php artisan make:livewire Logout
``` 
- Setted up the controller with the auth method to end the current session and clean the current session
- Built the button itself
- Integrated it on my view by using livewire component invocation


### 4. 🔔 Discord Notifications:
for the discord Notifications I checked some of my repositories where me and my parthners have integred discord webhook notifications already. 

#### I firstly ran the following command in order to generate the Notificator:
```bash
php artisan make:listener DiscordNotification
``` 
That terminal command generated a folder and a php component where I placed the listener functions and the template for the notifications.

---

#### Then I created the Notifier running the following command:
```bash
php artisan make:service DiscordNotifier
``` 
and then I placed all of the functions that are used by the Notificator to effectively send the information embed to the Discord webhook server in order for them to send the notification I want them to send. is important to note that here we can find the construct function what is where we will load the url of our webhook, then we find the function to send the message that enwuires about taking the content or body of the message generated on the notificator but as plain text. then we have the embed which is the one that takes the information and sends it as an array with the structure discord is waiting from us and finnaly we have the send request function which is the one that enquires about sending the processed information to the requested url.

---

#### Finnaly I was left to generate the events
To make this happen I generated a folder called Events Inside the Listeners one in order to create an specified event for each eventuality on the application such as creating an user, deleten an user, updating an user logging in and registering to the application. after having all of these done I just added the event to every each controller in order to generate the notification whenever the controller meets it's function.


