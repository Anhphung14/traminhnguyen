# Docker Hub deployment script for Windows
# Usage: .\deploy-dockerhub.ps1 [docker-hub-username] [version]

param(
    [Parameter(Position=0)]
    [string]$DockerUsername = "yourusername",
    
    [Parameter(Position=1)]
    [string]$Version = "latest"
)

$ImageName = "minhnguyen-app"

Write-Host "Building Docker image for Docker Hub..." -ForegroundColor Green
docker build -f Dockerfile.hub -t "${DockerUsername}/${ImageName}:${Version}" .

if ($LASTEXITCODE -eq 0) {
    Write-Host "Build successful! Pushing to Docker Hub..." -ForegroundColor Green
    docker push "${DockerUsername}/${ImageName}:${Version}"
    
    if ($LASTEXITCODE -eq 0) {
        Write-Host "Successfully pushed to Docker Hub!" -ForegroundColor Green
        Write-Host "You can now run: docker run --rm -p 8000:8000 --name minhnguyen-app-container ${DockerUsername}/${ImageName}:${Version}" -ForegroundColor Yellow
    } else {
        Write-Host "Failed to push to Docker Hub!" -ForegroundColor Red
        exit 1
    }
} else {
    Write-Host "Build failed!" -ForegroundColor Red
    exit 1
}
