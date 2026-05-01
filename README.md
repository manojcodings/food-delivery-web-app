# 🍔 Food Delivery Web App

> A modern, full-stack food delivery application built with PHP, MySQL, HTML, CSS, and Bootstrap. Fast, responsive, and easy to deploy locally.

---

## 🚀 Live Preview

> Run locally via XAMPP — see setup guide below.

---

## ✨ Features

| Feature | Description |
|---|---|
| 🛒 Food Ordering | Browse menus and place orders effortlessly |
| 🖥️ Admin Dashboard | Full control over menu items, orders & users |
| 📦 Order Management | Track and update order statuses in real-time |
| 📱 Responsive Design | Works beautifully on mobile, tablet & desktop |
| 🔐 User Authentication | Secure login, registration & session handling |
| 🗄️ MySQL Backend | Robust relational database for all app data |

---

## 🛠️ Tech Stack

**Frontend**
- HTML5
- CSS3
- Bootstrap 5

**Backend**
- PHP 8+

**Database**
- MySQL

**Local Server**
- XAMPP (Apache + MySQL)

---

## 📂 Project Structure

```
food-delivery-app/
│
├── index.php               # Home / Landing page
├── menu.php                # Food menu listing
├── cart.php                # Shopping cart
├── order.php               # Order placement
├── login.php               # User login
├── register.php            # User registration
│
├── admin/
│   ├── dashboard.php       # Admin panel home
│   ├── manage-orders.php   # Order management
│   └── manage-items.php    # Menu item management
│
├── includes/
│   ├── db.php              # Database connection
│   ├── header.php          # Common header
│   └── footer.php          # Common footer
│
├── assets/
│   ├── css/                # Custom stylesheets
│   ├── js/                 # JavaScript files
│   └── images/             # Food images & icons
│
└── database/
    └── food_delivery.sql   # Database dump file
```

---

## ⚙️ How to Run Locally

**Step 1 — Download the Project**
```bash
git clone https://github.com/your-username/food-delivery-app.git
```
Or download the ZIP and extract it.

---

**Step 2 — Move to XAMPP**
```
Copy the project folder to:
C:/xampp/htdocs/food-delivery-app/
```

---

**Step 3 — Import the Database**
1. Open your browser and go to `http://localhost/phpmyadmin`
2. Create a new database named `food_delivery`
3. Click **Import** → Select `database/food_delivery.sql`
4. Click **Go**

---

**Step 4 — Configure DB Connection**

Open `includes/db.php` and update:
```php
<?php
$host     = "localhost";
$username = "root";
$password = "";           // your XAMPP MySQL password
$database = "food_delivery";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```

---

**Step 5 — Launch the App**

Start **Apache** and **MySQL** in XAMPP Control Panel, then open:
```
http://localhost/food-delivery-app/
```

---

## 🔑 Default Admin Credentials

```
URL      : http://localhost/food-delivery-app/admin/
Email    : admin@example.com
Password : admin123
```
> ⚠️ Change these credentials before deploying to production.

---

## 📸 Screenshots

| Home Page | Admin Dashboard |
|---|---|
| *(Add screenshot here)* | *(Add screenshot here)* |

| Menu Page | Order Page |
|---|---|
| *(Add screenshot here)* | *(Add screenshot here)* |

---

## 🤝 Contributing

Contributions are welcome!

1. Fork the repository
2. Create a new branch — `git checkout -b feature/your-feature`
3. Commit your changes — `git commit -m "Add your feature"`
4. Push to the branch — `git push origin feature/your-feature`
5. Open a Pull Request

---

## 📄 License

This project is licensed under the **MIT License** — feel free to use, modify, and distribute.

---

## 🐛 Found a Bug?

Open an [issue](https://github.com/your-username/food-delivery-app/issues) with steps to reproduce and expected behavior.

---

<div align="center">

Made with ❤️ by **Manoj Codings**

⭐ Star this repo if you found it helpful!

</div>
