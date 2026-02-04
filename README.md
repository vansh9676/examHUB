# 🚀 ExamHub: Portable Online Examination System

**ExamHub** is a PHP-based web application designed to host mock tests for competitive exams like **SSC GD, Delhi Police, and Banking**. It features a unique portable architecture that allows the entire environment (Web Server + Database) to run directly from a USB drive.

---

## ✨ Key Features

* **Portable Architecture:** Optimized for **XAMPP Portable**. Plug your USB into any Windows machine and start working immediately.
* **Syllabus-Based Randomization:** Automatically generates 100-question sets with exact distributions (e.g., 25 GK, 25 Math, 25 Reasoning, 25 Hindi/English).
* **Bilingual Support:** Allows users to choose their language section (Hindi/English) dynamically before the test begins.
* **Bulk Uploader:** Import thousands of questions in seconds using **LibreOffice Calc** and CSV files.
* **Section-Wise Ordering:** Uses SQL `UNION ALL` logic to ensure sections appear in order (GK first, Reasoning last) without mixing.

---

## 🛠️ Technical Stack

* **Frontend:** HTML5, CSS3, Bootstrap 5
* **Backend:** PHP 8.2 (Procedural/MySQLi)
* **Database:** MySQL / MariaDB (Defaulted to Port 3307 for compatibility)
* **Data Entry:** LibreOffice Calc (CSV UTF-8)

---

## 🚀 How to Run the Site (Windows)

Follow these steps to launch the site from your USB:

### 1. Initialize the USB (First time or if Drive Letter changes)
Navigate to your `xampp` folder on the USB and double-click:
`setup_xampp.bat`
*This fixes the internal file paths to match your current USB drive letter.*

### 2. Start the Servers
Open `xampp-control.exe` and click **Start** for:
* **Apache** (Web Server)
* **MySQL** (Database)
> **Note:** If MySQL fails on Port 3306, reconfigure `my.ini` to Port **3307**.

### 3. Database Setup
1.  Go to `http://localhost/phpmyadmin` (or `localhost:3307/phpmyadmin`).
2.  Create a new database named `examhub_db`.
3.  Click the **Import** tab and upload your `.sql` backup file from the USB.

### 4. Access the Site
Open your browser and go to:
`http://localhost/examHUB/`

---

## 📂 Project Structure

```text
/xampp/htdocs/examHUB/
│
├── admin/               # Bulk Uploader & Question Management
├── includes/            # Database connection (db_connect.php)
├── css/                 # Custom styling
├── exam/                # Test taking logic (take_test.php)
└── index.php            # Home page & Search bar
