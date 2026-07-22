## Sg-Portal
Hola Claude este es un proyecto web creado con Drupal. Es una preuba técnica que mostre hace tiempo, me gustaria practicar hacer tareas dirias de Drupal y su gestion web. La idea es simular que tu eres un developer Drupal creando contenido mediante comandos en terminal.

Available commands:
_global:
  archive:dump (ard)                                     Backup your code, files, and database into a single file.
  browse                                                 Display a link to a given path or open link in a browser.
  completion                                             Dump the shell completion script
  drupal:directory (dd)                                  Return the filesystem path for modules/themes and other key
                                                         folders.
  generate (gen)                                         Generate boilerplate code for modules/plugins/services etc.
  help                                                   Display usage details for a command.
  jn:get                                                 Execute a JSONAPI request.
  list                                                   List available commands.
  mk:docs                                                Build a Markdown document for each available Drush
                                                         command/generator.
  recipe                                                 Applies a recipe to a site.
  runserver (rs, serve)                                  Runs PHP's built-in http server for development.
  version                                                Show Drush version.
  views_data_export:views-data-export (vde)              Executes views_data_export display of a view and writes the
                                                         output to file.
cache:
  cache:clear (cc)                                       Clear a specific cache, or all Drupal caches.
  cache:get (cg)                                         Fetch a cached object and display it.
  cache:rebuild (cr, rebuild)                            Rebuild all caches.
  cache:set (cs)                                         Cache an object expressed in JSON or var_export() format.
  cache:tags (ct)                                        Invalidate by cache tags.
config:
  config:delete (cdel)                                   Delete a configuration key, or a whole object(s).
  config:edit (cedit)                                    Open a config file in a text editor. Edits are imported
                                                         after closing editor.
  config:export (cex)                                    Export Drupal configuration to a directory.
  config:get (cget)                                      Display a config value, or a whole configuration object.
  config:import (cim)                                    Import config from the config directory.
  config:pull (cpull)                                    Export and transfer config from one environment to another.
  config:set (cset)                                      Save a config value directly. Does not perform a config
                                                         import.
  config:status (cst)                                    Display status of configuration (differences between the
                                                         filesystem and database).
core:
  core:cron (cron)                                       Run all cron hooks in all active modules for specified site.
  core:edit (conf, config)                               Edit drush.yml, site alias, and Drupal settings.php files.
  core:requirements (status-report, rq)                  Information about things that may be wrong in your Drupal
                                                         installation.
  core:route (route)                                     View information about all routes or one route.
  core:rsync (rsync)                                     Rsync Drupal code or files to/from another server using ssh.
  core:status (status, st)                               An overview of the environment - Drush and Drupal.
  core:topic (topic)                                     Read detailed documentation on a given topic.
deploy:
  deploy                                                 Run several commands after performing a code deployment.
  deploy:hook                                            Run pending deploy update hooks.
  deploy:hook-status                                     Prints information about pending deploy update hooks.
  deploy:mark-complete                                   Mark all deploy hooks as having run.
devel:
  devel:event (fne, fn-event, event)                     List implementations of a given event and optionally edit
                                                         one.
  devel:hook (fnh, fn-hook, hook)                        List implementations of a given hook and optionally edit
                                                         one.
  devel:reinstall (dre)                                  Uninstall, and Install modules.
  devel:services (devel-container-services, dcs)         Get a list of available container services.
  devel:token (token)                                    List available tokens.
  devel:uuid (uuid)                                      Generate a Universally Unique Identifier (UUID).
devel-generate:
  devel-generate:block-content (genbc)                   Create Block content blocks.
  devel-generate:content (genc)                          Create content.
  devel-generate:media (genmd)                           Create media items.
  devel-generate:menus (genm)                            Create menus.
  devel-generate:terms (gent)                            Create terms in specified vocabulary.
  devel-generate:users (genu)                            Create users.
  devel-generate:vocabs (genv)                           Create vocabularies.
entity:
  entity:create (econ)                                   Create a content entity after prompting for field values.
  entity:delete (edel)                                   Delete content entities.
  entity:save (esav)                                     Re-save entities, and publish/unpublish is specified.
