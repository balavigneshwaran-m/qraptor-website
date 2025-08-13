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
