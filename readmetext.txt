1) Clone the project using git clone command - git clone https://github.com/jain-ayush/peoplefone-exercise.git
2) after cloning install composer using composer install command
3) run migration command i.e. php artisan migrate to create database tables
4) now to add fake data run - php artisan db:seed --class UserSeeder
5) run the project using php artisan serve

6) Login using the following credentials
    email - admin@yopmail.com
    password - admin@123
7) after login you will land onto dashboard page where you can see the basic details list of all the users like name, email, number, unread notifications etc.
8) Admin can update user by clicking on Update icon under Action column, which redirect to another screen where you can edit user details.
    -> Now, after entering phone number click on send OTP button which will send a verification code on user's mobile number. Enter this OTP in below text box.
    ( we have used Twilio Api for mobile number varification.)
    -> User can check or uncheck switch icon if they want to recieve notification.
    -> click on update user button after entering all the mendatory fields. user will redirectd on dashboard after updating the user.

9) Click on the name of user will redirect you to the view notification page where you can see all notifications (Read/Unread) of that specific user with all the details.
    -> you will find a bell icon on top with all the unread count of notifications for that user, click on the bell icon will pop up a list of all the unread Notifications. click on the perticular notification will mark it as read and will change the status of that notification to Read. you can check it in the status column in list.

10) On dashboard, you will find a notification button which redirect to list notification page which will display all the available notification for all users.
    -> we can add notifications by clicking on Add Notifcations button, here we can add new notification details like type, description, expirt date, and destination users.
    -> Expiry Date - we can select expiry date for the notification. once the expiry date is passed pf any notification than we are not displaying that notification anywhere in the application.
    -> Destination User - we can select the user from the list of all users to whom we want to send the notification. we can also select the option of "All Users" which will send that notification to all users.