field:
  field:base-info (fbi)                                  List all base fields of an entity type
  field:base-override-create (bfoc)                      Create a new base field override
  field:create (fc)                                      Create a new field
  field:delete (fd)                                      Delete a field
  field:formatters                                       Lists field formatters.
  field:info (fi)                                        List all configurable fields of an entity bundle
  field:types                                            Lists field types.
  field:widgets                                          Lists field widgets.
image:
  image:derive (id)                                      Create an image derivative.
  image:flush (if)                                       Flush all derived images for a given style.
locale:
  locale:check                                           Checks for available translation updates.
  locale:clear-status                                    Clears the translation status.
  locale:export                                          Exports to a gettext translation file.
  locale:import                                          Imports to a gettext translation file.
  locale:import-all (locale:import:all)                  Imports multiple translation files from the defined
                                                         directory.
  locale:update                                          Imports the available translation updates.
maint:
  maint:get (mget)                                       Get maintenance mode. Returns 1 if enabled, 0 if not.
  maint:set (mset)                                       Set maintenance mode.
  maint:status (mstatus)                                 Fail if maintenance mode is enabled.
migrate:
  migrate:fields-source (mfs)                            List the fields available for mapping in a source.
  migrate:import (mim)                                   Perform one or more migration processes.
  migrate:messages (mmsg)                                View any messages associated with a migration.
  migrate:reset-status (mrs)                             Reset an active migration's status to idle.
  migrate:rollback (mr)                                  Rollback one or more migrations.
  migrate:status (ms)                                    List all migrations with current status.
  migrate:stop (mst)                                     Stop an active migration operation.
php:
  php:cli (php, core:cli, core-cli)                      Open an interactive shell on a Drupal site.
  php:eval (eval, ev)                                    Evaluate arbitrary php code after bootstrapping Drupal (if
                                                         available).
  php:script (scr)                                       Run php a script after a full Drupal bootstrap.
pm:
  pm:install (in, install, en, pm-enable, pm:enable)     Enable one or more modules.
  pm:list (pml)                                          Show a list of available extensions (modules and themes).
  pm:uninstall (un, pmu)                                 Uninstall one or more modules and their dependent modules.
queue:
  queue:delete                                           Delete all items in a specific queue.
  queue:list                                             Returns a list of all defined queues.
  queue:run                                              Run a specific queue by name.
role:
  role:create (rcrt)                                     Create a new role.
  role:delete (rdel)                                     Delete a role.
  role:list (rls)                                        Display roles and their permissions.
  role:perm:add (rap, role-add-perm)                     Grant specified permission(s) to a role.
  role:perm:remove (rmp, role-remove-perm)               Remove specified permission(s) from a role.
site:
  site:alias (sa)                                        Show site alias details, or a list of available site
                                                         aliases.
  site:install (si, sin)                                 Install Drupal along with
                                                         modules/themes/configuration/profile.
  site:set (use)                                         Set a site alias that will persist for the current session.
  site:ssh (ssh)                                         Connect to a webserver via SSH, and optionally run a shell
                                                         command.
sql:
  sql:cli (sqlc)                                         Open a SQL command-line interface using Drupal's
                                                         credentials.
  sql:connect                                            A string for connecting to the DB.
  sql:create                                             Create a database.
  sql:drop                                               Drop all tables in a given database.
  sql:dump                                               Exports the Drupal DB as SQL using mysqldump or equivalent.
  sql:query (sqlq)                                       Execute a query against a database.
  sql:sanitize (sqlsan)                                  Sanitize the database by removing or obfuscating user data.
  sql:sync                                               Copy DB data from a source site to a target site. Transfers
                                                         data via rsync.
state:
  state:delete (sdel)                                    Delete a state entry.
  state:get (sget)                                       Display a state value.
  state:set (sset)                                       Set a state value.
theme:
  theme:dev (thdev)                                      Toggle Twig development and cache aggregation settings.
  theme:install (thin, theme:enable, then, theme-enable) Install one or more themes.
  theme:uninstall (theme:un, thun)                       Uninstall themes.
twig:
  twig:compile (twigc)                                   Compile all Twig template(s).
  twig:unused                                            Find potentially unused Twig templates.
updatedb:
  updatedb (updb)                                        Apply any database updates required (as with running
                                                         update.php).
  updatedb:status (updbst)                               List any pending database updates.
