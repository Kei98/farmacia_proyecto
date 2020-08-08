To run this project you need to (if you are a Linux or Mac user you can skip step 1):

1. Run Laragon

2. Open the project and copy the .env.example file in the same directory, but rename it to .env. On the IDE's console you can run:
    ```
    cp .env.example .env
    ```
   
3. Create a database with the name of the project

4. Edit the .env file according to the info of your database

5. Run the command (in Laragon console, on the project folder, or in the IDE's console): 
    ```
    composer install
    ```
   
6. Run the command (in Laragon console, on the project folder, or in the IDE's console): 
    ```
    php artisan key:generate
    ```
   
7. Run the command (in Laragon console, on the project folder, or in the IDE's console): 
    ```
    php artisan migrate
    ```
8. You can now go to http://farmacia_proyecto.test. You should see the Laravel page. If not, you can rename this project to "farmacia" and try again (http://farmacia.test)
