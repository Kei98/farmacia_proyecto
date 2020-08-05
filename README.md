To run this project you need to (if you are a Linux or Mac user you can skip step 1):
1. Run Laragon
2. Open the project and copy the .env.example file in the same directory, but rename it to .env (on the IDE console you can run cp .env.example .env)
3. Create a database with the name of the project
4. Edit the .env file according to the info of your database
5. Run the command (in laragon console, on the project folder, or in the IDE console): composer install
6. Run the command (in laragon console, on the project folder, or in the IDE console): php artisan key:generate
7. Run the command (in laragon console, on the project folder, or in the IDE console): php artisan migrate
8. You can now go to farmacia_proyecto.test, you should see the Laravel page if not, rename this project to farmacia and try again (farmacia.test)
