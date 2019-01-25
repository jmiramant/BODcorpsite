#Current system specifications:

PHP: 7.0.27 (cli) (NTS)

Apache: 2.4.18 (Ubuntu)

MySQL: 5.7.21

Wordpress: 5.0.3

Theme: Betheme Child

#Github Workflow with manual deployments:

1. Create a local branch ( Probably by name of Developer e.q. "Navtej" ) from "Development" Branch.
2. Setup Local environment and clone local branch.
3. Branch to Server mappings:
    Development Branch => Dev Server, 
    Staging Branch => Staging Server,
    Production Branch => Production Server
 4. Local branch should be updated from Development branch each day before starting work. All the changes on local environment should be pushed to Local branch everyday.
 5. Once a task is complete, changes can be pushed to Development Branch from Local Branch, and hence can be tested on Development Server.
 6. Once a sprint/development is ready to go Live, Changes from Development will be pushed to "Staging" branch and hence Staging Server (Which is a clone of Production Server) for proper QA.
 7. Once staging is verified, Staging is good to go on "Production" branch and hence on Production server. It will be marked as a Release on Github.
 8. No direct code changes should be made to any server, If any issue needs to be fixed on priority bases, it has to be through Hotfix branch.
 
#Appropriate Comments should be added to code edits explaining the purpose of Code snippet/coditions.

#All the Database changes should be placed inside "/_database" folder to keep track of DB changes. Read readme file inside "/_database" folder.

#All the webpages should be placed inside "/_webpages" folder as .html files to keep track of the changes and maintain proper history. Read readme file inside "/_webpages" folder.
