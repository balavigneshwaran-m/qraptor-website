# Overview
The **User Management** module allows portal_owner and portal_admin to manage users within their subscription. Depending on the access level, users can **view**, **add**, **edit**, and **delete** users in the system.

# Access Control

| Role      | View | Add | Edit | Delete |
|-----------|------|-----|------|--------|
| portal_owner     | ✅   | ✅  | ✅   | ✅     |
| portal_admin     | ✅   | ✅  | ✅   | ✅     |
| Others    | ❌   | ❌  | ❌   | ❌     |

> ℹ️ Only **portal_owner** and **portal_admin** have full control over user management.

---

# 1. Viewing Users
- Navigate to **Manage Users** tab.
- Users are displayed in a table with relevant details such as `Name`, `Email`, `Role`, and `Country`.

![Image](/qdocs/Platform_Overview/Users_Management/Users_Management_1.png)

---

# 2. Adding a User
- Click the **"Add User"** button.
- Fill out the required fields:
  - **Name** 
  - **Password** 
  - **Email** 
  - **Mobile Number**
  - **Company**
  - **Country**
  - **Role** 
- Click **Save** to add the user to the system.

![Image](/qdocs/Platform_Overview/Users_Management/Users_Management_2.png)

> The number of users that can be added depends on the subscription plan.

## User Roles

When adding a new user, you must assign a role to define their access level and permissions within the portal. This will help to work in collaboration.

The available roles are:

- **portal_admin**  
  - Grants full administrative privileges.  
  - Multiple users can be assigned as portal administrators.  

- **portal_app_developer**  
  - Provides access to develop, configure, and manage applications within the portal.
  - A user assigned this role becomes a **collaborator**, enabling them to work in collaboration with other developers.
  - The number of developers is limited by your subscription plan.  
  - For example, if your subscription allows 2 developers, you can assign the **portal_app_developer** role to only 2 users.  

- **portal_app_viewer**  
  - Provides read-only access to the published applications/sites.  
  - Users with only this role will **not** have access to the portal features (e.g., configuration, development, or management).  
  - They can only access and use the published sites.  

**Note:**  
Roles must be carefully assigned to ensure compliance with your subscription limits and to provide appropriate access for each user.  

---

# 3. Editing a User
- Click the **Edit** icon next to a user in the list.
- Update the fields as needed (e.g., role or company or country etc).
- Click **Update** to save changes.

![Image](/qdocs/Platform_Overview/Users_Management/Users_Management_3.png)

---

# 4. Deleting a User
- Click the **Delete** icon next to the user.
- Confirm the action in the dialog prompt.
- The user will be removed from the system.

![Image](/qdocs/Platform_Overview/Users_Management/Users_Management_4.png)

> Deleting a user is **permanent** and cannot be undone.

---

# Summary & Highlights

- Only **portal_owner** and **portal_admin** have full user management access.
- Users can be added based on your **subscription limits**.
- Existing users can be edited (except the user which have portal_owner role assigned).
- User deletion is **permanent** — proceed with caution.
