# Quiz App

## About
An interactive and colourful quiz app. Contains concepts of web development and database management. Questions are added and answers are maintained through the database. Every user has to register and registered users can log in to start the quiz. An instruction page pops up. The user gets four options for each question. The screen panel color indicates whether the answer is correct or incorrect( green for correct answer and red for incorrect). A user database maintains the leaderboards. After the quiz, the user can see his/her score along with their rank in the leaderboards.



https://user-images.githubusercontent.com/69254860/231437384-256e9ccb-362a-46d7-9f2b-06a31d6061c4.mp4


## Tools Used 
### XAMPP
XAMPP is a free and open-source cross-platform web server solution stack package.
We will be running Apache and MySql through Xampp for this particular project.
![](/quizz_images/xamppcontrol.png)

### SQL Administration through PhpMyAdmin
Here we have created 5 tables namely:-
* users - To contain the information about registered users.
* score - To contain information about respective scores.
* questions - Admin can control the list of questions to be displayed in the app.
* answers - The options and the correct answer for each question are listed here.
* answered - The status of each gameplay for the corresponding user (insert - update); stores a 0 for wrong input, 1 otherwise
![](/quizz_images/phpmyadmin.png)
