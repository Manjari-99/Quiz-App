# Quiz App

## About
This Application follows the basic norms of a quiz - questions come serially, one after another; you get only one chance to attempt a question at one go, you cannot retry an already answered question. This quiz however has no time bound. 

This project primarily contains php and html including some tinge of css, bootstrap, jQuery and mysql. 

The backend consists of a local database. Only registered users can login and play the quiz. The option panel turns red if the answer is correct, green if its incorrect. An instructio page illustrates the usage to the users.

Link to Github Repo - [GitHub Quiz App ](https://github.com/Manjari-99/Quiz-App.git)

Watch the demo video below


https://user-images.githubusercontent.com/69254860/231454899-6d217ab7-e0a1-4d72-93af-21c4d7bae81d.mp4



## Methodology
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


### Web Pages 
##### 1. Login - The login page 
This is the first page the user sees.

![](/quizz_images/loginpage.png)

Code: [login.php](login.php)

##### 2. Login Validation - Validates the log in 

This page uses the concept of SESSION in PHP

Code: [login_validation.php](login_validation.php)

##### 3. Instruction - Contains the rules of the quiz game.

![](/quizz_images/instructions.png)

Code: [instruction.php](instruction.php)

##### 4. Quiz Start - The code to initiate the quiz and prepare the database in the back end

![](/quizz_images/question.png)

Code: [quizstart.php](quizstart.php)

##### 5. Evaluation - For evaluating the scores

Code: [evaluate.php](evaluate.php)

##### 6. Score - To display the final scores, leaderboards, user's highest score etc.

Code: [score.php](score.php)

##### 7. Logout 

Code: [logout.php](logout.php)

##### 8. CSS 

The make the website slightly more appealing.

Code: [style.css](style.css)

### Conclusion

This is a basic hands on with the objective of understanding the entire flow of a web development.
This Project has been checked and approved by Chandrashekhar Prasad who was my instructor under MyWBUT Web Development Training.

[Project Completion Certificate 2 (2).pdf](https://github.com/Manjari-99/Quiz-App/files/11213723/Project.Completion.Certificate.2.2.pdf)
