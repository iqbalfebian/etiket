@echo off
echo ========================================
echo   Starting Laravel Queue Worker
echo ========================================
echo.
echo Queue worker akan memproses email secara background
echo Tekan CTRL+C untuk stop
echo.
php artisan queue:work --verbose

