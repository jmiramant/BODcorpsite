<h2>#Current system specifications:</h2>

PHP: 7.0.27 (cli) (NTS)

Apache: 2.4.18 (Ubuntu)

MySQL: 5.7.21

Wordpress: 5.0.3

Theme: Betheme Child


<h2>#Environment URLs:</h2>

<h5>Local</h5>
<p><i>Front-end:</i> http://blueorange.local/ <br/> <i>Back-end:</i> http://blueorange.local/admin </p>

<h5>Development</h5>
<p><i>Front-end:</i> http://18.232.244.255/ <br/> <i>Back-end:</i> http://18.232.244.255/admin </p>

<h5>Staging</h5>
<p><i>Front-end:</i> http://34.226.240.9/ <br/> <i>Back-end:</i> http://34.226.240.9/admin </p>

<h5>Production</h5>
<p><i>Front-end:</i> https://blueorange.digital/ <br/> <i>Back-end:</i> https://blueorange.digital/admin <p>


<h2>#Github Workflow with manual deployments:</h2>


<h3>Branch to Server mappings:</h3>
<p><b>Development Branch => Dev Server <br/>
Staging Branch => Staging Server <br/>
Production Branch => Production Server <br/>
</b></p>

1. Create a local branch ( Probably by name of Developer e.q. "Navtej" ) from "Development" Branch.
2. Clone branch from Github on local system using following command:<br/>
   <code>git clone https://github.com/jmiramant/BODcorpsite.git</code>
3. Create a new host on local machine probably "http://blueorange.local/" by adding following entry to hosts <br/>
   <code>127.0.0.1  blueorange.local</code>
4. Add new site to your server, enter the host as added to hosts file and map it to appropriate directory (Physical path of folder where code is cloned).
5. Open <b><i>wp-config.php</i></b> file in the root folder and configure the MySQL settings as needed and make sure to add this file to github ignore list, otherwise use same details that are present in the file and configure DB accordingly.
6. Get your admin user created from Administrator and request DB file backup for local setup.
7. Local branch should be updated from Development branch each day before starting work. All the changes on local environment should be pushed to Local branch everyday.
8. Once a task is complete, changes can be pushed to Development Branch from Local Branch, and hence can be tested on Development Server. Dev server deployment process:<br/>
<p><ul>
    <li>Push files from local environment:<br/>
        <code><pre>git add file1.php file2.js 
git commit -m "My test changes" 
git push</pre></code></li>
    <li>Compare with Development branch and merge Local branch into <b><i>Development</i></b></li>
    <li>
        <b>Deploy on dev server:</b><br/>
        Open terminal & SSH dev server. And follow the instructions,
        <code><pre>cd apps/wordpress/htdocs
sudo git pull</pre></code>
        Resolve conflicts if any, otherwise code on dev server will be deployed successfully. Now, Import any data in the admin panel like changes to pages or any other data.
    </li>
</ul></p>
9. Once a sprint/development is ready to go Live, Changes from Development will be pushed to "Staging" branch and hence Staging Server (Which is a clone of Production Server) for proper QA.
Staging server deployment process:<br/>
<p><ul>
    <li>Merge <i><b>Development</i></b> branch into <b><i>Staging</i></b> branch:<br/>
        Open terminal & SSH staging server. And follow the instructions (Exactly same as development process),
        <code><pre>cd apps/wordpress/htdocs
sudo git pull</pre></code>
        Resolve conflicts if any, otherwise code on dev server will be deployed successfully. Now, Import any data in the admin panel like changes to pages or any other data.
    </li>
</ul></p>
10. Once staging is verified, It is good to go on "Production" branch and hence on Production server. It will be marked as a Release on Github.
Production server deployment process:<br/>
<p><ul>
    <li>Merge <i><b>Staging</i></b> branch into <b><i>Production</i></b> branch:<br/>
        Open terminal & SSH production server. And follow the instructions (Exactly same as development process),
        <code><pre>cd apps/wordpress/htdocs
sudo git pull</pre></code>
        Resolve conflicts if any, otherwise code on dev server will be deployed successfully. Now, Import any data in the admin panel like changes to pages or any other data.
    </li>
</ul></p>
11. No direct code changes should be made to any server, If any issue needs to be fixed on priority bases, it has to be through Hotfix branch.
<br/><br/>
<p><b></i>
#Appropriate Comments should be added to code edits explaining the purpose of Code snippet/coditions.
<br/>
#All the Database changes should be placed inside "/_database" folder to keep track of DB changes. Read readme file inside "/_database" folder.
<br/>
#All the webpages should be placed inside "/_webpages" folder as .html files to keep track of the changes and maintain proper history. Read readme file inside "/_webpages" folder.
</i></b></p>