Course Evaluation System
The Story Behind the Project
In academic environments, student feedback is often collected but rarely translated into actionable data. I built this system to bridge that gap. My goal was to move beyond simple surveys and create a tool that not only captures detailed metrics but also provides instructors with clear, qualitative insights. This project represents my journey from writing basic scripts to building a synchronized, production-ready web application.

Live Application
Explore the Portal: https://sql-project-production-0f66.up.railway.app/index.php

How the System Works
The application is a dual-role platform designed for two distinct user experiences:

1. The Student Journey (The Feedback Loop)
Students register their courses and provide evaluations across five key performance indicators, including instructor effectiveness and communication clarity.

Dynamic Updates: Students can use a unique Evaluation ID to revisit and update their feedback as their perspective evolves.

Data Integrity: The system ensures that all numeric ratings (1-10) are validated before being committed to the database.

2. The Instructor Dashboard (Actionable Insights)
Instructors can retrieve specific reports where the system "reads" the raw data. It translates numeric averages into qualitative status badges (e.g., "Excellent" or "Needs Improvement").

Record Management: Instructors have the authority to archive completed evaluations, maintaining a clean and relevant data lifecycle.

Technical Spotlight
Synchronized Database Architecture
I designed a relational schema that links academic metadata to student performance metrics. A key lesson in this project was ensuring the database columns (like instructor_rating) perfectly synchronize with the PHP backend logic to prevent runtime errors.

Security & Best Practices
SQL Injection Protection: I utilized PDO (PHP Data Objects) with prepared statements for every query, ensuring that user input is never executed directly as a command.

State Management: Used PHP sessions to maintain context as users navigate between the Student and Instructor portals.

Evolution of the Project
This application underwent a significant refactoring process to move from a school-network script to a professional cloud deployment. For a detailed breakdown of the technical growth of this project, see IMPROVEMENTS.md
