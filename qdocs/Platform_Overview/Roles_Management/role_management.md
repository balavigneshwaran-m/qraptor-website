# Overview
The **Role Management** module allows portal_owner and portal_admin to create and manage roles for users across various parts of the platform. Only high-level access roles (portal_owner/portal_admin) can define or assign them.

These roles can later be used contextually throughout the platform wherever role-based assignment is required.

---

# Access Control

| Role          | View | Add | Delete |
|---------------|------|-----|--------|
| portal_owner  | ✅   | ✅  | ✅     |
| portal_admin  | ✅   | ✅  | ✅     |
| Others        | ❌   | ❌  | ❌     |

---

# 1. Viewing Roles
- Accessible from the **Roles** tab.
- Displays a list of all roles created.

![Image](/qdocs/Platform_Overview/Roles_Management/role_management_1.png)

---

# 2. Adding a Role
- Click **"Add Role"**.
- Provide:
  - **Role Name** (required): This will be automatically prefixed with `application_`.
  - **Role Description** – describe where and how the role will be used (e.g., project management, content access).
- Click **Save** to create the role.

![Image](/qdocs/Platform_Overview/Roles_Management/role_management_2.png)

> Example: If you enter `editor`, the system will save it as `application_editor`.

> The `application_` prefix is added to distinguish **application-level roles** from **portal roles**, ensuring clarity and separation in permission management.

---

# 4. Deleting a Role
- Only custom roles can be deleted.
- Use the **Delete** icon and confirm.

![Image](/qdocs/Platform_Overview/Roles_Management/role_management_3.png)

---

# Best Practices
- Use meaningful role names (e.g., *ProjectManager*, *Reviewer*, *ContentEditor*).
- Add descriptive context so other admins understand the role's purpose.
- Review user permissions quarterly to maintain security compliance.
- Avoid assigning high privileges unnecessarily.

---

# Summary & Highlights

- All custom role names are automatically prefixed with `application_` to distinguish them from portal roles.
- **Only portal_owner and portal_admin** have full access to role management.
- System-defined roles **cannot be modified or deleted or displayed in role tab**.
- Structured roles allow for **modular, scalable, and flexible access control**.
