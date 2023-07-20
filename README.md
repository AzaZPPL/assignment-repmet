# Rempet.works backend coding challenge

Welcome to the Rempet.works backend coding challenge. 
This README is intended to; 
1. Explain the challenge :) 
2. Help you get your local setup running and prevents you from having to bootstrap a new project.


### The Challenge
Please implement a software solution that will enable cars to park in a parking lot of 10 places.

**Functional Requirements:**<br>
When a car arrives at the parking, we should see a message on the screen saying “Welcome, please go in”
when a car arrives at the parking, and the parking is full, we should see a message saying “Sorry, no place left”
if parking is full, and a car leaves, another car should be able to park

**Non-functional requirements:**<br>
- should be written in OOP PHP
- no database connection is needed, use memory
- the program should be able to run and see if requirements are implemented (up to you how you want to do that)
- keep it simple (no autoloaders, no frameworks, etc).
- add a readme.md file:

Of course, you will have to make some assumptions, please state your assumptions clearly in the Readme.md file
indicate how the program should be run in Readme.md file
any other indications you think the code reviewers will find helpful

**Tips:**<br>
- As with anything in software you need to strike a balance between extensibility/maintainability/time-spent (cost). So design the application in such a way that you can add more functionality on top of it. We will add more functionality during the interview.
- If you want to deviate from the non-functional requirements from above it’s fine, but keep in mind the time you want to spend on this (should not be more than ~1h). If do deviate please add inside Readme.md reasons for the deviation to provide insights in why you chose to go that way.

### Machine Requirements
For this challenge to run you'll have to have Docker running or have PHP running locally on your machine.
This README assumes you're using Docker to run the challenge. 

1. Start the Docker containers;
`docker compose up -d`
2. Run your tests; `docker compose exec app vendor/bin/phpunit .` 
3. Stop the docker containers; `docker compose down`

Without further ado; Good luck with the challenge and even more important; HAVE FUN! 
