# 🎓 Coding Tool Box

**Coding Tool Box** est un outil de gestion pédagogique complet conçu pour la [Coding Factory](https://codingfactory.fr). Développé avec **Laravel**, il permet aux administrateurs de gérer efficacement les enseignants, les étudiants et les promotions.

---

## 🚀 Fonctionnalités principales

### 👩‍🏫 Admins

- Accès à un **dashboard principal** affichant le nombre total :
  - d'étudiants
  - d'enseignants
  - de promotions
- **Gestion des étudiants**
  - Ajouter un étudiant (nom, prénom, email, date de naissance)
  - Modifier / Supprimer un étudiant *(AJAX partiellement implémenté)*
- **Gestion des enseignants**
  - Ajouter un enseignant (nom, prénom, email, date de naissance)
  - Modifier / Supprimer un enseignant *(AJAX partiellement implémenté)*
- **Gestion des promotions**
  - Ajouter une promotion (nom, description, date de début et fin)
  - Modifier / Supprimer une promotion *(AJAX partiellement implémenté)*
  - Associer un étudiant à une promotion *(1 étudiant = 1 promotion max)*
  - Supprimer un étudiant d’une promotion

### 👥 Tous les utilisateurs

- Modifier leur **adresse email**
- Supprimer leur **compte**
- ⚠️ Changement de mot de passe **en cours**
- ⚠️ Changement de photo de profil **non disponible actuellement**

---

## 📌 Avancement des User Stories

| User Story | Statut | Remarques |
|------------|--------|-----------|
| **US 1** | ✅ Terminée | - |
| **US 2** | ❌ Non commencée | Manque de temps | 
| **US 3** | ✅ Terminée  | AJAX fonctionne à l'ajout, mais pas sur modifier / supprimer |
| **US 4** | ✅ Terminée | AJAX à l'ajout uniquement, pas sur modifier / supprimer |
| **US 5** | ✅ Terminée | AJAX à l'ajout uniquement, pas sur modifier / supprimer |
| **US 6** | ⚠️ En cours | Email et suppression OK, mot de passe presque fini et photo à faire |

---

## 🛠️ Difficultés rencontrées

- Mise en place de **l’AJAX** (notamment sur les boutons modifier et supprimer)
- Gestion du **changement de mot de passe** :
  - Vérification de l’ancien mot de passe
  - Confirmation du nouveau mot de passe
  -Modification photo de profile
---

## 📚 Technologies utilisées

- **Laravel** (Framework PHP)
- **AJAX / jQuery**
- **MySQL**
- **Blade** (Moteur de template Laravel)

---

## 💡 Prochaines améliorations

- [ ] Finaliser les actions AJAX (modifier / supprimer)
- [ ] Ajout du changement de mot de passe complet
- [ ] Possibilité de changer la photo de profil
- [ ] Amélioration de l’interface utilisateur (UI/UX)

---

## 📩 Contact

*Développé avec ❤️ par un Antonin passionné de la Coding Factory.*

---

