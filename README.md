# Admin Dashboard - PHP/Bootstrap Version

This project has been converted from a Next.js/React application to pure HTML, CSS, and JavaScript using Bootstrap framework with PHP backend.

## 🚀 Features

- **Authentication System**: User registration and login with PHP sessions
- **Dashboard**: Admin panel with three main sections:
  - Orders Management
  - Customers Management  
  - Students Management
- **Responsive Design**: Mobile-friendly interface using Bootstrap 5
- **Data Management**: JSON-based data storage for simplicity
- **Modern UI**: Dark theme with gradient backgrounds and smooth animations

## 📁 Project Structure

```
assignment/
├── index.php                 # Main dashboard page
├── auth/                     # Authentication pages
│   ├── signin.php           # Login page
│   ├── signup.php           # Registration page
│   └── logout.php           # Logout handler
├── components/               # Reusable components
│   ├── orders.php           # Orders management
│   ├── customers.php        # Customers management
│   ├── students.php         # Students management
│   └── modals.php           # Modal dialogs
├── actions/                  # Form processing handlers
│   ├── add_order.php        # Add order handler
│   ├── add_customer.php     # Add customer handler
│   └── add_student.php      # Add student handler
├── config/                   # Configuration files
│   ├── auth.php             # Authentication functions
│   └── database.php         # Data management functions
├── assets/                   # Static assets
│   ├── css/
│   │   ├── dashboard.css    # Dashboard styles
│   │   └── auth.css         # Auth page styles
│   └── js/
│       └── dashboard.js     # Dashboard JavaScript
└── data/                     # Data storage (JSON files)
    ├── users.json           # User accounts
    ├── orders.json          # Orders data
    ├── customers.json       # Customers data
    └── students.json        # Students data
```

## 🛠️ Technologies Used

- **Backend**: PHP 7.4+
- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Framework**: Bootstrap 5.3.0
- **Icons**: Bootstrap Icons 1.11.0
- **Data Storage**: JSON files (for demo purposes)
- **Authentication**: PHP Sessions

## 📋 Requirements

- PHP 7.4 or higher
- Web server (Apache/Nginx)
- XAMPP/WAMP/MAMP (for local development)

## 🚀 Installation

1. **Setup Local Server**
   ```bash
   # If using XAMPP, start Apache server
   # Place project in htdocs/assignment folder
   ```

2. **File Permissions**
   ```bash
   # Ensure data directory is writable
   chmod 755 data/
   chmod 666 data/*.json
   ```

3. **Access Application**
   - Open browser: `http://localhost/assignment/`
   - Default login: `demo@example.com` / `demo123`

## 🔐 Authentication

### Demo Credentials
- **Email**: demo@example.com
- **Password**: demo123

### Features
- User registration with validation
- Session-based authentication
- Password requirements (min 6 characters)
- Email uniqueness check

## 📊 Dashboard Features

### Orders Management
- View all orders with filtering
- Search by order ID or customer
- Status filtering (Pending, Processing, Shipped, Delivered)
- Add new orders via modal
- View, edit, delete actions

### Customers Management
- Customer listing with details
- Search functionality
- Order count and total spent tracking
- Add new customers
- Status management (Active, Inactive, Suspended)

### Students Management
- Student records with academic info
- Course and year filtering
- GPA tracking with color-coded badges
- Student ID management
- Enrollment date tracking

## 🎨 UI/UX Features

- **Dark Theme**: Professional dark color scheme
- **Responsive Design**: Works on all device sizes
- **Smooth Animations**: CSS transitions and hover effects
- **Interactive Elements**: Functional buttons, forms, and modals
- **Loading States**: Visual feedback during operations
- **Error Handling**: User-friendly error messages

## 📝 Data Management

Data is stored in JSON files for simplicity:
- `users.json` - User accounts and authentication
- `orders.json` - Order records
- `customers.json` - Customer information
- `students.json` - Student academic records

*Note: For production, consider using a proper database like MySQL or PostgreSQL.*

## 🔧 Customization

### Adding New Sections
1. Create new PHP file in `components/`
2. Add navigation link in `index.php`
3. Implement CRUD operations in `actions/`
4. Update routing logic

### Styling Changes
- Edit `assets/css/dashboard.css` for dashboard styles
- Edit `assets/css/auth.css` for authentication pages
- Bootstrap variables can be customized

### Database Integration
- Replace JSON functions in `config/database.php`
- Update authentication in `config/auth.php`
- Modify connection strings and queries

## 🐛 Troubleshooting

### Common Issues

1. **404 Errors**
   - Check Apache mod_rewrite is enabled
   - Verify .htaccess configuration

2. **Permission Errors**
   - Ensure `data/` directory is writable
   - Check file permissions

3. **Session Issues**
   - Verify PHP session path is writable
   - Check session.cookie settings

4. **Bootstrap Not Loading**
   - Check internet connection for CDN
   - Consider using local Bootstrap files

## 📱 Mobile Support

The application is fully responsive:
- Collapsible sidebar on mobile devices
- Touch-friendly interface
- Optimized table layouts
- Mobile navigation menu

## 🔄 Migration from Next.js

This project was converted from Next.js with the following changes:
- React components → PHP includes
- Tailwind CSS → Bootstrap 5
- React Router → PHP routing
- Context API → PHP sessions
- localStorage → JSON files
- JSX → Plain HTML/PHP

## 🚀 Future Enhancements

- [ ] Database integration (MySQL/PostgreSQL)
- [ ] API endpoints for mobile apps
- [ ] File upload functionality
- [ ] Advanced reporting and analytics
- [ ] Email notifications
- [ ] Role-based access control
- [ ] Multi-language support

## 📄 License

This project is open-source and available under the MIT License.

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## 📞 Support

For issues and questions:
- Create an issue in the repository
- Check the troubleshooting section
- Review the documentation

---

**Note**: This is a demonstration project. For production use, implement proper security measures, database integration, and validation.
