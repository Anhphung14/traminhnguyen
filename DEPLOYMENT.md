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

### Local Development with Docker

This setup uses Docker to run the application locally with a separate configuration, using SQLite as the database.

1.  **Create `.env.docker` file**
    Create a file named `.env.docker` for the local Docker environment:
    ```dotenv
    # Environment for local Docker execution
    APP_NAME="Trà Minh Nguyễn"
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost:8000

    LOG_CHANNEL=stack
    LOG_LEVEL=debug

    # Use SQLite for local Docker
    DB_CONNECTION=sqlite
    DB_DATABASE=/var/www/html/database/database.sqlite

    CACHE_DRIVER=file
    SESSION_DRIVER=file
    QUEUE_CONNECTION=sync
    ```

2.  **Build the Docker Image**
    Build the image using the provided `Dockerfile`.
    ```bash
    docker build -t minhnguyen-app-local .
    ```

3.  **Run the Docker Container**
    ```bash
    docker run --rm -p 8000:8000 --name minhnguyen-app-container minhnguyen-app-local
    ```

4.  **Access the Application**
    Open your browser and navigate to `http://localhost:8000`.

5.  **View Logs**
    To view real-time logs from the running container, open a new terminal and run:
    ```bash
    docker logs -f minhnguyen-app-container
    ```

**Troubleshooting**

-   **Port is already allocated:** If you get an error that port 8000 is already in use, it means another service is running on that port. You can either stop the other service or run the container on a different host port:
    ```bash
    # Run on port 8081 instead
    docker run --rm -p 8081:8000 --name minhnguyen-app-container minhnguyen-app-local
    ```
    Then access the application at `http://localhost:8081`.

-   **Cannot connect to the Docker daemon:** If you see an error like `The system cannot find the file specified` or `cannot connect to the Docker daemon`, it means your Docker Desktop is not running or has encountered an issue.
    1.  **Check if Docker Desktop is running.** Make sure the whale icon is visible in your system tray.
    2.  **Restart Docker Desktop.** Right-click the Docker icon in the system tray and select "Restart".
    3.  Wait for it to turn green (running) and try the `docker run` command again.

-   **NPM Dependency Issues (ERESOLVE):** If the `docker build` command fails during `npm install` with an `ERESolve` error, it indicates a dependency conflict. The `Dockerfile` is configured to handle this with `--legacy-peer-deps`. If you encounter this locally outside of Docker, you can run `npm install --legacy-peer-deps`.

### Deploying to Docker Hub

This section describes how to build and push the application to Docker Hub for easy distribution and deployment.

1. **Login to Docker Hub**
   ```bash
   docker login
   ```

2. **Build the Image for Docker Hub**
   Build the image using the Docker Hub specific Dockerfile:
   ```bash
   docker build -f Dockerfile.hub -t anhphung/minhnguyen-app:latest .
   ```

3. **Tag the Image (Optional)**
   If you want to create additional tags:
   ```bash
   docker tag anhphung/minhnguyen-app:latest anhphung/minhnguyen-app:v1.0
   ```

4. **Push to Docker Hub**
   ```bash
   docker push anhphung/minhnguyen-app:latest
   docker push anhphung/minhnguyen-app:v1.0  # if you created this tag
   ```

5. **Pull and Run from Docker Hub**
   Anyone can now pull and run your image:
   ```bash
   # Pull the image
   docker pull anhphung/minhnguyen-app:latest
   
   # Run the container
   docker run --rm -p 8000:8000 --name minhnguyen-app-container anhphung/minhnguyen-app:latest
   ```

6. **Access the Application**
   Open your browser and navigate to `http://localhost:8000`.

### Deploying to Google Cloud Run via GCR

This section describes how to build a production-ready image and deploy it to Google Cloud Run.

1. **Authenticate with Google Cloud**
   Ensure you are authenticated with Google Cloud and have configured Docker:
   ```bash
   gcloud auth login
   gcloud auth configure-docker gcr.io
   ```

2. **Build the Production Docker Image**
   Build the image with the full GCR repository tag. This image will use the production `.env` file.
   ```bash
   # Note: This command builds the image for production.
   # It assumes your production .env is correctly set up for Cloud SQL.
   docker build -t gcr.io/neat-dryad-465708-m2/minhnguyen-app:latest .
   ```

3. **Push the Docker Image to GCR**
   Push the tagged image to your GCR repository:
   ```bash
   docker push gcr.io/neat-dryad-465708-m2/minhnguyen-app:latest
   ```

4. **Deploy to Google Cloud Run**
   Once the image is in GCR, deploy it to Cloud Run:
   ```bash
   gcloud run deploy minhnguyen-app \
     --image gcr.io/neat-dryad-465708-m2/minhnguyen-app:latest \
     --platform managed \
     --region asia-southeast1 \
     --allow-unauthenticated \
     --add-cloudsql-instances=voanhphung-portfolio:australia-southeast1:minhnguyen-app
   ```

5. **Verify the Image in GCR (Optional)**
   Check that the image is available in your GCR repository:
   ```bash
   gcloud container images list --repository=gcr.io/neat-dryad-465708-m2
   ```

