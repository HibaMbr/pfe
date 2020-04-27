# Projet de Fin d'Etude
Had la partie qui s'apelle #README.md# ne9edro neketbo fiha wach n7abbo pour faire une description lel projet ta3na wella neketbo des remarques y3awnona wella l 5edma li mazal ndiroha

## Règles à suivre pour avoir un travail bien organisé
- Before I start working on the project (existed repository on GitHub) I clone the repository on my local machine useing the commande git clone [link to the repository]; Then I can add files using the commande git add *; or edit others.
- Once the changes are done, I can commit them to the local repository (git repo). Then I share what I've done with the others using the commande git push.
- PS: The push commande may result a conflict, so I need to fixe those issues. So it's preferable to check if chages have been made on the part I worked on before pushing my work, in this case, I have two options:
  * I can perform a git fetch ; it bring the changes made on GitHub repository to my local machine, but it will stop there, no murge will be done yet. Only when I performe a git merge when my changes be merged. In this case, some things may be merged automaticaly & some others may need a manual intervention from me.
  * I can perform a pull : It can be seen as a shortcut where the fetch, as well as the merge with the changes in your local repository will be done in one go. we can basicaly say that the git pull is a sum of a git fetch and a git merge. after the git pull, I can then perform a git push to the GitHub repository.
- Avant de faire aucun changement, tu as deux choix :
  * Soit tu crée une nouvelle brache et tu travaille sur la partie du projet que tu veux faire.
  * Ou tu travail sur un brache que t'as déjà créé mais makemeltich l 5edma 3liha.
- Après avoir terminer le travail sur une brache et la personne veux faire un "merge" dans la branche principale qui s'appelle "master brache", on fait un pull request pour que l'autre personne puisse etre au courant des changements.
- Pull requests are used to notify the other contributer of changes pushed to the repository
- Dans la section "Projects" on peut mettre le travail qu'on a à faire (ToDoLists), les taches sur lesquelles on est entrain de travailler(InProgress) et les taches faites(Done).

## Commande dont on aura besion 
#### $ git clone [lien http du repository]
To put the repository in my workplace -In my case, it's VS Code' (This step is only used in the first time I want to work on a project That amready exists on GitHub).

#### $ git add *
to prepare all the changes that I've done in my local repository so that GitHub can follow them.

#### $ git commit -m 'description of the commit & what I've added'
To commit what I've done to the project's repository (This step and the previous one can be merged in one commande by writing : git commit -am 'description of the commit').

#### $ git push
Push all the changes to GitHub (After this step, you can check on GitHub if the changes have been commited)

#### $ git branch [brach-name]
Create a new branch locally (de lien contient une explication de comment collaborer, créer une brache et envoyer un pull request : https://guides.github.com/activities/hello-world/ )

#### $ git checkout [brach-name]
Work on an existing brach locally
NB: Theese last two steps can be merged in one commande: $git checkout -b [branch-name]

#### $ git tag [tag-name] [branch-name where I want to create the tag]
So in this case the tag I created will be associated with the latest commit on the branch I've chosen 


PS: La syntaxe de l'écriture d'un fichier README est dans le site https://daringfireball.net/projects/markdown/syntax 
