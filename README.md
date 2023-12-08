# Welcome to the CLC Technical Test

## Real-world Polling Website

This is a technical test of CTC. In this assessment, you will showcase your skills as a developer by creating a real-world polling website. Your task is
to build a User Registration, Login, and Voting poll component with specific functionalities outlined below.

---

# Project

## Run Project

To run the project you will require docker desktop. This will set up all
the parts the application needs to run including MySQL.

The SQL database will have a base file which will populate the server for development.
`.docker/mysql/docker-entrypoint-initdb.d/test.sql`

NOTE: Security: You will notice that I committed the .env file. This is just 
to simplify the setup in this case and I will generally not do this with 
a regular setup.

Clone the project and then from the root of the project run:

```shell
docker-composer up -d --build
```

The site will be available on http://localhost/test/.

### PHPMyAdmin

There is access to PHPMyAdmin @ http://localhost:8080/:

```text
Server: mysql
Username: root
Password: mysql
```

### Functionality Required:

- User Registration Page: You must design a User Registration page with the following fields:
    - [x] User first name (required)
    - [x] User last name
    - [x] Login Username (required)
    - [x] Login Password (required)
    - [x] Prevent a user from registering more than once.
    - [x] Encrypt the user's password.
    - [ ] Implement a form of spam protection, such as CAPTCHA.
    - [x] Passwords must meet the following criteria:
        - [x] At least 8 characters long
        - [x] At least 1 uppercase letter
        - [x] At least 1 special character

### Login Page:

- [x] Create a Login page for users to log in with their credentials.

- [x] Voting Poll Component: After a successful login, prompt the user to answer the following question: "What is your
  favourite coding language?"
    - [X] Provide the following options for selection:
        - PHP
        - C#
        - C
        - JAVA
        - Python
        - C++

    - [X] Implement functionality to prevent a user from voting more than once.

- [x] Poll Result Averages:

- [x] After successful vote submission, display the poll result averages based on all votes already submitted.

Technical Requirements:

- [x] Use PHP classes in an Object-Oriented Programming (OOP) coding style.
- [x] Utilize jQuery/AJAX for form submission and validation.
- [x] Host the project locally, with the path to access it being: http://localhost/test/
- [x] Employ a MySQL database with the following details:
    - Database name: test
    - Database login details:
    - Username: root
    - Password: mysql

### Time Limit

- You have a maximum of 2 hours to complete this technical test.
- NOTE: I exceeded this 2 hour limit.

### Submission

- Please organize all your PHP code and SQL queries, including table creation scripts, into a single folder. Zip the
  folder and send it via email to: carinp@clc.co.za.

### Additional Guidelines:

- Do not use any frameworks, such as Laravel; write the solution using native PHP.
- Do not rely on online examples as your solution. This test is not just about assessing your coding ability but also
  evaluating your coding style and approach.

# References

- https://snyk.io/blog/dockerize-php-application/
- https://jquery.com/download/
- https://regex101.com/