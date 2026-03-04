# MissLimSharing - Premium Homestays in Malaysia

A modern PHP-based platform for discovering and booking premium homestays across Malaysia.

## Features

- **Responsive Design** - Mobile-friendly interface with modern CSS
- **Unit Browsing** - Browse homestays by location and amenities
- **Dynamic Routing** - PHP router for clean URLs
- **Search Functionality** - Filter units by location and guest count
- **Detailed Listings** - View comprehensive unit information

## Local Development

### Requirements
- PHP 8.1+
- Web server (Apache/Nginx)
- Composer (optional, for dependency management)

### Setup

1. Clone the repository
```bash
git clone https://github.com/programmer999999999/misslimsharing
cd misslimsharing
```

2. Start PHP built-in server
```bash
php -S localhost:8000
```

3. Open http://localhost:8000 in your browser

## Deployment

### DigitalOcean App Platform

This app is configured for DigitalOcean App Platform with:
- `composer.json` - PHP dependency management
- `app.yaml` - Deployment configuration

**Steps to Deploy:**

1. Push code to GitHub
2. Create a new app in DigitalOcean App Platform
3. Connect your GitHub repository
4. Platform will automatically detect PHP and deploy

## Project Structure

```
├── index.php           # Home page
├── units.php           # Units listing page
├── unit-detail.php     # Single unit details
├── about.php          # About page
├── contact.php        # Contact page
├── router.php         # URL routing
├── data/
│   └── units.php      # Units data
├── css/
│   └── style.css      # Styles
├── js/
│   └── script.js      # Frontend scripts
├── composer.json      # PHP dependencies
└── app.yaml          # DigitalOcean config
```

## Notes

- No database required (data stored in PHP arrays)
- Images sourced from Unsplash CDN
- Static assets stored in CSS and JS folders

## License

Private project
