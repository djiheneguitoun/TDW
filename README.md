# TDW - Membership Management System

A comprehensive PHP-based web application for managing memberships, subscriptions, events, and member benefits with QR code integration.

## 🚀 Features

### Core Features
- **Member Management**: Complete member registration, profile management, and validation system
- **Subscription System**: Flexible membership card subscriptions with payment tracking
- **Admin Dashboard**: Comprehensive administrative interface for system management
- **QR Code Integration**: Generate and scan QR codes for member verification
- **Donation Management**: Track and manage member donations with receipt generation
- **Event Management**: Create and manage events for members
- **Partner System**: Manage business partnerships and collaborations
- **Member Benefits**: Exclusive advantages and special offers for members

### User Roles
- **Members**: Access to benefits, event participation, donation capabilities
- **Administrators**: Full system management and member validation
- **Partners**: Business partnership management and collaboration features

### Technical Features
- **Responsive Design**: Mobile-friendly interface using Tailwind CSS
- **Secure Authentication**: User login and session management
- **Database Integration**: MySQL database with comprehensive data management
- **File Uploads**: Support for payment receipts and document management
- **Statistics Dashboard**: Data analytics and reporting capabilities

## 🛠️ Technologies Used

- **Backend**: PHP (Object-Oriented, MVC Architecture)
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **CSS Framework**: Tailwind CSS
- **QR Code**: Endroid QR Code Library
- **Dependency Management**: Composer
- **Server**: Apache (with .htaccess configuration)

## 📋 Prerequisites

- PHP 7.2 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Composer (for dependency management)

## 🔧 Installation

### 1. Clone the Repository
```bash
git clone https://github.com/djiheneguitoun/TDW.git
cd TDW
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Database Setup

1. Create a MySQL database named `TDW`
2. Import the database schema:
```bash
mysql -u your_username -p TDW < TDW.sql
```

### 4. Configuration

1. Update database configuration in `config/database.php`:
```php
private $host = "localhost";
private $db_name = "TDW";
private $username = "your_username";
private $password = "your_password";
```

### 5. Web Server Setup

- Place the project in your web server's document root
- Ensure Apache mod_rewrite is enabled for .htaccess support
- Set appropriate permissions for the `uploads/` directory:
```bash
chmod 755 uploads/
```

## 🗂️ Project Structure

```
TDW/
├── config/
│   └── database.php          # Database configuration
├── controllers/              # MVC Controllers
│   ├── HomeController.php
│   ├── AdminController.php
│   ├── MembreController.php
│   └── ...
├── models/                   # Data Models
│   ├── Membre.php
│   ├── Abonnement.php
│   ├── Admin.php
│   └── ...
├── views/                    # View Templates
│   ├── home.php
│   ├── admin_dashboard.php
│   ├── includes/
│   └── ...
├── assets/                   # Static assets
├── public/                   # Public files
├── uploads/                  # File uploads directory
├── vendor/                   # Composer dependencies
├── TDW.sql                   # Database schema
├── composer.json             # Composer configuration
├── tailwind.config.js        # Tailwind CSS configuration
└── .htaccess                 # Apache configuration
```

## 🚦 Usage

### For Members
1. **Registration**: Create a new member account
2. **Subscription**: Apply for membership cards with payment
3. **Benefits**: Access exclusive member advantages
4. **Events**: Participate in member events
5. **Donations**: Make donations to support the organization

### For Administrators
1. **Login**: Access the admin dashboard
2. **Member Management**: Validate and manage member accounts
3. **Subscription Approval**: Review and approve membership applications
4. **Statistics**: View system analytics and reports
5. **Content Management**: Manage announcements and benefits

### For Partners
1. **Registration**: Create partner accounts
2. **Collaboration**: Manage partnership activities
3. **Benefits**: Offer special deals to members

## 🔐 Default Admin Access

After setting up the database, you can access the admin panel with the default administrator account created in the SQL dump.

## 📊 Database Schema

The system includes the following main tables:
- `utilisateurs` - User accounts
- `membres` - Member profiles
- `administrateurs` - Administrator accounts
- `abonnements` - Membership subscriptions
- `cartes` - Membership cards
- `dons` - Donations
- `evenements` - Events
- `partenaires` - Partners
- `avantages` - Member benefits

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 🐛 Known Issues

- Database charset should be set to UTF-8 for proper French character support
- File upload directory permissions may need adjustment depending on server configuration

## 🔄 Future Enhancements

- Email notification system
- Advanced reporting features
- Mobile application
- Payment gateway integration
- Multi-language support

## 📞 Support

For support and questions, please open an issue in the GitHub repository.

---

**Note**: This application is designed for membership organizations and includes features specific to French-speaking communities, as evidenced by the French language elements in the database and interface.