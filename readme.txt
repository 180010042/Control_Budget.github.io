Control Budget Website
-------------------------------------------------------------------------------------------------------------------------------
                                          A Synopsis
Objective/ Aim:
This project aims at developing a simple expense manager responsive website that can be used by all for tracking their expenses accordingly. The website can be used to plan out the expenses for a group of people. The user can add the initial budget for the expenses and give it a title accordingly. Further, the user can also add bills under the given budget and track her expenses accordingly. 


Software Requirements:
  * Operating System: Windows 10
  * Web Technologies: Html, php, CSS, Bootstrap
  * Web Server: Wampserver
  * Database: MySQLi
  * Software: NetBeans IDE , phpMyAdmin

Navigation Structure:
The website contains the following navigation structure. 
1. Index Page  
  * Start Today button
  * Navigation Bar
     1. About us link
     2. Sign up link
     3. Login link 

2. Sign up Page 
  * Registration Form
     1. Name field
     2. Email field 
     3. Password field
     4. Phone number field
     3. Login Page 
  * Login form
     1. Email field
     2. Password field
     4. About Us Page
  * Contact details
  * Information about developers and website
5. Home Page 
For logged out user
  * Panel having portal for creating new plan
For logged in user
  * Panels showing existing plans
     1. Title of the plan
     2. Budget
     3. Date
  * Navigation Bar
     1. About us link
     2. Change password link
     3. Log out link
     6. Create New Plan Page
  * Form to create new plan
     1. Initial budget of plan
     2. Number of people 
     7. Plan Details Page 
  * Form to fill form details
     1. Title
     2. Starting date
     3. Last date
     4. Initial budget
     5. Number of people
     6. Name field for each person
     8. View Plan Page
  * Panel showing plan details
     1. Title
     2. Initial budget
     3. Remaining amount
     4. Date
  * Expense Distribution button - To open Expense Distribution Page
  * Add New Expense form
     1. Title of expense
     2. Date
     3. Amount spent
     4. Select name field
     5. Portal for uploading bill
  * Panel showing expenses if exist
     1. Title
     2. Amount spent by person
     3. Person name
     4. Date of transaction
     5. Link to the bill
     9. Expense Distribution Page 
  * Panel showing expense details
     1. Title of plan
     2. Initial budget
     3. Amount spent by each individual
     4. Total amount spent
     5. Remaining amount
     6. Individual shares
     7. Amount each person owes or gets back
     10. Change Password Page 
  * Form to reset password
     1. Old password field
     2. New password field
     3. Confirming new password field

Functional Description:
  * Everybody has access to the Index page. Registration is offered.
  * Logged in users can create plans, add friends, view plan details, add expenses, upload bills, analyse individual shares and change passwords. 

Guidelines for new users
To register -
   Index Page - Click on 'Sign Up' menu from navigation bar. -> Signup Page - Fill your details here and submit. -> Home Page -> Click on plus icon in front of 'create new plan' to create new plan.
  
Guidelines for registered users
For logged out users
To login -
   Index Page - Click on 'Login' menu from navigation bar. -> Login Page - Fill your correct details and login.
   OR
   Index Page - Click on 'Start Today' button. -> Login Page - Fill your correct details and login.  

For logged in users
To create new plan -
   Home Page - Click on plus icon on bottom right corner of the page to create new plan -> Create New Plan Page - Fill the form and submit. -> Plan Details Page - Fill your plan details and submit.
To view plan details -
   Home Page - Click on 'View Plan' button. -> View Plan Page - Fill 'Add New Expense' form and submit. -> Expense Distribution Page - This page shows total amount spent, remaining amount, individual shares and amount each person owes or get back.
To change password -
   Home Page - Click on 'Change Password' menu from navigation bar. -> Change Password Page - Fill the form and click on change button.
To logout -
   Home Page - Click on 'Logout' menu from navigation bar.  

Project Work:
Coding part
The project contains following coding files - 
  * CSS folder - Contains all the images used in project. 
     1. index.css - Contains styling elements of website.
  * Includes folder - Contain code files which are common in other files.
     1. header.php - Contains code for navigation bar.
     2. footer.php - Contains code for footer of pages.
     3. duration.php - Contains function to change format of date.
     4. common.php - Contains code for connection with database and for starting session.
  * index.php - This file contains code for index page.
  * home.php - This file contains code for home page.
  * about_us.php - This file contains code for about us page.
  * signup.php - This file contains code for sign up page.
  * signup_script.php - This file has a script to save data in database and backend validations for sign up form.
  * login.php - This file contains code for login page.
  * login_submit.php - This file has script to match data from database and backend validations for login form.
  * create_new_plan.php -  This file contains code for create new plan page.
  * plan_details.php - This file contains code for plan details page.
  * plan_submit.php - This file has a script to save data in database for plan details form.
  * view_plan.php - This file contains code for view plan page and add new expense page.
  * view_plan_submit.php - This file has a script to save data in database for add new expense form.
  * bill.php - This file contains code for showing uploaded bill.
  * expense_distribution.php - This file contains code for expense distribution page.
  * change_password.php - This file contains code for change password page.
  * change_password_script.php - This file has a script to change password, save it in the database and backend validations for change password form.
  * logout.php - Contains code to logout by destroying current session. 


Database 
  * Name of data base - budget
  * Use - Data collected from all the forms in website is stored in this database.
  * Tables - users, users_plan, users_group, expense
  * Table structure - 
  * users (parent table) -> users_plan (child table)
  * users_plan (parent table) -> users_group (child table)
  * users_group (parent table) -> expense (child table)

  users table
  columns -
  * id   
  * name      
  * email  
  * password 
  * contact

  users_plan table
  columns -
  * id
  * user_id
  * title
  * start_date
  * end_date
  * initial_budget
  * no_of_people
	
  users_group table
  columns -
  * id
  * plan_id
  * name
  * total_amount_spent
	
  expense table
  columns -
  * id
  * person_id
  * title
  * date
  * amount_spent
  * bill
	
--------------------------------------------------------------------------------------------------------------	


