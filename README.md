
# 🥑 Excel Spreadsheet generation

## Process

### 1. ✅ Added necessary dependencies:
Using the following commands:

```
composer require phpoffice/phpspreadsheet
```
```
composer require naatwebsite/excel
```
I was sucessfully able to add the necessary dependencies that will work as helpers for me to generate **.xlsx** files including the information that's currently available on the table

### 2. 🌀 Generated and configured Necessary files:
I generated an exporter using the following command
```
php artisan make:export UsersExport --model=User
```
After generating this file I modified it to include the necessary data that I need to export using the User model. after testing a few times I noticed I was getting just the data and no identifiers for each column so I searched trough the documentation and found that I needed to add a headding and since I felt it was really plain I decided to search more and add some color using the Styles that can be used provided by the library and since it wasn't compatible with the library's Sheet I had to change it for the library's Worksheet belonging to PhpSpreadsheet library.

### 3. 📑 Added the necessary code to the controller:
In the user.index controller that's where the button to export the data will be displayed I added a new function to call and send the request to the Exporter in order to generate the download.
