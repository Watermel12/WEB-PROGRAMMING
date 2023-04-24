# WEB PROGRAMMING CO3049 CC02 - HK222
![Logo BK_vien trang](https://user-images.githubusercontent.com/118788200/232408088-ee2968b0-7f18-4867-a858-6ffcfe29dc04.png)

# Please add one more file called .htaccess in CV, beside index.php. If you don't have that file, you can't use our website. Script of .htaccess is: 

RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-f

RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^(.*)$ index.php/$1 [L]

# Here is the picture for you can easily imagine.

![image](https://user-images.githubusercontent.com/118788200/233902964-d789503b-3754-4f4d-ac3a-aef3bbe51288.png)

