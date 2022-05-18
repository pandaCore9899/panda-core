# panda-core v1.1 
Copyright bugger485@gmail.com
+ Requirements :
    - Docker (https://www.docker.com/products/docker-desktop)
    - Git (https://git-scm.com/downloads) 
    - MySQL Workbench (https://dev.mysql.com/downloads/workbench/) 
    - IDE (https://code.visualstudio.com/)
+ Skill : 
    - Laravel Basic (7.x version ) (https://laravel.com/docs/7.x)
    - Docker 
+ Installation : 
    - Installing environment:
        - Move to root folder
        - 
        - Open cmd( or git bash ) then : 
            - git clone https://github.com/hoangbkcntt98/panda-core.git
            - cd panda-core
            - ---- change panda-core/webapp/crontab from urlf -> crlf
            - git fetch
            - git checkout develop
            - cd panda-core
            - docker-compose up -d
            - ----waiting----
    
    - Installing source (laravel) (./src)
        - Run in cmd or gitbash : cd src
        - Duplicate file ".env.example" then readname -> ".env"
        - Run in command port (cmd or git bash) : 
            - docker exec -it laravel bash
            - composer install
            - ----waiting----
            - exit 
            - ---exit docker ---
        
    - Installing UI (JS, css)
        - Run in command port (cmd or git bash) : 
            - docker exec -it laravel node
            - npm install
            - npm run dev
    - Running Laravel command with docker : 
        - While you want to run command in laravel using "docker exec -it laravel bash"  moving to laravel environment end execute the command . 
            Eg : You want to make a controller in laravel :
                - Firstly, moving to laravel enviroment by running this command :   
                -     docker exec -it laravel bash
                - Now, you are in laravel enviroment, Let try with this cmd :
                -     ls 
                - Well, You may see files like files in the ./src . directory. 
                - Making a controller with command :
                -     php artisan make:controller TestController
                - Reference (https://laravel.com/docs/7.x)
                - If you want to exit laravel enviroment . Let use : 
                -     exit
    

