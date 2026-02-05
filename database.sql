-- Course Evaluation System Database Schema
-- Run this script to set up your database

-- Create database (if it doesn't exist)
CREATE DATABASE IF NOT EXISTS course_eval_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE course_eval_db;

-- Drop existing tables if they exist (be careful in production!)
DROP TABLE IF EXISTS course_evaluation;
DROP TABLE IF EXISTS course;

-- Create course table
CREATE TABLE course (
    course_id VARCHAR(20) PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    credits INT NOT NULL CHECK (credits BETWEEN 1 AND 6),
    mode ENUM('In-Person', 'Online', 'Hybrid') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create course_evaluation table
CREATE TABLE course_evaluation (
    evaluation_id VARCHAR(50) PRIMARY KEY,
    course_difficulty INT NOT NULL CHECK (course_difficulty BETWEEN 1 AND 10),
    course_rating INT NOT NULL CHECK (course_rating BETWEEN 1 AND 10),
    instructor_rating INT NOT NULL CHECK (instructor_rating BETWEEN 1 AND 10),
    feedback TEXT NOT NULL,
    engagement_level INT NOT NULL CHECK (engagement_level BETWEEN 1 AND 10),
    communication_level INT NOT NULL CHECK (communication_level BETWEEN 1 AND 10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data for testing (optional)
INSERT INTO course (course_id, course_name, credits, mode) VALUES
('CS101', 'Introduction to Computer Science', 3, 'In-Person'),
('MATH201', 'Calculus II', 4, 'Hybrid'),
('ENG102', 'English Composition', 3, 'Online');

INSERT INTO course_evaluation (evaluation_id, course_difficulty, course_rating, instructor_rating, feedback, engagement_level, communication_level) VALUES
('EVAL001', 7, 9, 10, 'Excellent course! The instructor was very knowledgeable and engaging. The material was challenging but rewarding.', 9, 10),
('EVAL002', 5, 8, 8, 'Good course overall. The pace was appropriate and the assignments helped reinforce the concepts.', 7, 8),
('EVAL003', 8, 7, 9, 'Very challenging course but the instructor made it manageable. Would recommend to others.', 8, 9);

-- Display success message
SELECT 'Database setup completed successfully!' AS status;
