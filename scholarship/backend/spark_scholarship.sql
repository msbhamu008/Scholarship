-- Create Database
CREATE DATABASE IF NOT EXISTS spark_scholarship;

-- Use the database
USE spark_scholarship;

-- Create Registrations Table
CREATE TABLE IF NOT EXISTS scholarship_registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    class VARCHAR(10) NOT NULL,
    school_name VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    parent_email VARCHAR(255) NOT NULL,
    parent_phone VARCHAR(20) NOT NULL,
    application_id VARCHAR(4) NOT NULL UNIQUE,
    passcode VARCHAR(6) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'verified', 'rejected') DEFAULT 'pending'
);

-- Create exam settings table
CREATE TABLE IF NOT EXISTS scholarship_exam_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    is_active BOOLEAN DEFAULT FALSE,
    exam_date DATETIME NOT NULL,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    updated_by VARCHAR(50)
);

-- Insert default exam settings
INSERT INTO scholarship_exam_settings (is_active, exam_date, updated_by) 
VALUES (FALSE, '2024-08-15 10:00:00', 'system');

-- Create indexes for faster searching
CREATE INDEX idx_parent_email ON scholarship_registrations(parent_email);
CREATE INDEX idx_class ON scholarship_registrations(class);
CREATE INDEX idx_application_id ON scholarship_registrations(application_id);
CREATE INDEX idx_parent_phone ON scholarship_registrations(parent_phone);

-- Table for storing MCQ questions
CREATE TABLE IF NOT EXISTS scholarship_exam_questions (
  id int(11) NOT NULL AUTO_INCREMENT,
  class int(2) NOT NULL,
  question text NOT NULL,
  option_a text NOT NULL,
  option_b text NOT NULL,
  option_c text NOT NULL,
  option_d text NOT NULL,
  correct_answer char(1) NOT NULL,
  marks int(11) DEFAULT 1,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY class_index (class)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
