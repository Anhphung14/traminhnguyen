# Deployment Guide - Trà khổ qua rừng Minh Nguyễn

## Google Cloud Platform Deployment

### Prerequisites
- Google Cloud Account
- Google Cloud SDK installed
- Git repository

### Steps

1. **Create Google Cloud Project**
   ```bash
   gcloud projects create your-project-id
   gcloud config set project your-project-id
   ```

2. **Enable required APIs**
   ```bash
   gcloud services enable appengine.googleapis.com
   gcloud services enable cloudbuild.googleapis.com
   ```

3. **Deploy to App Engine**
   ```bash
   gcloud app deploy
   ```

### Configuration

- **Database**: SQLite (stored in /tmp/database.sqlite)
- **Storage**: Local filesystem
- **Environment**: Production

### Environment Variables
- `APP_NAME`: Trà khổ qua rừng Minh Nguyễn
- `APP_ENV`: production
- `APP_DEBUG`: false
- `DB_CONNECTION`: sqlite
- `DB_DATABASE`: /tmp/database.sqlite

### Admin Access
- Email: admin@example.com
- Password: password

### Features
- ✅ Blog system with TinyMCE editor
- ✅ Thumbnail upload
- ✅ Responsive design
- ✅ Zalo/TikTok integration
- ✅ SQLite database (free)

### Cost
- **App Engine**: Free tier available
- **Database**: SQLite (completely free)
- **Storage**: Local filesystem (free)
- **Total**: $0/month for small traffic

