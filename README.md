# MyWebsite
This is my personal website
Everything in this folder would go into the web root to be publicly displayed except from the dbinfo.ini.php (called this for security reasons) which would go in the directory above on the server to ensure that it can't be accessed.
The .php ending to dbinfo.ini.php is overkill since no one can access it since it is in the directory above and thus not public however in the event it is accessed (somehow) then it will be processed and the script killed.
I haven't put in the details into this ini as I don't want these to be public on GitHub but it is clear what I would do to complete the file.

In summary: top level directory is in webroot and move dbinfo up one level (or change the code in projects.php from ../dbinfo.ini.php to dbinfo.ini.php)
