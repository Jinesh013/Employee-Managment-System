<?php 
 
// Database configuration    
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'ems'); 
 
// Google API configuration 
define('GOOGLE_CLIENT_ID', '630550713082-l7c2v4n046db4a9i3h9d175mbkhhpst4.apps.googleusercontent.com'); 
define('GOOGLE_CLIENT_SECRET', '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'); 
define('GOOGLE_OAUTH_SCOPE', 'https://www.googleapis.com/auth/calendar'); 
define('REDIRECT_URI', 'http://localhost/EmpProject/admin/google_calendar_event_sync.php'); 
 

// Google OAuth URL 
$googleOauthURL = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode(GOOGLE_OAUTH_SCOPE) . '&redirect_uri=' . REDIRECT_URI . '&response_type=code&client_id=' . GOOGLE_CLIENT_ID . '&access_type=online'; 

// Start session 
if(!session_id()) session_start(); 

?>