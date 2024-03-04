#Spécification de l'application

Implémentez le système d’authentification suivant:

- Un utilisateur peut créer un compte en fournissant son nom, prénom,
e-mail, contact et mot de passe ;
- Un utilisateur peut se connecter grâce à son émail et mot de passe ;
- Lors de la création de son compte de la page de création, l’utilisateur
reçoit le rôle “user” par défaut ;
- Un utilisateur peut avoir un ou plusieurs rôles ;
- Un utilisateur avec le rôle “admin” a accès au dashboard;
- Un administrateur peut créer un compte utilisateur à travers le
dashboard;
- Si un utilisateur a un rôle autre que "admin” il ne peut avoir accès au
dashboard administrateur ;
- Après la création de compte l’utilisateur dont le compte a été créé reçoit
un e-mail contenant son login et son mot de passe ;
- Un administrateur peut créer, modifier les rôles, mais en aucun cas les
supprimer.
Liste des rôles utilisateur:
- Administrateur (admin)
- Utilisateur normal (user)
- Auteur (author)