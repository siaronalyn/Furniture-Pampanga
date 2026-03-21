@echo off
echo Starting Furniture Pampanga server...
start "FurnitureServer" cmd /k "node server.js"
timeout /t 2 /nobreak >nul
start "" "http://localhost:3000/index.html"
