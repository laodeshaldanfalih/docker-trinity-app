<a name="readme-top"></a>

<!-- PROJECT LOGO -->
<br />
<div align="center">
    <!--
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>
    -->
  <h3 align="center">Trinity App</h3>

  <p align="center">
    An awesome To Do App to Track Your Daily Activities
    <br />
    <a href="https://github.com/laodeshaldanfalih/docker-trinity-app"><strong>Explore the repo »</strong></a>
    <br />
    <br />
    <!-- <a href="https://github.com/othneildrew/Best-README-Template">View Demo</a> -->
    ·
    <a href="https://github.com/laodeshaldanfalih/docker-trinity-app/issues/new?labels=bug&template=bug-report---.md">Report Bug</a>
    ·
    <a href="https://github.com/laodeshaldanfalih/docker-trinity-app/issues/new?labels=enhancement&template=feature-request---.md">Request Feature</a>
  </p>
</div>

<!-- Menu -->
<details>
  <summary>Menu</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started-with-laravel-project">Getting Started With Laravel Project</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#setup">Installation</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started-with-cicd-tools">Getting Started With CI/CD Tools</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#setup">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

<!--[![Product Name Screen Shot][product-screenshot]](https://example.com) -->

Trinity App is a To Do List App to help you managae and track down your daily activities. This project is developed by

<ul>
    <li><a href="https://github.com/afandamirza">Mirza</a></li>
    <li><a href="https://github.com/ErawanFaqihIbrahim">Faqih</a></li>
    <li><a href="https://github.com/laodeshaldanfalih">Shaldan</a></li>
</ul>

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With

-   [![Laravel][Laravel.com]][Laravel-url]
-   [![Docker][Docker.com]][Docker-url]
-   [![Jenkins][Jenkins.com]][Jenkins-url]
-   [![phpmyadmin][phpmyadmin.com]][phpmyadmin-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED W Laravavel Project-->

## Getting Started With Laravel Project

To get a local copy up and running follow these simple example steps.

### Prerequisites

You need to download and install some of these tools to run Trinity App locally o your machine:

-   #### Docker
    visit docker official installation based on your machine: [Download](https://www.docker.com/products/docker-desktop/)

### Setup

_After donwloading all prequities, you can follow this setup steps:_

1. Clone the repo
    ```sh
    git clone https://github.com/laodeshaldanfalih/docker-trinity-app
    ```
2. Go to the clone directory
    ```sh
    cd docker-trinity-app
    ```
3. Make .env file automatically from .env.example
    ```sh
    cp .env.example .env
    ```
4. Innitialize laravel project
    ```sh
    docker compose run composer install
    ```
5. Innitialize laravel key
    ```sh
    docker compose run artisan key:generate
    ```
6. Innitialize laravel migration
    ```sh
    docker compose run artisan migrate
    ```
7. Innitialize docker images (tart program)
    ```sh
    docker compose up -d
    ```
8. Stop docker images (stop program)
    ```sh
    docker compose down
    ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->

## Usage

To look at the web view and database, you can type this line to your browser

1. Run web view

    ```sh
    http://localhost/
    ```

2. Run database PhPMyAdmin view
    ```sh
    http://localhost:8080/
    ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED WITH CICD TOOLS-->

## Getting Started With CICD Tools

To use and contribute in the automation process follow these simple example steps.

### Prerequisites

You need to download and install some of these tools to run Trinity App locally o your machine:

-   #### Docker (CD)
    visit docker official installation based on your machine: [Download](https://www.docker.com/products/docker-desktop/)
-   #### Jenkins (CI/CD)
    visit docker official installation based on your machine: [Download](https://www.jenkins.io/download/)
-   #### Terraform (Server Infrastructure)
    visit docker official installation based on your machine: [Download](https://developer.hashicorp.com/terraform/install)
-   #### AWS CLI (AWS Server Configuration) (If Necessery)
    visit docker official installation based on your machine: [Donwload](https://docs.aws.amazon.com/cli/latest/userguide/getting-started-install.html)
-   #### SonarQube (SAST Security)
    visit docker official installation based on your machine: [Download](https://drive.google.com/drive/folders/1o0SWzGVip6d5lFzhyVs2r94QqRy2Z5xU?usp=drive_link)
-   #### Sonar Scanner (SAST Security)
    visit docker official installation based on your machine: [Download](https://docs.sonarsource.com/sonarqube/latest/analyzing-source-code/scanners/sonarscanner/)

### Setup

_After donwloading all prequities, you can follow this setup steps:_

#### [Docker](https://docs.docker.com/?_gl=1*1c6kr47*_gcl_au*MTA3NjkzNTEyNC4xNzE2OTc4MTE0*_ga*MjAzODQ3MzkxMC4xNzE2OTU3MDUw*_ga_XJWPQMJYHQ*MTcxOTM4ODY3My4yNC4xLjE3MTkzODg2NzMuNjAuMC4w)

Docker is use to containerized our development environtment. In this project docker will reads docker-compose.yml and dockerfiles files.

-   ##### [docker-compose.yml](https://github.com/laodeshaldanfalih/docker-trinity-app/blob/main/docker-compose.yml)
    This file is use for configuring every image that we need to run our application. In this project we use every image to support laravel development such as nginx, mysql, phpmyadmin, etc.
-   ##### [dockerfiles](https://github.com/laodeshaldanfalih/docker-trinity-app/tree/main/dockerfiles)
    This files are use for configuring every image that have been installed. In this project we assign every image to the user and group so that it can be accessed in the server

1. Open the terminal and go to the clone directory
    ```sh
    cd docker-trinity-app
    ```
2. Make .env file automatically from .env.example
    ```sh
    cp .env.example .env
    ```
3. Innitialize laravel project
    ```sh
    docker compose run composer install
    ```
4. Innitialize laravel key
    ```sh
    docker compose run artisan key:generate
    ```
5. Innitialize laravel migration
    ```sh
    docker compose run artisan migrate
    ```
6. Innitialize docker images (tart program)
    ```sh
    docker compose up -d
    ```
7. Stop docker images (stop program)
    ```sh
    docker compose down
    ```

#### [Jenkins](https://www.jenkins.io/doc/book/)

Jenkins is use to automize every manual job (CI/CD). Jenkins have a crucial role to automation. Jenkins reads Jenkinsfile.

-   ##### [Jenkinsfile](https://github.com/laodeshaldanfalih/docker-trinity-app/blob/main/Jenkinsfile)
    This file is used to declare every job (stage) that needs to be done (automate). As you can see in this project we automate nearly everything that we need to be successfully in CI/CD.

1. Start Jenkins Service

    - [Mac](https://www.jenkins.io/download/lts/macos/)
    - [Windows](https://www.jenkins.io/download/thank-you-downloading-windows-installer-stable/)
    - [Linux (Ubuntu)](https://pkg.jenkins.io/debian-stable/)

2. Open Jenkins Window in Browser
    ```sh
    http://localhost:8080/
    ```
3. Install Plugins
    ```sh
    Go to Manage Jenkins -> System Configuration -> Plugins -> Avaiable Plugins (Download SSH Agent Plugin, SSH Build Agents, dan SonarQube Scanner)
    ```
4. Create Github and AWS SSH Key Credetials
    ```sh
    Manage Jenkins -> Sequrity -> Credentials -> Systems -> Global credentials (unrestricted) -> Add Credentials (Github and AWS)
    ```
5. Create Pipeline
    ```sh
    New Item -> Pipeline
    ```
6. Configure Pipeline
    ```sh
    Choose the pipeline -> Configure -> Pipeline -> Definition (Pipeline script from SCM) -> SCM (Git) -> Repositories (Link Repo Kita) -> Credentials (Pilih salah satu credentials yang kita buat, bisa github/aws) -> Branch to build (masukkan branch yang ingin dijalankan file Jenkinsfilenya) -> Script Path (Jenkinsfile) -> Save
    ```

#### [Terraform](https://developer.hashicorp.com/terraform?product_intent=terraform)

Terraform is use to innitialize our server insfrastructure. Terraform will reads main.tf file.

-   ##### [main.tf](https://github.com/laodeshaldanfalih/docker-trinity-app/blob/main/main.tf)
    In this file we will configure everything that we need for our aws ec2 sever. As you can see in this project we configure serve's region, name, and security

1. Innitialize terraform
    ```sh
    terraform init
    ```
2. Making sure everything is fine

    ```sh
    terraform plan
    ```

3. Create aws ec2 instance

    ```sh
    terraform apply
    ```

4. Importing existing aws ec2 inctance (if neccessery)
    ```sh
    terraform import aws_instance.my_ec2_instance <your instance id>
    ```
    ```sh
    terraform import aws_security_group.launch-wizard-4 <your vp id>
    ```

#### [Sonarqube](https://docs.sonarsource.com/sonarqube/latest/?_gl=1*vt05oj*_gcl_au*MTU4NzAwNDc4NC4xNzE4NzAwNDQw*_ga*MjAxMjUwNDY1OC4xNzE4NzAwNDQw*_ga_9JZ0GZ5TC6*MTcxOTM4NzEwNC43LjEuMTcxOTM4OTM3Ni42MC4wLjA.)

Sonarqube is use for mainting our project's security. It will ensure that our code have a rules to become as we called "clean code". Sonarqube won't read a specific file, instead it will read the entire codebase.

1. Initializee Dokcer Image for Sonarqube

    ```sh
    Go to sonarqube docker-compose.yml file -> open terminal -> docker compose up -d
    ```

1. Open Sonarqube Window
    ```sh
    http://localhots:9000/
    ```
1. Create and keep the key (it will be used for Sonar Scanner)
    ```sh
    Account -> My Account -> Security -> Enter Token (Name (Any), Type (General), Duration (Any) -> Generate -> Copy
    ```

#### Sonar Scanner

Sonarqube is use for mainting our project's security. It will ensure that our code have a rules to become as we called "clean code". Sonarqube won't read a specific file, instead it will read the entire codebase.

1. Scan Project
    ```sh
    Go to project directory -> open terminal -> sonar-scanner
    ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTRIBUTING -->

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- LICENSE -->

## License

Coming soon...

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTACT -->

## Contact

### Faqih - 5026211001@student.its.ac.id

### Mirza - 5026211126@student.its.ac.id

### Shaldan - 50262111178@student.its.ac.id

Project Link: [https://github.com/laodeshaldanfalih/docker-trinity-app](https://github.com/laodeshaldanfalih/docker-trinity-app)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Best-README-Template.svg?style=for-the-badge
[contributors-url]: https://github.com/othneildrew/Best-README-Template/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=for-the-badge
[forks-url]: https://github.com/othneildrew/Best-README-Template/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Best-README-Template.svg?style=for-the-badge
[stars-url]: https://github.com/othneildrew/Best-README-Template/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=for-the-badge
[issues-url]: https://github.com/othneildrew/Best-README-Template/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=for-the-badge
[license-url]: https://github.com/othneildrew/Best-README-Template/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/othneildrew
[product-screenshot]: images/screenshot.png
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com/
[Docker.com]: https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white
[Docker-url]: https://docker.com/
[Jenkins.com]: https://img.shields.io/badge/Jenkins-D24939?style=for-the-badge&logo=jenkins&logoColor=white
[Jenkins-url]: https://jenkins.com/
[phpmyadmin.com]: https://img.shields.io/badge/phpMyAdmin-6C78AF?style=for-the-badge&logo=phpmyadmin&logoColor=white
[phpmyadmin-url]: https://www.phpmyadmin.net/
