# Web-Development-Project
Final project in the last month of web development (PHP, html, MySQL) class.

Student class registration system with basic interface modeled after design and function of Coursicle.

All project files are treated as if stored in a single folder except for SQL files.

## Features
- Self-contained sign up and login system
- Accept upload of
  - student "class history" (from Ellucian degree management software) as PDF
  - semester class offerings from dynamic schedule (.xls)
  - -> for reference during registration
- Course search by class name, class subject and/or number (e.g., CSIS 3743), professor and time
- Registration for multiple future semesters (provided dynamic schedule)
- Validation of
  - Prerequisite courses
  - No-repeat for courses with grade above C mandate
  - Open seats
  - No time conflict
- Views
  - Classlist
  - Weekly schedule
- GPA Calculator based on current or registered courses

## Relies on
<p>
  PDF parser (<a href="https://github.com/smalot/pdfparser">smalot/pdfparser</a>) PHP package
  <br>&nbsp;&nbsp; to extract text from class history pdf file
</p>
