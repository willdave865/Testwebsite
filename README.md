# Testwebsite
Everything in this folder would go into the web root to be publicly displayed except from the dbinfo.ini.php (called this for security reasons) which would go in the directory above on the server to ensure that it can't be accessed. 

Currently, for development no dbinfo.ini.php is being used with projects.php on Azure Web App platform.

The .php ending to dbinfo.ini.php is overkill since no one can access it since it is in the directory above and thus not public however in the event it is accessed (somehow) then it will be processed and the script killed.

In summary: top level directory is in webroot and move dbinfo up one level (or change the code in projects.php from ../dbinfo.ini.php to dbinfo.ini.php)


Installation has been completed using  https://blogs.msdn.microsoft.com/uk_faculty_connection/2017/07/19/how-to-set-up-and-host-your-own-website-with-an-sql-server-on-azure-for-students/


