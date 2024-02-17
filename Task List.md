## Task List
### Design User Interface #UI
```
1. Create form layout
2. Add file input
3. Add submit button
```
### Implement File Upload Functionality #backend
```
1. Create a route for file upload
2. Write controller method to handle file upload
3. Validate uploaded file
4. Store file in temporary location
5. Return response
```
### Implement Background Processing #background_process
```
1. Install and configure Laravel Queues
2. Create a job for file processing
3. Move file from temporary location to permanent storage
4. Update database record with file information
5. Dispatch job after file upload
```
### Resources and Tools
#### Front-end

>>Bootstrap

>>jQuery

#### Back-end

>> Laravel

>> MySQL

#### Other

>> Redis or Laravel Horizon for queue management

### Procedure
>> Start by designing the user interface 
```
>>> 1.1 Create a new form layout 

>>> 1.2 Add a file input field 

>>> 1.3 Add a submit button
```
>> Implement the file upload functionality 
```
>>> 2.1 Define a new route in the web.php file 

>>> 2.2 Write a method in the controller to handle file upload 

>>> 2.3 Validate the uploaded file 

>>> 2.4 Store the file in a temporary location 

>>> 2.5 Return a success response
```
> > Implement background processing 
```
>>> 3.1 Install and configure Laravel Queues 

>>> 3.2 Create a new job class for file processing 

>>> 3.3 Write a method in the job class to move the file and update the database 

>>> 3.4 Dispatch the job after the file is uploaded
```

## Laravel code flow:
```
composer create-project laravel/laravel first-app
cd first-app
php artisan queue:table
php artisan queue:batches-table
php artisan make:model Excel -m
php artisan migrate
php artisan make:job ProcessExcel
php artisan make:controller ExcelUploadController

php artisan serve

php artisan queue:work --timeout=0

php.ini settings
memory_limit=1024m
post_max_size=300m
upload_max_file_size=200m

```