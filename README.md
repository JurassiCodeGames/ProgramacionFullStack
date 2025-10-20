Jurassicode Games

Español:

Integrantes:
- Catalina Espalter (Coordinadora)
- Maximiliano Sosa (SubCoordinador)
- Mathew Maillot (Integrante 1)
- Gabriel Perlas (Integrante 2)
- Bianca Duarte (Integrante 3)

Instrucciones para instalar el proyecto:
1. Como primer paso estando en nuestro repositorio, es necesario elegir el branch "develop" para visualizar nuestro proyecto, para luego abrir la pestaña de Code y darle clic a "Download .zip".
2. Extraer el .zip y abrir el proyecto a través de Visual Studio Code (básicamente abrir la carpeta del proyecto).
3. Antes de iniciar el proyecto, es necesario tener instalado XAMPP 8.2.12, Composer 2.8.11 y Node.js 22.18.0.
4. Una vez con el proyecto en Visual Studio Code, encender XAMPP (Apache y MySQL).
5. Abrir la terminal en Visual Studio Code con la combinación Ctrl + Shift + P y escribir "Terminal: Select Default Profile" para luego abrir "Command Prompt (cmd.exe)".
6. Luego ejecutar los comandos: "composer install" y "npm install"
7. Crear archivo database.sqlite en /database y además generar y configurar archivo .env colocando:
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=/database/database.sqlite
DB_USERNAME=root
DB_PASSWORD=
8. Generar la app encryption key con "php artisan key:generate"
9. Penúltimo paso, crear la tabla session "php artisan session:table" y migrarlas "php artisan migrate"
10. Por último paso: levantar el proyecto con el comando "composer run dev".


Inglés:

Members:
- Catalina Espalter (Coordinator)
- Maximiliano Sosa (Sub-Coordinator)
- Mathew Maillot (Member 1)
- Gabriel Perlas (Member 2)
- Bianca Duarte (Member 3)

Instructions to install the project:
Instructions for installing the project:
1. As a first step, once in our repository, select the "Develop" branch to view our project. Then, open the Code tab and click "Download .zip."
2. Extract the .zip and open the project through Visual Studio Code (basically, open the project folder).
3. Before starting the project, you must have XAMPP 8.2.12, Composer 2.8.11, and Node.js 22.18.0 installed.
4. Once the project is installed in Visual Studio Code, launch XAMPP (Apache and MySQL).
5. Open the terminal in Visual Studio Code with the Ctrl + Shift + P combination and type "Terminal: Select Default Profile" and then open "Command Prompt (cmd.exe)."
6. Then run the commands: "composer install" and "npm install"
7. Create the database.sqlite file in /database and also generate and configure the .env file by entering:
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=/database/database.sqlite
DB_USERNAME=root
DB_PASSWORD=
8. Generate the app encryption key with "php artisan key:generate"
9. The second-to-last step is to create the session table "php artisan session:table" and migrate it "php artisan migrate."
10. Finally, run the project using the "composer run dev" command.
