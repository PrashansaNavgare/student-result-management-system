# 🎓 Student Result Management System

A web-based application built with **PHP, MySQL, HTML, CSS, and DomPDF** to manage student academic records. Admins can add students, enter marks, view results, and export them as PDF.

---

## 🚀 Features

- Admin login/logout functionality
- Add student (Roll No, Name, Class)
- Enter subject-wise marks
- View results by roll number
- Generate and download PDF result sheets
- Clean and responsive UI

---

## 🛠️ Technologies Used

- Frontend: HTML5, CSS3
- Backend: PHP 8.2
- Database: MySQL (Workbench/XAMPP)
- PDF Generation: DomPDF

---

## 📁 Folder Structure

```
student-result-management-system/
├── index.html
├── login.php
├── dashboard.php
├── add_student.php
├── enter_marks.php
├── view_result.php
├── generate_pdf.php
├── logout.php
├── db.php
├── css/
│   └── style.css
├── dompdf/
├── result.sql
└── README.md
```

---

## ⚙️ Setup Instructions

1. Install XAMPP and start Apache & MySQL.
2. Place this folder inside `htdocs/`.
3. Open phpMyAdmin and import `result.sql` to create the database.
4. Access the project at: `http://localhost/student-result-management-system/index.html`
5. Login using:
   - Username: `admin`
   - Password: `admin123`

---

## ✨ Screenshots

![image](https://github.com/user-attachments/assets/ac2301db-9beb-4507-9087-d25bac1a9cb2)


## 🧩 Future Improvements

- Student login system to check results
- Grade/percentage calculation
- Class-wise student filter
- Send results by email

---

## 👩‍💻 Author

**Prashansa Navgare**  
📧 Email: navgareprashansa@gmail.com  
🌐 GitHub: [PrashansaNavgare](https://github.com/PrashansaNavgare)

---

## 📄 License

MIT License - Free for personal and educational use.