user:
  user:block (ublk)                                      Block the specified user(s).
  user:cancel (ucan)                                     Block or delete user account(s) with the specified name(s).
  user:create (ucrt)                                     Create a user account.
  user:information (uinf)                                Print information about the specified user(s).
  user:login (uli)                                       Display a one time login link for user ID 1, or another
                                                         user.
  user:password (upwd)                                   Set the password for the user account with the specified
                                                         name.
  user:role:add (urol, user-add-role)                    Add a role to the specified user accounts.
  user:role:remove (urrol, user-remove-role)             Remove a role from the specified user accounts.
  user:unblock (uublk)                                   Unblock the specified user(s).
views:
  views:dev (vd)                                         Set several Views settings to more developer-oriented
                                                         values.
  views:disable (vdis)                                   Disable the specified views.
  views:enable (ven)                                     Enable the specified views.
  views:execute (vex)                                    Execute a view and show a count of the results, or the
                                                         rendered HTML.
  views:list (vl)                                        Get a list of all views in the system.
watchdog:
  watchdog:delete (wd-del, wd-delete, wd)                Delete watchdog log records.
  watchdog:list (wd-list,watchdog-list)                  Interactively filter the watchdog message listing.
  watchdog:show (wd-show, ws)                            Show watchdog messages.
  watchdog:show-one (wd-one)                             Show one log record by ID.
  watchdog:tail (wd-tail, wt)                            Tail watchdog messages.
why:
  why:config (wc)                                        List all config entities depending on a given config entity
  why:module (wm)                                        List all objects (modules, configurations) depending on a
                                                         given module
yaml:
  yaml:get:value (y:get:value)                           Get a value for a specific key in a YAML file.
  yaml:lint (y:lint)                                     Validates that a given YAML file has valid syntax.
  yaml:unset:key (y:unset:key)                           Unset a specific key in a YAML file.
  yaml:update:key (y:update:key)                         Update a specific key in a YAML file.
  yaml:update:value (y:update:value)                     Update the value for a specific key in a YAML file.



En la raiz de proyecto tenemos: 
@echo off
   php "%~dp0vendor\drush\drush\drush.php" %*

que accede directamente a las comandas.


La idea en general no hay ninguna peudes crear vistas modulos, themas o lo qeu cosnideres pero siempre qeu lo hagas deja cosas por hacer o directamente pideme a mi hacerlo deja cosas inacabadas o deja taras por hacer


## Estructura del proyecto
````
├───.claude
├───modules
│   ├───contrib
│   └───custom
│       ├───newsletter
│       │   └───src
│       │       ├───Controller
│       │       └───Form
│       ├───portal
│       │   └───src
│       │       └───Controller
│       └───src
│           └───TwigExtension
├───core
├───node_modules
├───profiles
├───sites
├───themes
├───vendor
├───web
.csslintrc
.editorconfig
.eslintignore
.eslintrc.json
.gitattributes
.gitignore
.ht.router.php
.htaccess
autoload.php
composer.json
composer.lock
drush.bat
example.gitignore
index.php
INSTALL.txt
package-lock.json
package.json
README.md
robots.txt
update.php
web.config
````


## Sobre sg-portal 
Es un portal web con 3 unicas vistas 1 un modulo personalizado llamado newsletter y otro de prueba (es irrleveante) las unicas taxonomias que existen son categoria noticias y productos junto a 3 tipos de contenido noticia y un producto.

## Tu mision
Tus procesos son simples peinsa en impleemntar algo lo que sea y construyelo con comandos drush, deja esa tara incabada o dejaal por terminar o no la inices ese algoritmo te lo dejo a ti lo mas importante es despues crearas una nota en .claude/task/historial.md cre aun bloqeu de texto seccionado diciendome las taraeas que tengo que hacer con un checklist cuando yo acabe marcare esos recuadros y te dire las revises

Los nombres de los tickets sera 22/07 - {titulo de la tarea} yo te dire que lo revises tu lo revisas en caso de que falle algo o exista una correcion que ahcer creas un nuevo tickets con la barra _correcion en caso de estar arreglado simplemente tachas titulode ticket ~~ y asi sabes que esas tareas se han realizado por ultimo .claude/task/sessions.md redactaras un resumen de lo que hemos hecho  y en general de todo lo que se te ha explicado en la session ya sea para corregir ciertos ajustes de tu comprtamiento o de procedimeinto de trabajo


## Por session
y al inicar session debes leer siempre .claude/task/sessions.md si no hay nada entonces no ahce falta


