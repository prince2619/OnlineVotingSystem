



# Online Voting System

## Project Description

The Online Voting System is a secure web application that allows users to register, log in, and cast their vote for their preferred candidate. Each user is restricted to voting only once to ensure fair results. The application uses a PHP backend, MySQL database, and a simple HTML/CSS frontend.

## Features

- **User Registration and Login**: Users can register with their details and log in to access the voting dashboard.
- **One Vote per User**: Once a user votes, they are marked as having voted, preventing multiple votes.
- **Real-Time Vote Counts**: The system updates vote counts in real-time for each candidate.
- **User-Friendly Interface**: Simple and responsive design for easy navigation.

## Tech Stack

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL

## Folder Structure
![image](https://github.com/user-attachments/assets/af85220d-1c46-49f3-962c-172fcdc74409)




## Installation

1. **Clone the Repository**
   
   git clone https://github.com/prince2619/OnlineVotingSystem.git

2. **Set Up the Database**
   - Import `voting_system.sql` in MySQL to create the necessary tables and initial data.

3. **Configure the Database Connection**
   - Update `api/connect.php` with your MySQL credentials:
   
     $connect = mysqli_connect("localhost", "username", "password", "database_name");
     

4. **Run the Application**
   - Start Apache and MySQL using XAMPP or a similar local server.
   - Access the application by navigating to `http://localhost/online-voting-system/`.

## Usage

1. **Register**: Users can register by filling in their details on the registration page.
2. **Login**: Registered users can log in to access their voting dashboard.
3. **Dashboard**: After logging in, users can view voting options and submit their vote if they haven't voted yet.
4. **Logout**: Users can securely log out from the application.

## Code Overview

### API Folder

- **connect.php**: Connects to the MySQL database.
- **login.php**: Authenticates users and starts a session upon successful login.
- **register.php**: Registers new users in the database.
- **vote.php**: Processes voting requests and prevents multiple votes from the same user.

### Routes Folder

- **dashboard.php**: Displays user details and voting options; restricts voting to users who haven’t voted.
- **logout.php**: Ends the session and redirects to the login page.
- **register.php**: Provides a form for user registration.

### Root Folder

- **index.php**: Main landing page linking to login and registration pages.

### CSS Folder

- **stylesheet.css**: Styles the pages, making the design responsive and user-friendly.

## Preventing Multiple Votes

The voting logic in `api/vote.php` checks each user's status before allowing them to vote. Once a vote is cast, the user's status is updated to prevent further voting.


// Example code snippet in vote.php
if ($_SESSION['userdata']['status'] == 1) {
    echo '<script>alert("You have already voted."); window.location = "../routes/dashboard.php";</script>';
} else {
    // Proceed to vote
}


## Future Enhancements

- **Admin Dashboard**: Add an admin panel for managing candidates and viewing voting results.
- **Enhanced Security**: Implement additional security features to protect user data and voting integrity.

## License

This project is licensed under the MIT License.

