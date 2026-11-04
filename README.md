# PHP & MySQL Fundamentals

Server-side PHP exercises, from basic output up to a small user-management system with MySQL. They were written as university web-programming coursework.

## `lab5a`: PHP basics
- `lab5a_q1.php`: rendering data in an HTML table with PHP
- `lab5a_q2.php`: styled table output
- `lab5a_q3.php`: functions (calculating a rectangle's area)

## `lab_5b`: user management (CRUD)
- `register.php`: user sign-up with bcrypt password hashing
- `login.php`: session-based login with `password_verify`
- `manage_user.php`: lists all users from the database
- `update_user.php`: edits a user record with prepared statements

**Tech:** PHP · MySQL (mysqli) · HTML/CSS

## Run it locally
1. Install XAMPP, MAMP or another PHP + MySQL setup.
2. Create a database named `lab_5b` with a `users` table (`matric`, `name`, `password`, `role`).
3. Put the folder in your web root and open `lab_5b/register.php`.
