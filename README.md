<p align="center">
  <img src="images/logo.png" alt="SEA Catering Logo" width="180">
</p>

<h1 align="center">🍽️ SEA Catering – Local Development Setup</h1>

This is a healthy food catering website developed for COMPFEST 17 using PHP, Bootstrap, and MySQL. Follow the steps below to run the project locally using XAMPP.

---

## 🔧 Requirements

- [XAMPP](https://www.apachefriends.org/index.html) – Apache, PHP, MySQL
- Web browser (Chrome, Firefox, etc.)
- Code editor (e.g. VSCode)
- Git (optional)

---

## 🚀 Getting Started

### 1. Clone this repository

```bash
git clone https://github.com/tommygw/sea-catering---compfest17.git
cd sea-catering---compfest17
```

---

### 2. Move the project to XAMPP `htdocs`

Move the entire project folder into:

```
C:\xampp\htdocs\sea-catering---compfest17
```

---

### 3. Import the database

1. Open [phpMyAdmin](http://localhost/phpmyadmin)
2. Create a new database: `seacatering`
3. Import the file `seacatering.sql` from the `database/` folder

---

### 4. Configure the database connection

Open the file:

```
auth/db_connect.php
```

Make sure the database credentials are set correctly:

```php
$servername = "localhost";
$username = "root";
$password = "";
$database = "seacatering";
```

---

### 5. Run the project

Start **Apache** and **MySQL** using the XAMPP Control Panel, then visit:

```
http://localhost/sea-catering---compfest17/
```

---

## 📁 Project Structure

```
sea-catering---compfest17/
├── index.php
├── home.php
├── README.md
│
├── auth/
│   ├── db_connect.php
│   └── login-register.php
│
├── css/
│   └── style.css
│
├── js/
│   └── custom.js
│
├── images/
│   └── logo.png
│
├── layout/
│   ├── footer.php
│   └── navbar.php
│
├── dashboard/
│   ├── dashboard_admin.php
│   └── dashboard_user.php
│
├── meals/
│   └── content.php
│
├── subscription/
│   └── subs.php
│
└── testimonial/
    └── testimonial.php
```
---

## 🙋 Support

If you encounter any issues, feel free to open an [Issue](https://github.com/tommygw/sea-catering---compfest17/issues) or contact the developer.

---

## 📄 License

MIT License